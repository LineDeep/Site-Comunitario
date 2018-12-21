<?php

include "php/conn.php";
$fun=$_GET['h'];
$nome=$_POST['nome'];
$email=$_POST['email'];
$sobre=$_POST['sobre'];
$opiniao=$_POST['opiniao'];
if ($fun==1) {


$sl=mysql_fetch_array(mysql_query("select *from institutos where nome='$sobre'"));
			$inome=$sl['id_institutos'];
mysql_query("INSERT INTO `bdscom`.`opinioes` (`id_opinioes`, `id_institutos`, `id_cursos`, `email`, `opiniao`, `nome`) VALUES (NULL, '$inome', '', '$email', '$opiniao', '$nome')");
header("Location:http://localhost/_sitecom_/index.php?link=11");

}
else if ($fun==2) {

$sel=mysql_fetch_array(mysql_query("select *from cursos where nome='$sobre'"));
			$cnome=$sel['id_cursos'];
mysql_query("INSERT INTO `bdscom`.`opinioes` (`id_opinioes`, `id_institutos`, `id_cursos`, `email`, `opiniao`, `nome`) VALUES (NULL, '', '$cnome', '$email', '$opiniao', '$nome')");
header("Location:http://localhost/_sitecom_/index.php?link=10");
	
}


?>