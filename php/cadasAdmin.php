<?php
include "conn.php";
$nome=$_POST['nome'];
$senha=$_POST['senha'];
$fun=$_GET['fun'];
$n=$_GET['idi'];

if($fun==1){
mysql_query("insert into admin(user,senha) values('$nome','$senha')");

}
if($fun==2){
mysql_query("delete from admin where id_admin=$n");
}
if($fun==3){
mysql_query("update admin SET user='$nome',senha='$senha' where id_admin=$n ");

}
	header("Location:admin.php?fun=rr");
?>