<?php
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    if ((!isset($_SESSION['elusuario']))) {
      header('location:index.php');
    }
    include '../../inc/db.php';
    
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
              <h2>Subir vídeo</h2>
              <form action="video_graba.php"  method="post" id="form1" name="form1" size="100%" enctype="multipart/form-data">
                  <input type="submit" value="Guardar" name="b_guardar" class="b_guardar" >
                  <b>Fecha inicio*</b><br><input type="date" name="fecha" class="input_login"  required><br><br>
                  <b>Título vídeo*</b><br><input type="text" name="titulo" class="input_login" size="75"  required><br><br>
                  <b>Enlace vídeo*</b><br><input type="text" name="link" class="input_login" size="75" required><br><br>
                  <b>Categoria:* </b>
                  <select name="categoria" class="input_login" required>
                      <option value="">Elige una categoria</option>
                      <?php 
                      $sql="SELECT * FROM categorias";
                      $result= mysqli_query($connect, $sql);
                      $filas= mysqli_num_rows($result);
                      $html='';
                      if($result>0){
                          while($registro= mysqli_fetch_assoc($result)){
                              $html.="<option value='".$registro['idcatego']."'>".$registro['nombre']."</option>";
                          }
                          echo $html;
                      }
                      ?>
                  </select><br>
                  <b>Publicar:* </b>
                  <select name="publicar" class="input_login" >
                      <option value="SI">SI</option>
                      <option value="NO" selected>NO</option>
                  </select><br>
                  <input type="submit" value="Guardar" name="b_guardar" class="b_guardar">
                  
              </form>
              </div>
      </div>
      <?php include '../includes/pie.php';?>a
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../js/funciones.js"></script>
    </body>
</html>


