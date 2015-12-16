<?php
    header("Content-Type: text/html; charset=UTF-8");
    session_start();
    unset($_SESSION["PHP_AUTH_USER"]);
    header("Location: index.php");
?>