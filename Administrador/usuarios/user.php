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
              <h2>Subir usuario</h2>
              <form action="user_graba.php"  method="post" id="form1" name="form1" size="100%" enctype="multipart/form-data">
                  <input type="submit" value="Guardar" name="b_guardar" class="b_guardar" >
                  <b>Nombre*</b><br><input type="text" name="nombre" class="input_login" size="75"><br><br>
                  <b>Nombre usuario*</b><br><input type="text" name="user" class="input_login" size="75"  required><br><br>
                  <b>Contraseña*</b><br><input type="text" name="pass" class="input_login" size="75" required><br><br>
                  <b>Permisos:* </b>
                  <select name="permisos" class="input_login" required>
                      <option value="">Elige una opcion</option>
                      <option value="AD">ADMINISTRADOR</option>
                      <option value="US">USUARIO</option>
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


