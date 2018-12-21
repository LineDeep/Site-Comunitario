<?php
include "conn.php";
$id=$_GET['new'];
$sel=mysql_query("select *from institutos where id_institutos=$id");
$select=mysql_fetch_array($sel);
$codes=$select['id_institutos'];
$nome=$select['nome'];
$local=$select['localizacao'];
$qtd=$select['qtd_salas'];
$cta=$select['criterio_acesso'];
$doc=$select['doc_inscricao'];
$info=$select['info'];
$acro=$select['acronimo'];

$f_qr=mysql_query("select *from fotos where id_institutos='$codes'");
			$r_resul=mysql_fetch_array($f_qr);
			$nom=$r_resul['foto'];

?>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


	

<img src="fotos/institutos/<?php if (mysql_num_rows($f_qr)==0){echo "padrao.png";}
						else{
							echo "$nom";
						}

  ?>" alt="img05" style="width:356px; height:238px; margin:20px; float:left;" class="img-rounded">

<div class="instituto_local">	

<h4>Instituto: <span><?php echo "$nome"; ?></span></h4>
<h4>Acronimo: <span><?php echo "$acro"; ?></span></h4>
<h4>Neste Instituto tem os seguintes cursos:</h4>
<?php 
	$qery=mysql_query("SELECT c.* FROM inst_curso AS it JOIN institutos AS i ON i.id_institutos = it.id_institutos JOIN cursos AS c ON it.id_cursos = c.id_cursos WHERE i.id_institutos = '$codes'");	
	while ($query=mysql_fetch_array($qery)) {
		    $ncod=$query['id_cursos'];
			$c_nome=$query['nome'];
 ?>
 <a style="display:inline-block;"  href="index.php?link=8&val=<?php echo "$ncod"; ?>"><h4><i class="icon-ok"></i> <?php echo "$c_nome" ?>  </h4></a>
 <?php } ?>

<h4><i class="icon-map-marker"></i> Localização: <span><a href="<?php echo "$local"; ?>">Clique para Localizar</a></span></h4>
<h4>Quantidades de Salas: <span><?php echo "$qtd"; ?></span></h4>
<h4>Critério Para entrar: <span><?php echo "$cta"; ?></span></h4>
<h4><i class="icon-book"></i> Documentos Para inscrição: <span><?php echo "$doc"; ?></span></h4>
<h4><i class="icon-info-sign"></i> Informação:</h4><p><?php echo "$info"; ?></p><br/>
<h4><i class="icon-info-sign"></i> Comentarios	:</h4><br/>
<?php 
	$qn=mysql_query("select *from opinioes where id_institutos='$id' order by id_opinioes desc ");
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
      <p>Comentário para o Instituto: <span><?php echo "$inome"; ?></span></p> 
<p style="float:left;">Opiniao: <?php echo "$opiniao"; ?></p>
<hr style="margin-top: 45px;"></div>
</p>
<?php } ?>

<a href="index.php?link=3&pag1=0"><button class="btn">Voltar</button></a>
</div>