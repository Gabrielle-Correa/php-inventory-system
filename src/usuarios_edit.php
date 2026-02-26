<?php
session_start();
require_once("../config/db.php");

if (!isset($_SESSION["logado"])) {
    header("Location: ../public/login.php");
    exit();
}

$id = $_GET["id"];
$dados = $conn->query("SELECT * FROM usuarios WHERE id=$id")->fetch_assoc();

if (isset($_POST["salvar"])) {
    $email = $_POST["email"];
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    $conn->query("
        UPDATE usuarios 
        SET email='$email', nome='$nome', senha='$senha'
        WHERE id=$id
    ");

    header("Location: usuarios.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
</head>
<body>

<h2>Editar Usuário</h2>

<form method="POST">
    <input type="email" name="email" value="<?= $dados['email'] ?>" required><br><br>
    <input type="text" name="nome" value="<?= $dados['nome'] ?>" required><br><br>
    <input type="text" name="senha" value="<?= $dados['senha'] ?>" required><br><br>

    <button name="salvar">Salvar alterações</button>
</form>

<br>
<a href="usuarios.php">Voltar</a>

</body>
</html>
