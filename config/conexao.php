<?php
$host = "localhost";   // Servidor do banco
$user = "root";        // Usuário do MySQL (padrão do XAMPP)
$pass = "";            // Senha (padrão = vazio no XAMPP)
$dbname = "sistema_php"; // Nome do banco

// Criando a conexão
$conn = new mysqli($host, $user, $pass, $dbname);

// Verificando erro
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
