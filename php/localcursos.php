<?php
$val=$_GET['val'];
include "conn.php";
$new=mysql_query("select *from cursos where id_cursos='$val'");
$result=mysql_fetch_array($new);
$codes=$result['id_cursos'];
$nome=$result['nome'];
$info=$result['info'];
$qery=mysql_query("SELECT i.* FROM inst_curso AS it JOIN institutos AS i ON i.id_institutos = it.id_institutos JOIN cursos AS c ON it.id_cursos = c.id_cursos WHERE c.id_cursos = '$codes'");
$d_query=mysql_query("select *from disciplinas where id_cursos='$codes'");
$nquery=mysql_query("select *from fotos where id_cursos='$codes'");
$nid=mysql_fetch_array($nquery);
$foto=$nid['foto'];
?>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	

	

<img src="fotos/cursos/<?php if (mysql_num_rows($nquery)==0) { echo "curso.jpg"; }
            else{
              echo "$foto";
            }?>" alt="img05" style="width:356px; height:238px; margin:20px; float:left;" class="img-rounded">
	
<div class="curso_local">

	<h4>Curso: <span><?php echo "$nome"; ?></span></h4>
	<h4 style="display:inline-block;" > As disciplinas que este curso tem:<span><?php 
		while ($nova=mysql_fetch_array($d_query)) {
			$d_nome=$nova['nome'];
		?>
	<?php echo "$d_nome"; ?>;
	<?php } ?> </span></h4>
	

	<h4>Institutos que contem este curso:</h4>
	<?php 
		while ($nov=mysql_fetch_array($qery)) {
			$ncod=$nov['id_institutos'];
			$d_ome=$nov['nome'];
		?>
	<a style="display:inline-block;" href="index.php?link=9&new=<?php echo "$ncod"; ?>"><h4><span><?php echo "$d_ome"; ?>; </span></h4></a>

<div class="divop">
     
</p>
	<?php } ?>

	<h4><i class="icon-info-sign"></i> Informações do Curso:</h4><p><?php echo "$info"; ?></p><br>
	<h4><i class="icon-user"></i>Comentarios:</h4><p></p>
	<?php  
	$qn=mysql_query("select *from opinioes where id_cursos='$val' order by id_opinioes desc");
	while ($new_result=mysql_fetch_array($qn)) {
		$cod=$new_result['id_opinioes'];
			$icod=$new_result['id_institutos'];
			$sl=mysql_fetch_array(mysql_query("select *from institutos where id_institutos='$icod'"));
			$inome=$sl['nome'];
			$ccod=$new_result['id_cursos'];
			$sl=mysql_fetch_array(mysql_query("select *from cursos where id_cursos='$ccod'"));
			$cnome=$sl['nome'];
			$email=$new_result['email'];
			$opiniao=$new_result['opiniao'];
			$nome=$new_result['nome'];
			$hash = md5( strtolower( trim( $email ) ) );
			$avatar = "http://www.gravatar.com/avatar/$hash?d=mm&s=100&r=g";
	?>
	<div class="divop">
      
      <p> 
      <img  src="<?php echo "$avatar" ?>" alt="" title="Avatar do Usuário Leonel" />
      <div class="titleop"><?php echo "$nome"; ?>, <?php echo "$email"; ?> </div>
      <p>Comentário para o curso: <span><?php echo "$inome"; ?></span></p> 
<p style="float:left;">Opiniao: <?php echo "$opiniao"; ?></p>
<hr style="margin-top: 45px;"></div>
</p><?php } ?>
	<a href="index.php?link=2&pag=0"><button class="btn">Voltar</button></a></div>
