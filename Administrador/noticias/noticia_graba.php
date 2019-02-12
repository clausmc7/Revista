<?php
    session_start();
    if ((!isset($_SESSION['elusuario']))) {
      header('location:index.php');
    } 
    include '../../inc/db.php';
    
    $sql="INSERT INTO noticias VALUES (0";
    
    
    if($_POST['categoria']!=''){
        $sql.=",".$_POST['categoria'];
    }else{
        $sql.=", 0";
    }
    
    if($_POST['fecha']!=''){
        $fecha=$_POST["fecha"];
        $fecha= str_replace("-","",$fecha);
        $sql.=", '".$fecha."'";
    }else{
        $sql.=", ''";
    }
    
    if($_POST['hora']!=''){
        $sql.=", '".$_POST['hora']."'";
    }else{
        $sql.=", ''";
    }
    
    if($_POST['titulo']!=''){
        $sql.=", '".addslashes($_POST['titulo'])."'";
    }else{
        $sql.=", ''";
    }
    
    if($_POST['titulo_seo']!=''){
        $sql.=", '".addslashes($_POST['titulo_seo'])."'";
    }else{
        $sql.=", ''";
    }
    
    if($_POST['titulo']!=''){
        include_once('slug.php');
	$titulo = $_POST["titulo"];
	$seo_url=clean($titulo);
	$sql= $sql.", '".$seo_url."'";
    }else{
        $sql.=", ''";
    }
    
    if($_POST['fuente']!=''){
        $sql.=", '".$_POST['fuente']."'";
    }else{
        $sql.=", ''";
    }
    
    if($_POST['intro']!=''){
        $sql.=", '".$_POST['intro']."'";
    }else{
        $sql.=", ''";
    }
    
    if($_POST['noticia']!=''){
        $noticia= nl2br($_POST['noticia']);
        $sql.=", '". addslashes($noticia)."'";
    }else{
        $sql.=", ''";
    }
    
    if($_POST['video']!=''){
        $sql.=", '".$_POST['video']."'";
    }else{
        $sql.=", ''";
    }
    
    $sql.=", 0";// el orden de la tabla noticias_alimentaria pendiente de quitar    
    
    if($_POST['publicar']!=''){
        $sql.=", '".$_POST['publicar']."'";
    }else{
        $sql.=", ''";
    }

    $sql.=" )";
    $result= mysqli_query($connect, $sql);
    if($result){
        $sql_max="SELECT MAX(id) AS maximo FROM noticias";
        $result_max= mysqli_query($connect, $sql_max);
        $registro= mysqli_fetch_assoc($result_max);
        $id=$registro['maximo'];
        if($_FILES['imagen']['size']){
           
            $ruta_img="../../img_noticias/FOTO".$id.".jpg";
            $sql_foto="INSERT INTO fotos_noticias VALUES (0,".$id.", '".$_POST['titulo_imagen']."', '".$_POST['alt']."')";
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_img)) {
                chmod($ruta_img, 0644);
                mysqli_query($connect, $sql_foto);
		  }           
        }
         header ("Location: listado.php?mensaje=ok");
         exit();
    }else {
            header ("Location: pagerror.html?mensaje=alta");
	    exit();
	}

    
    
    
    
    

