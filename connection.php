<?php
    // $CONNECTION = mysql_connect("localhost", "amargarin", "topicos") or die("ERRO DE CONNECTION");
    $CONNECTION = mysql_connect("localhost", "root", "root") or die("ERRO DE CONEXAO");
    mysql_query("set names 'utf8'",$CONNECTION);
    mysql_select_db("trabalho", $CONNECTION);
    // mysql_select_db("amargari_trabalho_php_1", $CONNECTION);
?>