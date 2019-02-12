<?php
    session_start();
    if ((!isset($_SESSION['elusuario']))) {
      header('location:index.php');
    } 
    include '../../inc/db.php';
    $link=$_POST["link"];
    $fecha=$_POST["fecha"];
    $fecha= str_replace("-","",$fecha);
    $sql="INSERT INTO videos VALUES (0,".$_POST['categoria'];    
    $titulo = $_POST["titulo"];
    $titulo_video= nl2br($titulo);
    $sql.=", '".$titulo_video."','".$link."','".$fecha."','".$_POST['publicar']."')";    
    $result= mysqli_query($connect, $sql);
    if($result){
         header ("Location: listado.php?mensaje=ok");
         exit();
    }else {
            header ("Location: pagerror.html?mensaje=alta");
	    exit();
	}

    
    
    
    
    



