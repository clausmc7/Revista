<?php
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    if ((!isset($_SESSION['elusuario']))) {
      header('location:index.php');
    } 
    include '../../inc/db.php';
    if(isset($_GET['mensaje'])){
        if($_GET['mensaje']=='ok'){
            echo "<script>window.onload = function() {swal({ title: '¡Guardado!', text: 'Noticia guardada correctamente.', type: 'success', confirmButtonColor: '#b8dd65'} ); noback(); }</script>";
         }
         if($_GET['mensaje']=='no'){
             echo "<script>window.onload = function() {swal({ title: '¡Error!', text: 'Noticia no guardada .', type: 'error', confirmButtonColor: '#b8dd65'}    );  noback(); }</script>";
         }
    }
    if(isset($_GET['borrar'])){
        if($_GET['borrar']=='ok'){
            echo "<script>window.onload = function() {swal({ title: '¡Borrado!', text: 'La noticia ha sido borrada.', type: 'success', confirmButtonColor: '#b8dd65'}     ); noback(); }</script>";
         }
         if($_GET['borrar']=='no'){
             echo "<script>window.onload = function() {swal({ title: '¡Error!', text: 'Noticia no borrada.', type: 'error', confirmButtonColor: '#b8dd65'}      ); noback(); }</script>";
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
              <h2>Listado de noticias</h2>
              <table class="tabla_titulo">
                  <tr><th class='celda_titulo'>Título</th><th class='celda_sector'>Categoria</th><th class='celda_sector'>Fecha</th><th>Publicar</th><th>Editar</th><th>Ver</th><th>Eliminar</th></tr>
              </table>
              <table class="tabla_listado">
                      <?php
                  $sql="SELECT noticias.*, categorias.nombre as categoria FROM noticias,categorias "
                          . "WHERE noticias.idcatego=categorias.idcatego ORDER BY noticias.fecha DESC, noticias.hora DESC";
                  $result= mysqli_query($connect, $sql);
                  $filas= mysqli_num_rows($result);
                  if($filas>0){
                      $html='';
                      while ($row = mysqli_fetch_assoc($result)) {
                        $ano= substr($row['fecha'], 0,4); 
                        $mes= substr($row['fecha'], 4,2); 
                        $dia= substr($row['fecha'], 6,2); 
                        $fecha=$dia."-".$mes."-".$ano;
                        $html.="<tr><td class='celda_titulo'><a href='modi.php?id=".$row["id"]."'>".$row["titulo_corto"]."</a></td><td class='celda_sector'>".$row["categoria"]."</td><td class='celda_sector'>".$fecha.""
                             . "</td><td>".$row["publicar"]."</td><td><a href='modi.php?id=".$row["id"]."'><i class='fa fa-edit'></i></a></td><td><a href='http://localhost/revistaalimentaria.es/ver_noticia.php?volver=ok&noticia=".$row["seo"]."'><i class='fa fa-eye'></i></a></td><td><button class='b_eliminar'  onclick='confirmar(".$row["id"].",\"La noticia se borrara permanentemente\",\"borrar_noticia\");'><i class='fa fa-times-circle'></button></td></tr>";  
                      }
                  }
                                    
                  echo $html;
                  
                  
                  ?>
              </table>
          </div>
      </div>
      <?php include '../includes/pie.php';?>a
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../js/funciones.js"></script>
    </body>
</html>


