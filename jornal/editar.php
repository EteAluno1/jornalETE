<?php

include('conexao.php');

$titulo = $_POST['titulo'];
$conteudo = $_POST['conteudo'];
$titulo2 = $_POST['titulo2'];
$conteudo2 = $_POST['conteudo2'];
$categoria = $_POST['categoria'];
$arquivo = $_FILES['imagem']; 
$arquivo2 = $_FILES['imagem2'];
$id = $_POST['id'];

if($arquivo['error'] )
                die("Falha ao enviar o arquivo");
            if($arquivo['size'] > 5097152){
              die("Arquivo muito grande!! Max; 5MB");
            }
            $pasta = "arquivos/";
            $nomeDoArquivo = $arquivo['name'];
            $nomeDoArquivo2 = $arquivo2['name'];
            $novoNomeDoArquivo = uniqid();
            $novoNomeDoArquivo2 = uniqid();
            $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));
            $extensao2 = strtolower(pathinfo($nomeDoArquivo2,PATHINFO_EXTENSION));
        
            if($extensao != "jpg" && $extensao != "png")
                die("Tipo de arquivo nao aceito!!");

            $caminho = $pasta . $novoNomeDoArquivo . "." . $extensao;  
            $caminho2 = $pasta . $novoNomeDoArquivo2 . "." . $extensao2;  
        
            $deu_certo = move_uploaded_file($arquivo["tmp_name"], $caminho);
            $deu_certo2 = move_uploaded_file($arquivo2["tmp_name"], $caminho2);
            if($deu_certo){
              
              
              if($conexao->query("UPDATE noticias SET titulo= '$titulo' ,conteudo= '$conteudo' ,nome_imagem= '$nomeDoArquivo' ,caminho_imagem= '$caminho' ,data_upload=NOW(),titulo_principal= '$titulo2' ,conteudo_principal= '$conteudo2' ,nome_imagem_principal= '$nomeDoArquivo2' ,caminho_imagem_principal= '$caminho2' ,categoria= '$categoria' WHERE id=$id") === TRUE)
                {
                    $_SESSION['status_edit'] = true;                  
                }
            }else{
             
            }
            if(isset($_SESSION['status_edit'])){
                if(isset($_SESSION['status_edit'])){
                    print "<script> alert ('Noticia Editada com sucesso!!!'); </script> ";
                    unset($_SESSION['status_edit']);
                    header('Location:painellistanoticia.php');
                  } 
              

            }