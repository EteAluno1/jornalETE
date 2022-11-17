<?php
session_start();
include('verifica_login.php');


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <link href="style.css" rel="stylesheet">
    <title>Painel</title>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-light bg-light ">
      <div class="container-fluid">
        <div>
          <a class="navbar-brand" href="index.php"><img src="img/logoo.png" width="90px" height="60px" alt=""></a>
        </div>
        <div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="btn-group dropstart">
              <button type="button" class="btn  dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="me-3"><a class="nav-link btn dropdown " href="painellistanoticia.php"><img src="img/icons/adm-32px.png" alt=""></a></div>
              </button>
              <ul class="dropdown-menu">
                <li class="nav-item">
                      <a class="nav-link disabled" href="#">Logado: <?php echo $_SESSION['nome']; ?></a> 
                  </li>
                  <li class="nav-item dropdown-item">
                      <a class="nav-link" href="logout.php">Sair</a>
                </li>
              </ul>
            </div>
           <!-- <ul class="navbar-nav me-auto mb-2 mb-md-0 ">
              <li class="nav-item">
                  <a class="nav-link disabled" href="#">Logado: <?php echo $_SESSION['nome']; ?></a> 
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="logout.php">Sair</a>
              </li>
            </ul> -->
          </div>
        </div>
        
      </div>
    </nav> 
  </header>
  <main class="container-bg bg-secondary bg-opacity-50 rounded ms-4 mt-4 me-4">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-primary" style="width: 280px; height: 80vh;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Dashboard</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="paineladdnoticia.php" class="nav-link " aria-current="page">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          Adicionar Noticias
        </a>
      </li>
      <li>
        <a href="painellistanoticia.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Listar Noticias
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong><?php echo $_SESSION['nome']; ?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li><a class="dropdown-item" href="editar_perfil.php">Settings</a></li>
        <li><a class="dropdown-item" href="perfil.php">Perfil</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="logout.php">Sair</a></li>
      </ul>
    </div>
  </div> <!-- fim do side bar -->
    
  

  </main>


  <script src="style/bootstrap/js/bootstrap.bundle.min.js" ></script>
</body>
</html>