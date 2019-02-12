<?php
	header('Content-Type: text/html; charset=UTF-8');
        include 'inc/db.php';
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <link rel="icon" type="image/png" href="img/icon.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/estilos.css">
    <title>Revista alimentaria</title>    
  </head>
  <body>
      
      <?php include './includes/cabecera.php';
      
      $hoy=date("Ymd");
      /*$sql='SELECT noticias_alimentaria.*, categorias_alimentaria.nombre FROM noticias_alimentaria, categorias_alimentaria WHERE noticias_alimentaria.idcatego=categorias_alimentaria.idcatego AND '
              . 'noticias_alimentaria.orden=1 OR noticias_alimentaria.orden=2 OR noticias_alimentaria.orden=3 OR noticias_alimentaria.orden=4 GROUP BY noticias_alimentaria.orden ';*/
      
      if(isset($_GET['id'])){
        if($_GET['id']){
            $sql="SELECT noticias.*, categorias.nombre,fotos_noticias.titulo as titulo_foto, fotos_noticias.alt as alt FROM noticias, categorias, fotos_noticias WHERE noticias.idcatego=categorias.idcatego "
              . "AND noticias.id=fotos_noticias.idnoticia AND noticias.fecha<=".$hoy." AND noticias.publicar='SI' AND noticias.idcatego=".$_GET['id']." ORDER BY noticias.fecha DESC, noticias.hora DESC LIMIT 4";
        }
    }else{
      $sql="SELECT noticias.*, categorias.nombre,fotos_noticias.titulo as titulo_foto, fotos_noticias.alt as alt FROM noticias, categorias, fotos_noticias WHERE noticias.idcatego=categorias.idcatego "
              . "AND noticias.id=fotos_noticias.idnoticia AND noticias.fecha<=".$hoy." AND noticias.publicar='SI' ORDER BY noticias.fecha DESC, noticias.hora DESC LIMIT 4";
      
    }
      $noticia=array();
      $titulo=array();
      $intro=array();
      $categoria=array();
      $noticia_seo=array();
      $titulo_foto=array();
      $fuente=array();
      $alt=array();
      $n=0;
      $result= mysqli_query($connect, $sql);
      while($registro= mysqli_fetch_assoc($result)){
          $n++;
          $noticia[$n]=$registro['id'];
          $titulo[$n]=$registro['titulo'];
          $intro[$n]=$registro['intro'];
          $categoria[$n]=$registro['nombre'];
          $noticia_seo[$n]=$registro['seo'];
          $fuente[$n]=$registro["fuente"];
          $titulo_foto[$n]=$registro["titulo_foto"];
          $alt[$n]=$registro["alt"];
      }
    
      ?>
      
      <section id="noticias_principales">
              <div class="row">
                  <div class="col-sm-12 col-md-8 col-lg-6 columnas">
                      <article>
                          <div class="img_noticia">
                              <a href="ver_noticia.php?noticia=<?php echo $noticia_seo[1]?>"><img  width="100%" height="auto" src="img_noticias/FOTO<?php echo $noticia[1];?>.jpg" alt="<?php echo $alt[1];?>"></a>
                            <h6 class="text-right"><?php echo $titulo_foto[1];?></h6>
                          </div>
                          <div class="texto_noticia">
                              <h3 class="categoria"><?php echo $categoria[1];?></h3>
                              <a href="ver_noticia.php?noticia=<?php echo $noticia_seo[1]?>"><h2><?php echo $titulo[1];?></h2></a>
                            <p><?php echo $intro[1];?></p>
                            <h6 class="text-left">Por:<?php echo $fuente[1];?>"</h6>
                          </div>
                      </article>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-3 columnas">
                      <div class="texto_noticia">
                          <h3 class="categoria"><?php echo $categoria[2];?></h3>
                              <a href="ver_noticia.php?noticia=<?php echo $noticia_seo[2]?>"><h2><?php echo $titulo[2];?></h2></a>
                            <p><?php echo $intro[2];?></p>
                            <h6 class="text-left">Por:<?php echo $fuente[2];?></h6>
                          </div>
                     <div class="img_noticia">
                              <a href="ver_noticia.php?noticia=<?php echo $noticia_seo[2]?>"><img  width="100%" height="auto"src="img_noticias/FOTO<?php echo $noticia[2];?>.jpg" alt="<?php echo $alt[2];?>"></a>
                            <h6 class="text-right"><?php echo $titulo_foto[2];?></h6>
                          </div>
                  </div>
                  <div class="col-sm-6 col-md-12 col-lg-3 ">
                     <div class="texto_noticia not_col">
                        <h3 class="categoria"><?php echo $categoria[3];?></h3>
                        <a href="ver_noticia.php?noticia=<?php echo $noticia_seo[3]?>"><h2><?php echo $titulo[3];?></h2></a>
                        <a href="ver_noticia.php?noticia=<?php echo $noticia_seo[3]?>"><img  width="80" class="img_peque" height="auto"src="img_noticias/FOTO<?php echo $noticia[3];?>.jpg" alt="<?php echo $alt[3];?>"></a>
                        <p><?php echo $intro[3];?></p>
                        <h6 class="text-left">Por:<?php echo $fuente[3];?></h6>
                      </div>
                      <div class="texto_noticia not_col">
                        <h3 class="categoria"><?php echo $categoria[4];?></h3>
                        <a href="ver_noticia.php?noticia=<?php echo $noticia_seo[4]?>"><h2><?php echo $titulo[4];?></h2></a>
                        <a href="ver_noticia.php?noticia=<?php echo $noticia_seo[4]?>"><img class="img_peque"  width="80" height="auto"src="img_noticias/FOTO<?php echo $noticia[4];?>.jpg" alt="<?php echo $alt[4];?>"></a>
                        <p><?php echo $intro[4];?></p>
                        <h6 class="text-left">Por:<?php echo $fuente[4];?></h6>
                      </div> 
                  </div>
              </div>
          
      </section>
      <section id="mas_noticias">
          <h5><b>MAS NOTICIAS</b></h5>
              <div class="row justify-content-between">
                  <?php 
                        $sql="SELECT noticias.*, categorias.nombre,fotos_noticias.titulo as titulo_foto, fotos_noticias.alt as alt FROM noticias, categorias, fotos_noticias WHERE noticias.idcatego=categorias.idcatego "
                         . "AND noticias.id=fotos_noticias.idnoticia AND noticias.fecha<=".$hoy." ORDER BY noticias.fecha DESC, noticias.hora DESC LIMIT 4,4";
                        $result2= mysqli_query($connect, $sql);
                        while($registro= mysqli_fetch_assoc($result2)){
                    ?>
                  <div class="col-10 col-md-3 columnas justify-content-between">
                      <h3 class="categoria"><?php echo $registro["nombre"]?></h3>
                      <a href="ver_noticia.php?noticia=<?php echo $registro["seo"];?>"><img  width="100%" height="150px"src="img_noticias/FOTO<?php echo $registro["id"];?>.jpg" alt="<?php echo $registro["alt"]?>"></a>
                      <h6><?php echo $registro["titulo_foto"]?></h6>
                      <h5><a href="ver_noticia.php?noticia=<?php echo $registro["seo"];?>"><b><?php echo $registro["titulo"]?></b></a></h5>
                      <h6><?php echo $registro["fuente"]?></h6>
                  </div>
                        <?php }?>
              </div>
          
      </section>
      <section id="lo_ultimo">
          <div class="row">
              <div class="col-md-8 columnas">
                  <div class="row">
                      <ul  id="lista_pestanas">
                      <li class="pestanas" id='defaultOpen' onclick="javascript:cambiarPestana(event,'pestana1');"><b>LO ÚLTIMO</b></li>
                      <li class="pestanas" onclick="javascript:cambiarPestana(event,'pestana2');">
                          <form accept-charset="utf-8" method="POST">
                                <i class="fa fa-search"></i>
                                <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" size="12" autocomplete="off" onkeyup="javascript:buscar()">
                          </form>
                      </li>
                  </ul>
                  </div>
                  <div id="contenido_pestanas">
                      <div class="cont_pestana" id='pestana1'>
                            <?php
                            $sql="SELECT noticias.*, categorias.nombre as catego, fotos_noticias.titulo as titulo_foto, fotos_noticias.alt as alt "
                                . "FROM noticias, categorias, fotos_noticias WHERE noticias.idcatego=categorias.idcatego "
                                . "AND noticias.id=fotos_noticias.idnoticia AND noticias.fecha<=".$hoy." "
                                . "ORDER BY noticias.fecha DESC, noticias.hora DESC LIMIT 8,4";
                            $result3= mysqli_query($connect, $sql);
                            while($registro= mysqli_fetch_assoc($result3)){
                                $ano= substr($registro['fecha'], 0,4); 
                                $mes= substr($registro['fecha'], 4,2); 
                                $dia= substr($registro['fecha'], 6,2);
                                $fecha=$dia." de ".$meses[$mes-1]." de ".$ano;
                            ?>
                           <div class="row p-3 "> 
                             <div class="col-8 texto_noticia">
                                 <h3 class="categoria"><?php echo $registro["catego"];?></h3>
                                 <a href="ver_noticia.php?noticia=<?php echo $registro["seo"];?>"><h4><?php echo $registro["titulo"];?></h4></a>
                                   <p class="d-none d-lg-block"><?php echo $registro["intro"];?></p>
                                   <h6 class="text-left">Por:<?php echo $registro["fuente"];?></h6>
                             </div>
                             <div class="col-4 img_noticia">
                                 <h6 class="text-right"><?php echo $fecha;?></h6>
                                 <a href="#"><img  width="100%" height="auto"src="img_noticias/FOTO<?php echo $registro["id"];?>.jpg" alt="<?php echo $registro["alt"];?>"></a>
                                 <h6 class="text-right"><?php echo $registro["titulo_foto"];?></h6>
                             </div>
                           </div> 
                           <?php }?>
                          </div>
                      </div>
                      <div class="cont_pestana" id='pestana2'>
                          <div id="resultado_busqueda"></div>
                      </div>
                  </div>
              <div class="col-md-4 videos">
                  <h5><b>ULTIMOS VIDEOS</b></h5>
                  <?php
                  $sql_video="SELECT videos.*, categorias.nombre as catego FROM videos, categorias "
                          . "WHERE videos.idcatego=categorias.idcatego AND videos.fecha<=".$hoy." "
                          . "ORDER BY videos.fecha DESC LIMIT 3";
                  $result_video= mysqli_query($connect, $sql_video); 
                  $filas_videos= mysqli_num_rows($result_video);
                  if($filas_videos>0){
                      while ($registro_video= mysqli_fetch_assoc($result_video)){
                  
                  ?>
                  <div class="col-10 justify-content-around">
                      <h3 class="categoria"><?php echo $registro_video["catego"];?></h3>
                      <div class="cont_video"><iframe  width="300" height="170" src="https://www.youtube.com/embed/<?php echo $registro_video['link'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                      <h5><?php echo $registro_video["nombre"];?></h5>    
                      <br>   
                  </div> 
                  <?php }}?>
              </div>
          </div>
      </section>
      <?php include './includes/pie.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>   
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/funciones.js"></script>
    <script>
        $(document).ready(function(){
             document.getElementById("resultado_busqueda").innerHTML='NO HAY NINGÚN RESULTADO';
             document.getElementById("defaultOpen").click();
         });
    </script>
  </body>
</html>