<?php
    session_start();
    if ((!isset($_SESSION['elusuario']))) {
      header('location:index.php');
    } 
    include '../../inc/db.php';
    //$fecha=date("Ymd");
    
    if($_GET["noticias"]=='home'){
        $principal=$_GET['desple_princi'];
        $segunda=$_GET['desple_secun'];
        $bloque1=$_GET['desple_bloque'];
        $bloque2=$_GET['desple_bloque2'];
        $noticias=array($principal,$segunda,$bloque1,$bloque2);
        $sql='UPDATE noticias SET orden=0 WHERE orden<5 ;';

        for ($i = 0; $i < count($noticias); $i++) {
           // $sql.="UPDATE noticias_alimentaria SET orden=".($i+1).", fecha=".$fecha." WHERE id=".$noticias[$i]." ; ";
            $sql.="UPDATE noticias SET orden=".($i+1)." WHERE id=".$noticias[$i]." ; ";

        }
            $result= mysqli_multi_query($connect, $sql);
            header("location:../principal.php");
    }
 ?>           
