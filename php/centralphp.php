<?php

session_start();
 include "conn.php";
 
$usuario= $_SESSION['usuario_liberado'];
$senha  =$_SESSION['senha_liberada'];
 
$select = mysql_query("SELECT * FROM admin where user = '$usuario' and senha='$senha'");
while($listar=mysql_fetch_array($select)){ $nome=$listar['user'];}

if(!isset($_SESSION['usuario_liberado']) and !isset($_SESSION['senha_liberada'])){ header ("Location: http://localhost/_sitecom_/php/login.php");}




?>



	<!-- <div>
		<nav class="menu">
			<ul>
				<li><a href="?page=php/disciplina">Gestão de Disciplina</a></li>
				<li><a href="?page=php/cursos" onclik="<?php $num=1 ?>; result(1);">Gestão de Cursos</a></li>
				<li><a href="?page=php/cadastroins">Gestão de Institutos</a></li>
				<li><a href="?page=php/inst_curso">Gestão de Opiniões Instituições com cursos</a></li>
				<li><a href="?page=php/admin">Gestão de Users</a></li>
			</ul>
		</nav>
	</div>



 -->
	
     
   
<!-- <div id="tabs-container">
    <ul class="tabs-menu">
        <li class="current"><a href="#tab1">Fala</a></li>
    <li><a href="#tab2">Gestão de Disciplinas</a></li>
    <li><a href="#tab3">Gestão de Cursos</a></li>
    <li><a href="#tab4">Gestão de Institutos</a></li>
    <li><a href="#tab5">Gestão de Opiniões (Instituições com cursos)</a></li>
    <li><a href="#tab6">Gestão de Usuarios</a></li>
    </ul>

      
        </div> -->
  
<div class="conteudo_admin">
<div style="height:40px; width:1140px;">
<a href="php/logout.php"><button class="btn btn-warning" style="float:right; margin-top:10px;">Sair da Administração</button></a></div>
		
<a href="php/cursos.php?fun=edi">	<figure class="admin_box">

<img  src="img/fundos/Structure.jpg" class="img-rounded" />
  
  <figcaption>
    
    <h3>Gestão de Cursos</h3>
    <p>Aceder <i class="icon-globe icon-white"></i></p>

  </figcaption>

  <label class="lb_curso" ><i class="icon-cog"></i> Cadastrar Cursos</label>
</figure></a>



<a href="php/cadastroins.php?fun=jjjjj"><figure class="admin_box">

<img src="img/fundos/Structure.jpg" class="img-rounded" />
  
  <figcaption>
    
    <h3>Gestão de Institutos</h3>
    <p>Aceder <i class="icon-globe icon-white"></i></p>

  </figcaption>

   <label class="lb_curso" ><i class="icon-cog"></i> Cadastrar Institutos</label>
</figure></a>


<a href="php/opninidicas.php"><figure class="admin_box">

<img src="img/fundos/Structure.jpg" class="img-rounded" />
  
  <figcaption>
    
    <h3>Gestão de Opiniões & Gestão do Fale</h3>
    <p>Aceder <i class="icon-globe icon-white"></i></p>

  </figcaption>

<label class="lb_curso" >Gestão de Opinioes & Gestão do Fale <i class="icon-bullhorn"></i></label>

</figure></a>


<a href="php/disciplina.php?fun=uuu"><figure class="admin_box">

<img src="img/fundos/Structure.jpg" class="img-rounded" />
  
  <figcaption>
    
    <h3>Gestão de Disciplinas</h3>
    <p>Aceder <i class="icon-globe icon-white"></i></p>

  </figcaption>

  <label class="lb_curso" ><i class="icon-book"></i> Cadastrar Disciplinas</label>
</figure></a>

<a href="php/admin.php?fun=edi"><figure class="admin_box">

<img src="img/fundos/Structure.jpg" class="img-rounded" />
  
  <figcaption>
    
    <h3>Gestão de Usuarios</h3>
    <p>Aceder <i class="icon-globe icon-white"></i></p>

  </figcaption>

  <label class="lb_curso" >Cadastrar de Usuarios <i class="icon-user"></i></label>
</figure></a>

<a href="php/inst_curso.php?fun=aaa"><figure class="admin_box">
<img src="img/fundos/Structure.jpg" class="img-rounded" />
  
<figcaption>
    
    <h3>Gestão de Cursos & Institutos</h3>
    <p>Aceder <i class="icon-globe icon-white"></i></p>

  </figcaption>

  <label class="lb_curso" >Cadastrar Institutos e Cursos <i class="icon-cog"></i></label>
</figure></a>
  


</div>