<?php include "conn.php"; ?>
<!doctype html>
<head>
	<style type="text/css">
	#ner td{
		padding: 5px;
	}
	</style>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadrastro no Banco</title>
</head>

<body>
	<h1>Conexão entre Institutos e Cursos</h1>
	<form method="POST" action="cadasInst_curso.php?fun=1" name="form_inst">
	<table >
		<tr>
			<td><label>Instituto:</label></td><td>
				<select name="instos">
					<option></option>
					<?php
						$query_institutos=mysql_query("SELECT * FROM `institutos` WHERE 1");
							while ($result_institutos=mysql_fetch_array($query_institutos)) {
								$value=$result_institutos['nome']; 
						
						 
					?>
					<option><?php echo "$value"; ?></option>
					<?php } ?>
				</select>
			</td>
			</tr>
			<tr>
			<td><label>Curso:</label></td>
			<td>
				<select name="cursos">
					<option></option>
					<?php
						$query_cursos=mysql_query("SELECT * FROM `cursos` WHERE 1");
							while ($result_cursos=mysql_fetch_array($query_cursos)) {
								$values=$result_cursos['nome']; 
					?>
					<option><?php echo "$values"; ?></option>
					<?php } ?>
				</selecct>
			</td>
			<tr><td><input type="submit" value="Cadastrar"></td></tr>
			</tr>
		</table>

			<table id="ner">
				<tr><a href="http://localhost/_sitecom_/index.php?link=7"><input type="button" value="Voltar"></a></tr>
				<tr>
					<td>Codigo</td>
					<td>Institutos</td>
					<td>Cursos</td>
				</tr>
				<?php
					$query_inscur=mysql_query("SELECT * FROM `inst_curso` WHERE 1");
						while($result_inscur=mysql_fetch_array($query_inscur)){
						$ving=$result_inscur['id_inst_curso'];
						$curs=$result_inscur['id_cursos'];
						$inst=$result_inscur['id_institutos'];
						$query_instittos=mysql_query("SELECT * FROM `institutos` WHERE id_institutos=$inst");
						$result_instittos=mysql_fetch_array($query_instittos);
						$valus=$result_instittos['nome'];
						$query_curos=mysql_query("SELECT * FROM `cursos` WHERE id_cursos=$curs");
						$result_curos=mysql_fetch_array($query_curos);
						$vals=$result_curos['nome'];
					  
				?>
				<tr>
					<td><?php echo "$ving"; ?></td>
					<td><?php echo "$valus"; ?></td>
					<td><?php echo "$vals"; ?></td>
					<td><a href="cadasInst_curso.php?fun=2&idi=<?php echo "$ving"; ?>">Eliminar</a></td>
				</tr>
				<?php } ?>
			</table>
			

				</body>
				</html>