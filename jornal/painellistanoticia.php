<?php
session_start();
include('verifica_login.php');
require_once('conexao.php');
require_once('conexaoarquivos.php');
$sql_query = $conexao->query("SELECT * FROM noticias ") or die($conexao->error);
$perfil = $_SESSION['nome'];
$sql_query_usuarios = $conexao->query("SELECT matricula,nome,caminho_imagem_perfil,caminho_imagem_background,descricao FROM usuarios WHERE nome="."'".$_SESSION['nome']."'") or die($conexao->error);
$usuarios = $sql_query_usuarios->fetch_assoc();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="assets/style/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style/listanoticia.css">
    <title>Painel</title>
</head>
<body>
  <header class="border border-bottom border-primary" >
    <nav class="navbar navbar-expand-md navbar-light">
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
        <a class="btn w-100" href="paineladdnoticia.php">
          <i class="text-center bi bi-plus-lg" ></i>
        </a>
        <a class="btn btn-primary w-100" href="painellistanoticia.php">
          <i class="text-center bi bi-wallet " ></i>
        </a>


        <div class="w-25 d-flex flex-column flex-shrink-0 offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="margin-top: 88px; background-color: RGBA( 0, 0, 205, 1 ); ">
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
                    <a href="painellistanoticia.php" class="nav-link active">
                    <i class="text-center bi bi-wallet" ></i>
                      Listar Noticias
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
      </div> <!-- fim do col-2 -->
      <div class="col-10 col-sm-11">
      <div class="min-vh-100" >
            <h2 class="text-center mt-3" > Cards Inicio </h2>
            <div class="" >
              <table class="table">
              <thead>
                <tr>
                  <th scope="col">Preview</th>
                  <th scope="col">Titulo</th>
                  <th scope="col">Ver noticia Completa</th>
                  <th scope="col">Gerenciar</th>
                </tr>
              </thead>
                <tbody>
                  <?php
                  $query = $pdo->prepare("SELECT * FROM noticias");
                  $query -> execute();

                  while($noticias = $query->fetch(PDO::FETCH_ASSOC)){

                  ?>
                    <tr>
                        <td><img width="100" height="100" src="<?php echo $noticias['imagem_destaque'] ?>" alt=""></td>
                        <td><?php echo $noticias['titulo'] ?></td>
                        <td>
                          <a class="btn btn-secondary" href="" onclick="solicitar(<?php echo $noticias['id'] ?>)" type="button" data-bs-toggle="modal" data-bs-target="#vernoticia">Ver noticia</a>
                        </td>
                        <td>
                          <a class="btn btn-secondary" href="editar_noticia.php?id=<?php echo $noticias['id'] ?>">Editar</a> 
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="<?php echo $noticias['id'] ?>">Excluir</button>
                        </td>
                    </tr>                                    
                    <?php  
                  } 
                    ?>
                </tbody>
              </table>    
              
                                          
                        <!-- Modal -->
                         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir a noticia?</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body ">
                                  Você tem certeza que deseja excluir a noticia?
                                    <input name="id" type="hidden">

                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                  <a id="excluir" href="" type="button" class="btn btn-danger">Excluir</a>
                                </div>
                              </div>
                            </div>
                          </div> <!-- fim do modal -->    

                          <!-- Modal ver noticia -->
                         <div class="modal fade" id="vernoticia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                              <div class="modal-content">
                          
                                <div class="modal-body " id="corpoModal">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                              </div>
                            </div>
                          </div> <!-- fim do modal -->   

                          <script>
                  function solicitar(id) {
                    
                      fetch("http://localhost/jornalete/jornal/ajax.php", {
                          method: 'post',
                          body: 'id='+id,
                          headers: {"Content-type": "application/x-www-form-urlencoded; charset=UTF-8"},
                          
                      }).then((response) => {
                        //console.log(response);
                          return response.text();
                      }).then((res) => {
                          document.getElementById('corpoModal').innerHTML = res;
                      }).catch((error) => {
                          console.log(error);
                      });

                  }
              </script>  

                        <script>
                          const exampleModal = document.getElementById('exampleModal')
                          exampleModal.addEventListener('show.bs.modal', event => {
                            // Button that triggered the modal
                            const button = event.relatedTarget
                            // Extract info from data-bs-* attributes
                            const recipient = button.getAttribute('data-bs-whatever')

                            // If necessary, you could initiate an AJAX request here
                            // and then do the updating in a callback.
                            //
                            // Update the modal's content.
                            const modalBodyInput = exampleModal.querySelector('.modal-body input')

                            modalBodyInput.value = recipient

                            const href = 'deletar_noticia.php?id='+ recipient

                            const modalFootera = document.querySelector("#excluir");
                            modalFootera.href = href

                          

                          })
                        </script>
            </div>                  
          </div>
            
        
      </div><!-- Fim col-11 -->
    </div> <!-- fim do row -->
    
  

  </main>


  <script src="assets/style/bootstrap/js/bootstrap.bundle.min.js" ></script>
</body>
</html>