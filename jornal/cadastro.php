<?php
session_start();

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jornal ETE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">

    <style>
    html,body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background: url(assets/img/background.jpg);
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
        <form action="cadastrar.php" method="POST">
          <img class="mb-3" src="assets/img/logoo.png" alt="logo-jete" >
          <h1 class="h3 mb-3 fw-normal">Cadastro</h1>

          <div class="form-floating">
            <input name="nome" type="text" class="form-control" id="floatingInputValue" placeholder="Nome" maxlenght="140">
            <label for="floatingInputValue">Nome</label>
          </div>
      
          <div class="form-floating">
            <input name="matricula" type="text" class="form-control" id="floatingInput" placeholder="Exemplo=123123321">
            <label for="floatingInput">Matricula</label>
          </div>
          <div class="form-floating">
            <input name="senha" type="password" class="form-control" id="floatingPassword" placeholder="Password" maxlenght="30">
            <label for="floatingPassword">Senha</label>
          </div>

          <div>
          <?php if(isset($_SESSION['status_cadastro'])){
				          print "<p class='alert alert-danger'>Cadastrado! </p> ";
				          unset($_SESSION['status_cadastro']);
			}?>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Cadastrar</button>
          <p class="mt-5 mb-3 text-muted">&copy; 2022–2023</p>
        </form>
      </main>
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>