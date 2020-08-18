<?php
session_start();
include_once("conexao.php");

$id = filter_input (INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);  //Recebe o valor do campo nome
$nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);  //Recebe o valor do campo nome
$email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);  //Recebe o valor do campo email

//echo "Nome: $nome <br>";
//echo "Email: $email <br>";


//Inserir dados
$result_usuario = "UPDATE usuarios SET nome='$nome', email='$email', modified=NOW() WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)) {           //Verificar se os dados foram cadastrados
    $_SESSION['msg'] = "<p style='color:green';>Usuario cadastrado com sucesso</p>";
    header("Location: listar.php");      //Em caso de sucesso ele redireciona para a pagina de listagem
} else {
    $_SESSION['msg'] = "<p style='color:red';>Usuario não cadastrado</p>";
    header("Location: editar.php?id=$id");      //Em caso de erro ele redireciona para a pagina de edição
}

?>