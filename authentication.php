<?php
    header("Content-Type: text/html; charset=UTF-8");
    include('connection.php');

    $username = isset($_POST["username"]) ? addslashes(trim($_POST["username"])) : FALSE;
    $password = isset($_POST["password"]) ? md5(trim($_POST["password"])) : FALSE;

    if(!$username || !$password){
        echo "Você deve digitar seu usuário e senha!";
        exit;
    }else{
        $SQL = "SELECT * FROM users WHERE username='".$username."' and password='".$password."'";
        $RESULT = mysql_query($SQL);
        $RESULT = mysql_fetch_array($RESULT);

        echo $SQL;

        if($RESULT>0){
            session_start();
            $_SESSION["PHP_AUTH_USER"] = $RESULT;
            header("Location: index_authenticated.php");
        }else{
            setcookie("username_error", "Usuário ou senha incorretos!", (time() + (5)));
            setcookie("username", $username, (time() + (5)));
            header("Location: login.php");
        }
    }
?>
