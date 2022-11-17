<?php
    session_start();
    include("conexao.php");
    $perfil = $_SESSION['nome'];

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $arquivo = $_FILES['imagem']; 
    $arquivo2 = $_FILES['imagem2'];

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
              
              
              if($conexao->query("UPDATE usuarios SET nome= '$nome' ,descricao= '$descricao' ,caminho_imagem_perfil= '$caminho' ,caminho_imagem_background= '$caminho2' WHERE nome='$perfil'") === TRUE)
                {
                    $_SESSION['status_edit'] = true;                  
                }
            }else{
                    print "Error ao fazer update!!";
            }
            if(isset($_SESSION['status_edit'])){
                if(isset($_SESSION['status_edit'])){
                    print "<script> alert ('Noticia Editada com sucesso!!!'); </script> ";
                    unset($_SESSION['status_edit']);
                    header('Location:logout.php');
                  } 
              

            }
        ?>