<?php
include("conexao.php");

$nome = mysqli_real_escape_string($conexao,trim($_POST['nome']));
$matricula = mysqli_real_escape_string($conexao,trim($_POST['matricula']));
$senha = mysqli_real_escape_string($conexao,$_POST['senha']);

$sql = "SELECT COUNT(*) AS total FROM usuarios WHERE matricula = '$matricula'";
$result = mysqli_query($conexao,$sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1)
{
    $_SESSION['usuario_existe']=true;
    header('Location: cadastro.php');
    exit();
}

$sql = "INSERT INTO usuarios (matricula,nome,senha,data_cadastro) VALUES ('$matricula','$nome','$senha',NOW())";

if($conexao->query($sql) === TRUE)
{
    $_SESSION['status_cadastro'] = true;
}
$conexao->close();

header('Location: login.php') 

?>