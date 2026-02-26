
<?php
session_start();
if (isset($_SESSION["logado"]) && $_SESSION["logado"] === true) {
    header("Location: menu.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema PHP</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #cb11bbff, #4f8efcff);
            font-family: Arial, sans-serif;
        }

        .login-container {
            background: #fff;
            padding: 40px;
            width: 360px;
            border-radius: 15px;
            box-shadow: 0 0 25px rgba(0,0,0,0.2);
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .login-container input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            font-size: 15px;
            transition: 0.2s;
        }

        .login-container input:focus {
            border-color: #2575fc;
            box-shadow: 0 0 5px #2575fc;
        }

        .login-container button {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            background: #2575fc;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.2s;
        }

        .login-container button:hover {
            background: #0b56d7;
        }

        .erro {
            background: #ffdddd;
            color: #b80000;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Acesso ao Sistema</h2>

        <?php if (isset($_GET["erro"])): ?>
            <div class="erro">Email ou senha incorretos!</div>
        <?php endif; ?>

        <form action="valida_login.php" method="POST">
            <input type="email" name="email" placeholder="Digite seu e-mail" required>
            <input type="password" name="senha" placeholder="Digite sua senha" required>

            <button type="submit">Entrar</button>
        </form>
    </div>

</body>
</html>

