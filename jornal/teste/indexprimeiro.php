<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <title>Jornal ETE</title>
    <link href="efeitos.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light ">
          <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="img/logoo.png" width="90px" height="60px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Equipe</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Noticias</a>
                </li>
              </ul>
              <div class="me-3" >
                <a class="nav-link " href="painellistanoticia.php"><img src="img/icons/adm-32px.png" alt=""></a>
              </div>
              
        
            </div>
          </div>
        </nav>
      </header>
      
      <main>
      
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active text-center">
              <img class="img-fluid" src="img/slide1.jpg" alt="">
             
              <div class="container">
                <div class="carousel-caption text-start ">
                  
                  <h1 class="text-light">ETE Surubim</h1>
                  <!-- <p class="text-dark fw-bold">ETE Antonio arruda de farias ganha jornal da escola, um site completamente voltado para o perfil jornalistico dos alunos</p> -->
                  <p class=""><a class="btn btn-lg btn-primary" href="#">Saiba Mais</a></p> 
                </div>
              </div>
            </div>
            <div class="carousel-item text-center">
              <img class="img-fluid" src="img/ete.jpg" alt="">
      
              <div class="container">
                <div class="carousel-caption">
                  <h1>ETE de Surubim conquista primeiro lugar no VII Encontro do Programa Educação</h1>
                  <!-- <p>A Escola Técnica Estadual Antônio Arruda de Farias (ETE Surubim)  participou no dia 01 de dezembro do VII Encontro do Programa Educação Viária é Vital em São Paulo tendo como representante o professor coordenador Adriel Santos, através do projeto Trânsito Seguro, Cidadão Feliz, onde na ocasião foram divulgados os  vencedores por categorias. A ETE conquistou o primeiro lugar na categoria Circulando Geral e conquistou o prêmio nacional da Fundação Mapfre.</p> -->
                  <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                </div>
              </div>
            </div>
            <div class="carousel-item text-center">
              <img class="img-fluid" width="80%" height="600px" src="https://1.bp.blogspot.com/-meou7OOUy1M/XIZl7JFdI_I/AAAAAAAA3NA/2flnDfevCVw-plDyxI89Ui8LK_URq4bCACLcBGAs/s1600/Tarde%2Bjunina.jpg" alt="">
      
              <div class="container">
                <div class="carousel-caption text-end">
                  <h1>One more for good measure.</h1>
                  <p>Some representative placeholder content for the third slide of this carousel.</p>
                  <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                </div>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      
      
        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->
      
        <div class="container marketing">

          <h1 class="text-center">Conheça Nossa Equipe</h1>
      
          <!-- Three columns of text below the carousel -->
          <div class="row text-center">
            <div class="col-lg-4">
              <img width="150" height="150" class="rounded-circle" src="https://789d77d27f49a880d02e-714b7dc0b51e300a567fc89d2a0837e5.ssl.cf1.rackcdn.com/DepoimentoImagem/depositphotos177512316xl-2015-2-copia.jpg" alt="">
      
              <h2 class="fw-normal">Maria isabela</h2>
              <p>Redatora chefe do JETE</p>
              <p><a class="btn btn-secondary" href="#">Conheça melhor &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
              <img class="rounded-circle" width="150" height="150" src="https://th.bing.com/th/id/OIP.gWS7h-89Thjs5QcNwPZVnAHaLH?pid=ImgDet&rs=1" alt="">
      
              <h2 class="fw-normal">Joao guilherme</h2>
              <p>Colunista</p>
              <p><a class="btn btn-secondary" href="#">Conheça Melhor &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
              <img width="150" height="150" class="rounded-circle" src="https://th.bing.com/th/id/OIP.oKZWC--i5bOe250W2HNJ9AAAAA?w=184&h=276&c=7&r=0&o=5&pid=1.7" alt="">
      
              <h2 class="fw-normal">Edson manoel</h2>
              <p>Fotografo chefe</p>
              <p><a class="btn btn-secondary" href="#">Conheça Melhor &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
          </div><!-- /.row -->
      
      
          <!-- START THE FEATURETTES -->
      
          <hr class="featurette-divider mb-5">
      
          <?php 
              include("conexao.php");
              $sql_query = $conexao->query("SELECT * FROM noticias ") or die($conexao->error);
              while($titulos = $sql_query->fetch_assoc()){
            ?>

          <div class="row featurette">
            <div class="col-md-7">
              <h2 class="featurette-heading fw-normal lh-1"> <?php echo $titulos['titulo'] ?> </h2>
              <p class="lead"> <?php echo $titulos['conteudo'] ?> </p>
              <p class="featurette-heading fw-normal fst-italic lh-1"> Postado Por ...</p>
            </div>
            <div class="col-md-5 mb-4">
            <img height="500" width="500" src="<?php echo $titulos['caminho_imagem']; ?>" alt="">
      
            </div>
          </div>

          <hr class="featurette-divider mb-5">


        
            <?php
          }
            ?> 



          <hr class="featurette-divider">
      
          <!-- /END THE FEATURETTES -->
      
        </div><!-- /.container -->
      
      
        <!-- FOOTER -->
        <footer class="container">
          <p class="float-end"><a href="#">Back to top</a></p>
          <p>&copy; 2017–2022 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer>
      </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>