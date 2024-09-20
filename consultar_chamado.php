<?php
require_once 'acess.php';
?>

<?php

$chamados = array();

$arquivo = fopen('arquivo.hd', 'r'); // 'r' Para leitura

//Enquanto houverem linhas para serem recuperadas
while (!feof($arquivo)) { //Testa pelo fim do arquivo até identificar o "END OF FILE", caso não tenha um fim, retorna false

  $registro = fgets($arquivo); //Recupera linhas até a quebra de linha 
  $chamados[] = $registro;
}

// Fechar o cód aberto
fclose($arquivo);
?>

<html>

<head>
  <meta charset="utf-8" />
  <title>App Help Desk</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
    .card-consultar-chamado {
      padding: 30px 0 0 0;
      width: 100%;
      margin: 0 auto;
    }

    #botao {
      text-transform: none;
      text-decoration: none;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      App Help Desk
    </a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="logoff.php">Sair</a>
      </li>
    </ul>
  </nav>

  <div class="container">
    <div class="row">

      <div class="card-consultar-chamado">
        <div class="card">
          <div class="card-header">
            Consulta de chamado
          </div>

          <div class="card-body">
            <!-- inicio do foreach -->
            <?php foreach ($chamados as $chamado) { ?>

              <?php $chamado_dados = explode('#', $chamado);

              //O if abaixo fará uma comparação de IDs para que, se for diferente do id criador, ele seja exibido para o usuario que criou e o ADM.
              if ($_SESSION['perfil_id'] == 2) {
                // Só vamos exibir se ele foi criado pelo usuário em questão
                if ($_SESSION['id'] != $chamado_dados[0]) { // Comparar com o ID correto
                  continue;
                }
              }

              if (count($chamado_dados) < 3) {
                continue;
              } ?>



              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <!-- recuperando titulo -->
                  <h5 class="card-title"><?= $chamado_dados[1] ?></h5>
                  <!-- Recuperando categoria -->
                  <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dados[2] ?></h6>
                  <!-- recuperando descrição -->
                  <p class="card-text"><?= $chamado_dados[3] ?></p>

                </div>
              </div>
              <!-- fim do foreach -->
            <?php } ?>


            <div class="row mt-5">
              <div class="col-6">
                <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>