<?php
include "conn.php";

$foto = $_FILES["img"];
$nome=$_POST['nome'];
$acro=$_POST['acro'];
$local=$_POST['local'];
$qts=$_POST['qts'];
$cts=$_POST['cts'];
$dpi=$_POST['dpi'];
$info=$_POST['info'];
$fun=$_GET['fun'];
$n=$_GET['idi'];
$n_=$_GET['codi'];
if($fun==1){
mysql_query("insert into institutos(nome,localizacao,qtd_salas,criterio_acesso,doc_inscricao,info,acronimo) values('$nome','$local','$qts','$cts','$dpi','$info','$acro')");
$qr=mysql_query("SELECT id_institutos FROM institutos WHERE nome='$nome' and localizacao='$local' and qtd_salas='$qts' and criterio_acesso='$cts' and doc_inscricao='$dpi' and info='$info' and acronimo='$acro' ");
		$largura = 640;
		$altura = 427;
		$dimensoes = getimagesize($foto["tmp_name"]);
	
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}
 
		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
		if (count($error) == 0) {
preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
$caminho_imagem = "../fotos/institutos/" . $nome_imagem;
move_uploaded_file($foto["tmp_name"], $caminho_imagem);

$re=mysql_fetch_array($qr);
$f_cod=$re['id_institutos'];
mysql_query("INSERT INTO `bdscom`.`fotos` (`id_fotos` ,`id_institutos` ,`foto` ,`id_cursos`)
VALUES (NULL , '$f_cod', '$nome_imagem', NULL)");
}
			
}
if($fun==2){
mysql_query("delete from institutos where id_institutos=$n");
}

if ($fun=3) {
	preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
	$caminho_imagem = "../fotos/institutos/" . $nome_imagem;
	move_uploaded_file($foto["tmp_name"], $caminho_imagem);

	mysql_query("update institutos set nome='$nome', localizacao='$local', qtd_salas='$qts', criterio_acesso='$cts', doc_inscricao='$dpi',info='$info',acronimo='$acro' where id_institutos='$n_'");
	mysql_query("UPDATE fotos SET foto = '$nome_imagem' WHERE id_institutos ='$n_'");

}
header('Location:cadastroins.php?fun=e');
?>