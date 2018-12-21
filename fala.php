<?php
include "php/conn.php";
$nome=$_POST['nome'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$assunto=$_POST['assunto'];
$sms=$_POST['sms'];
mysql_query("insert into fala(nome,email,assunto,sms) values('$nome','$email','$assunto','$sms')" );
header("location:index.php?link=6");
?>