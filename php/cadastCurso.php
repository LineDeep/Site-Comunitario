<?php
include "conn.php";
$foto=$_FILES['img'];
$nome=$_POST['nome'];
$info=$_POST['infor'];
$fun=$_GET['fun'];
$n=$_GET['idi'];

if($fun==1){
mysql_query("insert into cursos(nome,info) values('$nome','$info')");
$qr=mysql_query("SELECT * FROM cursos WHERE nome='$nome' and info='$info' ");
//		$largura = 640;
//		$altura = 427;
//		$dimensoes = getimagesize($foto["tmp_name"]);
	
		// Verifica se a largura da imagem é maior que a largura permitida
		/*if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}
 
		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
		if (count($error) == 0) {*/
preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
$caminho_imagem = "../fotos/cursos/" . $nome_imagem;
move_uploaded_file($foto["tmp_name"], $caminho_imagem);

$re=mysql_fetch_array($qr);
$f_cod=$re['id_cursos'];
mysql_query("INSERT INTO `bdscom`.`fotos` (`id_fotos` ,`id_institutos` ,`foto` ,`id_cursos`)
VALUES (NULL , NULL, '$nome_imagem', '$f_cod')");
}



if($fun==2){
mysql_query("delete from cursos where id_cursos=$n");
}
if($fun==3){
mysql_query("update cursos SET nome='$nome', info='$info' where id_cursos=$n");
}

	header("Location:cursos.php?fun=ee");
?>