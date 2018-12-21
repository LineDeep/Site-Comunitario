<?php
include "conn.php";
$iesu=$_GET['jesus'];
mysql_query("delete from fala where id=$iesu");
header("location:centralphp.php");

?>