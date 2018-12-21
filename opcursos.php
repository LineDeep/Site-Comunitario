
<?php include "php/conn.php"; ?>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<h2 style="color: rgb(0, 159, 229);
font-family: 'Webfont'; font-size: 24.5px;font-weight: 200;
width: 910px;
border-bottom: 2px solid rgb(0, 159, 229);
margin-top: 20px;
margin-left: 98px;
margin-bottom: 30px;">Sistema de Comentário</h2>
<?php 
	$qn=mysql_query("select *from opinioes where id_cursos!=false order by id_opinioes desc");
	while ($new_result=mysql_fetch_array($qn)) {
		$cod=$new_result['id_opinioes'];
			//$icod=$new_result['id_institutos'];
			//$sl=mysql_fetch_array(mysql_query("select *from institutos where id_institutos='$icod'"));
			//$inome=$sl['nome'];
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
      <p>Comentário para o curso: <span><a href="http://localhost/_sitecom_/index.php?link=8&val=<?php echo "$ccod"; ?>"><?php echo "$cnome"; ?></a></span></p> 
<p style="float:left;">Opiniao: <?php echo "$opiniao"; ?></p>
<hr style="margin-top: 45px;"></div>
</p>
<?php } ?>



<div class="article2"> 

<h2>Deixe a sua opinião: </h2>

<form action="copinstitutos.php?h=2" method="POST">
	<label>Nome:</label><input class="input-xxlarge" type="text" name="nome">
	<label>Email:</label><input class="input-xxlarge" type="text" name="email">
	<label>Sobre que cursos queres opinar?:</label><select style="width:554px; height:30px;" name="sobre">
	<option></option>
	<?php  
	$t=mysql_query("select *from cursos");
	while ($selt=mysql_fetch_array($t)) {
	$inomes=$selt['nome'];
		
	?>
	<option><?php echo "$inomes"; ?></option>
<?php } ?>
	</select>
	<label>Opine:</label><textarea style="width:700px; height:150px;" name="opiniao"></textarea><br>
	<input type="submit" name="" value="Comentar" class="btn btn-info" >

</form>
