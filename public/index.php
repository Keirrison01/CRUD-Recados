<?php
session_start();

// Se não tiver usuário logado, manda para o login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

// Carrega classe de Recados
require_once "../src/Recado.php";

// Inclui o header (menu + foto)
include "../templates/header.php";

// Lista recados do usuário logado
$recado = new Recado();
$lista = $recado->listar($_SESSION['usuario_id']); 
?>

<style>
/* Corpo da página */
.main-container {
    background: linear-gradient(135deg, #667eea, #764ba2);
    min-height: calc(100vh - 70px);
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding-top: 40px;
}

/* Container do conteúdo */
.content-box {
    background: #fff;
    width: 100%;
    max-width: 800px;
    padding: 35px;
    border-radius: 15px;
    box-shadow: 0 15px 25px rgba(0,0,0,0.25);
}

/* Botão criar recado */
.new-note {
    display: inline-block;
    background: #667eea;
    color: #fff;
    padding: 10px 18px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    margin-bottom: 25px;
    transition: 0.3s;
}

.new-note:hover {
    background: #5a67d8;
}

/* Card do recado */
.card {
    background: #f9f9f9;
    border: 1px solid #e1e1e1;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.05);
}

.card h4 {
    margin-bottom: 10px;
    color: #444;
}

.card p {
    color: #555;
}

/* Botões */
.btn {
    padding: 6px 12px;
    text-decoration: none;
    border-radius: 6px;
    font-size: 14px;
    margin-right: 5px;
    display: inline-block;
}

.btn-warning {
    background: #f39c12;
    color: white;
}

.btn-danger {
    background: #e74c3c;
    color: white;
}

.btn:hover {
    opacity: 0.85;
}
</style>

<div class="main-container">

    <div class="content-box">

        <h2 style="text-align:center; margin-bottom:30px;">
            📌 Seus Recados
        </h2>

        <a href="criar.php" class="new-note">➕ Criar novo recado</a>

        <?php if (count($lista) == 0): ?>
            <p style="text-align:center; color:#777;">Você ainda não tem nenhum recado.</p>
        <?php endif; ?>

        <?php foreach ($lista as $r): ?>
            <div class="card">
                <h4><?= htmlspecialchars($r['titulo']) ?></h4>

                <p><?= nl2br(htmlspecialchars($r['descricao'])) ?></p>

                <small style="color: #777;">Criado em: <?= $r['criado_em'] ?></small>
                <br><br>

                <a class="btn btn-warning" href="editar.php?id=<?= $r['id'] ?>">✏ Editar</a>
                <a class="btn btn-danger" href="excluir.php?id=<?= $r['id'] ?>">🗑 Excluir</a>
            </div>
        <?php endforeach; ?>

    </div>

</div>

<?php include "../templates/footer.php"; ?>
