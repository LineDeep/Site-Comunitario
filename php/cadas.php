<?php 
include "conn.php"; 

$fun=$_GET['fun'];
$cod=$_GET['idi'];

if($fun==1){
	mysql_query("delete from opinioes where id_opinioes='$cod'");
}
if ($fun==2) {
	mysql_query("delete from fala where id='$cod'");
}
header("Location:opninidicas.php");



















?>
