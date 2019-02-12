<?php
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    if ((!isset($_SESSION['elusuario']))) {
      header('location:index.php');
    }   
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <link rel="icon" type="image/png" href="../img/icon.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/estilos.css">
    <title>Administrador Revista Alimnetaria</title>    
  </head>
  <body>
      
      <?php include './includes/cabecera.php';?>
      
      <div class="pagina-main">         
              <?php include './includes/menu.php';?>
              <div class="contenido">
                  <iframe width="100%" height="800" src="https://datastudio.google.com/embed/reporting/1nwKi--Vcn8QulCSCBYw-PKd4QMt7eeNX/page/SYvd" frameborder="0" style="border:0" allowfullscreen></iframe>
      
              </div>
      </div>
      <?php include './includes/pie.php';?>
      <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="./js/funciones.js"></script>
    </body>
</html>

