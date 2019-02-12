<?php
 session_start();
 include '../inc/db.php';
 if(isset($_POST['user'])){
    $user=$_POST['user'];
    $pass=base64_encode($_POST["pass"]);
    $sql="SELECT * FROM usuarios WHERE user='".$user."' AND pass='".$pass."' AND publicar = 'SI'";
    $result= mysqli_query($connect, $sql);
    $filas= mysqli_num_rows($result);
    if ($filas>0){
        $registro= mysqli_fetch_assoc($result);
        $_SESSION['elusuario']=$user;
        $_SESSION['elpassword']=$_POST["pass"];
        $_SESSION['elnombre']=$registro['nombre'];
        $_SESSION['permisos']=$registro['permisos'];
        header("location: principal.php");
        exit();
    }else{
        session_destroy();
        header("location: index.php?error");
        exit();
    }
 }
 if (isset($_GET['desconectar'])) {
      session_destroy();
      header('location: index.php');
      exit();
    }
?>