<?php
require_once "../src/Usuario.php";
session_start();

if ($_POST) {
    $user = new Usuario();

    $existe = $user->buscarPorEmail($_POST['email']);
    if ($existe) {
        $erro = "Este e-mail já está cadastrado!";
    } else {
        $user->criar($_POST['nome'], $_POST['email'], $_POST['senha']);
        header("Location: login.php");
    }
}

include "../templates/header.php";
?>

<h2>Criar Conta</h2>

<?php if (!empty($erro)): ?>
    <p style="color:red"><?= $erro ?></p>
<?php endif; ?>

<form method="POST">
    Nome:<br>
    <input type="text" name="nome" required><br><br>

    Email:<br>
    <input type="email" name="email" required><br><br>

    Senha:<br>
    <input type="password" name="senha" required><br><br>

    <button type="submit">Criar Conta</button>
</form>

<?php include "../templates/footer.php"; ?>
