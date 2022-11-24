<?php
require_once('conexao.php');
require('conexaoarquivos.php');
$sql_query = $conexao->query("SELECT * FROM usuarios ") or die($conexao->error);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Jornal ETE</title>

    <link href="assets/style/bootstrap/css/bootstrap.css" rel="stylesheet" >
    <link href="assets/style/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="assets/style/btn.css">
    <link rel="stylesheet" href="assets/style/index.css">
    <link rel="stylesheet" href="assets/style/cardequipe.css">
    <link rel="stylesheet" href="assets/style/cardindex.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">









    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->

    <style>
      
  .container2 {
    height: 300px;
    width: 600px;
    display: flex;
  }
  .card2 {
    display: flex;
    height: 280px;
    width: 200px;
    background-color: #160079;
    border-radius: 10px;
    box-shadow: -1rem 0 3rem #160079b2;
  /*   margin-left: -50px; #17141d */
    transition: 0.4s ease-out;
    position: relative;
    left: 0px;
  }
  
  .card2:not(:first-child) {
      margin-left: -50px;
  }
  
  .card2:hover {
    transform: translateY(-20px);
    transition: 0.4s ease-out;
  }
  
  .card2:hover ~ .card2 {
    position: relative;
    left: 50px;
    transition: 0.4s ease-out;
  }
  
  .title2 {
    color: white;
    font-weight: 300;
    position: absolute;
    left: 20px;
    top: 15px;
  }
  .title3 {
    color: white;
    font-weight: 300;
    position: absolute;
    left: 20px;
    top: 50px;
  }
  
  .bar2 {
    position: absolute;
    top: 100px;
    left: 20px;
    height: 5px;
    width: 150px;
  }
  
  .emptybar2 {
    background-color: #2e3033;
    width: 100%;
    height: 100%;
  }
  
  .filledbar2 {
    position: absolute;
    top: 0px;
    z-index: 3;
    width: 0px;
    height: 100%;
    background: rgb(0,154,217);
    background: linear-gradient(90deg, rgb(255, 251, 0) 0%, rgb(1, 255, 13) 50%, rgb(255, 0, 0) 100%);
    transition: 0.6s ease-out;
  }
  
  .card2:hover .filledbar2 {
    width: 153px;
    transition: 0.4s ease-out;
  }
  
  .circle2 {
    position: absolute;
    top: 150px;
    left: calc(50% - 60px);
  }
  
  .stroke2 {
    stroke: yellow;
    stroke-dasharray: 360;
    stroke-dashoffset: 360;
    transition: 0.6s ease-out;
  }
  
  svg {
    fill: #17141d;
    stroke-width: 2px;
  }
  
  .card2:hover .stroke2 {
    stroke-dashoffset: 100;
    transition: 0.6s ease-out;
  }
  .img{
    position: absolute;
    z-index: 2;
    left: 13px;
    top: 10px;
  }
    </style>
  </head>
  <body>
<div class="container">
  <header class="blog-header lh-1 py-3">
        <nav class="navbar navbar-expand-md navbar-light fixed-top ">
          <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="assets/img/logoo.png" width="90px" height="60px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="noticias.php">Noticias</a>
                </li>
              </ul>

              <div class="me-3"><a class="nav-link " href="painellistanoticia.php"><img src="assets/img/icons/adm-32px.png" alt=""></a></div>

            </div>
          </div>
        </nav>
  </header>

  <div class="receba mb-5"></div>


</div> <!-- fim do container header -->

<main class="container bg-light mb-5 mt-4 rounded-top">
    <div class="receba"></div>
  <div class="p-4 p-md-5 mb-4 rounded text-bg-dark" style="background: url(assets/img/slide1.jpg);" >
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">Veja agora</h1>
      <p class="lead my-3">Alunos da escola técnica Antônio Arruda de Farias criam website jornalístico para a instituição!</p>
      <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue lendo...</a></p>
      
    </div>
  </div> <!-- fim da noticia principal -->

  <hr> 
    
  <h1 class="text-center mb-4">Equipe</h1>


  <div class="container2 ms-4"> 
          <?php
            while($usuarios = $sql_query->fetch_assoc()){
          ?>
            <div class="text-center me-3">
              <div class="card2">
                <h3 class="title2"><?php echo $usuarios['nome'] ?></h3>
                <p class="title3" ><?php echo $usuarios['descricao'] ?></p>
                <div class="bar2">
                  <div class="emptybar2"></div>
                  <div class="filledbar2"></div>
                </div>
                <div class="circle2">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <circle class="stroke2" cx="60" cy="60" r="50"/>
                  </svg>
                  <img class="bd-placeholder-img rounded-circle img" width="100" height="100" src="<?php echo $usuarios['caminho_imagem_perfil']?>" onerror="if (this.src != 'assets/img/logo.png') this.src = 'assets/img/slide1.jpg';" alt="">
                </div>
              </div>
            </div><!-- /.col-lg-4 -->



      
            <?php
            }
            ?>       
  </div>
            

  <div class="row mb-2">

    <h1 class="text-center mb-4" > 
      
      Noticias 

    </h1>              
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



  <div class="receba2"></div>

</main>
  <footer class="container bg-light rounded-bottom">
    <div class="row g-5">
      <div class="col-md-8">
      </div>

      <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem;">
        
          <div class="display-flex">
            <h4 class="fst-italic px-3">Instagram</h4>

            <div class="px-3">
            <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/CjDFKxVu8yD/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/p/CjDFKxVu8yD/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">Ver essa foto no Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/CjDFKxVu8yD/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">Uma publicação compartilhada por ETE ANTÔNIO ARRUDA DE FARIAS (@eteantonioarrudadefarias)</a></p></div></blockquote> <script async src="//www.instagram.com/embed.js"></script>
          </div>

          <div class="p-4">
            <h4 class="fst-italic">Nossas redes sociais</h4>
            <ol class="list-unstyled">
              <li><a href="https://www.instagram.com/eteantonioarrudadefarias/"><img src="img/instagram.svg" width="15px" height="15px" alt=""> Instagram </a></li>
              <li><a class="ml-1" href="https://www.facebook.com/etesurubim2"><img src="img/facebook.svg" width="15px" height="15px" alt=""> Facebook</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="row" >
      <p class="text-center mt-3">&copy; 2022–2023 ETE Antonio Arruda</p>
    </div>
    
  </footer>



<button onclick="topFunction()" id="myBtn" title="Go to top" > <i class="bi bi-chevron-double-up"></i>
</button>
<script>

let mybutton = document.getElementById("myBtn");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>
