<?php
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    if ((!isset($_SESSION['elusuario']))) {
      header('location:index.php');
    } 
    include '../../inc/db.php';
    if(isset($_GET['mensaje'])){
        if($_GET['mensaje']=='ok'){
            $mensaje="<center>Noticias guardadas correctamente</center>";
         }
         if($_GET['mensaje']=='no'){
             $mensaje="<center>Error al guardar los datos.</center>";
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
    <title>Administrador Revista Alimnetaria</title>     
  </head>
  <body onload="noback();">
      
      <?php include '../includes/cabecera.php';?>
      
       <?php 
                            $sql="SELECT id, titulo, orden FROM noticias_alimentaria ORDER BY fecha DESC LIMIT 15 ";
                            $result= mysqli_query($connect, $sql);
                            $html1='';
                            $html2='';
                            $html3='';
                            $html4='';
                            $id_sel1='';
                            $id_sel2='';
                            $id_sel3='';
                            $id_sel4='';
                             while($registro= mysqli_fetch_assoc($result)){
                                if($registro['orden']==1){
                                $sql="SELECT * FROM noticias_alimentaria WHERE orden=1";
                                $result1= mysqli_query($connect, $sql);
                                $selected= mysqli_fetch_assoc($result1);
                                $id_sel1=$selected['id'];
                                }
                                $html1.="<option value='".$registro['id']."'" ;
                                if($id_sel1==$registro['id']){
                                    $html1.="selected";
                                }
                                    $html1.=">".$registro['titulo']."</option>";
                                
                                
                                if($registro['orden']==2){
                                $sql="SELECT * FROM noticias_alimentaria WHERE orden=2";
                                $result2= mysqli_query($connect, $sql);
                                $selected= mysqli_fetch_assoc($result2);
                                $id_sel2=$selected['id'];
                                }
                                $html2.="<option value='".$registro['id']."'" ;
                                if($id_sel2==$registro['id']){
                                    $html2.="selected";
                                }
                                    $html2.=">".$registro['titulo']."</option>";
                                
                                if($registro['orden']==3){
                                $sql="SELECT * FROM noticias_alimentaria WHERE orden=3";
                                $result3= mysqli_query($connect, $sql);
                                $selected= mysqli_fetch_assoc($result3);
                                $id_sel3=$selected['id'];
                                }
                                $html3.="<option value='".$registro['id']."'" ;
                                if($id_sel3==$registro['id']){
                                    $html3.="selected";
                                }
                                    $html3.=">".$registro['titulo']."</option>";
                                
                                if($registro['orden']==4){
                                $sql="SELECT * FROM noticias_alimentaria WHERE orden=4";
                                $result4= mysqli_query($connect, $sql);
                                $selected= mysqli_fetch_assoc($result4);
                                $id_sel4=$selected['id'];
                                }
                                $html4.="<option value='".$registro['id']."'" ;
                                if($id_sel4==$registro['id']){
                                    $html4.="selected";
                                }
                                    $html4.=">".$registro['titulo']."</option>";
                                
                             }
                             ?>
      <div class="pagina-main">         
              <?php include '../includes/menu.php';?>
              <div class="contenido">
                  <div id="mensaje"><?php if(isset($_GET['mensaje'])){ echo $mensaje;}?></div>
                  <h2>Noticias Home</h2>
                  <form action="noticia_graba2.php" method="GET" id="form_home">
                      <h5>Noticia principal</h5>
                      <select name="desple_princi" class="input_login">
                          <option value="">Elija una noticia</option>
                         <?php
                             echo $html1;
                          ?>
                      </select>
                      <h5>Noticia secundaria</h5>
                      <select name="desple_secun" class="input_login">
                          <option value="">Elija una noticia</option>
                          <?php                             
                             echo $html2;
                          ?>
                      </select>
                      <h5>Noticia bloque</h5>
                      <select name="desple_bloque" class="input_login">
                          <option value="">Elija una noticia</option>
                          <?php                            
                             echo $html3;
                          ?>
                      </select>
                      <select name="desple_bloque2" class="input_login">
                          <option value="">Elija una noticia</option>
                          <?php                            
                             echo $html4;
                          ?>
                      </select> <br><br> 
                      <input type="hidden" name="noticias" value="home">
                      <input type="submit" value="guardar" class="b_guardar">
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
