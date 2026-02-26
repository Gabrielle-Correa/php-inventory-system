<?php
session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Menu do Sistema</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .menu-container {
            background: #fff;
            width: 400px;
            padding: 30px;
            text-align: center;
            border-radius: 15px;
            box-shadow: 0 0 25px rgba(0,0,0,0.3);
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            color: #444;
            margin-bottom: 25px;
        }

        .btn {
            display: block;
            margin: 12px 0;
            padding: 12px;
            text-decoration: none;
            color: white;
            background: #2575fc;
            border-radius: 8px;
            font-size: 18px;
            transition: 0.2s;
        }

        .btn:hover {
            background: #0b56d7;
        }

        .logout {
            background: #ff4d4d;
        }

        .logout:hover {
            background: #cc0000;
        }
    </style>
</head>

<body>

<div class="menu-container">
    <h2>Menu do Sistema</h2>

    <a class="btn" href="usuarios.php">👤 Gerenciar Usuários</a>
    <a class="btn logout" href="logout.php">🚪 Sair</a>
</div>

</body>
</html>

