<?php

session_start();

//Podemos remover do array de sessão usado o unset() que destroi o array em questão
//unset() tem inteligencia para remover o índice somente se ele existir


//Ou destruir a variavel de sessão
//session_destroy() -> será destruida

session_destroy();
header('Location: index.php');
