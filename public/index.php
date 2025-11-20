<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

require_once "../src/Recado.php";
include "../templates/header.php";

$recado = new Recado();
$lista = $recado->listar($_SESSION['usuario_id']); // 🔥 CORRIGIDO
?>

<a href="criar.php">➕ Criar novo recado</a>
<br><br>

<?php foreach($lista as $r): ?>
    <div class="card">
        <h4><?= htmlspecialchars($r['titulo']) ?></h4>
        <p><?= nl2br(htmlspecialchars($r['mensagem'])) ?></p>
        <small class="text-muted">Criado em: <?= $r['criado_em'] ?></small>
        <br><br>

        <a class="btn btn-warning btn-sm" href="editar.php?id=<?= $r['id'] ?>">✏ Editar</a>
        <a class="btn btn-danger btn-sm" href="excluir.php?id=<?= $r['id'] ?>">🗑 Excluir</a>
    </div>
<?php endforeach; ?>

<?php include "../templates/footer.php"; ?>
