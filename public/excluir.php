<?php
session_start();

// Redireciona se o usuário não estiver logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

require_once "../src/Recado.php";

// Verifica se o ID do recado foi enviado
if (isset($_GET['id'])) {
    $recado = new Recado();
    $id = intval($_GET['id']); // garante que é número
    $usuario_id = $_SESSION['usuario_id']; // usuário logado

    // Passa os dois parâmetros para o método excluir
    if ($recado->excluir($id, $usuario_id)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao excluir recado.";
    }
} else {
    echo "ID do recado não informado.";
}
