<?php
session_start();
include('verifica_login.php');
require_once('conexao.php');
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
    <link href="style/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <link href="efeitos.css" rel="stylesheet">
    <title>Painel</title>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="img/logoo.png" width="90px" height="60px" alt=""></a>
      </div>
    </nav> 
  </header>
  <main class="container-bg bg-secondary bg-opacity-50 rounded ms-4 mt-4 me-4 mb-4">
    <div class="row">
      <div class="col" >
          <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-primary min-vh-100" >
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
                <a href="painellistanoticia.php" class="nav-link active">
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
        <div class="col-lg-9 pe-5 table-responsive ">
            <h2 class="text-center mt-3 mb-3">Card de resumo</h2>
            <div class="row">
              <div class="">

              </div>
            </div>
            <table class="table table-bordered align-middle border border-4 ">
              <thead>
                <th scope="col">Preview</th>
                <th scope="col">Nome da imagem</th>
                <th scope="col">Titulo da noticia</th>
                <th scope="col">Conteudo da noticia</th>
                <th scope="col">data de envio</th>
                <th scope="col">Manuntenção</th>
              </thead>
              <tbody>
                <?php 
                  while($titulos = $sql_query->fetch_assoc()){
                    
                    
          

                ?>
                <tr >
                  <td class="col" > <img height="50" src="<?php echo $titulos['caminho_imagem']; ?>" alt=""> </td>
                  <td class="col"> <a target="_blank" href="<?php echo $titulos['caminho_imagem']; ?>"><?php echo $titulos['nome_imagem']; ?></a></td>
                  <td class="col"> <?php echo $titulos['titulo'] ?></td>
                  <td class="col"> <?php echo $titulos['conteudo'] ?> </td>
                  <td class="col"> <?php echo date("d/m/Y H:i", strtotime($titulos['data_upload'])); ?> </td>
                  <td class="col"> <a href="editar_noticia.php?id=<?php echo $titulos['id']; ?>">Editar</a> | <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          Excluir
                        </a>  

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Alerta de Exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                Tem certeza que deseja excluir a noticia??
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <a class="btn btn-primary" href="excluir_noticia.php?id=<?php echo $titulos['id']; ?>">Excluir</a>
                              </div>
                            </div>
                          </div>
                        </div>

              
                  </td>
                </tr>
                <?php

                
              }
                ?>
              </tbody>
            </table>

            <h2 class="text-center mb-3"> Noticia principal </h2>

            <table class="table table-bordered border border-4 ">
              <thead>
                <th scope="col">Preview</th>
                <th scope="col">Nome da imagem principal</th>
                <th scope="col">Titulo da noticia principal</th>
                <th scope="col">Conteudo da noticia principal</th>
                <th scope="col">data de envio</th>
                <th scope="col">Manuntenção</th>
              </thead>
              <tbody>

              <?php 
                  $sql_query2 = $conexao->query("SELECT * FROM noticias ") or die($conexao->error);
                  while($titulos2 = $sql_query2->fetch_assoc()){
                    
                    
          

                ?>
                    
          

                <tr>
                  <td> <img height="50" src="<?php echo $titulos2['caminho_imagem_principal']; ?>" alt=""> </td>
                  <td> <a target="_blank" href="<?php echo $titulos2['caminho_imagem_principal']; ?>"><?php echo $titulos2['nome_imagem_principal']; ?></a></td>
                  <td> <?php echo $titulos2['titulo_principal'] ?></td>
                  <td> <?php echo $titulos2['conteudo_principal'] ?> </td>
                  <td> <?php echo date("d/m/Y H:i", strtotime($titulos2['data_upload'])); ?> </td>
                  <td> <a href="editar_noticia.php?id=<?php echo $titulos['id']; ?>">Editar</a> | <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          Excluir
                        </a>  

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Alerta de Exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                Tem certeza que deseja excluir a noticia??
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <a class="btn btn-primary" href="excluir_noticia.php?id=<?php echo $titulos2['id']; ?>">Excluir</a>
                              </div>
                            </div>
                          </div>
                        </div>

              
                  </td>
                </tr>

                
                <?php 
                  }
                    
                    
          

                ?>

            
              </tbody>
            </table>
      </div> <!-- fim da col-9 -->
    </div> <!-- fim da row -->
    

  

  </main>


  <script src="style/bootstrap/js/bootstrap.bundle.min.js" ></script>
</body>
</html>