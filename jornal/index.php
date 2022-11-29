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
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.theme.default.min.css">


    <script src="assets/vendors/jquery.min.js"></script>
    <script src="assets/owlcarousel/owl.carousel.js"></script>
  




    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->

 <style>
  

    *
    {
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
    }

    h5
    {
      margin:0px;
      font-size:1.4em;
      font-weight:700;
    }

    p
    {
      font-size:12px;
    }

    .center
    {
      width:100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* End Non-Essential  */

    .property-card
    {
      height:18em;
      width:14em;
      display:-webkit-box;
      display:-ms-flexbox;
      display:flex;
      -webkit-box-orient:vertical;
      -webkit-box-direction:normal;
      -ms-flex-direction:column;
      flex-direction:column;
      position:relative;
      -webkit-transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
      -o-transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
      transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
      border-radius:16px;
      overflow:hidden;
      -webkit-box-shadow:  15px 15px 27px #e1e1e3, -15px -15px 27px #ffffff;
      box-shadow:  15px 15px 27px #e1e1e3, -15px -15px 27px #ffffff;
    }
    /* ^-- The margin bottom is necessary for the drop shadow otherwise it gets clipped in certain cases. */

    /* Top Half of card, image. */

    .property-image
    {
      height:10em;
      width:14em;
      padding:1em 2em;
      position:Absolute;
      top:0px;
      -webkit-transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
      -o-transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
      transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);

    }

    /* Bottom Card Section */

    .property-description
    {
      background-color: #FAFAFC;
      height:6em;
      width:14em;
      position:absolute;
      bottom:0em;
      -webkit-transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
      -o-transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
      transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
      padding: 0.5em 1em;
      text-align:center;
    }

    /* Social Icons */

    .property-social-icons
    {
      width:1em;
      height:1em;
      background-color:black;
      position:absolute;
      bottom:1em;
      left:1em;
      -webkit-transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
      -o-transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
      transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
    }

    /* Property Cards Hover States */

    .property-card:hover .property-description
    {
      height:0em;
      padding:0px 1em;
    }
    .property-card:hover .property-image
    {
      height:18em;
    }

    .property-card:hover .property-social-icons
    {
      background-color:white;
    }

    .property-card:hover .property-social-icons:hover
    {
      background-color:blue;
      cursor:pointer;
    }


    /* Optional

    .property-image-title
    {
    text-align:center;
    position:Relative;
    top:30%;
    opacity:0;
    transition:all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1) 0.2s;
    color:black;
    font-size:1.2em;
    }

    .property-card:hover .property-image-title
    {
    opacity:1;
    }

    */
 </style>
 <style>
  body{	
	text-align:center;
	font-family: "Open Sans", sans-serif; 
    }
    #view-code{
      color:#82b4eb;      
      font-size:14px;
      text-transform:uppercase;
      font-weight:700;
      text-decoration:none;
      position:absolute;top:620px;
      left:50%;margin-left:-30px;
      z-index:200;
    }
    #view-code:hover{color:#fff}
    #window{
      margin:45px auto 0;
      border-radius:6px;
      background:#234871;
      width:678px;
      height:549px;	
      overflow:hidden;
      position:relative;
    }
    #header{
      background:#82b4eb;
      height:33px;
      padding-left:18px;
    }
    #header .circle{
      background:#689cd4;
      border-radius:50%;
      float:left;
      width:12px;
      height:12px;
      margin-right:6px;
      margin-top:11px;
    }

    .thumbs{display:none;}
    .thumb, .thumb p{  
      width: 226px;
      height: 172px;
      float: left;
      margin:0;  
      background: #e3e5e9;
    }
    #cloneWrap{
      width: 270px;
      height: 210px;
      position:absolute;
      top:0;
      left:0;
      border:none;
    }
    #cloneWrap p{position:static; width:100%; height:100%}
    .floatingThumb{
      width: 226px;
      height: 172px;
    }
    .thumb:hover{cursor:pointer;}
    .thumb p{
      position:relative;
      top:0;
      left:0;
      -webkit-transition: all 80ms ease-out;
          -moz-transition: all 80ms ease-out;
            -ms-transition: all 80ms ease-out;
            -o-transition: all 80ms ease-out;
                transition: all 80ms ease-out;
    }
    .thumb p.expand{
      background:#fff;
      width:270px;
      height:210px;	
      z-index:300;
      -webkit-transition: all 80ms ease-out;
          -moz-transition: all 80ms ease-out;
            -ms-transition: all 80ms ease-out;
            -o-transition: all 80ms ease-out;
                transition: all 80ms ease-out;
    }

    .thumb p.eq0, .slide.eq0{background:#4773a3}
    .thumb p.expand.eq0{top:0;left:0;}
    .thumb p.eq1, .slide.eq1{background:#fff}
    .thumb p.expand.eq1{top:0;left:-20px;}
    .thumb p.eq2, .slide.eq2{background:#cde9e3}
    .thumb p.expand.eq2{top:0;left:-40px;}
    .thumb p.eq3, .slide.eq3{background:#2f5885}
    .thumb p.expand.eq3{top:-20px;left:0;}
    .thumb p.eq4, .slide.eq4{background:#f0f7ff}
    .thumb p.expand.eq4{top:-20px;left:-20px;}
    .thumb p.eq5, .slide.eq5{background:#f28f8a}
    .thumb p.expand.eq5{top:-20px;left:-40px;}
    .thumb p.eq6, .slide.eq6{background:#6b9acd}
    .thumb p.expand.eq6{top:-38px;left:0;}
    .thumb p.eq7, .slide.eq7{background:#4773a3}
    .thumb p.expand.eq7{top:-38px;left:-20px;}
    .thumb p.eq8, .slide.eq8{background:#6b9acd}
    .thumb p.expand.eq8{top:-38px;left:-40px;}



    .thumb span{
      width:160px;
      position:absolute;
      bottom:45px;
      left:30px;
      border-radius:2px;
      height:7px;
      background:#fff;
      display:block;
    }
    .thumb span:nth-of-type(2){bottom:30px; width:150px;}
    #bootstrap-carousel{
      display:none;
      width: 778px;
      height: 516px;
      position: absolute;
      top: 33px;
      left: 0;
      overflow-y: scroll;
      overflow-x: hidden;
      
    }
    .slide.firstSlide{
        width: 576px;
      height: 411px;
      margin: 105px 0 0 50px;
    background:#4773a3; 
      opacity:0;
    }
    .slide.firstSlide.animate{
      width: 678px;
      height: 516px;
      margin:0; 
      opacity:1;
      -webkit-transition: all 200ms ease-out;
          -moz-transition: all 200ms ease-out;
            -ms-transition: all 200ms ease-out;
            -o-transition: all 200ms ease-out;
                transition: all 200ms ease-out;
    }
    .slide{
      width: 678px;
        height: 516px;
    }
    .slide strong, .slide span{
      height:18px;
      background:#6b9acd;
      border-radius:3px;
      display:block;	
      margin-bottom:30px;
    }
    .slide span{height:12px;margin-bottom:15px;}
    .slide span:nth-of-type(3){width:150px;}
    .slide p{float:left; width:280px;margin:190px 0 0 60px;opacity:0;}
    .slide path{ fill:#6b9acd;}
    .slide svg{opacity:0;}

    .slide.eq0 svg{margin:110px 0 0 0; opacity:1;}
    .slide.eq0 p{margin:194px 0 0 56px; opacity:1;}


    .thumb p.eq0 span{background:#6b9acd;}
    .thumb p.eq1 span{background:#d4e2f0;}
    .thumb p.eq2 span{background:#7aaec3;}
    .thumb p.eq3 span{background:#27496d;}
    .thumb p.eq4 span{background:#7aa3d2;}
    .thumb p.eq5 span{background:#fff;}
    .thumb p.eq6 span{background:#8fb6e3;}

    .slide.eq1 path, .slide.eq1 strong, .slide.eq1 span{fill:#d4e2f0; background:#d4e2f0;}
    .slide.eq1 p{float:left; width:280px;margin:150px 0 0 60px; opacity:0;}
    .slide.eq1 svg{margin:180px 0 0 0; opacity:0;}

    .slide.eq2 p{float:right; width:280px;margin:190px 20px 0 0 ; }
    .slide.eq2 path, .slide.eq2 strong, .slide.eq2 span{fill:#7aaec3; background:#7aaec3;}
    .slide.eq2 svg{float: left; margin-left: 40px;}

    .slide.eq3 p{float:left; width:280px;margin:110px 0 0 60px; }
    .slide.eq3 path, .slide.eq3 strong, .slide.eq3 span{fill:#27496d; background:#27496d;}

    .slide.eq4 path{fill:#7aa3d2;}
    .slide.eq4 svg{margin:45px 0 0 13px;float:left;}
    .slide.eq4 svg:nth-of-type(1){margin-left:35px;}
    .slide.eq4 svg:nth-of-type(2){margin-top:319px;}

    .slide.eq5 p{float:left; width:280px;margin:190px 0 0 60px; }
    .slide.eq5 path, .slide.eq5 strong, .slide.eq5 span{fill:#fff; background:#fff;}

    .slide.eq6 p{float:left; width:280px;margin:190px 0 0 60px; }
    .slide.eq6 path, .slide.eq6 strong, .slide.eq6 span{fill:#cde9e3; background:#cde9e3;}

    .slide.eq6 p{float:left; width:480px;margin:-100px 0 0 60px; }
    .slide.eq6 path, .slide.eq6 strong, .slide.eq6 span{fill:#8fb6e3; background:#8fb6e3;}

    #espose{
      position:absolute;
      bottom:20px;
      right:20px;
      width:26px;
      height:26px;	
      cursor:pointer;
      z-index:500;
      display:none;
    }
    #espose p{
      border: 2px solid #8fb6e3;
      width: 6px;
      height: 6px;
      margin: 0 3px 3px 0;
      float:left;
    }

    #loader{
      position:absolute;
      width:45px;
      height:30px;
      top:280px;
      left:50%;
      margin-left:-25px;
      display:none;
    }
    #loader .circle{
      background:#82b4eb;
      border-radius: 50%;  
      width: 12px;
      height: 12px;
      margin-right: 6px;
      position:absolute;
      left:0;
      top:0;
    }
    #loader .c1{
      top:6px;
      left:6px;
      width:0;
      height:0;
    }
    #loader.animate .c1{
      top:0;
      left:0;
      width:12px;
      height:12px;
    }

    #loader.animate .c2{left:15px;}
    #loader .circle.c3{left:15px;}
    #loader.animate .c3{left:30px;}
    #loader .c4{left:30px;}
    #loader.animate .c4{
      left:29px;
      top:6px;
      width:0;
      height:0;
    }
    #loader.animate .circle{
    -webkit-transition: all 400ms ease-out;
        -moz-transition: all 400ms ease-out;
        -ms-transition: all 400ms ease-out;
        -o-transition: all 400ms ease-out;
          transition: all 400ms ease-out;
    }
 </style>


<style>
  
.container3 {
  max-width: 800px;
  margin: 5% auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 10px;
  overflow: hidden;
  box-sizing: border-box;
  box-shadow: 0 10px 35px rgba(0, 0, 0, 0.4);
}

.text-center {
  text-align: center;
  margin-bottom: 1em;
}

.lightbox-gallery {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: center;
}

.lightbox-gallery div > img {
  max-width: 100%;
  display: block;
}

.lightbox-gallery div {
  margin: 10px;
  flex-basis: 180px;
}

@media only screen and (max-width: 480px) {
  .lightbox-gallery {
    flex-direction: column;
    align-items: center;
  }

  .lightbox > div {
    margin-bottom: 10px;
  }
}

/*Lighbox CSS*/

.lightbox {
  display: none;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.7);
  position: fixed;
  top: 0;
  left: 0;
  z-index: 20;
  padding-top: 30px;
  box-sizing: border-box;
}

.lightbox img {
  display: block;
  margin: auto;
}

.lightbox .caption {
  margin: 15px auto;
  width: 50%;
  text-align: center;
  font-size: 1em;
  line-height: 1.5;
  font-weight: 700;
  color: #eee;
}

.github-link {
  font-size: 18px;
  color: rgba(255, 255, 255, 0.7);
}

.github-link:hover,
.github-link:active,
.github-link:visited {
  color: #fff;
  text-decoration: none;
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


  <div class="container2 ms-4 d-flex"> 
  <div class="owl-carousel">
          <?php
            while($usuarios = $sql_query->fetch_assoc()){
          ?>
           
          
         
            <div class="item">
              <div class="center">
                <div class="property-card">
                  <a href="#">
                    <div class="property-image" style="background-image:url('<?php echo $usuarios['caminho_imagem_perfil'] ?> '), url(assets/img/slide1.jpg);background-size:cover; background-repeat:no-repeat;">
                      <div class="property-image-title">
                        <!-- Optional <h5>Card Title</h5> If you want it, turn on the CSS also. -->
                      </div>
                    </div></a>
                  <div class="property-description">
                    <h5><?php echo $usuarios['nome'] ?></h5>
                    <p><?php echo $usuarios['descricao'] ?></p>
                  </div>
                </div>
              </div>
            </div>
          
      
            <?php
            }
            ?> 
  </div>
  <script>
      var owl = $('.owl-carousel');
      owl.owlCarousel({
        margin: 10,
        loop: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          }
        }
      })
    </script>
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
      <h1 class="text-center" >Conheça a ETE</h1>
      <div class="col-md-8">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>

    <!--  <div id="window">
        <div id="header">
            <div class="circle"></div>
              <div class="circle"></div>
              <div class="circle"></div>
          </div>       
                
          <div class="thumbs">    
            <div class="thumb">
              <p>
                    <span></span>
                  <span></span>
                  </p>
              </div>
              <div class="thumb">
                <p>
                    <span></span>
                  <span></span>
                  </p>
              </div>
              <div class="thumb">
                <p>
                    <span></span>
                  <span></span>
                  </p>
              </div>
              <div class="thumb">
                <p>
                    <span></span>
                  <span></span>
                  </p>
              </div>
              <div class="thumb">
                <p>
                    <span></span>
                  <span></span>
                  </p>
              </div>
              <div class="thumb">
                    <p>
                    <span></span>
                    <span></span>
                  </p>
              </div>
              <div class="thumb">
                  <p>
                    <span></span>
                  <span></span>
                  </p>
              </div>
                  
          </div>
          
          <div id="bootstrap-carousel">
              <div class="slides">                                            
                
                  <div class="slide">                         
                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="253.5px" height="279.1px"  viewBox="0 0 93.5 79.1" style="enable-background:new 0 0 93.5 79.1;" xml:space="preserve">
                      <g>
                          <path d="M87.8,60.2V9.8c0-2.6-2.1-4.7-4.7-4.7H9.8c-2.6,0-4.7,2.1-4.7,4.7v61.1c0,2.6,2.1,4.7,4.7,4.7h73.3
                              c2.6,0,4.7-2.1,4.7-4.7v-9.3C88,61.1,88,60.6,87.8,60.2z M20.6,72H9.8c-0.6,0-1.1-0.5-1.1-1.1V58.3l16.4-16L36,53.6L20.6,71.9
                              C20.6,71.9,20.6,72,20.6,72z M84.2,70.9c0,0.6-0.5,1.1-1.1,1.1H25.2l33-39.4l26,28.8V70.9z M84.2,56L59.5,28.7
                              c-0.3-0.4-0.8-0.6-1.3-0.6c0,0,0,0,0,0c-0.5,0-1,0.2-1.3,0.6L38.3,50.8L26.5,38.5c-0.3-0.3-0.8-0.5-1.3-0.6c-0.5,0-0.9,0.2-1.3,0.5
                              L8.8,53.3V9.8c0-0.6,0.5-1.1,1.1-1.1h73.3c0.6,0,1.1,0.5,1.1,1.1V56z M39.3,17c-4.8,0-8.8,3.9-8.8,8.8c0,4.8,3.9,8.8,8.8,8.8
                              s8.8-3.9,8.8-8.8C48.1,20.9,44.2,17,39.3,17z M39.3,31c-2.9,0-5.2-2.3-5.2-5.2s2.3-5.2,5.2-5.2c2.9,0,5.2,2.3,5.2,5.2
                              S42.2,31,39.3,31z"/>
                      </g>
                      </svg>                 
                      <p>
                        <strong></strong>
                          <span></span>
                          <span></span>
                          <span></span>
                      </p>                    	                 	
                  </div>
                  
                  <div class="slide">  
                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="253.5px" height="279.1px"  viewBox="0 0 93.5 79.1" style="enable-background:new 0 0 93.5 79.1;" xml:space="preserve">
                      <g>
                          <path d="M87.8,60.2V9.8c0-2.6-2.1-4.7-4.7-4.7H9.8c-2.6,0-4.7,2.1-4.7,4.7v61.1c0,2.6,2.1,4.7,4.7,4.7h73.3
                              c2.6,0,4.7-2.1,4.7-4.7v-9.3C88,61.1,88,60.6,87.8,60.2z M20.6,72H9.8c-0.6,0-1.1-0.5-1.1-1.1V58.3l16.4-16L36,53.6L20.6,71.9
                              C20.6,71.9,20.6,72,20.6,72z M84.2,70.9c0,0.6-0.5,1.1-1.1,1.1H25.2l33-39.4l26,28.8V70.9z M84.2,56L59.5,28.7
                              c-0.3-0.4-0.8-0.6-1.3-0.6c0,0,0,0,0,0c-0.5,0-1,0.2-1.3,0.6L38.3,50.8L26.5,38.5c-0.3-0.3-0.8-0.5-1.3-0.6c-0.5,0-0.9,0.2-1.3,0.5
                              L8.8,53.3V9.8c0-0.6,0.5-1.1,1.1-1.1h73.3c0.6,0,1.1,0.5,1.1,1.1V56z M39.3,17c-4.8,0-8.8,3.9-8.8,8.8c0,4.8,3.9,8.8,8.8,8.8
                              s8.8-3.9,8.8-8.8C48.1,20.9,44.2,17,39.3,17z M39.3,31c-2.9,0-5.2-2.3-5.2-5.2s2.3-5.2,5.2-5.2c2.9,0,5.2,2.3,5.2,5.2
                              S42.2,31,39.3,31z"/>
                      </g>
                      </svg> 
                      
                      <p>
                        <strong></strong>
                          <span></span>
                          <span></span>
                          <span></span>
                      </p>
                            
                  </div>
                  <div class="slide">                         
                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="253.5px" height="279.1px"  viewBox="0 0 93.5 79.1" style="enable-background:new 0 0 93.5 79.1;" xml:space="preserve">
                      <g>
                          <path d="M87.8,60.2V9.8c0-2.6-2.1-4.7-4.7-4.7H9.8c-2.6,0-4.7,2.1-4.7,4.7v61.1c0,2.6,2.1,4.7,4.7,4.7h73.3
                              c2.6,0,4.7-2.1,4.7-4.7v-9.3C88,61.1,88,60.6,87.8,60.2z M20.6,72H9.8c-0.6,0-1.1-0.5-1.1-1.1V58.3l16.4-16L36,53.6L20.6,71.9
                              C20.6,71.9,20.6,72,20.6,72z M84.2,70.9c0,0.6-0.5,1.1-1.1,1.1H25.2l33-39.4l26,28.8V70.9z M84.2,56L59.5,28.7
                              c-0.3-0.4-0.8-0.6-1.3-0.6c0,0,0,0,0,0c-0.5,0-1,0.2-1.3,0.6L38.3,50.8L26.5,38.5c-0.3-0.3-0.8-0.5-1.3-0.6c-0.5,0-0.9,0.2-1.3,0.5
                              L8.8,53.3V9.8c0-0.6,0.5-1.1,1.1-1.1h73.3c0.6,0,1.1,0.5,1.1,1.1V56z M39.3,17c-4.8,0-8.8,3.9-8.8,8.8c0,4.8,3.9,8.8,8.8,8.8
                              s8.8-3.9,8.8-8.8C48.1,20.9,44.2,17,39.3,17z M39.3,31c-2.9,0-5.2-2.3-5.2-5.2s2.3-5.2,5.2-5.2c2.9,0,5.2,2.3,5.2,5.2
                              S42.2,31,39.3,31z"/>
                      </g>
                      </svg>                 
                      <p>
                        <strong></strong>
                          <span></span>
                          <span></span>
                          <span></span>
                      </p>                    	                 	
                  </div>
                  
                  <div class="slide">  
                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="253.5px" height="279.1px"  viewBox="0 0 93.5 79.1" style="enable-background:new 0 0 93.5 79.1;" xml:space="preserve">
                      <g>
                          <path d="M87.8,60.2V9.8c0-2.6-2.1-4.7-4.7-4.7H9.8c-2.6,0-4.7,2.1-4.7,4.7v61.1c0,2.6,2.1,4.7,4.7,4.7h73.3
                              c2.6,0,4.7-2.1,4.7-4.7v-9.3C88,61.1,88,60.6,87.8,60.2z M20.6,72H9.8c-0.6,0-1.1-0.5-1.1-1.1V58.3l16.4-16L36,53.6L20.6,71.9
                              C20.6,71.9,20.6,72,20.6,72z M84.2,70.9c0,0.6-0.5,1.1-1.1,1.1H25.2l33-39.4l26,28.8V70.9z M84.2,56L59.5,28.7
                              c-0.3-0.4-0.8-0.6-1.3-0.6c0,0,0,0,0,0c-0.5,0-1,0.2-1.3,0.6L38.3,50.8L26.5,38.5c-0.3-0.3-0.8-0.5-1.3-0.6c-0.5,0-0.9,0.2-1.3,0.5
                              L8.8,53.3V9.8c0-0.6,0.5-1.1,1.1-1.1h73.3c0.6,0,1.1,0.5,1.1,1.1V56z M39.3,17c-4.8,0-8.8,3.9-8.8,8.8c0,4.8,3.9,8.8,8.8,8.8
                              s8.8-3.9,8.8-8.8C48.1,20.9,44.2,17,39.3,17z M39.3,31c-2.9,0-5.2-2.3-5.2-5.2s2.3-5.2,5.2-5.2c2.9,0,5.2,2.3,5.2,5.2
                              S42.2,31,39.3,31z"/>
                      </g>
                      </svg> 
                      
                      <p>
                        <strong></strong>
                          <span></span>
                          <span></span>
                          <span></span>
                      </p>
                            
                  </div>
                  
                  <div class="slide">  
                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="193.5px" height="179.1px"  viewBox="0 0 93.5 79.1" style="enable-background:new 0 0 93.5 79.1;" xml:space="preserve">

                          <path d="M87.8,60.2V9.8c0-2.6-2.1-4.7-4.7-4.7H9.8c-2.6,0-4.7,2.1-4.7,4.7v61.1c0,2.6,2.1,4.7,4.7,4.7h73.3
                              c2.6,0,4.7-2.1,4.7-4.7v-9.3C88,61.1,88,60.6,87.8,60.2z M20.6,72H9.8c-0.6,0-1.1-0.5-1.1-1.1V58.3l16.4-16L36,53.6L20.6,71.9
                              C20.6,71.9,20.6,72,20.6,72z M84.2,70.9c0,0.6-0.5,1.1-1.1,1.1H25.2l33-39.4l26,28.8V70.9z M84.2,56L59.5,28.7
                              c-0.3-0.4-0.8-0.6-1.3-0.6c0,0,0,0,0,0c-0.5,0-1,0.2-1.3,0.6L38.3,50.8L26.5,38.5c-0.3-0.3-0.8-0.5-1.3-0.6c-0.5,0-0.9,0.2-1.3,0.5
                              L8.8,53.3V9.8c0-0.6,0.5-1.1,1.1-1.1h73.3c0.6,0,1.1,0.5,1.1,1.1V56z M39.3,17c-4.8,0-8.8,3.9-8.8,8.8c0,4.8,3.9,8.8,8.8,8.8
                              s8.8-3.9,8.8-8.8C48.1,20.9,44.2,17,39.3,17z M39.3,31c-2.9,0-5.2-2.3-5.2-5.2s2.3-5.2,5.2-5.2c2.9,0,5.2,2.3,5.2,5.2
                              S42.2,31,39.3,31z"/>                    
                      </svg>
                      
                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="193.5px" height="179.1px"  viewBox="0 0 93.5 79.1" style="enable-background:new 0 0 93.5 79.1;" xml:space="preserve">

                          <path d="M87.8,60.2V9.8c0-2.6-2.1-4.7-4.7-4.7H9.8c-2.6,0-4.7,2.1-4.7,4.7v61.1c0,2.6,2.1,4.7,4.7,4.7h73.3
                              c2.6,0,4.7-2.1,4.7-4.7v-9.3C88,61.1,88,60.6,87.8,60.2z M20.6,72H9.8c-0.6,0-1.1-0.5-1.1-1.1V58.3l16.4-16L36,53.6L20.6,71.9
                              C20.6,71.9,20.6,72,20.6,72z M84.2,70.9c0,0.6-0.5,1.1-1.1,1.1H25.2l33-39.4l26,28.8V70.9z M84.2,56L59.5,28.7
                              c-0.3-0.4-0.8-0.6-1.3-0.6c0,0,0,0,0,0c-0.5,0-1,0.2-1.3,0.6L38.3,50.8L26.5,38.5c-0.3-0.3-0.8-0.5-1.3-0.6c-0.5,0-0.9,0.2-1.3,0.5
                              L8.8,53.3V9.8c0-0.6,0.5-1.1,1.1-1.1h73.3c0.6,0,1.1,0.5,1.1,1.1V56z M39.3,17c-4.8,0-8.8,3.9-8.8,8.8c0,4.8,3.9,8.8,8.8,8.8
                              s8.8-3.9,8.8-8.8C48.1,20.9,44.2,17,39.3,17z M39.3,31c-2.9,0-5.2-2.3-5.2-5.2s2.3-5.2,5.2-5.2c2.9,0,5.2,2.3,5.2,5.2
                              S42.2,31,39.3,31z"/>                    
                      </svg>
                      
                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="193.5px" height="179.1px"  viewBox="0 0 93.5 79.1" style="enable-background:new 0 0 93.5 79.1;" xml:space="preserve">

                          <path d="M87.8,60.2V9.8c0-2.6-2.1-4.7-4.7-4.7H9.8c-2.6,0-4.7,2.1-4.7,4.7v61.1c0,2.6,2.1,4.7,4.7,4.7h73.3
                              c2.6,0,4.7-2.1,4.7-4.7v-9.3C88,61.1,88,60.6,87.8,60.2z M20.6,72H9.8c-0.6,0-1.1-0.5-1.1-1.1V58.3l16.4-16L36,53.6L20.6,71.9
                              C20.6,71.9,20.6,72,20.6,72z M84.2,70.9c0,0.6-0.5,1.1-1.1,1.1H25.2l33-39.4l26,28.8V70.9z M84.2,56L59.5,28.7
                              c-0.3-0.4-0.8-0.6-1.3-0.6c0,0,0,0,0,0c-0.5,0-1,0.2-1.3,0.6L38.3,50.8L26.5,38.5c-0.3-0.3-0.8-0.5-1.3-0.6c-0.5,0-0.9,0.2-1.3,0.5
                              L8.8,53.3V9.8c0-0.6,0.5-1.1,1.1-1.1h73.3c0.6,0,1.1,0.5,1.1,1.1V56z M39.3,17c-4.8,0-8.8,3.9-8.8,8.8c0,4.8,3.9,8.8,8.8,8.8
                              s8.8-3.9,8.8-8.8C48.1,20.9,44.2,17,39.3,17z M39.3,31c-2.9,0-5.2-2.3-5.2-5.2s2.3-5.2,5.2-5.2c2.9,0,5.2,2.3,5.2,5.2
                              S42.2,31,39.3,31z"/>                    
                      </svg> 
                
                  </div>
                  
                  <div class="slide">                         
                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="253.5px" height="279.1px"  viewBox="0 0 93.5 79.1" style="enable-background:new 0 0 93.5 79.1;" xml:space="preserve">
                      <g>
                          <path d="M87.8,60.2V9.8c0-2.6-2.1-4.7-4.7-4.7H9.8c-2.6,0-4.7,2.1-4.7,4.7v61.1c0,2.6,2.1,4.7,4.7,4.7h73.3
                              c2.6,0,4.7-2.1,4.7-4.7v-9.3C88,61.1,88,60.6,87.8,60.2z M20.6,72H9.8c-0.6,0-1.1-0.5-1.1-1.1V58.3l16.4-16L36,53.6L20.6,71.9
                              C20.6,71.9,20.6,72,20.6,72z M84.2,70.9c0,0.6-0.5,1.1-1.1,1.1H25.2l33-39.4l26,28.8V70.9z M84.2,56L59.5,28.7
                              c-0.3-0.4-0.8-0.6-1.3-0.6c0,0,0,0,0,0c-0.5,0-1,0.2-1.3,0.6L38.3,50.8L26.5,38.5c-0.3-0.3-0.8-0.5-1.3-0.6c-0.5,0-0.9,0.2-1.3,0.5
                              L8.8,53.3V9.8c0-0.6,0.5-1.1,1.1-1.1h73.3c0.6,0,1.1,0.5,1.1,1.1V56z M39.3,17c-4.8,0-8.8,3.9-8.8,8.8c0,4.8,3.9,8.8,8.8,8.8
                              s8.8-3.9,8.8-8.8C48.1,20.9,44.2,17,39.3,17z M39.3,31c-2.9,0-5.2-2.3-5.2-5.2s2.3-5.2,5.2-5.2c2.9,0,5.2,2.3,5.2,5.2
                              S42.2,31,39.3,31z"/>
                      </g>
                      </svg>                 
                      <p>
                        <strong></strong>
                          <span></span>
                          <span></span>
                          <span></span>
                      </p>                    	                 	
                  </div>
                              
                  <div class="slide">  
                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="253.5px" height="279.1px"  viewBox="0 0 93.5 79.1" style="enable-background:new 0 0 93.5 79.1;" xml:space="preserve">
                      <g>
                          <path d="M87.8,60.2V9.8c0-2.6-2.1-4.7-4.7-4.7H9.8c-2.6,0-4.7,2.1-4.7,4.7v61.1c0,2.6,2.1,4.7,4.7,4.7h73.3
                              c2.6,0,4.7-2.1,4.7-4.7v-9.3C88,61.1,88,60.6,87.8,60.2z M20.6,72H9.8c-0.6,0-1.1-0.5-1.1-1.1V58.3l16.4-16L36,53.6L20.6,71.9
                              C20.6,71.9,20.6,72,20.6,72z M84.2,70.9c0,0.6-0.5,1.1-1.1,1.1H25.2l33-39.4l26,28.8V70.9z M84.2,56L59.5,28.7
                              c-0.3-0.4-0.8-0.6-1.3-0.6c0,0,0,0,0,0c-0.5,0-1,0.2-1.3,0.6L38.3,50.8L26.5,38.5c-0.3-0.3-0.8-0.5-1.3-0.6c-0.5,0-0.9,0.2-1.3,0.5
                              L8.8,53.3V9.8c0-0.6,0.5-1.1,1.1-1.1h73.3c0.6,0,1.1,0.5,1.1,1.1V56z M39.3,17c-4.8,0-8.8,3.9-8.8,8.8c0,4.8,3.9,8.8,8.8,8.8
                              s8.8-3.9,8.8-8.8C48.1,20.9,44.2,17,39.3,17z M39.3,31c-2.9,0-5.2-2.3-5.2-5.2s2.3-5.2,5.2-5.2c2.9,0,5.2,2.3,5.2,5.2
                              S42.2,31,39.3,31z"/>
                      </g>
                      </svg> 
                      
                      <p>
                        <strong></strong>
                          <span></span>
                          <span></span>
                          <span></span>
                      </p>
                            
                  </div>
                  
              </div>
        </div>    
          
          <div id="espose">
              <p></p>
              <p></p>
              <p></p>
              <p></p>	
          </div>
          
        <div id="loader">
          <div class="circle c1"></div>
          <div class="circle c2"></div>
          <div class="circle c3"></div>
          <div class="circle c4"></div>  
        </div>
      
      </div> -->

      <div class="container3">
        <h2 class="text-center">Galeria</h2>
        <div class="lightbox-gallery">
            <div><img src="assets/img/galeria/slide1.jpg" data-image-hd="assets/img/galeria/slide1.jpg" alt="Entrada da escola"></div>
            <div><img src="assets/img/galeria/auditorio.jpeg" data-image-hd="assets/img/galeria/auditorio.jpeg" alt="auditorio"></div>
            <div><img src="assets/img/galeria/refeitorio.jpeg" data-image-hd="assets/img/galeria/refeitorio.jpeg" alt="Refeitorio"></div>
            <div><img src="assets/img/galeria/biblioteca.jpeg" data-image-hd="assets/img/galeria/biblioteca.jpeg" alt="Biblioteca"></div>
            <div><img src="assets/img/galeria/4.0.jpeg" data-image-hd="assets/img/galeria/4.0.jpeg" alt="Espaço 4.0"></div>
            <div><img src="assets/img/galeria/lab.jpeg" data-image-hd="assets/img/galeria/lab.jpeg" alt="Laboratorio"></div>
            <div><img src="assets/img/galeria/quadra.jpeg" data-image-hd="assets/img/galeria/quadra.jpeg" alt="Quadra"></div>
            <div><img src="assets/img/galeria/sala1.jpeg" data-image-hd="assets/img/galeria/sala1.jpeg" alt="Sala"></div>
            <div><img src="assets/img/galeria/sala2.jpeg" data-image-hd="assets/img/galeria/sala2.jpeg" alt="Sala"></div>
        </div>
      </div>
<script> 

// Create a lightbox
(function() {
  var $lightbox = $("<div class='lightbox'></div>");
  var $img = $("<img>");
  var $caption = $("<p class='caption'></p>");

  // Add image and caption to lightbox

  $lightbox
    .append($img)
    .append($caption);

  // Add lighbox to document

  $('body').append($lightbox);

  $('.lightbox-gallery img').click(function(e) {
    e.preventDefault();

    // Get image link and description
    var src = $(this).attr("data-image-hd");
    var cap = $(this).attr("alt");

    // Add data to lighbox

    $img.attr('src', src);
    $caption.text(cap);

    // Show lightbox

    $lightbox.fadeIn('fast');

    $lightbox.click(function() {
      $lightbox.fadeOut('fast');
    });
  });

}());
console.log("creditos pela cor Danuza!");
</script> <!-- galeria script -->

     
<script>
  $(document).ready(function(){

  jQuery.easing.def = "easeOutQuad";	  

  var fullSlides = $('div.slide');
  var carouselScrollTop = 0;
  var scrollBy =516; 
  var isScrolling = 0;
  $(fullSlides).eq(0).clone().appendTo("#window").addClass('firstSlide');

  var loader = setInterval(function(){
      $('#loader').fadeIn().addClass('animate');
      setTimeout(function(){$('#loader').removeClass('animate');}, 400);     
  }, 500);

  setTimeout(function(){$("#loader").fadeOut();}, 2200);

  setTimeout(function(){     
    clearInterval(loader);
    $("#espose").fadeIn();
    $('.firstSlide').addClass('animate');
    setTimeout(function(){
    $("div.firstSlide").eq(0).find('p').animate({'margin-top':'194px', 'margin-left':'56px', 'opacity':'1'});
        $("div.firstSlide").eq(0).find('svg').animate({'margin-top':'110px', 'opacity':'1'});		
    }, 300);
    setTimeout(function(){
    $("#bootstrap-carousel").show();
    $("div.firstSlide").hide();
    }, 700);
  }, 2500);
      
  var carouselHeight = 0;
  $(fullSlides).each(function(){
    carouselHeight += scrollBy;
  });      
  $('div.slides').css('height', carouselHeight+"px");	
  $("#bootstrap-carousel").scroll(function() {				
    
    
    if($(this)[0].scrollTop > carouselScrollTop && isScrolling == 0){
      isScrolling = 1;  
      carouselScrollTop += scrollBy;        
        $(this).scrollTo(carouselScrollTop,500);
      setTimeout(function(){
          isScrolling = 0;          
        }, 500);
    }else if($(this)[0].scrollTop < carouselScrollTop && isScrolling == 0){
      isScrolling = 1;  
      carouselScrollTop -= scrollBy;        
        $(this).scrollTo(carouselScrollTop, 500);
      setTimeout(function(){
          isScrolling = 0;          
        }, 500);
    }
    
    
    if($(this)[0].scrollTop >= 355 && $(this)[0].scrollTop < 900){						
      $(fullSlides).eq(1).find('p').animate({'margin-top':'190px', 'opacity':'1'});
      $(fullSlides).eq(1).find('svg').animate({'margin-top':'110px', 'opacity':'1'});			
    }
    
    if($(this)[0].scrollTop >= 900 && $(this)[0].scrollTop < 1400){												
      $(fullSlides).eq(2).find('svg').animate({'margin-top':'110px', 'opacity':'1'});
      $(fullSlides).eq(2).find('p').animate({'margin-right':'60px', 'opacity':'1'});
      
    }				
    
    if($(this)[0].scrollTop >= 1400 && $(this)[0].scrollTop < 1900){											
      $(fullSlides).eq(3).find('svg').animate({'margin-top':'110px', 'opacity':'1'});			
      setTimeout(function(){$(fullSlides).eq(3).find('p').animate({'margin-top':'190px', 'opacity':'1'});}, 100);
    }
    
    if($(this)[0].scrollTop >= 1900 && $(this)[0].scrollTop < 2400){												
      $(fullSlides).eq(4).find('svg').animate({'margin-top':'152px', 'opacity':'1'});			
    }
    
    if($(this)[0].scrollTop >= 2400 && $(this)[0].scrollTop < 2900){						
      $(fullSlides).eq(5).find('p').animate({'margin-top':'190px', 'opacity':'1'});
      $(fullSlides).eq(5).find('svg').animate({'margin-top':'110px', 'opacity':'1'});
    }
    
    if($(this)[0].scrollTop >= 3050 && $(this)[0].scrollTop < 3612){															
      $(fullSlides).eq(6).find('p').animate({'margin-left':'102px', 'opacity':'1'});
    }
    
    if($(this)[0].scrollTop >= 100 && $(this)[0].scrollTop <= 500){															
      $("#espose p").css('border-color', '#82b4eb');	
    }else if($(this)[0].scrollTop >= 500 && $(this)[0].scrollTop <= 900){															
      $("#espose p").css('border-color', '#7aaec3');	
    }else if($(this)[0].scrollTop >= 1600 && $(this)[0].scrollTop <= 2100){															
      $("#espose p").css('border-color', '#82b4eb');	
    }
    else if($(this)[0].scrollTop >= 2100 && $(this)[0].scrollTop <= 2600){															
      $("#espose p").css('border-color', '#fff');	
    }
    
    
  });



  $('.thumb p').each(function(index, el){
    $(this).addClass("eq"+index);
    $(fullSlides).eq(index).addClass("eq"+index);
    
    $(this).click(function(){
      
      carouselScrollTop = scrollBy * index;   
      $(this).find('span').hide();
      setTimeout(function(){$('.thumb span').show();}, 400);
      $("#window").append("<div id='cloneWrap' class='thumb'></div>");
      var childOffset = $(this).offset();
      var parentOffset = $(this).parent().parent().offset();
      var childTop = childOffset.top - parentOffset.top;
      var childLeft = childOffset.left - parentOffset.left;
      var clone = $(this).clone();
      var top = childTop+33+"px";		
      var left = childLeft+"px";			
      
      $(clone)
      .addClass("floatingThumb eq"+index)			
      .appendTo("#cloneWrap");
      
      $("#cloneWrap")
      .css({'top': top, 'left': left})
      .animate({'width': '678px', 
                'height': '516px', 
            'top': '33px', 
            'left': '0'}, 250,
          function(){		
            
            var scrolltop = 0;
            if(index == 0){ sctolltop = 0;}
            else if(index == 1){ sctolltop = 516;}
            else if(index == 2){ sctolltop = 1032;}
            else if(index == 3){ sctolltop = 1548;}
            else if(index == 4){ sctolltop = 2064;}
            else if(index == 5){ sctolltop = 2580;}
            else if(index == 6){ sctolltop = 3096;}												
            isScrolling = 1;
            $('#bootstrap-carousel').show().scrollTo(sctolltop,{duration:0});
            $('#cloneWrap').fadeOut(200, function(){$('#cloneWrap').remove()});	
            $('.thumbs').hide();	
            setTimeout(function(){isScrolling = 0;}, 100);
          });						
      
    });						
    
    
  }).hover(function(){
      $(this).addClass('expand');
    },function(){
      $(this).removeClass('expand');
  });


  $('#espose').click(function(){
    $('#bootstrap-carousel').fadeOut();
    $('.thumbs').fadeIn();	
  });
    

  });

  $.fn.scrollTo = function( target, options, callback ){
  if(typeof options == 'function' && arguments.length == 2){ callback = options; options = target; }
  var settings = $.extend({
    scrollTarget  : target,
    offsetTop     : 50,
    duration      : 500,
    easing        : 'swing'
  }, options);
  return this.each(function(){
    var scrollPane = $(this);
    var scrollTarget = (typeof settings.scrollTarget == "number") ? settings.scrollTarget : $(settings.scrollTarget);
    var scrollY = (typeof scrollTarget == "number") ? scrollTarget : scrollTarget.offset().top + scrollPane.scrollTop() - parseInt(settings.offsetTop);
    scrollPane.animate({scrollTop : scrollY }, parseInt(settings.duration), settings.easing, function(){
      if (typeof callback == 'function') { callback.call(this); }
    });
  });
  }
</script>
 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/easing.js"></script>
      </div>

      <div class="col-md-4 border-start">
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
