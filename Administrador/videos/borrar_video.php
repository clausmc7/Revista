<?php

    session_start();
    if ((!isset($_SESSION['elusuario']))) {
      header('location:index.php');
    } 
    include '../../inc/db.php';

    $id=$_GET['id'];
    $sql="DELETE FROM videos WHERE id=".$id;
    $result= mysqli_query($connect,$sql);
    if($result){
        header("Location:listado.php?borrar=ok");
    }else{
        header("Location:listado.php?borrar=no");
    }