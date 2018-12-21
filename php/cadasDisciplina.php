<?php
$fun=$_GET['fun'];

include "conn.php";

$nome_d=$_POST['nome_d'];
$cursos=$_POST['curso'];

$query=mysql_query("SELECT * FROM `cursos` WHERE nome='$cursos'");
$array_query=mysql_fetch_array($query);
$gv_id=$array_query['id_cursos'];

if($fun==1){
mysql_query("insert into disciplinas(id_cursos,nome) values('$gv_id','$nome_d')");

}
if($fun==2){
$n=$_GET['idi'];
mysql_query("delete from disciplinas where id_disciplinas=$n");
}
if($fun==3){
$n=$_GET['idi'];
mysql_query("update disciplinas set id_cursos='$gv_id',nome='$nome_d' where id_disciplinas=$n");
}
	header("Location:disciplina.php?g=$i_curso&fun=jjj");
?>