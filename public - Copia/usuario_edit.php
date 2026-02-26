<?php
session_start();
if (!isset($_SESSION["logado"])) {
    header("Location: login.php");
    exit();
}

require_once("../config/conexao.php");

$id = intval($_GET["id"]); // Segurança básica
$sql = "SELECT * FROM usuarios WHERE id=$id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "UPDATE usuarios SET nome='$nome', email='$email', senha='$senha' WHERE id=$id";
    $conn->query($sql);

    header("Location: usuarios.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editar Usuário</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f2f5;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .form-container {
        background-color: #fff;
        padding: 30px 40px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        width: 350px;
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }

    .form-container label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }

    .form-container input {
        width: 100%;
        padding: 10px 12px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        transition: 0.3s;
    }

    .form-container input:focus {
        border-color: #007BFF;
        box-shadow: 0 0 5px rgba(0,123,255,0.3);
        outline: none;
    }

    .form-container button {
        width: 100%;
        padding: 12px;
        background-color: #28a745;
        border: none;
        border-radius: 6px;
        color: white;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    .form-container button:hover {
        background-color: #1e7e34;
    }

    .form-container a {
        display: block;
        text-align: center;
        margin-top: 15px;
        color: #007BFF;
        text-decoration: none;
        font-size: 14px;
    }

    .form-container a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
    <div class="form-container">
        <h2>Editar Usuário</h2>
        <form method="POST">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($user["nome"]) ?>" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars($user["email"]) ?>" required>

            <label for="senha">Senha</label>
            <input type="text" name="senha" id="senha" value="<?= htmlspecialchars($user["senha"]) ?>" required>

            <button type="submit">Atualizar</button>
        </form>
        <a href="usuarios.php">Voltar</a>
    </div>
</body>
</html>



