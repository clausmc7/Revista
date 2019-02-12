<?php
    session_start();
    if ((!isset($_SESSION['elusuario']))) {
      header('location:index.php');
    } 
    include '../../inc/db.php';
    
    $id=$_POST["id"];  
    $pass=base64_encode($_POST["pass"]);
    $sql_user="UPDATE usuarios SET nombre='".$_POST["nombre"]."', user='".$_POST['user']."'"
            . ", pass='".$pass."', permisos='".$_POST['permisos']."', publicar='".$_POST['publicar']."' WHERE id=".$id;
    $result_user= mysqli_query($connect, $sql_user);
    if ($result_user) {
        header ("Location: listado.php?mensaje=ok");
	exit(); 
    }else{
        header ("Location: listado.php?mensaje=no");
        exit();
    }
    
    
    
    
    
?>