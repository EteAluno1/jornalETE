
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Blog Template · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/blog/">
    <link href="style/bootstrap/css/bootstrap.css" rel="stylesheet" >

    
    

    

    

<link href="style/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">


<style>
     

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      
    </style>

    <style type="text/css">

a{

    text-decoration:none;
    color:#1C1C1C ;

    }
a:hover{

    text-decoration:none;
    color:black;
    text-transform:uppercase;

        }

        body {
  
  background: url(img/background.jpg); 
  background-size: 100%;
  }

  #myBtn {
   display: none;
   position: fixed;
   bottom: 8px;
   right: 8px;
    z-index: 99;
   font-size: 10px;
   border: none;
   outline: none;
   background-color: RoyalBlue;
   color: white;
   cursor: pointer;
   padding: 15px;
   border-radius: 6px;
  }

  #myBtn:hover {
   background-color: #555;
  }
  
  .receba{
    height: 40px;
  }

  .receba2{
    height:10px
  }

  nav{
    background-image: linear-gradient(to right, #00CED1, #673DFF );
  }


      </style>

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
  </head>
  <body>

    
<div class="container">
  <header class="blog-header lh-1 py-3">
  <nav class="navbar navbar-expand-md navbar-light fixed-top">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/logoo.png" width="90px" height="60px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.php">Inicio</a>
                </li>
               
                <li class="nav-item">
                  <a class="nav-link" href="#">Noticias</a>
                </li>
              </ul>

              <div class="me-3"><a class="nav-link " href="painellistanoticia.php"><img src="img/icons/adm-32px.png" alt=""></a></div>
      
              <!-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>--> 
            </div>
          </div>
        </nav>
  </header>

  <div class="receba" ></div>

  <main class="container bg-light mt-4 rounded">
    
    <section class="row" >
        <div class="col-md-12">
          <?php 
              include("conexao.php");
              $sql_query = $conexao->query("SELECT * FROM noticias ") or die($conexao->error);
              while($titulos = $sql_query->fetch_assoc()){
          ?>
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 mt-4  shadow-sm h-md-250 position-relative">

            <div class="card text-center">
              <div class="card-header">
                <p><?php echo $titulos['categoria']?></p>
              </div>
              <div class="card-body">
                 
                  
                   <h5 class="card-title"><?php echo $titulos['titulo_principal'] ?></h5>
                  <img src="<?php echo $titulos['caminho_imagem_principal'] ?>" width="90%" height="500" alt="">
                  <p class="card-text text-break"><?php echo $titulos['conteudo_principal'] ?></p>
              </div>
              <div class="card-footer text-muted">
                <?php echo date("d/m/Y", strtotime($titulos['data_upload'])); ?>
              </div>
              
          </div>
            <?php
                  }
              ?> 
        </div>
    </section>


  
  
<footer class="container">
    <p class="text-center mt-3">&copy; 2022–2023 ETE Antonio Arruda</p>
  </footer>



</main>





<button onclick="topFunction()" id="myBtn" title="Go to top" >
                
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



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  </body>
</html>
