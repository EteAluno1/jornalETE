<?php
require_once('conexaoarquivos.php');


$id = $_POST['id'];

$query = $pdo->prepare("SELECT * FROM noticias WHERE id=$id");
$query -> execute();

$noticias = $query->fetch(PDO::FETCH_ASSOC);

echo $noticias['card_noticia'];

?>

