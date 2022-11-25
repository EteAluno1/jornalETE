<?php
session_start();
require_once('conexao.php');
require_once('conexaoarquivos.php');
require_once('verifica_login.php');

$perfil = $_SESSION['nome'];
$sql_query = $conexao->query("SELECT matricula,nome,caminho_imagem_perfil,caminho_imagem_background,descricao FROM usuarios WHERE nome="."'".$_SESSION['nome']."'") or die($conexao->error);
$usuarios = $sql_query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="assets/style/efeitos.css">
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
.profile-head {
    transform: translateY(5rem)
}

.cover {
    background-image: url(<?php echo $usuarios['caminho_imagem_background'] ?>), url(assets/img/slide1.jpg);
    background-size: cover;
    background-repeat: no-repeat
}

body {
    background-image: url(assets/img/background.jpg);
    background-size: 110%;
}
.item1{
    background-size: 100%;
}
</style>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="assets/img/logoo.png" width="90px" height="60px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
            </div>
            <div class="dropdown me-3">
              <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?php echo $usuarios['caminho_imagem_perfil'] ?>" onerror="if (this.src != 'assets/img/logo.png') this.src = 'assets/img/slide1.jpg';" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong><?php echo $_SESSION['nome']; ?></strong>
              </a>
              <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="editar_perfil.php">Settings</a></li>
                <li><a class="dropdown-item" href="perfil.php">Perfil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="logout.php">Sair</a></li>
              </ul>
            </div>
        </div>
        </nav> 
    </header>
    <div class="row py-5 px-4"> 
        <div class="col-md-7 mx-auto"> <!-- Profile widget --> 
            <div class="bg-white shadow rounded overflow-hidden"> 
                <div class="px-4 pt-0 pb-4 cover"> 
                    <div class="col-lg-4">
                        <img class="border border-dark bd-placeholder-img rounded-circle mb-2 mt-5" width="160" height="160"  src="<?php echo $usuarios['caminho_imagem_perfil'] ?>" onerror="if (this.src != 'assets/img/logo.png') this.src = 'assets/img/slide1.jpg';" alt="">
                    </div> 
                    <div class="media-body mb-5 "></div>
                    <a class="btn btn-info"  href="editar_perfil.php">Editar perfil</a>
                </div> 

                    <div class="px-4 py-3">
                        <div class="media-body mb-5 text-black"> 
                            <h4 class="mt-0 mb-0"><?php echo $perfil  ?> </h4>
                        </div> 
                            <h5 class="mb-0">Cargo</h5> 
                        <div class="p-4 rounded shadow-lg bg-light"> 
                            <p><?php echo $usuarios['descricao'] ?></p>    
                        </div> 
                        <div class="py-4 px-4"> 
                            <div class="d-flex align-items-center justify-content-between mb-3"> 
                                <h5 class="mb-0">Postagens recentes</h5>
                                <a href="#" class="btn btn-link text-muted">mostrar tudo</a> 
                            </div>
                             <div class="row"> 

                                <div class=" row row-cols-2 row-cols-lg-2 align-items-stretch g-4 py-2">
                                <?php
      $query = $pdo->prepare("SELECT * FROM noticias");
      $query -> execute();

      while($noticias = $query->fetch(PDO::FETCH_ASSOC)){

       ?> 
          <div class="col-3" >
            <div class="a-box">
              <div class="img-container">
                <div class="img-inner">
                  <div class="inner-skew">
                    <img src="<?php echo $noticias['imagem_destaque'] ?>">
                  </div>
                </div>
              </div>
              <div class="text-container">
                <h3> <a class="fw-bold text-decoration-none" href="noticias.php"><?php echo $noticias['titulo'] ?></a> </h3>
                <div>
                  <?php echo date("d/m/Y", strtotime($noticias['data_upload'])); ?>
                </div>  
              </div>
            </div>
          </div>  
   

        <?php  
      } 
        ?>
                                        
                                </div>




                             </div>

                        </div> 
                    </div> 
                </div> 
            </div> 
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>