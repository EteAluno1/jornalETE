<?php
session_start();
require_once('conexao.php');
require('verifica_login.php');

$sql_query = $conexao->query("SELECT matricula,nome,caminho_imagem_perfil,caminho_imagem_background,descricao FROM usuarios WHERE nome="."'".$_SESSION['nome']."'") or die($conexao->error);
$usuarios = $sql_query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <script>var userimage=document.querySelector("#userimage");
        var overlay=document.querySelector(".overlay");
        var cross=document.querySelector(".overlay .fa-close");
        var plus=document.querySelector(".fa-plus");
        
        plus.addEventListener('click',function(){
            plus.classList.toggle('plusred');
        });
        
        userimage.addEventListener('click',function(){
        overlay.classList.remove('d-none');
        });
        
        
        cross.addEventListener('click',function(){
        overlay.classList.add('d-none');
        });
    </script>
</head>

<style>

body {
    background-image: url(assets/img/background.jpg);
    background-size: 110%;
}</style>

<body>
    <div class="row py-5 px-4"> 
        <div class="col-md-8 mx-auto"> <!-- Profile widget --> 
            <div class="bg-white shadow rounded overflow-hidden"> 
                <div class="p-5" >
                    <form action="edita_perfil.php" method="POST" enctype="multipart/form-data" >
                            <div class="row mb-4">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nome</label>
                                <div class="col-sm-10">
                                <input type="text" name="nome" class="form-control" id="inputEmail3" value="<?php echo  $_SESSION['nome'] ;?>  ">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Descrição</label>
                                <div class="col-sm-10">
                                <textarea name="descricao" class="form-control" aria-label="With textarea"><?php echo htmlspecialchars($usuarios['descricao']); ?></textarea>  
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label for="formFile" class="col-sm-3 col-form-label">Imagem de Perfil</label>
                                <input name="imagem" class="form-control w-75" type="file" id="formFile">
                            </div>
                            <div class="row mb-3">
                                <label for="formFile2" class="col-sm-3 col-form-label">Imagem de Fundo</label>
                                <input name="imagem2" class="form-control w-75" type="file" id="formFile2">
                            </div>
                            <button name="upload" type="submit" class="btn btn-primary">Editar</button>
                    </form>

                    
                
                </div>
                
            </div> 
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>