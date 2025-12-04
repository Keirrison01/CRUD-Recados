<?php
require_once "../src/Usuario.php";
session_start();

if ($_POST) {
    $user = new Usuario();

    $existe = $user->buscarPorEmail($_POST['email']);
    if ($existe) {
        $erro = "Este e-mail já está cadastrado!";
    } else {

        $fotoNome = null;

        if (!empty($_FILES['foto']['name'])) {
            $pasta = "../uploads/";
            if (!is_dir($pasta)) {
                mkdir($pasta, 0777, true);
            }

            $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $fotoNome = uniqid() . "." . $ext;

            move_uploaded_file($_FILES['foto']['tmp_name'], $pasta . $fotoNome);
        }

        $user->criar($_POST['nome'], $_POST['email'], $_POST['senha'], $fotoNome);

        header("Location: login.php");
        exit;
    }
}

include "../templates/header.php";
?>

<style>
/* Reset simples */
* {
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}

/* Corpo da página */
body {
    background: linear-gradient(135deg, #667eea, #764ba2);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Container do formulário */
.form-container {
    background: #fff;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 15px 25px rgba(0,0,0,0.3);
    width: 100%;
    max-width: 400px;
}

/* Título */
.form-container h2 {
    text-align: center;
    margin-bottom: 30px;
    color: #333;
}

/* Inputs */
.form-container input[type="text"],
.form-container input[type="email"],
.form-container input[type="password"],
.form-container input[type="file"] {
    width: 100%;
    padding: 12px 15px;
    margin: 10px 0 20px 0;
    border-radius: 8px;
    border: 1px solid #ccc;
    transition: 0.3s;
}

.form-container input:focus {
    border-color: #667eea;
    box-shadow: 0 0 5px rgba(102, 126, 234, 0.5);
    outline: none;
}

/* Botão */
.form-container button {
    width: 100%;
    padding: 12px;
    background: #667eea;
    border: none;
    border-radius: 8px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}

.form-container button:hover {
    background: #5a67d8;
}

/* Mensagem de erro */
.error {
    color: #e74c3c;
    text-align: center;
    margin-bottom: 20px;
}
</style>

<div class="form-container">
    <h2>Criar Conta</h2>

    <?php if (!empty($erro)): ?>
        <p class="error"><?= $erro ?></p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <input type="file" name="foto" accept="image/*">
        <button type="submit">Criar Conta</button>
    </form>
</div>

<?php include "../templates/footer.php"; ?>
