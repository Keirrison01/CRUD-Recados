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
        if (is_array($resultado) && isset($resultado['id'])) {
            $user = $resultado;
        } else {
            $user = $usuario->buscarPorEmail($email);
            if (!$user) {
                $erro = "Erro interno ao efetuar login.";
                goto render_form;
            }
        }

        session_regenerate_id(true);

        $_SESSION['usuario_id']   = $user['id'];
        $_SESSION['usuario_nome'] = $user['nome'];
        $_SESSION['usuario_foto'] = $user['foto'] ?? null;

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
.form-container input[type="email"],
.form-container input[type="password"] {
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

/* Link */
.link {
    text-align: center;
    margin-top: 15px;
}

.link a {
    color: #667eea;
    text-decoration: none;
    font-weight: bold;
}

.link a:hover {
    text-decoration: underline;
}
</style>

</head>

<body>

<div class="form-container">
    <h2>Entrar</h2>

    <?php if (!empty($erro)): ?>
        <p class="error"><?= $erro ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="senha" placeholder="Senha" required>

        <button type="submit">Entrar</button>

        <div class="link">
            Não tem conta?
            <a href="cadastrar.php">Criar conta</a>
        </div>
    </form>
</div>

</body>
</html>
