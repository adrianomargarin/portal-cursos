<?php
    header("Content-Type: text/html; charset=UTF-8");
    session_start();
    if(!isset($_SESSION["PHP_AUTH_USER"])){
        header("Location: login.php");
    }
?>