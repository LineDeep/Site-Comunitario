<?php


Header( "HTTP/1.1 301 Moved Permanently" );



?>


<!DOCTYPE html>
<html>
<head>

	<script type="text/javascript" src="text/jjquery.182min.js"></script>
	<script type="text/javascript" src="text/jquery.quick.search.js"></script>
	<title>Site Comunitário</title>

	<meta http-equiv="content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Site Comunitario">

	<meta name="view-port" content="width=device-width , initial-scale=1" />

<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="css/ihover.css" />
<link rel="stylesheet" href="css/ihover.min.css" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.css" />
<script src="js/modernizr.custom.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script src="js/app.js"></script>
<script type="text/javascript" src="engine1/jquery.js"></script>

 <!-- <script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js">window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script> -->


</head>
<body>



<div id="container">
	

<header id="cabecalho"><?php include "header.php"; ?></header>

<div id="wowslider-container1">
<div class="ws_images"><ul>
    <li><img src="data1/images/educacao.png" alt="" title="" id="wows1_0"/></li>
    <li><a href=""><img src="data1/images/viradadaeducacaopesquisajovens.jpg" alt="" title="" id="wows1_1"/></a></li>
    <li><img src="data1/images/concursoiberoamericanoincorporaciondetecnologiasenlasescuelas.jpg" alt="" title="" id="wows1_2"/></li>
  </ul></div>
<div class="ws_script" style="position:absolute;left:-99%"><a href="">http://wowslider.com/</a> by WOWSlider.com v8.7</div>
<div class="ws_shadow"></div>
</div>  
<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>


<div id="conteudo">

<?php

$link = $_GET['link'];
	
	$page[1]= "home.php";
	$page[2]= "cursos.php";
	$page[3]= "institutos.php";
	$page[4]= "blog.php";
	$page[5]= "sobre.php";
	$page[6]= "fale.php";
	$page[7]= "php/centralphp.php";
	$page[8]= "php/localcursos.php";
	$page[9]= "php/localinstitutos.php";
	$page[10]= "opcursos.php";
	$page[11]= "opinstitutos.php";
	
	if(!empty($link)){
		
		if(file_exists($page[$link])){
			include $page[$link];
			}
			
		else{
			print "A Página não foi Localizada!";
			}
		
		}





  ?></div>

<footer id="rodape"><?php include "footer.php"; ?></footer>



</div>





</body>
</html>