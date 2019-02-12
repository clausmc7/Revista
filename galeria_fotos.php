<?php
	header('Content-Type: text/html; charset=UTF-8');
        include 'inc/db.php';
        $hoy=date("Ymd");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        if(isset($_GET["id"])){
            if($_GET["id"]>0){
                $sql_fotos="SELECT fotos_album.*, album_fotos.id as album FROM fotos_album,album_fotos WHERE fotos_album.idalbum=album_fotos.id AND idalbum=".$_GET["id"];
            }
        }else{
        $sql_fotos="SELECT fotos_album.*, album_fotos.nombre as album, album_fotos.descripcion as des_album, album_fotos.fecha as fecha_album "
                . "FROM fotos_album, album_fotos WHERE album_fotos.id=fotos_album.idalbum AND fotos_album.publicar='SI' AND album_fotos.fecha<".$hoy." GROUP BY fotos_album.idalbum ORDER BY album_fotos.fecha DESC";
        }
        $result_fotos= mysqli_query($connect, $sql_fotos);
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
      
      <?php include './includes/cabecera.php';?> 
      <main>
        <h1>Galeria de fotos de Revista Alimentaria</h1>
        <?php // if(isset($_GET["id"])){
//           echo "<h2>".$result_fotos["album"]."</h2>";
//        }
//        ?>
        <br>
        <div class="row justify-content-around">
            
            <?php 
            $filas= mysqli_num_rows($result_fotos);
            $html='';
            
            if(isset($_GET["id"])){?>
            <div class="container">
                <div class="card-columns" id="galeria_fotos">
                <?php
                while($registro= mysqli_fetch_assoc($result_fotos)){

                   // $html.="<div class='row'>";
                   // $html.="<div class='col-6 foto_album' style='background-image:url(\"fotos_galeria/".$registro['nombre'].".jpg\");'></div>";       
                    ?>
            
                   <div class="card">
                       <a href="#"  class="btn btn-primary" data-toggle="modal" data-target="#Modal<?php echo $registro['nombre']?>">
                        <img src="fotos_galeria/<?php echo $registro['nombre']?>.jpg" class="card-img-top" alt="<?php echo $registro['alt']?>">
                       </a>
                   </div> 
                    <!--Modal--> 
                    <div class="modal fade" id="Modal<?php echo $registro['nombre']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>                       
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <img src="fotos_galeria/<?php echo $registro['nombre']?>.jpg" class="img-fluid modal-lg modal-dialog-centered rounded">
                      </div>
                    </div>
               <?php }?>
                    
              </div>
            </div>
            
            <?php
//                $html.="</div>";
            }else{
               if($filas>0){
                while($registro= mysqli_fetch_assoc($result_fotos)){
                    $fecha=$registro['fecha_album'];
                    $ano= substr($fecha, 0,4); 
                    $mes= substr($fecha, 4,2);
                    if($mes[0]=='0'){
                        $mes=$mes[1];
                    }
                    $fecha=$meses[$mes-1]."-".$ano;
                    $sql_nfotos="SELECT * FROM fotos_album WHERE idalbum=".$registro['idalbum'];
                    $result_nfotos= mysqli_query($connect, $sql_nfotos);
                    $n_fotos= mysqli_num_rows($result_nfotos);
                    $html.="<div class='album' id='album".$registro['idalbum']."' style='background-image:url(\"fotos_galeria/".$registro['nombre'].".jpg\");'>"
//                            . "<div class='fecha_galeria'><p>".$fecha."</p></div>"
                            . "<a href='galeria_fotos.php?id=".$registro['idalbum']."'><div class='fecha_galeria'><p>".$fecha."</p></div><div class='info_album'><h6>".$registro['album']." &#8226; ".$n_fotos." fotos</h6><br><p>".$registro['des_album']."</p></div>"
                            . "</a></div>";
                }
              
            } 
            }
            echo $html;  
            ?>
        </div>
      </main>
      <?php include './includes/pie.php';?>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/funciones.js"></script>
  </body>
</html>
      
      