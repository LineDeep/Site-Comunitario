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
		width: 1100px;
		margin: auto;
		
	}

	h2{ text-align: center; }
	</style>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadrastro no Banco</title>
</head>

<body>

<h2>Gestão de Opiniões</h2>
<table class="table table-bordered table-condensed">
<thead>
	<tr>
	<th>Codigo</th>
	<th>Institutos</th>
	<th>Cursos</th>
	<th>Email</th>
	<th>Opinião</th>
	<th>Nome</th>
	<th>Eliminar</th>
	</tr>
	</thead>
	<?php
	$q=mysql_query("select *from opinioes");
		while ($result=mysql_fetch_array($q)) {
			$cod=$result['id_opinioes'];
			$icod=$result['id_institutos'];
			$sl=mysql_fetch_array(mysql_query("select *from institutos where id_institutos='$icod'"));
			$inome=$sl['nome'];
			$ccod=$result['id_cursos'];
			$sl=mysql_fetch_array(mysql_query("select *from cursos where id_cursos='$ccod'"));
			$cnome=$sl['nome'];
			$email=$result['email'];
			$opiniao=$result['opiniao'];
			$nname=$result['nome'];
		?>
		<tbody>
	<tr>
		<td><?php echo "$cod"; ?></td>
		<td><?php echo "$inome"; ?></td>
		<td><?php echo "$cnome"; ?></td>
		<td><?php echo "$email"; ?></td>
		<td><?php echo "$opiniao"; ?></td>
		<td><?php echo "$nname"; ?></td>
		<td><a href="cadasopninidicas.php?fun=1&idi=<?php echo "$cod" ?>"><button class="btn btn-info"><i class="icon-trash icon-white"></i></button></a></td>
		<td>

	</tr>
<?php } ?>
</tbody>
</table>
<h2>Gestão de Dicas</h2>
<table class="table table-bordered table-condensed">
<thead>
	<tr>
		<th>Codigo</th>
		<th>Nome</th>
		<th>Email</th>
		<th>Assunto</th>
		<th>Mensagem</th>
		<th>Eliminar</th>
	</tr>
	</thead>
	<?php 
	$qn=mysql_query("select *from fala order by assunto");
	while ($new_result=mysql_fetch_array($qn)) {
		$fcod=$new_result['id'];
		$fnome=$new_result['nome'];
		$femail=$new_result['email'];
		$fassunto=$new_result['assunto'];
		$fsms=$new_result['sms'];

	?>
	<tbody>
	<tr>
		<td><?php echo "$fcod"; ?></td>
		<td><?php echo "$fnome"; ?></td>
		<td><?php echo "$femail"; ?></td>
		<td><?php echo "$fassunto"; ?></td>
		<td><?php echo "$fsms"; ?></td>
		<td><a href="cadasopninidicas.php?fun=2&idi=<?php echo "$fcod" ?>"><button class="btn btn-info"><i class="icon-trash icon-white"></i></button></a></td>
		<td>

	</tr>
	<?php } ?>

	</tbody>
</table>

<a href="../index.php?link=7"><input type="button" value="Voltar" class="btn btn-info" style="margin-bottom:20px;"></a>

</body>
</html>			