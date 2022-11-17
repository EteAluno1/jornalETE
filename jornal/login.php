<?php
session_start();
include('conexao.php');

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jornal ETE</title>
    <link href="style/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

    <style>
    html,body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background: url(img/background.jpg); 
  background-size: 100%;
  
}

.form-signin {
  max-width: 330px;
  padding: 15px;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
main{
    --border-size: 0.3rem;
    border: var(--border-size) solid transparent;

  /* Paint an image in the border */
  border-image: conic-gradient(
      from var(--angle),
      #d53e33 0deg 90deg,
      #fbb300 90deg 180deg,
      #377af5 180deg 270deg,
      #399953 270deg 360deg
    )
    1 stretch;
  background: rgb(255 255 255 / var(--opacity));
}
main{
    background: rgba(255, 255, 255, 0.76);
    animation: rotate 4s linear infinite, opacityChange 3s infinite alternate;
    
}

@supports (background:paint(houdini)) {
  @property --opacity {
    syntax: "<number>";
    initial-value: 0.5;
    inherits: false;
  }

  @property --angle {
    syntax: "<angle>";
    initial-value: 0deg;
    inherits: false;
  }
  @keyframes opacityChange {
    to {
      --opacity: 1;
    }
  }
@keyframes rotate{
    to {
      --angle: 360deg;
    }
}}}}
    </style>
</head>
<body class="text-center">
    
    <main class="form-signin w-100 m-auto rounded">
        <form action="login_vali.php" method="POST">
          <img class="mb-3" src="img/logoo.png" alt="logo-jete" >
          <h1 class="h3 mb-3 fw-normal">Login</h1>
      
          <div class="form-floating">
            <input name="matricula" type="text" class="form-control" id="floatingInput" placeholder="exemplo=12313212">
            <label for="floatingInput">Matricula</label>
          </div>
          <div class="form-floating">
            <input name="senha" type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Senha</label>
          </div>
          <div>
          <?php if(isset($_SESSION['nao_autenticado'])){
				          print "<p class='alert alert-danger'>Matricula ou senha incorreta!";
				          unset($_SESSION['nao_autenticado']);
			}?>
          </div>
          <div class="d-flex">
            <a class="w-50 btn btn-lg btn-primary me-2" href="index.php">Voltar</a>
            <button class="w-50 btn btn-lg btn-primary" type="submit">Entrar</button>
          </div>
          
          <p>Ainda nao é cadastrado? <a href="cadastro.php">Clique aqui</a></p>
          <p class="mt-5 mb-3 text-muted">&copy; 2022–2023</p>
        </form>
      </main>

      <script src="style/bootstrap/js/bootstrap.bundle.min.js" ></script>
</body>
</html>