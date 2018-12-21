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
	<h2>Cadastrar Administrador</h2>
	<form method="POST" action="cadasAdmin.php?fun=1" name="form_inst">
	<table>
		<tr>
			<td><label>User:</label></td><td><input type="text" name="nome"></td>
		</tr>
		<tr>
			<td><label>Senha:</label></td><td><input type="password" name="senha"> </td>
		</tr>
		<tr>
		<td><input type="submit" value="Cadastrar" class="btn"></td>
		<td><a href="../index.php?link=7"><input type="button" value="Voltar" class="btn"></a></td>

		</tr>
	</table>
	</form>
	<?php }
	if($_GET['fun']=='editar'){
		$na=$_GET['cod'];

		$new_query=mysql_query("select *from admin where id_admin='$na'");
		$new_result=mysql_fetch_array($new_query);
		$users=$new_result['user'];
		$senhas=$new_result['senha'];

	
	?>
	<form method="POST" action="cadasAdmin.php?fun=3&idi=<?php echo "$na" ?>" name="form_inst">
	<h2>
     Alterar Administrador
      </h2>
	<table>
		<tr>
			<td><label>User:</label></td><td><input type="text" name="nome" value=" <?php echo "$users"; ?>"></td>
		</tr>
		<tr>
			<td><label>Senha:</label></td><td><input type="password" name="senha" value="<?php echo "$senhas"; ?>"> </td>
		</tr>
		<tr>
		<td><input type="submit" value="Alterar" class="btn"></td>
		<td><a href="../index.php?link=7"><input type="button" value="Voltar" class="btn"></a></td>

		</tr>
	</table>
	</form><?php } ?>


</div>

<div class="span8">

<table class="table table-bordered table-condensed">
		

		<h2>
      Administrador Cadastrado
      </h2>

      	<thead>
		<tr>
			<th>Codigo</th>
			<th>User</th>
			<th>Senha</th>
			<th>Editar</th>
			<th>Eliminar</th>
		</tr>
		</thead>
		<?php
			$select=mysql_query("select *from admin");
			while($rec_select=mysql_fetch_array($select)){
			$cod=$rec_select['id_admin'];
			$nome=$rec_select['user'];
			$senha=$rec_select['senha'];
		?>

		<tbody>
		<tr>
			<td><?php echo "$cod" ?></td>
			<td><?php echo "$nome" ?></td>
			<td><?php echo "$senha" ?></td>
			<td><a href="admin.php?fun=editar&cod=<?php echo "$cod" ?>"><button class="btn btn-info"><i class="icon-edit icon-white"></i></button></a></td>
			<td><a href="cadasAdmin.php?fun=2&idi=<?php echo "$cod" ?>"><button class="btn btn-info"><i class="icon-trash icon-white"></i></button></a></td>
			
		</tr>
<?php } ?>

</tbody>
	</table>

</div>

</div>



	
</body>
</html>			