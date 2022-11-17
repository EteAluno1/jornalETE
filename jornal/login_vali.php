<?php
session_start();
include('conexao.php');

if(empty($_POST['matricula']) || empty($_POST['senha']))
{
    header('Location: login.php');
    exit();
}

$matricula = mysqli_real_escape_string($conexao,$_POST['matricula']);
$senha = mysqli_real_escape_string($conexao,$_POST['senha']);

$query = "SELECT matricula , nome FROM usuarios WHERE matricula = '{$matricula}' AND senha = '{$senha}'";
$result = mysqli_query($conexao,$query);


$row = mysqli_num_rows($result);

if($row == 1)
{
    $usuario_bd = mysqli_fetch_assoc($result);
    $_SESSION['nome'] = $usuario_bd['nome'];
    header('Location: painellistanoticia.php');
    exit();
} else
{   
    $_SESSION['nao_autenticado'] = true;
    header('Location: Login.php');
    exit();
}



?>