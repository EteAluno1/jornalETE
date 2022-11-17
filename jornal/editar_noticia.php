<?php
session_start();
include('verifica_login.php');
include('conexao.php');

$id = $_GET['id'];
$sql_query = $conexao->query("SELECT * FROM noticias ") or die($conexao->error);
$titulos = $sql_query->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <link href="efeitos.css" rel="stylesheet">
    <title>Painel</title>
</head>
<body>
  <header class="border border-bottom4 border-dark">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="img/logoo.png" width="90px" height="60px" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav> 
  </header>
  <main class="container-bg bg-secondary bg-opacity-50 rounded ms-4 mt-4 me-4" >
    <div class="row">
      <div class="col-3" >
          <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-primary" style="height: 80vh;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
              <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
              <span class="fs-4">Dashboard</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
              <li class="nav-item">
                <a href="paineladdnoticia.php" class="nav-link text-white" aria-current="page">
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
              <li>
                <a href="painellistanoticia.php" class="nav-link active">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                  Editar Noticia
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
      </div> <!-- fim do col-3 -->
      <div class="col-9 pe-5">
        <h2 class="text-center" > Card Inicio </h2>
        <form action="editar.php" method="POST" enctype="multipart/form-data" class="row g-3">
            <div class="col-md-6">
              <label for="validationDefault01" class="form-label">Titulo da Noticia</label>
              <input name="titulo" type="text" class="form-control" id="validationDefault01" required value="<?php echo $titulos['titulo'] ?>">
              <input name="id" type="hidden" class="form-control" id="validationDefault01" required value="<?php echo $titulos['id'] ?>">
            </div>
            <div class="col-md-6">
              <label for="validationDefault02" class="form-label">Imagem</label>
              <input name="imagem" type="file" class="form-control" id="validationDefault02" required value="<?php echo $titulos['caminho_imagem'] ?>">
            </div>
            <div class="col-md-6">
              <label for="validationDefault03" class="form-label">Conteudo da noticia</label>
              <input name="conteudo" type="text" class="form-control" id="validationDefault03" required value="<?php echo $titulos['conteudo'] ?>"></input>
            </div>
            <div>
              <h2 class="text-center"> Conteudo Principal </h2>
            </div>
            <div class="col-md-6">
              <label for="validationDefault01" class="form-label">Titulo da Noticia</label>
              <input name="titulo2" type="text" class="form-control" id="validationDefault01" required value="<?php echo $titulos['titulo_principal'] ?>">
            </div>
            <div class="col-md-6">
              <label for="validationDefault02" class="form-label">Imagem</label>
              <input name="imagem2" type="file" class="form-control" id="validationDefault02" required>
            </div>
            <div class="col-md-6">
              <label for="validationDefault03" class="form-label">Conteudo da noticia</label>
              <input name="conteudo2" type="text" class="form-control" id="validationDefault03" required value="<?php echo $titulos['conteudo_principal'] ?>"></input>
            </div>
            <div class="col-md-6">
              <label for="validationDefault03" class="form-label">Categoria da noticia</label>
              <select class="form-select form-select-lg" name="categoria" id="" required value="<?php echo $titulos['categoria'] ?>">
                <option selected>Escolha uma categoria</option>
                <option value="Esporte">Esporte</option>
                <option value="Fofoca">Fofoca</option>
                <option value="Lazer">Lazer</option>
                <option value="Escola">Escola</option>
              </select>
            </div>
            <div class="col-12">
              <button name="upload" class="btn btn-primary" type="submit">Enviar</button>
            </div>
        </form>
    
        
  
      </div> <!-- fim do col-9 -->

    </div>

  </main>


  <script src="style/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>