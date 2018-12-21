<?php include "php/conn.php"; 

?>



<div id="content_header">

<div class="box" method="POST">
<form action="" method="POST">
<input type="text" class="instituto_search" placeholder="Pesquisar" name="filtro">

<button type="submit" name="botao" class="btn btn-default">Pesquisar</button>
</form>
</div>
</div>

<div id="conteudo_instituto">

<ul class="grid cs-style-4">
	<?php 
	if(isset($_POST['botao'])){
    $busca = $_POST['filtro'];

    $busca_divida = explode(' ',$busca);
    $busca = count($busca_divida);

    for($i=0;$i<$busca;$i++){

        $pesquisa = $busca_divida[$i];

        $sqls = mysql_query("select * from institutos where nome like '%$pesquisa%' ");
        		while($linha = mysql_fetch_array($sqls)){
          $cods=$linha['id_institutos'];
          $f_eqr=mysql_query("select *from fotos where id_institutos='$cods'");
          $r_result=mysql_fetch_array($f_eqr);
          $fotoe=$r_result['foto'];
			$nomi=$linha['nome'];
			$acrone=$linha['acronimo'];
			$informa=substr($linha['info'],0,100);

   
        $nome=$linha['nome'];
        $info=$linha['info'];
        ?>
        <?php ?>
        <li>
          <figure>
					<div>
						<img alt="img06"  src="fotos/institutos/<?php 
						if (mysql_num_rows($f_eqr)==0){echo "padrao.png";}
						else{
							echo "$fotoe";
						}


						 ?>"  ></div>
						<figcaption>
							<h3><?php echo "$acrone"; ?></h3>
							<span><?php echo "$informa..."; ?></span>
							<a href="index.php?link=9&new=<?php echo "$cods" ?>">Saiba +</a>
						</figcaption>
					</figure>
					<label class="lb_curso"><?php echo "$nome"; ?></label>
				</li>
          <?php
          }}}

	if (0==$_GET['pag1']) {
		# code...

  		$inicio="0";
  		$termina="3";
	}
	
	if (1==$_GET['pag1']) {
		# 

 		 $inicio="3";
  		$termina="3";
	}if (2==$_GET['pag1']) {
		# 

 		 $inicio="9";
  		$termina="3";
	}
	if(isset($_POST['botao'])){}
		else{
		$que=mysql_query("select * from institutos order by id_institutos desc limit $inicio,$termina");
		while ($query=mysql_fetch_array($que)) {
			$cod=$query['id_institutos'];

			$f_qr=mysql_query("select *from fotos where id_institutos='$cod'");
			$r_resul=mysql_fetch_array($f_qr);
			
			$f_nome=$r_resul['foto'];
			$nome=$query['nome'];
			$acro=$query['acronimo'];
			$info=substr($query['info'],0,100); 		
	?>
				<li>

					<figure>
					<div>
						<img alt="img06" width="640px" height="427px"  src="fotos/institutos/<?php 
						if (mysql_num_rows($f_qr)==0){echo "padrao.png";}
						else{
							echo "$f_nome";
						}


						 ?>"  ></div>
						<figcaption>
							<h3><?php echo "$acro($nome)"; ?></h3>
							<span><?php echo "$info..."; ?></span>
							<a href="index.php?link=9&new=<?php echo "$cod" ?>">Saiba +</a>
						</figcaption>
					</figure>
					<label class="lb_curso"><?php echo "$nome"; ?></label>
				</li>
				<?php } }?>

<div class="paginacao">
    <ul>
  <li><a href="http://localhost/_sitecom_/index.php?link=3&pag1=0">«</a></li>
  <li><a class="<?php 
  if (0==$_GET['pag1']) {
  	echo "active";
  }
  else{
  	echo "none";
  }
   ?>" href="http://localhost/_sitecom_/index.php?link=3&pag1=0">1</a></li>
  <li><a class="<?php 
  if (1==$_GET['pag1']) {
  	echo "active";
  }
  else{
  	echo "none";
  }
   ?>" href="http://localhost/_sitecom_/index.php?link=3&pag1=1">2</a></li>
  <li><a class="<?php 
  if (3==$_GET['pag1']) {
  	echo "active";
  }
  else{
  	echo "none";
  }
   ?>" href="http://localhost/_sitecom_/index.php?link=3&pag1=2"">3</a></li>

  <li><a href="http://localhost/_sitecom_/index.php?link=3&pag1=1">»</a></li>
</ul>

</div>
