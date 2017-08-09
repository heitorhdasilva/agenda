<?php
    session_start();

function login(){
    $login = trim($_POST['login']);
    $senha = trim($_POST['senha']);
    $nome = $_POST['nome'];
    $usuario_existe = false;
    $usuarios = file_get_contents('usuarios.json');
    $usuarios = json_decode($usuarios, true);
    print_r($usuarios);

    foreach ($usuarios as $usuario){

        if ($login == $usuario['login'] && $senha == $usuario['senha']) {
            //deu certo
            $_SESSION['usuario_nome'] = $nome;
            $_SESSION['usuario_login'] = $login;
            $_SESSION['usuario_senha'] = $senha;
            $_SESSION['usuario_online'] = true;
            $usuario_existe = true;

            header('Location: index.phtml');

        }
    }

    if ($usuario_existe == false ){
        header('Location: login.php');
    }
}

function logout(){
    session_destroy();
    header("Location: login.php");
}
function cadastro(){
    $contatosAuxiliar = file_get_contents('usuarios.json');
    $contatosAuxiliar = json_decode($contatosAuxiliar, true);

    $usuario = ['id'=>uniqid(),'nome'=>$_POST['nome'],'login'=>$_POST['login'],'senha'=>$_POST['senha']];

    array_push($contatosAuxiliar, $usuario);

    $contatosAuxiliar = json_encode($contatosAuxiliar, JSON_PRETTY_PRINT);
    file_put_contents('usuarios.json',$contatosAuxiliar);

    header('Location: login.php');
}
switch ($_GET['acao']){
    case login:
        login();
        break;
    case sair:
        logout();
        break;
    case cadastro:
        cadastro();
        break;
}