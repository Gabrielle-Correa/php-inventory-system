<?php
session_start();
require_once("../config/conexao.php");

$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha' LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $_SESSION["logado"] = true;
    header("Location: menu.php");
    exit();
} else {
    header("Location: login.php?erro=1");
    exit();
}
?>

