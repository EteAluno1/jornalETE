<?php
session_start();
include('verifica_login.php');
require_once('conexao.php');
$perfil = $_SESSION['nome'];
$sql_query = $conexao->query("SELECT matricula,nome,caminho_imagem_perfil,caminho_imagem_background,descricao FROM usuarios WHERE nome="."'".$_SESSION['nome']."'") or die($conexao->error);
$usuarios = $sql_query->fetch_assoc();

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
  <main class="container-bg bg-secondary bg-opacity-50 rounded ms-3 mt-4 me-4 mb-4">
    <div class="row">
      <div class="col-3">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-primary" style="height: 100vh;">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                  <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                  <span class="fs-4">Dashboard</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                  <li class="nav-item">
                    <a href="paineladdnoticia.php" class="nav-link active" aria-current="page">
                      <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                      Adicionar Noticias
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="painellistanoticia.php" class="nav-link text-white">
                      <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                      Listar Noticias
                    </a>
                  </li>
                </ul>
                <hr>
                <div class="dropdown">
                  <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo $usuarios['caminho_imagem_perfil'] ?>" onerror="if (this.src != 'img/logo.png') this.src = 'img/slide1.jpg';" alt="" width="32" height="32" class="rounded-circle me-2">
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
            <h2 class="text-center mt-3" > Card Inicio </h2>
            <form method="POST" enctype="multipart/form-data" class="row g-3 mb-3 mt-3">
                <div class="col-md-6">
                  <label for="validationDefault01" class="form-label">Titulo da Noticia</label>
                  <input name="titulo" type="text" class="form-control" id="validationDefault01" required>
                </div>
                <div class="col-md-6">
                  <label for="validationDefault02" class="form-label">Imagem</label>
                  <input name="imagem" type="file" class="form-control" id="validationDefault02" required>
                </div>
                <div class="col-md-6">
                  <label for="validationDefault03" class="form-label">Conteudo da noticia</label>
                  <textarea name="conteudo" type="text" class="form-control" id="validationDefault03" required></textarea>
                </div>
                <div>
                  <h2 class="text-center"> Conteudo Principal </h2>
                </div>
                <div class="col-md-6">
                  <label for="validationDefault01" class="form-label">Titulo da Noticia</label>
                  <input name="titulo2" type="text" class="form-control" id="validationDefault01" required>
                </div>
                <div class="col-md-6">
                  <label for="validationDefault02" class="form-label">Imagem</label>
                  <input name="imagem2" type="file" class="form-control" id="validationDefault02" required>
                </div>
                <div class="col-md-6">
                  <label for="validationDefault03" class="form-label">Conteudo da noticia</label>
                  <textarea name="conteudo2" type="text" class="form-control" id="validationDefault03" required></textarea>
                </div>
                <div class="col-md-6">
                  <label for="validationDefault03" class="form-label">Categoria da noticia</label>
                  <select class="form-select form-select-lg" name="categoria" id="" required>
                    <option selected>Escolha uma categoria</option>
                    <option value="Esporte">Esporte</option>
                    <option value="Fofoca">Fofoca</option>
                    <option value="Lazer">lazer</option>
                    <option value="Escola">Escola</option>
                  </select>
                </div>
                <div class="col-12">
                  <button name="upload" class="btn btn-primary" type="submit">Enviar</button>
                </div>
            </form>
        
            
            <?php

              if(isset($_POST['titulo'], $_POST['conteudo'] , $_FILES['imagem'], $_POST['titulo2'], $_FILES['imagem2'] , $_POST['conteudo2'], $_POST['categoria'])){
                $titulo = $_POST['titulo'];
                $conteudo = $_POST['conteudo'];
                $titulo2 = $_POST['titulo2'];
                $conteudo2 = $_POST['conteudo2'];
                $categoria = $_POST['categoria'];
                
                $arquivo = $_FILES['imagem'];
                $arquivo2 = $_FILES['imagem2'];
            
                if($arquivo['error'] )
                    die("<p class='alert alert-danger w-50 mt-3'> Falha ao enviar o arquivo !! </p>");
                if($arquivo['size'] > 5097152){
                  die("<p class='alert alert-danger w-50 mt-3'> Arquivo muito grande !! Max: 5MB !!</p>");
                }
                $pasta = "arquivos/";
                $nomeDoArquivo = $arquivo['name'];
                $nomeDoArquivo2 = $arquivo2['name'];
                $novoNomeDoArquivo = uniqid();
                $novoNomeDoArquivo2 = uniqid();
                $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));
                $extensao2 = strtolower(pathinfo($nomeDoArquivo2,PATHINFO_EXTENSION));
            
                if($extensao != "jpg" && $extensao != "png")
                    die("<p class='alert alert-danger w-50 mt-3'>Formato de imagem nao aceito !! Apenas PNG ou JPG !! </p> ");

                $caminho = $pasta . $novoNomeDoArquivo . "." . $extensao;  
                $caminho2 = $pasta . $novoNomeDoArquivo2 . "." . $extensao2;  
            
                $deu_certo = move_uploaded_file($arquivo["tmp_name"], $caminho);
                $deu_certo2 = move_uploaded_file($arquivo2["tmp_name"], $caminho2);
                if($deu_certo){
                  
                  
                  if($conexao->query("INSERT INTO noticias (titulo,conteudo,nome_imagem,caminho_imagem,data_upload,titulo_principal,conteudo_principal,nome_imagem_principal,caminho_imagem_principal,categoria) VALUES ('$titulo','$conteudo','$nomeDoArquivo','$caminho',NOW(),'$titulo2','$conteudo2','$nomeDoArquivo2','$caminho2','$categoria')") === TRUE)
                    {
                        $_SESSION['status_noticia'] = true;
                        
                        
                    }
                }else{
                  print "<p class='alert alert-success w-25 mt-3'>Noticia nao cadastrada! </p> ";  
                }
                if(isset($_SESSION['status_noticia'])){
                  print "<p class='alert alert-success w-25 mt-3'>Noticia cadastrada! </p> ";
                  unset($_SESSION['status_noticia']);
                // header('Location: painellistanoticia.php');

                  
                  
                } 
                }
            ?>
      </div><!-- Fim col-9 -->
    </div> <!-- fim do row -->
    
  

  </main>


  <script src="style/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>