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
	</style>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadrastro no Banco</title>
</head>

<body>

<div class="container-fluid">

<div class="row-fluid">


<div class="span4">


<?php  if($_GET['fun']!='editar'){ ?>

	<h2>Cadastrar Cursos</h2>
	<form method="POST" action="cadastCurso.php?fun=1" name="form_inst" enctype="multipart/form-data">

	<table >
		<tr><input type="file" name="img"></tr>
		<tr>
			<td><label>Nome:</label></td><td><input type="text" name="nome"></td>
		</tr>
		<tr>
			<td><label>Informação:</label></td><td><textarea name="infor"></textarea> </td>
		</tr>
		<tr><td><input type="submit" value="Cadastrar" class="btn"></td>
		<td><a href="../index.php?link=7"><input type="button" value="Voltar" class="btn"></a></td>

		</tr>
	</table>
	</form>

	<?php }
	else if($_GET['fun']=='editar'){
		$nn=$_GET['idi'];
		$sele_n=mysql_query("select *from cursos where id_cursos=$nn");
		$query_n=mysql_fetch_array($sele_n);
		$names=$query_n['nome'];
		$infor=$query_n['info'];
	 ?>
	 <form method="POST" action="cadastCurso.php?fun=3&idi=<?php echo "$nn"; ?>" name="form_inst">
	 <h2>Alterar Cursos</h2>
	<table >
		<tr>
			<td><label>Nome:</label></td><td><input type="text" name="nome" value="<?php echo "$names"; ?>"></td>
		</tr>
		<tr>
			<td><label>Informação:</label></td><td><textarea name="infor"><?php echo "$infor"; ?></textarea> </td>
		</tr>
		<tr><td><input type="submit" value="Alterar" class="btn"></td>
		<td><a href="../index.php?link=7"><input type="button" value="Voltar" class="btn"></a></td>
		</tr>
	</table>
	</form>
	<?php
}
	?>

</div>

<div class="span8">

<table class="table table-bordered table-condensed">
		
		<h2>
      Cursos Cadastrados
      </h2>
		
		<thead>
		<tr>
			<th>Codigo</th>
			<th>Nome</th>
			<th>Informação</th>
			<th>Editar</th>
			<th>Eliminar</th>
		</tr></thead>
		<?php
			$select=mysql_query("select *from cursos");
			while($rec_select=mysql_fetch_array($select)){
			$cod=$rec_select['id_cursos'];
			$nome=$rec_select['nome'];
			$infor=$rec_select['info'];
		?>

		<tbody>
		<tr>
			<td><?php echo "$cod" ?></td>
			<td><?php echo "$nome" ?></td>
			<td><?php echo "$infor" ?></td>
			<td><a href="cursos.php?fun=editar&idi=<?php echo "$cod" ?>"><button class="btn btn-info"><i class="icon-edit icon-white"></i></button></a></td>
			<td><a href="cadastCurso.php?fun=2&idi=<?php echo "$cod" ?>"><button class="btn btn-info"><i class="icon-trash icon-white"></i></button></a></td>
			
		</tr>
<?php } ?>
</tbody>

	</table>

</div>

</div>



	
	




</body>
</html>			