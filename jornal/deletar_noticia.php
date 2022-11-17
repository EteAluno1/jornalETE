<?php

include('conexao.php');



$id = $_GET['id'];
$comandoExcluir = "DELETE FROM noticias WHERE id =" .$id;

$conexao->query($comandoExcluir);
header('Location: painellistanoticia.php');


