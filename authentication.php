<?php

    include('connection.php');
    session_start();

    $username = isset($_POST["username"]) ? addslashes(trim($_POST["username"])) : FALSE;
    $password = isset($_POST["password"]) ? md5(trim($_POST["password"])) : FALSE;

    if(!$username || !$password){
        echo "Você deve digitar seu usuário e senha!";
        exit;
    }else{
        $SQL = "SELECT * FROM users WHERE username=".$username."";
        $RESULT = mysql_query($SQL);
    }


    // // User name e password para autenticação
    // $username = 'teste';
    // $password = 'teste';

    // //Se as variáveis PHP_AUTH_USER e PHP_AUTH_PW não estão setadas ou são diferentes do esperado.
    // if (!isset($_SERVER['PHP_AUTH_USER']) ||
    //     !isset($_SERVER['PHP_AUTH_PW']) ||
    //     ($_SERVER['PHP_AUTH_USER'] != $username) ||
    //     ($_SERVER['PHP_AUTH_PW'] != $password)) {

    //     //Se o usuário/senha for incorreto envia os cabeçalhos de autenticação
    //     header('HTTP/1.1 401 Unauthorized');
    //     header('WWW-Authenticate: Basic realm="Consulta Clientes"');
    //     exit('<h2>Consulta de Clientes</h2>Você deve fornecer um usuário e senha válidos para acessar esta página.');
    // }
?>
