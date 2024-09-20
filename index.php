<?php
session_start(); // A partir dessa super global, você consegue acessar esse array de todas as outras páginas que você tiver. (mas por sessões diferentes você não poderá ver, pois eles não compartilham da mesma sessão)

?>


<html>

<head>
  <meta charset="utf-8" />
  <title>App Help Desk</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
    .card-login {
      padding: 30px 0 0 0;
      width: 350px;
      margin: 0 auto;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      App Help Desk
    </a>
  </nav>

  <div class="container">
    <div class="row">

      <div class="card-login">
        <div class="card">
          <div class="card-header">
            Login
          </div>
          <div class="card-body">
            <form action="https://localhost/HelpDesk/valida_login.php" method="post">
              <div class="form-group">
                <input name="email" type="email" class="form-control" placeholder="E-mail">
              </div>
              <div class="form-group">
                <input name="senha" type="password" class="form-control" placeholder="Senha">
              </div>


              <?php
              if (isset($_GET['login']) && $_GET['login'] == 'erro') { // Essa função retorna para gente se uma variavel é diferente de nulo, pois o PHP da um erro caso a variavel esteja indefinida.
              ?>

                <div class="text-danger">Usuário ou senha inválidos!</div>


              <?php } // Fim do IF 
              ?>


              <!----------------------------------------------- Erro se tentar entrar na pagina sem login-------------------------------------------->


              <?php
              if (isset($_GET['login']) && $_GET['login'] == 'erro2') { // Essa função retorna para gente se uma variavel é diferente de nulo, pois o PHP da um erro caso a variavel esteja indefinida.
              ?>

                <div style="text-transform: uppercase;" class="bold text-danger"><strong>Faça login para acessar as páginas restritas!!!</strong></div>


              <?php } // Fim do IF 
              ?>

              <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>

</html>