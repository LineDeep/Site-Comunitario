<?php

session_start();

unset($_SESSION['usuario_liberado']);
	unset($_SESSION['senha_liberada']);
	
	header ("Location: login.php");

?>