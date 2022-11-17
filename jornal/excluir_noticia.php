<?php

include('conexao.php');



$id = $_GET['id'];

$conexao->query("DELETE FROM `noticias` WHERE `noticias`.`id` = ".$id);

header('Location: painellistanoticia.php');
