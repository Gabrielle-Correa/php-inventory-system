<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Logout</title>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f0f2f5;
        font-family: Arial, sans-serif;
    }

    .logout-container {
        text-align: center;
        background-color: #fff;
        padding: 30px 40px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    h2 {
        color: #333;
        margin-bottom: 10px;
    }

    p {
        color: #555;
        margin-bottom: 20px;
    }
</style>
<meta http-equiv="refresh" content="2;url=login.php">
</head>
<body>
    <div class="logout-container">
        <h2>Você saiu com sucesso!</h2>
        <p>Redirecionando para a página de login...</p>
    </div>
</body>
</html>


