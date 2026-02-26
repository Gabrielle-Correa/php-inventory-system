<?php
session_start();
if (!isset($_SESSION["logado"])) {
    header("Location: login.php");
    exit();
}

require_once("../config/conexao.php");

// Deletar usuário se houver delete_id
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']); // Segurança básica
    $sql = "DELETE FROM usuarios WHERE id = $id";
    $conn->query($sql);
    header("Location: usuarios.php");
    exit();
}

// Buscar todos os usuários
$sql = "SELECT * FROM usuarios ORDER BY id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
            border-radius: 6px 6px 0 0;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a.button {
            display: inline-block;
            padding: 8px 15px;
            margin-right: 5px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: 0.3s;
            font-size: 14px;
        }

        a.button:hover {
            background-color: #0056b3;
        }

        a.delete-button {
            background-color: #dc3545;
        }

        a.delete-button:hover {
            background-color: #a71d2a;
        }

        .add-user {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Lista de Usuários</h2>

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
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['nome']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td>
                            <a href="usuario_add.php?id=<?= $row['id'] ?>" class="button">Editar</a>
                            <a href="usuarios.php?delete_id=<?= $row['id'] ?>" class="button delete-button" onclick="return confirm('Deseja realmente excluir este usuário?')">Excluir</a>
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
