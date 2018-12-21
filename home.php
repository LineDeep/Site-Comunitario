


<div id="home">

<section id="corpo">

<article class="noticia-principal"> 

<h2>&gt Mensagem de boas-vindas</h2>

<p><span>“</span> Com certeza, você já ouviu falar do SCOM, mas talvez ainda não saiba o quanto ela está trabalhando para você. Após a repercussão em sua versão beta, o SCOM reformulou o site do Programa Site Comunitário, que vai continuar disponibilizando, gratuitamente, materiais relacionados ao ensino médio para complementar seus estudos. Você também poderá avaliar seus conhecimentos a partir dos testes e simulados.

Este portal é seu! Aproveite esse espaço para aperfeiçoar seus estudos! Estamos felizes por ter você conosco!</p>


<p>Acreditamos que uma sociedade civil fortalecida é vital para uma comunidade mais humana, justa e democrática. Vemos nas pessoas os verdadeiros protagonistas de mudanças sociais. São elas, quando envolvidas em grupos, movimentos e organizações da sociedade civil, que potencializam, em rede, ações voltadas ao bem comum. Juntas e articuladas, respondem de forma rápida e inovadora aos problemas sociais.
</p>


<p>Reconhecemos que tanto pessoas que querem fazer a diferença quanto instituições éticas e transparentes precisam ser valorizadas, conhecidas e fortalecidas. O SCOM é o site que potencializa o trabalho dessas pessoas e organizações. Se você também acredita nestas ideias, vamos juntos? <span>”</span> </p> 


</article>


</section>

<aside id="lateral">

<h2>&gt Cursos em destaque</h2>
<?php  
include "php/conn.php";
  $te=mysql_query("SELECT * FROM cursos ORDER BY id_cursos DESC LIMIT 0 , 3");
  $count=3;
  while ( $selt=mysql_fetch_array($te)) {
    $coder=$selt['id_cursos'];
  $inomes=$selt['nome'];
  $inf=$selt['info'];
  $infor=substr($inf,0, 60);
   $terra=mysql_query("SELECT * FROM fotos where id_cursos='$coder'");
  $terras=mysql_fetch_array($terra);
  $fotoss=$terras['foto'];
  ?>
  <div class="center_right">
      
      <p style="text-align: justify; line-height: 17px; margin: 10px 10px; width: 350px;"> <img src="fotos/cursos/<?php if (mysql_num_rows($terra)==0) { echo "curso.jpg"; }
            else{
              echo "$fotoss";
            }?>" alt="" style="float: left;width: 75px; height: 75px; margin-right: 15px;"><div class="title"><?php echo "$inomes"; ?></div> <?php echo "$infor..."; ?> <a href="http://localhost/_sitecom_/index.php?link=8&val=<?php echo "$coder"; ?>" class="read_more">saiba mais</a> 
</p></div>
<?php }
?>

</aside>

</div>

<div class="dp_container">
<h2>&gt Institutos em destaque</h2>

<div class="row">
  <div class="col-sm-6">
 
    <!-- normal -->
    <?php
    $iquery=mysql_query("SELECT * FROM institutos ORDER BY id_institutos DESC LIMIT 0 , 3") ;
    while ($resol=mysql_fetch_array($iquery)) {
      $cod=$resol['id_institutos'];
      $f_qr=mysql_query("select *from fotos where id_institutos='$cod'");
      $r_resul=mysql_fetch_array($f_qr);
      $nn=$r_resul['foto'];
        $nomer=$resol['nome'];
        $c=$resol['id_institutos'];
        $acro=$resol['acronimo'];
        $institutosd=$resol['info'];
        $inform=substr($institutosd,0, 100);
    
    ?>
    <div class="ih-item square effect15 top_to_bottom"><a href="http://localhost/_sitecom_/index.php?link=9&new=<?php echo "$c"; ?>">
        <img src="fotos/institutos/<?php 
            if (mysql_num_rows($f_qr)==0){echo "padrao.png";}
            else{
              echo "$nn";
            }


             ?>" alt="img">
        <div class="info">
          <h3><?php echo "$acro";  ?></h3>
          <p><?php echo "$inform"; ?></p>
        </div>
        </a></div>
        
        <?php }?>
    <!-- end normal -->
 
 
<!--

<div class="row">
  <div class="col-sm-6">
 
    <!-- normal -->
    <!--<div class="ih-item square effect15 top_to_bottom"><a href="#">
        <img src="img/2.jpg" alt="img">
        <div class="info">
          <h3>Heading here</h3>
          <p>Description goes here</p>
        </div></a></div>
    <!-- end normal -->
 <!--
  </div>


  <div class="row">
  <div class="col-sm-6">
 
    <!-- normal -->
    <!--<div class="ih-item square effect15 top_to_bottom"><a href="#">
        <img src="img/2.jpg" alt="img">
        <div class="info">
          <h3>Heading here</h3>
          <p>Description goes here</p>
        </div></a></div>
    <!-- end normal -->
 
  <!--</div>


-->
</div>

</div>

</div>

<!-- 
<figure id="destaquePost">

<img src="img/fundos/curso.jpg" />

<figcaption>
	<h3>Lorem ipsum</h3>
	<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim.<a href="#">Saiba +</a></p>
</figcaption>

</figure>

<figure id="destaquePost">

<img src="img/fundos/curso.jpg" />

<figcaption>
	<h3>Lorem ipsum</h3>
	<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim.<a href="#">Saiba +</a></p>
</figcaption>

</figure>

<figure id="destaquePost">

<img src="img/fundos/curso.jpg" />

<figcaption>
	<h3>Lorem ipsum</h3>
	<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim.<a href="#">Saiba +</a></p>
</figcaption>

</figure>

<figure id="destaquePost">

<img src="img/fundos/curso.jpg" />

<figcaption>
	<h3>Lorem ipsum</h3>
	<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim.<a href="#">Saiba +</a></p>
</figcaption>

</figure>
</div> -->