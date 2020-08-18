<?php
session_start();
include_once("conexao.php");

$nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);  //Recebe o valor do campo nome
$email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);  //Recebe o valor do campo email

//echo "Nome: $nome <br>";
//echo "Email: $email <br>";


//Inserir dados
$result_usuario = "INSERT INTO usuarios (nome, email, created) VALUES ('$nome', '$email', NOW())";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)) {           //Verificar se os dados foram cadastrados
    $_SESSION['msg'] = "<p style='color:green';>Usuario cadastrado com sucesso</p>";
    header("Location: index.php");      //Em caso de sucesso ele redireciona para a pagina inicial
} else {
    $_SESSION['msg'] = "<p style='color:red';>Usuario não cadastrado</p>";
    header("Location: index.php");      //Em caso de erro ele tambem redireciona para a pagina inicial
}

?>