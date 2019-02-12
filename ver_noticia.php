<?php
	header('Content-Type: text/html; charset=UTF-8');
        include 'inc/db.php';
        mysqli_set_charset($connect,'utf8');  
        $sql='SELECT noticias_alimentaria.*, categorias_alimentaria.nombre FROM noticias_alimentaria, categorias_alimentaria '
                . 'WHERE noticias_alimentaria.idcatego=categorias_alimentaria.idcatego AND noticias_alimentaria.seo="'.$_GET['noticia'].'"';
        $result= mysqli_query($connect, $sql);
        $registro= mysqli_fetch_assoc($result);
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
    <link rel="stylesheet" href="./css/bootstrap.min.css" >
    <link rel="stylesheet" href="./css/estilos.css">
    <title>Revista alimentaria</title>  
    
  </head>
  <body>
      <?php 
      $sql="SELECT * FROM banners_alimentaria  WHERE publicar='SI' AND tipo='PEQUE' ORDER BY orden ASC LIMIT 1";
      $result1= mysqli_query($connect, $sql);
      $banner= mysqli_fetch_assoc($result1);
      ?>
      <div id="banner_top">
          <img src="https://www.revistaalimentaria.es/banners_top/<?php echo $banner['nombre_img'].$banner['extension'];?>" width="100%">
      </div>
      <?php include './includes/cabecera.php';?>
      <div class="container">
          <?php if(isset($_GET["volver"])){
                   if($_GET["volver"]=="ok"){
          ?>
          <div class="row">
               <div class="col-10">
                  <h4 class="categoria"><?php echo $registro['nombre']; ?></h4>
               </div>
               <div class="col-2">
                   <a href="Administrador/noticias/listado.php">Volver <i class='fa fa-arrow-alt-circle-left'></i></a>
               </div>                  
          </div>
           <?php 
                   
                   }
          }else{ ?>
          <h4 class="categoria"><b><?php echo $registro['nombre']; ?></b></h4>
          <?php } ?>
          <h1><?php echo $registro['titulo']; ?></h1>
          <div class="video_promo">
              <!--<iframe src="<?php // echo $registro['youtube']; ?>" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>-->
              <img src="img_noticias/FOTO<?php echo $registro['id'];?>.jpg" width="100%">
          </div>
          <div class="redes_compartir">
              <ul class="list-inline">
                      <a href="https://twitter.com/intent/tweet?url=https://www.revistaalimentaria.es/vernoticia.php?noticia=<?php echo $registro['seo']; ?>" onclick="ga('send', 'event', 'Social', 'Twitter', '');envioEventoRedSocial('twitter');" class="twitter" target="_blank" title="Compártelo en Twitter" rel="nofollow">
                          <li class="list-inline-item"><i class="fa fa-twitter"></i></li>
                      </a>
                      <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//www.revistaalimentaria.es/vernoticia.php?noticia=<?php echo $registro['seo']; ?>" onclick="ga('send', 'event', 'Social', 'Facebook', '');envioEventoRedSocial('twitter');" class="facebook" target="_blank" title="Compártelo en Facebook" rel="nofollow">                  
                          <li class="list-inline-item"><i class="fa fa-facebook"></i></li>
                      </a>
                  </ul>
          </div>
          <div class="descripcion">
          <div class="foto_dere">
              <img src="https://www.revistaalimentaria.es/fotos_noticias/FOTO<?php echo $registro['id']; ?>.jpg" width="100%">
          </div>
          <?php echo $registro['descripcion']; ?>
          </div>
          <div id="banner_botton">
            <!--<img src="https://www.revistaalimentaria.es/banners_top/Banner-1261x116-ok.gif" width="100%">-->
          </div>

      </div>
            <?php include './includes/pie.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/funciones.js"></script>
  </body>
</html>
