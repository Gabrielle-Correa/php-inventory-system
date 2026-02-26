<?php
session_start();
require_once("../config/db.php");

if (!isset($_SESSION["logado"])) {
    header("Location: ../public/login.php");
    exit();
}

// Inserção
if (isset($_POST["add"])) {
    $email = $_POST["email"];
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    $conn->query("INSERT INTO usuarios (email, nome, senha) VALUES ('$email', '$nome', '$senha')");
}

// Exclusão
if (isset($_GET["del"])) {
    $id = $_GET["del"];
    $conn->query("DELETE FROM usuarios WHERE id=$id");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Usuários</title>
</head>
<body>

<h2>Gerenciar Usuários</h2>

<h3>Adicionar Usuário</h3>
<form method="POST">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="text" name="nome" placeholder="Nome" required><br><br>
    <input type="text" name="senha" placeholder="Senha" required><br><br>
    <button type="submit" name="add">Adicionar</button>
</form>

<hr>

<h3>Lista de Usuários</h3>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Email</th>
    <th>Nome</th>
    <th>Senha</th>
    <th>Ações</th>
</tr>

<?php
$usuarios = $conn->query("SELECT * FROM usuarios");
while($u = $usuarios->fetch_assoc()):
?>
<tr>
    <td><?= $u["id"] ?></td>
    <td><?= $u["email"] ?></td>
    <td><?= $u["nome"] ?></td>
    <td><?= $u["senha"] ?></td>
    <td>
        <a href="usuarios_edit.php?id=<?= $u['id'] ?>">Editar</a> | 
        <a href="?del=<?= $u['id'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
    </td>
</tr>
<?php endwhile; ?>

</table>

<br>
<a href="../public/menu.php">Voltar ao Menu</a>

</body>
</html>
