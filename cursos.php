<?php include "php/conn.php"; ?>

 <meta http-equiv="content-Type" content="text/html; charset=utf-8" />

<div id="content_header">

<div class="box" method="POST">
<form action="" method="POST">

<input type="text" class="curso_search" placeholder="Pesquisar" name="filtro">

<button type="submit" name="botao" class="btn btn-default">Pesquisar</button>
</form>
</div>
</div>

<div id="conteudo_curso">

<ul class="grid cs-style-4">
  <?php
  if(isset($_POST['botao'])){
    $busca = $_POST['filtro'];

    $busca_divida = explode(' ',$busca);
    $busca = count($busca_divida);

    for($i=0;$i<$busca;$i++){

        $pesquisa = $busca_divida[$i];

        $sql = mysql_query("select *from cursos where nome like '%$pesquisa%' ");
        while($linha = mysql_fetch_array($sql)){
          $cods=$linha['id_cursos'];
          $f_qr=mysql_query("select *from fotos where id_cursos='$cods'");
          $r_resul=mysql_fetch_array($f_qr);
          $fotoe=$r_resul['foto'];

   
        $nome=$linha['nome'];
        $nov=$linha['info'];
        $infoo= substr($nov,0,200);

        ?>
        <?php ?>
        <li>
          <figure>
            <div><img src="fotos/cursos/<?php if (mysql_num_rows($f_qr)==0) { echo "curso.jpg"; }
            else{
              echo "$fotoe";
            }?>" alt="img05"></div>
            <figcaption>
              <h3><?php echo "$nome"; ?></h3>
              <span><?php echo "$infoo..."; ?></span>
              <a href="index.php?link=8&val=<?php echo "$cods"; ?>">Saiba + </a>
            </figcaption>
          </figure>
          <?php
          }}}

  if (0==$_GET['pag']) {
    # code...

      $inicio="0";
      $termina="3";
  }
  
  if (1==$_GET['pag']) {
    # 

     $inicio="3";
      $termina="3";
  }if (2==$_GET['pag']) {
    # 

     $inicio="9";
      $termina="3";
  }
  if(isset($_POST['botao'])){}
    else{
    $query=mysql_query("select *from cursos order by id_cursos desc limit $inicio,$termina");
    while ($result=mysql_fetch_array($query)) {
      $cod=$result['id_cursos'];
      $nome=$result['nome'];
      $info=substr($result['info'],0,200);
      $f_qr=mysql_query("select *from fotos where id_cursos='$cod'");
      $r_resul=mysql_fetch_array($f_qr);
      $foto=$r_resul['foto'];
    
  ?>
        <li>
          <figure>
            <div><img src="fotos/cursos/<?php if (mysql_num_rows($f_qr)==0) { echo "curso.jpg"; }
            else{
              echo "$foto";
            }?>" alt="img05"></div>
            <figcaption>
              <h3><?php echo "$nome"; ?></h3>
              <span><?php echo "$info..."; ?></span>
              <a href="index.php?link=8&val=<?php echo "$cod"; ?>">Saiba + </a>
            </figcaption>
          </figure>
          <label class="lb_curso"><?php echo "$nome"; ?></label>


          <?php }} ?>

    
    </div>


 <div class="paginacao">
    <ul>
  <li><a href="http://localhost/_sitecom_/index.php?link=2&pag=0">«</a></li>
  <li><a class="<?php 
  if (0==$_GET['pag']) {
    echo "active";
  }
  else{
    echo "none";
  }
   ?>"  href="http://localhost/_sitecom_/index.php?link=2&pag=0">1</a></li>
  <li><a class="<?php 
  if (1==$_GET['pag']) {
    echo "active";
  }
  else{
    echo "none";
  }
   ?>"  href="http://localhost/_sitecom_/index.php?link=2&pag=1">2</a></li>
  <li><a class="<?php 
  if (2==$_GET['pag']) {
    echo "active";
  }
  else{
    echo "none";
  }
   ?>" href="http://localhost/_sitecom_/index.php?link=2&pag=2">3</a></li>
  <li><a href="http://localhost/_sitecom_/index.php?link=2&pag=2">»</a></li>
</ul>

<script src="js/toucheffects.js"></script>
</div>


