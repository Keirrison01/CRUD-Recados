<?php
session_start();
require_once "../src/Usuario.php";

$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    $usuario = new Usuario();
    $resultado = $usuario->login($email, $senha);

    if ($resultado) {
        // Caso login() já retorne os dados do usuário
        if (is_array($resultado) && isset($resultado['id'])) {
            $user = $resultado;
        } else {
            // Caso login() retorne true, buscamos os dados
            $user = $usuario->buscarPorEmail($email);
            if (!$user) {
                $erro = "Erro interno ao efetuar login.";
                goto render_form;
            }
        }

        session_regenerate_id(true);

        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['usuario_nome'] = $user['nome'];

        header("Location: index.php");
        exit;
    } else {
        $erro = "E-mail ou senha incorretos.";
    }
}
render_form:
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login</title>

<style>
    body {
        margin: 0;
        padding: 0;
        background: #f2f2f2;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-container {
        background: #fff;
        width: 350px;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        font-weight: 600;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
    }

    button {
        width: 100%;
        background: #4CAF50;
        color: white;
        padding: 10px;
        margin-top: 15px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
        transition: 0.2s;
    }

    button:hover {
        background: #43a047;
    }

    .erro {
        color: red;
        text-align: center;
        margin-bottom: 10px;
    }
</style>

</head>
<body>

<div class="login-container">
    <h2>Mural de Recados</h2>

    <?php if ($erro): ?>
        <div class="erro"><?= $erro ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Seu email" required>
        <input type="password" name="senha" placeholder="Senha" required>

        <button type="submit">Entrar</button>

        <p style="text-align: center; margin-top: 15px;">
            Não tem conta?
            <a href="cadastrar.php" style="color:#3498db; font-weight:bold;">Criar conta</a>
        </p>

    </form>
</div>

</body>
</html>
