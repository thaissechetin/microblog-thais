<?php
/* Aqui programaremos futuramente
os recursos de login/logout e verificação
de permissão de acesso dos usuários */

/* verificar se não existe uma sessão em funcionamento */
if(!isset($_SESSION)){
    session_start();
}

function verificaAcesso(){
    /* Se ñ existe uma variável de sessão relacionada ao id do usuario logado...  */
    if(!isset($_SESSION['id'])){
        /* então significa que ele NÃO ESTÁ LOGADO,portanto apague qualquer resquício de sessão e force o usuário a ir para o login.php */
        session_destroy();
        header("location:../login.php");
        die();
    }
}



function login(int $id, string $nome, string $email, string $tipo){
    /* variáveis de sessão ao logar */
    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;
    $_SESSION['tipo'] = $tipo;

}


function logout(){
    session_start();
    session_destroy();
    header("location:../login.php?logout");
    die();//ou ext

}


function verificaAcessoAdmin(){
    if($_SESSION['tipo'] != 'admin'){
        //redirecione para a página não -autorizado
        header("location:nao-autorizado.php");
        die();//ou exit
    }
}

