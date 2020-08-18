<?php
session_start();
include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud - Listar</title>
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
    $result_usuarios = "SELECT * FROM usuarios";
    $resultado_usuarios = mysqli_query($conn, $result_usuarios);
    while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
        echo "ID: " . $row_usuario["id"] . "<br>";
        echo "Nome: " . $row_usuario["nome"] . "<br>";
        echo "Email: " . $row_usuario["email"] . "<br><hr>";
        echo "<a href='edit_usuario.php?id=" . $row_usuario['id'] . "'>Editar</a><br><hr>";
        echo "<a href='apagar_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</a><br><hr>";
    }
    ?>

    </body>