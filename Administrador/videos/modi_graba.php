<?php
    session_start();
    if ((!isset($_SESSION['elusuario']))) {
      header('location:index.php');
    } 
    include '../../inc/db.php';
    
    $id=$_POST["id"];  
    $fecha=$_POST['fecha'];
    $fecha=str_replace("-","",$fecha);
    $titulo=nl2br($_POST['titulo']);
    $sql_noticia="UPDATE videos SET fecha='".$fecha."', nombre='".$titulo."'"
            . ", idcatego=".$_POST['categoria'].", link='".$_POST['link']."', publicar='".$_POST['publicar']."' WHERE id=".$id;
    $result_noticia= mysqli_query($connect, $sql_noticia);
    if ($result_noticia) {
        header ("Location: listado.php?mensaje=ok");
	exit(); 
    }else{
        header ("Location: listado.php?mensaje=no");
        exit();
    }
    
    
    
    
    
?>


