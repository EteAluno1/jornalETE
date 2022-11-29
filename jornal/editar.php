<?php
require_once('conexaoarquivos.php');
$id = $_GET['id'];

$query = $pdo->prepare("SELECT * FROM noticias WHERE id=$id");
$query -> execute();
$noticias = $query->fetch(PDO::FETCH_ASSOC);

              if(isset($_POST['upload'])):
                $pega_titulo = filter_input(INPUT_POST,'titulo',FILTER_DEFAULT);
                $pega_tiny = filter_input(INPUT_POST,'card_resumo',FILTER_DEFAULT);
                $categoria = "variados";  
                

                if(empty($arquivo = $_FILES['imagem'])){

                if($arquivo['error'] )
                    die("<script> alert('Adicione a imagem destaque novamente !!')</script>");
                if($arquivo['size'] > 5097152){
                  die("<p class='alert alert-danger w-50 mt-3'> Arquivo muito grande !! Max: 5MB !!</p>");
                }
                $pasta = "arquivos/";
                $nomeDoArquivo = $arquivo['name'];
                $novoNomeDoArquivo = uniqid();
                $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));

                if($extensao != "jpg" && $extensao != "png")
                    die("<p class='alert alert-danger w-50 mt-3'>Formato de imagem nao aceito !! Apenas PNG ou JPG !! </p> ");

                $caminho = $pasta . $novoNomeDoArquivo . "." . $extensao;  

                $deu_certo = move_uploaded_file($arquivo["tmp_name"], $caminho);



                $insert = $pdo->prepare("UPDATE noticias SET  titulo=:textT , card_noticia = :textN , imagem_destaque = :img , data_upload = now() , categoria = :categoria WHERE id=$id");
                $insert -> bindValue(':textT',$pega_titulo);
                $insert -> bindValue(':textN', $pega_tiny);
                $insert -> bindValue(':img', $caminho);
                $insert -> bindValue(':categoria', $categoria);
                $insert -> execute();
<<<<<<< HEAD
              } else {
                $insert = $pdo->prepare("UPDATE noticias SET  titulo=:textT , card_noticia = :textN , data_upload = now() , categoria = :categoria WHERE id=$id");
                $insert -> bindValue(':textT',$pega_titulo);
                $insert -> bindValue(':textN', $pega_tiny);
                $insert -> bindValue(':categoria', $categoria);
                $insert -> execute();
              }
=======
>>>>>>> fd5c85f9e9db847869fd3a47fd4d2e1c73850b19
                
                if($insert){
                  echo "<script> alert('Noticia Editada !!')</script>";
                  header('Location:painellistanoticia.php');
                  
                }else
                  echo 'errorrrrr';
              endif;
            ?>