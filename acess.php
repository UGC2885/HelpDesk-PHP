<?php

session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'S') { //Caso não exista ou seja diferente de "S" retornará true e o usuário retornará para a página de erro

  header('Location: index.php?login=erro2');
}
?>