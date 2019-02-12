<?php
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    if ((!isset($_SESSION['elusuario']))) {
      header('location:index.php');
    }
    include '../../inc/db.php';
    if(isset($_GET["id"])){
        if($_GET["id"]!=''){
            $id=$_GET['id'];
            $sql="SELECT * FROM videos WHERE id=".$id;
            $result= mysqli_query($connect, $sql);
            $registro= mysqli_fetch_assoc($result);
            $ano= substr($registro['fecha'], 0,4); 
            $mes= substr($registro['fecha'], 4,2); 
            $dia= substr($registro['fecha'], 6,2); 
            $fecha=$ano."-".$mes."-".$dia;
        }
    }
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <link rel="icon" type="image/png" href="../../img/icon.png" />
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <link rel="stylesheet" href="../../css/bootstrap.min.css" >
    <link rel="stylesheet" href="../css/estilos.css">
    <script type="text/javascript" src="../js/tinymce/js/tinymce/tinymce.js"></script>
    <title>Administrador news portal</title>  
  </head>
  <body onload="noback();">
      
      <?php include '../includes/cabecera.php';?>
      
      <div class="pagina-main">         
              <?php include '../includes/menu.php';?>
              <div class="contenido">
                  <div class="row">
                      <div class="col-10">
                        <h2>Subir vídeo</h2>
                      </div>
                      <div class="col-2">
                          <a href="listado.php">Volver <i class='fa fa-arrow-alt-circle-left'></i></a>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-12">
              <form action="modi_graba.php"  method="post" id="form1" name="form1" size="100%" enctype="multipart/form-data">
                  <input type="submit" value="Guardar" name="b_guardar" class="b_guardar" >
                  <b>Fecha inicio*</b><br><input type="date" name="fecha" class="input_login" value='<?php if(isset($_GET['id'])){ echo $fecha;} ?>' required><br><br>
                  <b>Título noticia*</b><br><input type="text" name="titulo" class="input_login" size="75" value='<?php if(isset($_GET['id'])){ echo $registro["nombre"]; } ?>' required><br><br>
                  <b>Enlace vídeo*</b><br><input type="text" name="link" value='<?php if(isset($_GET['id'])){echo $registro["link"];} ?>' class="input_login" size="75"><br><br>
                  <b>Categoria:* </b>
                  <select name="categoria" class="input_login" >
                      <option value="">Elige un categoria</option>
                      <?php 
                      $sql="SELECT * FROM categorias";
                      $result_sector= mysqli_query($connect, $sql);
                      $filas_sector= mysqli_num_rows($result_sector);
                      $html='';
                      if($filas_sector>0){
                          while($registro_sector= mysqli_fetch_assoc($result_sector)){
                              $html.="<option value='".$registro_sector['idcatego']."' ";                         
                              if($registro_sector['idcatego']==$registro['idcatego']){
                                    $html.="selected ";
                               }
                          $html.=">".$registro_sector['nombre']."</option>";
                          }
                          echo $html;
                      }
                      ?>
                  </select><br>
                  <b>Publicar:* </b>
                  <select name="publicar" class="input_login" >                      
                      <option value='SI'
                      <?php 
                       if(isset($_GET['id'])){
                           if($registro['publicar']=="SI"){
                               echo" selected";
                           }
                       }
                      ?>>SI</option>
                      <option value="NO"
                        <?php 
                       if(isset($_GET['id'])){
                           if($registro['publicar']=="NO"){
                               echo" selected";
                           }
                       }
                        ?>      
                       >NO</option>
                  </select><br>
                  <input type="hidden" value="<?php echo $id;?>" name="id">
                  <input type="submit" value="Guardar" name="b_guardar" class="b_guardar">
                  
              </form>
                      </div>
                  </div>
              </div>
      </div>
      <?php include '../includes/pie.php';?>a
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../js/funciones.js"></script>
    </body>
</html>


