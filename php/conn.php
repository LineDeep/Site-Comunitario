<?php
$host="localhost";
$pass="";
$user="root";
$banco="bdscom";
$conn=mysql_connect($host,$user,$pass) or die("Erro ao connectar com o servidor");
$db=mysql_select_db($banco,$conn) or die("Erro ao selecionar o banco de dados");
?>