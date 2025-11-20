<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

require_once "../src/Recado.php";
include "../templates/header.php";

if ($_POST) {
    $recado = new Recado();
    $recado->criar($_POST['titulo'], $_POST['mensagem'], $_SESSION['usuario_id']);
    header("Location: index.php");
    exit;
} ?>


<h2>Novo Recado</h2>

<form method="POST">
    Título:<br>
    <input type="text" name="titulo" required><br><br>

    Mensagem:<br>
    <textarea name="mensagem" required></textarea><br><br>

    <button type="submit" class="btn btn-success">Salvar</button>
</form>

<?php include "../templates/footer.php"; ?>
