<?php
    session_start();
    if ((!isset($_SESSION['elusuario']))) {
      header('location:index.php');
    } 
    include '../../inc/db.php';
    $pass=base64_encode($_POST["pass"]);
    $sql="INSERT INTO usuarios VALUES (0,'".$_POST['nombre']."', '".$_POST["user"]."','".$pass."','".$_POST['permisos']."','".$_POST['publicar']."')";    
       
    $result= mysqli_query($connect, $sql);
    if($result){
         header ("Location: listado.php?mensaje=ok");
         exit();
    }else {
            header ("Location: pagerror.html?mensaje=alta");
	    exit();
	}

    
    
    
    
    



