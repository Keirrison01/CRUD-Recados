<?php
session_start();

// Se não tiver usuário logado, manda para o login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

// Carrega classe de Recados
require_once "../src/Recado.php";

// Inclui o header (aqui é onde a foto aparece)
include "../templates/header.php";

// Lista recados do usuário logado
$recado = new Recado();
$lista = $recado->listar($_SESSION['usuario_id']); 
?>

<a href="criar.php">➕ Criar novo recado</a>
<br><br>

<?php foreach ($lista as $r): ?>
    <div class="card">
        <h4><?= htmlspecialchars($r['titulo']) ?></h4>

        <p><?= nl2br(htmlspecialchars($r['descricao'])) ?></p>

        <small class="text-muted">Criado em: <?= $r['criado_em'] ?></small>
        <br><br>

        <a class="btn btn-warning btn-sm" href="editar.php?id=<?= $r['id'] ?>">✏ Editar</a>
        <a class="btn btn-danger btn-sm" href="excluir.php?id=<?= $r['id'] ?>">🗑 Excluir</a>
    </div>
<?php endforeach; ?>

<?php include "../templates/footer.php"; ?>
