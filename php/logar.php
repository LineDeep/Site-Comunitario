<?php

 session_start();
 include "conn.php";

$usuario = $_POST['user'];
$senha = $_POST['pass'];

$select = mysql_query("SELECT  * FROM admin where user = '$usuario' and senha='$senha'");
$nn=mysql_num_rows($select);
if($nn==1){
	
	$_SESSION['usuario_liberado']=$usuario;
	$_SESSION['senha_liberada']=$senha;
	header ("Location: http://localhost/_sitecom_/index.php?link=7");
	
	}
	else{
	unset($_SESSION['usuario_liberado']);
	unset($_SESSION['senha_liberada']);
	
	header ("Location: http://localhost/_sitecom_/php/login.php?f=nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn");
	
	}




?>