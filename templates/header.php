<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mural de Recados</title>

    <!-- Bootstrap 5 -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >

    <style>
        body {
            background: #f4f4f4;
        }
        .card {
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            background: #fff;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        nav {
            background: #343a40;
            padding: 12px;
        }
        nav a {
            color: #fff;
            margin-right: 15px;
            text-decoration: none;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<nav>
    <a href="index.php">🏠 Início</a>
    <a href="criar.php">➕ Criar Recado</a>
    <a href="logout.php">🚪 Sair</a>
</nav>

<div class="container mt-4">
