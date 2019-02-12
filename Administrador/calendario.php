<?php
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    if ((!isset($_SESSION['elusuario']))) {
      header('location:index.php');
    }   
    include "../funciones.php";
    include '../inc/db.php';
    if(isset($_POST['nombre'])){
        if($_POST['nombre']!=""){
            $fecha_ini=$_POST['fecha_ini']." ".$_POST["hora_ini"].":".$_POST["min_ini"];
            $fecha_fin=$_POST['fecha_fin']." ".$_POST["hora_fin"].":".$_POST["min_fin"];
            $fecha_ini= cambiarFormato($fecha_ini);
           
            $sql="INSERT INTO calendario VALUES (0,'".$fecha_ini."','".$fecha_fin."','".$_POST['nombre']."')";
            $result=mysqli_query($connect, $sql);
            
        }
    }
    $eventos=mysqli_query($connect,"SELECT * FROM calendario");
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
    <link href="./css/fullcalendar.css" rel="stylesheet" />
    <link href="./css/fullcalendar.print.css" rel="stylesheet" media="print" />
    <script src="../js/jquery.min.js"></script>
    <script src="./js/moment.min.js"></script>
    <script src="./js/fullcalendar.js"></script>
    <script src='./js/locale/es.js'></script>
    
    <title>Administrador Revista Alimnetaria</title>    
  </head>
  <script>
      $(document).ready(function() {
        $('#calendar').fullCalendar({
             events:[
                        <?php
                            while($fila=mysqli_fetch_array($eventos)){?>
                            { //id del evento
                                title: "<?php echo $fila['nombre'];?>",//nombre del evento obligatorio
                                start: "<?php echo $fila['start'];?>",//fecha de inicio del evento obligatorio
                                end: "<?php echo $fila['end'];?>"//final del evento 
                               // url: "<?php //echo $fila['url'];?>",// añadir un enlace
                               // color:red, //cambiar color
                               // className: "<?php// echo $fila['classname'];?>", // le damos el estilo con una clase añadiendo lo que queramos
                                //editable: "<?php// echo $fila['editable'];?>" //para poder moverse el evento
                            }, 
                            
                            <?php } ?>  
                                            
                    ],
          dayClick: function(date, jsEvent, view) {                        
                $('#exampleModal').modal();
                $('#fecha_ini').val(date.format('DD/MM/YYYY'));
                $('#fecha_fin').val(date.format());
            }
        })

});
  </script>
  <body>
      
      <?php include './includes/cabecera.php';?>
      
      <div class="pagina-main">         
              <?php include './includes/menu.php';?>
              <div class="contenido">
                  <div id='calendar'></div>
              </div>
      </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <form action="calendario.php" method="POST">
              <div class="modal-body"><!--aqui ponemos lo que queramos en la ventana modal-->
                  Título:
                  <input type="text" name="nombre"><br><br>
                  Fecha Inicio:
                  <input type="text" id="fecha_ini" name="fecha_ini" size="10" readonly>
                  Hora:
                  <input type="number" name="hora_ini" min="0" max="23" size="2" value="12">:
                  <input type="number" name="min_ini" min="00" max="59" size="2" value="00"><br><br>
                  Fecha Fin:
                  <input type="date" id="fecha_fin" name="fecha_fin" size="10">
                  Hora:
                  <input type="number" name="hora_fin" min="0" max="23" size="2" value="12">:
                  <input type="number" name="min_fin" min="00" max="59" size="2" value="00"><br><br>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <input type="submit" class="btn btn-primary" value="Guardar evento">               
              </div>
                </form>
            </div>
          </div>
        </div>
      <?php include './includes/pie.php';?>
      
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="./js/funciones.js"></script>
    
    </body>
</html>



