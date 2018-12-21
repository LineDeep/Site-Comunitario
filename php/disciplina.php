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
	</style>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadrastro no Banco</title>
</head>

<body>

<div class="container-fluid">

<div class="row-fluid">


<div class="span4">


<?php if($_GET['fun']!='editar'){ ?>
	<h2>Cadastrar Disciplinas</h2>
	<form method="POST" action="cadasDisciplina.php?fun=1" name="form_inst">
	<table >
		<tr>
			<td><label>Nome:</label></td><td><input type="text" name="nome_d"></td>
		</tr>
		<tr>
			<td><label>Curso:</label></td>
			<td>
				<select name="curso">
					<option></option>
					<?php
					$select=mysql_query("select *from cursos");
					while($rec_select=mysql_fetch_array($select)){
					$nomes=$rec_select['nome'];
					
		?>
					<option> <?php echo "$nomes"; ?></option>
					<?php } ?>
				</select> 
			</td>
		</tr>
		<tr>
		<td><input type="submit" value="Cadastrar" class="btn"></td>
		<td><a href="../index.php?link=7"><input type="button" value="Voltar" class="btn"></a></td>


		</tr>
	</table>
	</form>
	<?php } 
	else if($_GET['fun']=='editar'){ 
		$mn=$_GET['idi'];
		$cresult=mysql_query("select *from disciplinas where id_disciplinas='$mn'");
		$Cnew=mysql_fetch_array($cresult);
		$cnames=$Cnew['id_cursos'];
		$names=$Cnew['nome'];

		?>
	<form method="POST" action="cadasDisciplina.php?fun=3&idi=<?php echo "$mn"; ?>" name="form_inst">
	<table >
	<h2>Alterar Disciplinas</h2>
		<tr>
			<td><label>Nome:</label></td><td><input type="text" name="nome_d" value="<?php echo "$names"; ?>"></td>
		</tr>
		<tr>
			<td><label>Curso:</label></td>
			<td>
				<select name="curso">
					<option><?php  
						$rec_=mysql_fetch_array(mysql_query("select *from cursos where id_cursos='$cnames'"));
						$g=$rec_['nome'];
						echo "$g";
						?>
					</option>
					<?php
					$select=mysql_query("select *from cursos where id_cursos !='$cnames'");
					while($rec_select=mysql_fetch_array($select)){
					$nomes=$rec_select['nome'];
					
		?>
					<option> <?php echo "$nomes"; ?></option>
					<?php } ?>
				</select> 
			</td>
		</tr>
		<tr><td><input type="submit" value="Alterar" class="btn"></td> 
		<td><a href="../index.php?link=7"><input type="button" value="Voltar" class="btn"></a></td></tr>
	</table>
	</form>
	<?php } ?>




</div>


<div class="span8">

	<table class="table table-bordered table-condensed" >
		
<h2>
      Disciplinas Cadastradas
      </h2>

		<thead><tr>
			<th>Codigo</th>
			<th>Nome</th>
			<th>Curso</th>
			<th>Editar</th>
			<th>Eliminar</th>
		</tr></thead>
		<?php
			$select=mysql_query("select *from disciplinas");
			while($rec_select=mysql_fetch_array($select)){
			$cod=$rec_select['id_disciplinas'];
			$nome=$rec_select['nome'];
			$curso=$rec_select['id_cursos'];
			$query=mysql_query("SELECT * FROM cursos WHERE id_cursos='$curso'");
 			$array_query=mysql_fetch_array($query);
			$gv_id=$array_query['nome'];
		?>
		<tbody>
		<tr>
			<td><?php echo "$cod" ?></td>
			<td><?php echo "$nome" ?></td>
			<td><?php echo "$gv_id" ?></td>
			<td><a href="disciplina.php?fun=editar&idi=<?php echo "$cod" ?>"><button class="btn btn-info"><i class="icon-edit icon-white"></i></button></a></td>
			<td><a href="cadasDisciplina.php?fun=2&idi=<?php echo "$cod" ?>"><button class="btn btn-info"><i class="icon-trash icon-white"></i></button></a></td>
			
		</tr>
<?php } ?>

</tbody>
	</table>

</div>

</div>


</body>
</html>			