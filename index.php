<?php
session_start();
include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud - Cadastrar</title>
</head>
<body>
    <a href="index.php">Cadastrar</a><br>
    <a href="listar.php">Listar</a><br>
    <h1>Cadastrar usuario</h1>
    <?php
    if(isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form action="processa.php" method="post">
        <label>Nome: </label>
        <input type="text" name="nome" placeholder="Digite o nome completo"><br><br>

        <label>Email: </label>
        <input type="email" name="email" placeholder="Digite seu email"><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>