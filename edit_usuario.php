<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud - Editar</title>
</head>
<body>
    <a href="index.php">Cadastrar</a><br>
    <a href="listar.php">Listar</a><br>
    <h1>Editar usuario</h1>
    <?php
    if(isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form action="proc_edit_usuario.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row_usuario["id"]; ?>">
        <label>Nome: </label>
        <input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario["nome"]; ?>"><br><br>

        <label>Email: </label>
        <input type="email" name="email" placeholder="Digite seu email" value="<?php echo $row_usuario["email"]; ?>"><br><br>

        <input type="submit" value="Editar">
    </form>
</body>
</html>