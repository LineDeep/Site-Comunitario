<?php
include "conn.php";
$fun=$_GET['fun'];
$insto=$_POST['instos'];
$curso=$_POST['cursos'];

$query_curos=mysql_query("SELECT * FROM `cursos` WHERE nome='$curso'");
	$result_curos=mysql_fetch_array($query_curos);
	$vals=$result_curos['id_cursos'];

$query_instititos=mysql_query("SELECT id_institutos FROM institutos WHERE nome='$insto'");
	$result_instititos=mysql_fetch_array($query_instititos);
	$valus=$result_instititos['id_institutos'];
if($fun==1){
	mysql_query("INSERT INTO inst_curso( id_institutos, id_cursos ) VALUES ('$valus', '$vals')");
}
if($fun==2){
	$n=$_GET['idi'];
	mysql_query(" delete FROM inst_curso WHERE id_inst_curso=$n");
}
if($fun==3){
	$n=$_GET['idi'];
	mysql_query(" delete FROM opinioes WHERE id_opinioes=$n");
}
header("Location:inst_curso.php");



?>