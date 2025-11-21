<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

require_once "../src/Recado.php";

$recado = new Recado();

// Buscar recado corretamente
$dados = $recado->buscar($_GET['id'], $_SESSION['usuario_id']);

include "../templates/header.php";

// Quando enviar formulário
if ($_POST) {
    $recado->editar(
        $_GET['id'],
        $_SESSION['usuario_id'],
        $_POST['titulo'],
        $_POST['descricao'] // CORRIGIDO
    );

    header("Location: index.php");
    exit;
}
?>

<h2>Editar Recado</h2>

<form method="POST">
    Título:<br>
    <input type="text" name="titulo" value="<?= htmlspecialchars($dados['titulo']) ?>" required><br><br>

    Mensagem:<br>
    <textarea name="descricao" required><?= htmlspecialchars($dados['descricao']) ?></textarea><br><br> <!-- CORRIGIDO -->

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<?php include "../templates/footer.php"; ?>
