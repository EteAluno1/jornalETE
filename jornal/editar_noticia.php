<?php
session_start();
include('verifica_login.php');
require('conexao.php');
require_once('conexaoarquivos.php');
$perfil = $_SESSION['nome'];
$sql_query = $conexao->query("SELECT matricula,nome,caminho_imagem_perfil,caminho_imagem_background,descricao FROM usuarios WHERE nome="."'".$_SESSION['nome']."'") or die($conexao->error);
$usuarios = $sql_query->fetch_assoc();
$id = $_GET['id'];

$query = $pdo->prepare("SELECT * FROM noticias WHERE id=$id");
$query -> execute();
$noticias = $query->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/style/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <link href="assets/style/addnoticia.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="assets/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="assets/js/pt_BR.js"></script>
    <title>Painel</title>

</head>
<body>
  <header class="border border-bottom border-primary">
    <nav class="navbar navbar-expand-md">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="assets/img/logoo.png" width="90px" height="60px" alt=""></a>
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
      </div> <!-- fim do dropdown -->
    </nav> 
  </header>
  <main class="container-bg">
    <div class="row">
      <div class="col-2 col-sm-1 g-0 text-center" style="background: rgb(103,61,255); background: linear-gradient(0deg, RGBA( 0, 0, 205, 1 ) 10%, rgba(0,206,209,1) 100%); );" >
        <a id="btn" class="btn w-100" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
          <i class="text-center bi bi-list" ></i>
        </a>
        <hr>
        <a class="btn  w-100 " href="#">
          <i class="text-center bi bi-plus-lg" ></i>
        </a>
        <a class="btn w-100" href="painellistanoticia.php">
          <i class="text-center bi bi-wallet" ></i>
        </a>
        <a class="btn btn-primary w-100" href="painellistanoticia.php">
          <i class="text-center bi bi-pen" ></i>
        </a>


        <div class="w-25 d-flex flex-column flex-shrink-0 offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="margin-top: 88px;  background-color: RGBA( 0, 0, 205, 1 ); ">
                <a class="btn ps-4 text-light text-start w-100">
                  <i class="bi bi-list" ></i>
                </a>
                <hr>
                <ul class="text-start nav nav-pills flex-column mb-auto">
                  <li class="nav-item">
                    <a href="paineladdnoticia.php" class="nav-link text-white" aria-current="page">
                    <i class="text-center bi bi-plus-lg" ></i>
                      Adicionar Noticias
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="painellistanoticia.php" class="nav-link text-white">
                    <i class="text-center bi bi-wallet" ></i>
                      Listar Noticias
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="paineladdnoticia.php" class="nav-link active" aria-current="page">
                    <i class="text-center bi bi-pen" ></i>
                      Editando Noticia
                    </a>
                  </li>
                </ul>
                <hr>
                <div class="dropdown pb-3">
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
                </div> <!-- fim do dropdown -->
        </div> <!-- fim do side bar -->
      </div> <!-- fim do col-1 -->
      <div class="col-10 col-sm-11">
          <div class="" >
            
            <form method="POST" action="editar.php?id=<?php echo $noticias['id'] ?>" enctype="multipart/form-data" class="row g-3 mb-3 mt-3">
                
                <div class="col-md-9 shadow">
                  <h2 class="text-center mt-3"  title="Titulo que aparecerá no resumo na parte inicial do site!!" > Titulo Principal da Noticia</h2>
                  <input value="<?php echo $noticias['titulo'] ?>" name="titulo" class="form-control mb-4" type="text">
                  <h2 class="text-center mt-3"  title="Conteudo que aparecerá na pagina de noticias!!" > Corpo da noticia </h2>
                  <textarea  name="card_resumo" id=""><?php echo $noticias['card_noticia'] ?></textarea>
                </div>
                <div class="col-md-3" >
                    <div class="rounded mt-5 p-4 shadow" >
                        <h4 class="text-center" >Imagem Destaque</h4>
                        <div class="text-center mb-3" >
                          <img id="output" width="150" height="150" src="<?php echo $noticias['imagem_destaque'] ?>" onerror="if (this.src != 'assets/img/imgdefault.png') this.src = 'assets/img/imgdefault.jpg';" alt="">
                          <script>
                            var loadFile = function(event) {
                              var output = document.getElementById('output');
                              output.src = URL.createObjectURL(event.target.files[0]);
                              output.onload = function() {
                                URL.revokeObjectURL(output.src) // free memory
                              }
                            };
                          </script>
                        </div>
                        <input id="image" name="imagem" id="formFile" onchange="loadFile(event)" class="form-control form-control-sm" type="file">
                    </div>
                </div>
    
                <div class="col-9">
                  <button name="upload" class="btn btn-primary" type="submit">Enviar</button>
                </div>
                
            </form>

            
          </div>
            
        
      </div><!-- Fim col-11 -->
    </div> <!-- fim do row -->
    
  

  </main>

  <script>
    const example_image_upload_handler = (blobInfo, progress) => new Promise((resolve, reject) => {
  const xhr = new XMLHttpRequest();
  xhr.withCredentials = false;
  xhr.open('POST', 'upload.php');

  xhr.upload.onprogress = (e) => {
    progress(e.loaded / e.total * 100);
  };

  xhr.onload = () => {
    if (xhr.status === 403) {
      reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
      return;
    }

    if (xhr.status < 200 || xhr.status >= 300) {
      reject('HTTP Error: ' + xhr.status);
      return;
    }

    const json = JSON.parse(xhr.responseText);

    if (!json || typeof json.location != 'string') {
      reject('Invalid JSON: ' + xhr.responseText);
      return;
    }

    resolve(json.location);
  };

  xhr.onerror = () => {
    reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
  };

  const formData = new FormData();
  formData.append('file', blobInfo.blob(), blobInfo.filename());

  xhr.send(formData);
});
  
    tinymce.init({
      selector: 'textarea',
      resize: 'both',
      min_height: 300,
      language: 'pt_BR',
      entity_encoding: "raw",
      menubar: false,
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect',
      toolbar: 'undo redo | blocks fontfamily fontsize | forecolor backcolor  | bold italic underline strikethrough | link image table mergetags | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      images_upload_handler: example_image_upload_handler
    });
 
  </script>             
  <script src="assets/style/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>