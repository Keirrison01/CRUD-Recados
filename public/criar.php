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
}
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

/* Container do formulário */
.form-container {
    background: #fff;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 15px 25px rgba(0,0,0,0.3);
    width: 100%;
    max-width: 600px;
}

/* Título */
.form-container h2 {
    text-align: center;
    margin-bottom: 30px;
    color: #333;
}

/* Inputs e textarea */
.form-container input[type="text"],
.form-container textarea {
    width: 100%;
    padding: 12px 15px;
    margin: 10px 0 20px 0;
    border-radius: 8px;
    border: 1px solid #ccc;
    transition: 0.3s;
    resize: none;
}

.form-container textarea {
    min-height: 120px;
}

.form-container input:focus,
.form-container textarea:focus {
    border-color: #667eea;
    box-shadow: 0 0 5px rgba(102, 126, 234, 0.5);
    outline: none;
}

/* Botões */
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

/* Link voltar */
.back-link {
    display: block;
    text-align: center;
    margin-top: 15px;
}

.back-link a {
    color: #667eea;
    text-decoration: none;
    font-weight: bold;
}

.back-link a:hover {
    text-decoration: underline;
}
</style>

<div class="main-container">

    <div class="form-container">
        <h2>➕ Novo Recado</h2>

        <form method="POST">
            <input type="text" name="titulo" placeholder="Título do recado" required>

            <textarea name="mensagem" placeholder="Digite sua mensagem..." required></textarea>

            <button type="submit">Salvar Recado</button>
        </form>

        <div class="back-link">
            <a href="index.php">⬅ Voltar para o mural</a>
        </div>
    </div>

</div>

<?php include "../templates/footer.php"; ?>
