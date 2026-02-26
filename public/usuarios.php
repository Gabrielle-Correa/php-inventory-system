<?php
session_start();
if (!isset($_SESSION["logado"])) {
    header("Location: login.php");
    exit();
}

require_once("../config/conexao.php");

$sql = "SELECT * FROM usuarios ORDER BY id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Usuários</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f2f5;
        padding: 20px;
    }

    .container {
        max-width: 900px;
        margin: 0 auto;
        background-color: #fff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .add-user {
        margin-bottom: 20px;
        text-align: center;
    }

    a.button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007BFF;
        color: #fff;
        text-decoration: none;
        border-radius: 6px;
        transition: 0.3s;
        font-weight: bold;
    }

    a.button:hover {
        background-color: #0056b3;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #007BFF;
        color: white;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .action-buttons a {
        padding: 6px 12px;
        border-radius: 5px;
        text-decoration: none;
        color: #fff;
        margin-right: 5px;
        font-size: 14px;
    }

    .action-buttons .edit {
        background-color: #28a745;
    }

    .action-buttons .edit:hover {
        background-color: #1e7e34;
    }

    .action-buttons .delete {
        background-color: #dc3545;
    }

    .action-buttons .delete:hover {
        background-color: #a71d2a;
    }
</style>
</head>
<body>
    <div class="container">
        <h2>Usuários Cadastrados</h2>
        <div class="add-user">
            <a href="usuario_add.php" class="button">Adicionar Usuário</a>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>

            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row["id"] ?></td>
                        <td><?= htmlspecialchars($row["nome"]) ?></td>
                        <td><?= htmlspecialchars($row["email"]) ?></td>
                        <td class="action-buttons">
                            <a href="usuario_edit.php?id=<?= $row["id"] ?>" class="edit">Editar</a>
                            <a href="usuario_delete.php?id=<?= $row["id"] ?>" class="delete" onclick="return confirm('Deseja realmente excluir este usuário?')">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align:center;">Nenhum usuário encontrado</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
