<?php

session_start();

// Variavel para autenticação de usuário foi realizada com sucesso

$usuario_autenticado = false; // variavel para deixar a parte de autenticação global
$usuario_id = null; // variavel para deixar a parte de id global
$usuario_perfil = null; // variavel para deixar a parte de perfil global

$perfis = array(1 => 'adm', 2 => 'user'); // Colocando usuarios e administradores no sistema para que os adms vejam todos os chamados e os usuários somente o deles

$usuarios_app = array(
    array('id' => 1, 'email' => 'adm@teste.com', 'senha' => '123456', 'perfil_id' => 1),
    array('id' => 2, 'email' => 'luc@teste.com', 'senha' => '1234', 'perfil_id' => 2),
    array('id' => 3, 'email' => 'cas@teste.com', 'senha' => '1234', 'perfil_id' => 2),

);

foreach ($usuarios_app as $user) {
    if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
        $usuario_autenticado = true;
        $usuario_id = $user['id'];
        $usuario_perfil = $user['perfil_id'];
    }
};

if ($usuario_autenticado) {
    echo 'Usuário autenticado com sucesso!';
    $_SESSION['autenticado'] = 'S';
    $_SESSION['id'] = $usuario_id;
    $_SESSION['perfil_id'] = $usuario_perfil;
    header('Location: home.php');
} else {
    header('Location: index.php?login=erro');
    $_SESSION['autenticado'] = 'N';
}