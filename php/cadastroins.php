<?php include "conn.php"; ?>
<!doctype html>
<head>
<link rel="stylesheet" type="text/css" href="../css/main.css"> 
<link rel="stylesheet" href="../css/bootstrap.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.css" />

	<style type="text/css">
	 body{
		background: none;
		background-color: #f5f5f5;
	}

	h2{ color: #49afcd; font-size: 25px;  }

	@font-face{ font-family:'Webfont'; src:url(../fonts/webfont.woff);}

	</style>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadrastro de Institutos</title>
</head>

<body>

<div class="container-fluid">

<div class="row-fluid">


<div class="span4">
	
<?php
	if ($_GET['fun']!="editar") {
	?>
<h2>Cadastrar Institutos</h2>
	<form method="POST" action="cadasInstituto.php?fun=1" name="form_inst" enctype="multipart/form-data" class="form-inline">
	<table>
	<tr><div class="control-group">
	<td><label class="control-label">Foto:</label></td>
	<td><input type="file" name="img"/></td>
	</div></tr>

	<tr>
	<div class="control-group">
	<td><label class="control-label">Nome:</label></td>
	<td><input type="text" name="nome"></td>
	</div></tr>

	<tr>
	<div class="control-group">
	<td><label class="control-label">Acrônimo:</label></td>
	<td><input type="text" name="acro" ></td>
	</div></tr>

	<tr>
	<div class="control-group">
	<td><label class="control-label">Localização:</label></td>
	
	<td><textarea name="local"></textarea></td></div></tr>
	
     <tr>
	<div class="control-group">
	<td><label class="control-label">Quantidade de Salas:</label></td>
	<td><input type="text" name="qts"></td>
	</div></tr>

	<tr>
	<div class="control-group">
	<td><label class="control-label">Critério de Acesso:</label></td>

	<td><textarea name="cts"></textarea></td></div></tr>
	
	<tr>
	<div class="control-group">
	<td><label class="control-label">Documento para Inscrição:</label></td>
	<td><textarea name="dpi"></textarea></td></div></tr>

	<tr>
	<div class="control-group">
	<td><label class="control-label">Informação:</label></td>
	
	<td><textarea type="text" name="info"></textarea></td></div></tr>
	
	<tr><td><input type="submit" value="Cadastrar" class="btn"></td>
	<td><a href="../index.php?link=7"><input type="button" value="Voltar" class="btn"></a></td></tr>

	</table>
</form>

<?php
}
	if($_GET['fun']=="editar"){
		$E_=$_GET['idi'];
		//$new_query=mysql_query("select *from institutos where id_institutos='$E_'");
		$new_result=mysql_fetch_array(mysql_query("select *from institutos where id_institutos='$E_'"));
		$new_name=$new_result['nome'];
		$new_local=$new_result['localizacao'];
		$new_sala=$new_result['qtd_salas'];
		$new_acesso=$new_result['criterio_acesso'];
		$new_doc=$new_result['doc_inscricao'];
		$new_info=$new_result['info'];
		$new_acro=$new_result['acronimo'];
		$new_cod=$new_result['id_institutos'];
?>
<form method="POST" enctype="multipart/form-data" action="cadasInstituto.php?fun=3&codi=<?php echo "$new_cod"; ?>" name="form_inst">
<h2>Alterar Institutos</h2>
	<table>
		<tr><div class="control-group">
		<td><label class="control-label">Foto:</label></td>
		<td><input type="file" name="img"/></td></div></tr>

		<tr><div class="control-group">
			<td><label class="control-label">Nome:</label></td>
			<td><input type="text" name="nome" value="<?php echo "$new_name"; ?>"></td></div>
		</tr>

		<tr><div class="control-group">
			<td><label class="control-label">Acrônimo:</label></td>
			<td><input type="text" name="acro" value="<?php echo "$new_acro"; ?>"></td></div>
		</tr>

		<tr><div class="control-group">
			<td><label class="control-label">Localização:</label></td>
			<td><textarea name="local"><?php echo "$new_local"; ?></textarea> </td></div>
		</tr>

		<tr><div class="control-group">
			<td><label class="control-label">Quantidade de Salas:</label></td>
			<td><input type="text" name="qts" value="<?php echo "$new_sala"; ?>"></td></div>
		</tr>

		<tr><div class="control-group">
			<td><label class="control-label">Critério de Acesso:</label></td>
			<td><textarea name="cts" ><?php echo "$new_acesso"; ?></textarea></td></div>
		</tr>

		<tr><div class="control-group">
			<td><label class="control-label">Documento para Inscrição:</label></td>
			<td><textarea name="dpi"><?php echo "$new_doc"; ?></textarea></td></div>
		</tr>

		<tr><div class="control-group">
			<td><label class="control-label">Infomação:</label></td>
			<td><textarea type="text" name="info"><?php echo "$new_info"; ?></textarea></td></div>

		</tr>

		<tr>
			<td><input type="submit" value="Alterar" class="btn"></td>
			<td><a href="../index.php?link=7"><input type="button" value="Voltar" class="btn"></a></td>
		</tr>

	</table>
</form>
<?php } ?>
</div>



<div class="span8">
	<?php
$select=mysql_query("select *from institutos order by id_institutos desc");
?>
<table class="table table-bordered table-condensed">
	

	<h2>
      Institutos Cadastrados
      </h2>

	<thead>
	<tr>
		<th>Codigo</th>
		<th>Acrônimo</th>
		<th>Nome</th>
		<th>Localização</th>
		<th>Quantidades de Salas</th>
		<th>Critério de Acesso</th>
		<th>Documento para Inscrição</th>
		<th>Informação</th>
		<th>Editar</th>
		<th>Eliminar</th>

	</tr>
    </thead>

	<?php
	while($rec_select=mysql_fetch_array($select)){
	$cod=$rec_select['id_institutos'];
	$acro=$rec_select['acronimo'];
	$nome=$rec_select['nome']; 
	$local=$rec_select['localizacao'];
	$qts=$rec_select['qtd_salas'];
	$cts=$rec_select['criterio_acesso'];
	$dpi=$rec_select['doc_inscricao'];
	$info=$rec_select['info'];
	?>

	<tbody>
	<tr>
		<td><?php echo "$cod"; ?></td>
		<td><?php echo "$acro"; ?></td>
		<td><?php echo "$nome"; ?></td>
		<td><?php echo "$local"; ?></td>
		<td><?php echo "$qts"; ?></td>
		<td><?php echo "$cts"; ?></td>
		<td><?php echo "$dpi"; ?></td>
		<td><?php echo "$info"; ?></td>
		<td><a href="cadastroins.php?fun=editar&idi=<?php echo "$cod" ?>"><button class="btn btn-info"><i class="icon-edit icon-white"></i></button></a></td>
		<td><a href="cadasInstituto.php?fun=2&idi=<?php echo "$cod" ?>"><button class="btn btn-info"><i class="icon-trash icon-white"></i></button></a></td>
	</tr>
	<?php } ?>
	</tbody>

</table>
</div>




</div>
	



</div>
</body>

</html>