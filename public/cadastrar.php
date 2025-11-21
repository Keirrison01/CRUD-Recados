<?php
require_once "../src/Usuario.php";
session_start();

if ($_POST) {
    $user = new Usuario();

    $existe = $user->buscarPorEmail($_POST['email']);
    if ($existe) {
        $erro = "Este e-mail já está cadastrado!";
    } else {

        // -------------------------
        // PROCESSAR FOTO DE PERFIL
        // -------------------------
        $fotoNome = null;

        if (!empty($_FILES['foto']['name'])) {

            $pasta = "../uploads/";

            // cria pasta se não existir
            if (!is_dir($pasta)) {
                mkdir($pasta, 0777, true);
            }

            $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $fotoNome = uniqid() . "." . $ext;

            move_uploaded_file($_FILES['foto']['tmp_name'], $pasta . $fotoNome);
        }

        // Agora criar usuário com foto
        $user->criar($_POST['nome'], $_POST['email'], $_POST['senha'], $fotoNome);

        header("Location: login.php");
        exit;
    }
}

include "../templates/header.php";
?>

<h2>Criar Conta</h2>

<?php if (!empty($erro)): ?>
    <p style="color:red"><?= $erro ?></p>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">
    Nome:<br>
    <input type="text" name="nome" required><br><br>

    Email:<br>
    <input type="email" name="email" required><br><br>

    Senha:<br>
    <input type="password" name="senha" required><br><br>

    Foto de Perfil:<br>
    <input type="file" name="foto" accept="image/*"><br><br>

    <button type="submit">Criar Conta</button>
</form>

<?php include "../templates/footer.php"; ?>
