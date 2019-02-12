<?php
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    if ((!isset($_SESSION['elusuario']))) {
      header('location:index.php');
    } 
    include '../../inc/db.php';
    if(isset($_GET['mensaje'])){
        if($_GET['mensaje']=='ok'){
            echo "<script>window.onload = function() {swal({ title: '¡Guardado!', text: 'Galería guardada correctamente.', type: 'success', confirmButtonColor: '#b8dd65'} ); noback(); }</script>";
         }
         if($_GET['mensaje']=='no'){
             echo "<script>window.onload = function() {swal({ title: '¡Error!', text: 'Galería no guardado .', type: 'error', confirmButtonColor: '#b8dd65'}    );  noback(); }</script>";
         }
    }
    if(isset($_GET['borrar'])){
        if($_GET['borrar']=='ok'){
            echo "<script>window.onload = function() {swal({ title: '¡Borrado!', text: 'La galería ha sido borrada.', type: 'success', confirmButtonColor: '#b8dd65'}     ); noback(); }</script>";
         }
         if($_GET['borrar']=='no'){
             echo "<script>window.onload = function() {swal({ title: '¡Error!', text: 'Galería no borrada.', type: 'error', confirmButtonColor: '#b8dd65'}      ); noback(); }</script>";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" >
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../js/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7/dist/polyfill.min.js"></script>
    <title>Administrador news portal</title>     
  </head>
  <body>      
      <?php include '../includes/cabecera.php';?>
      <div class="pagina-main">         
          <?php include '../includes/menu.php';?>
          <div class="contenido">
              <h2>Listado de Usuario</h2>
              <table class="tabla_titulo">
                  <tr><th class='celda_nombre'>Nombre</th><th class='celda_nombre'>Nº fotos</th><th class='celda'>Fecha</th><th class='celda'>Publicar</th><th class='celda'>Editar</th><th class='celda'>Eliminar</th></tr>
              </table>
              <table class="tabla_listado">
                      <?php
                  $html='';
                  $sql="SELECT * FROM album_fotos ORDER BY fecha DESC";
                  $result= mysqli_query($connect, $sql);
                  $filas= mysqli_num_rows($result);
                  if($filas>0){                      
                      while ($row = mysqli_fetch_assoc($result)) {
                        $sql_fotos="SELECT * FROM fotos_album WHERE idalbum=".$row["id"];
                        $result_fotos= mysqli_query($connect, $sql_fotos);
                        $numero_fotos= mysqli_num_rows($result_fotos);
                        $ano= substr($row['fecha'], 0,4); 
                        $mes= substr($row['fecha'], 4,2); 
                        $dia= substr($row['fecha'], 6,2); 
                        $fecha=$dia."-".$mes."-".$ano;
                        $html.="<tr><td class='celda_nombre'><a href='modi.php?id=".$row["id"]."'>".$row["nombre"]."</a></td><td class='celda_nombre'>".$numero_fotos."</td><td class='celda_nombre'>".$fecha.""
                             . "<td class='celda'>".$row["publicar"]."</td><td class='celda'><a href='modi.php?id=".$row["id"]."'><i class='fa fa-edit'></i></a></td><td class='celda'><button class='b_eliminar'  onclick='confirmar(".$row["id"].",\"El usuario se borrara permanentemente\",\"borrar_user\");'><i class='fa fa-times-circle'></button></td></tr>";  
                      }
                  }
                                    
                  echo $html;
                  
                  ?>
              </table>
          </div>
      </div>
      <?php include '../includes/pie.php';?>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../js/funciones.js"></script>
    </body>
</html>





