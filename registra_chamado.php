<?php
session_start();

// Montagem do texto em .hd    
$titulo = str_replace('#', '-', $_POST['titulo']);
$categoria = str_replace('#', '-', $_POST['categoria']);
$descricao = str_replace('#', '-', $_POST['descricao']);

$texto = $_SESSION['id'] . '#' . $titulo . "#" . $categoria . '#' . $descricao . PHP_EOL; // Concatenar o array


//Abrindo o arquivo
$arquivo = fopen('arquivo.hd', 'a'); // função para abrir um arquivo

//Escrevendo no arquivo
fwrite($arquivo, $texto);

//Fechando o arquivo
fclose($arquivo);

header('Location: abrir_chamado.php');
