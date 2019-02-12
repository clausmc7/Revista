<?php
    session_start();
    if ((!isset($_SESSION['elusuario']))) {
      header('location:index.php');
    } 
    include '../../inc/db.php';
    
    $id=$_POST["id"];
    $titulo_foto=$_POST['titulo_imagen'];
    $alt=$_POST['alt'];
    $sql_foto="SELECT * FROM fotos_noticias WHERE idnoticia=".$id;
    $result_foto=mysqli_query($connect, $sql_foto);
    $filas_foto=mysqli_num_rows($result_foto);
    if($filas_foto>0){
	$sql_foto="UPDATE fotos_noticias SET titulo='".$titulo_foto."', alt='".$alt."' WHERE idnoticia=".$id;
    }else{
	$sql_foto="INSERT INTO fotos_noticias VALUES (0,".$id.",'".$titulo_foto."','".$alt."')";
    }
    
    $result_foto= mysqli_query($connect, $sql_foto);
    if(!$result_foto){
	header("Location: pagerror.htm?mensaje=alta");	
    }
    
    
    if ($_FILES['imagen']['tmp_name'] != '') {
		$ruta_img="../../img_noticias/FOTO".$id.".jpg";
		 if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_img)) {
			 chmod($ruta_img, 0644); 
			 $errorFoto= "NO";
				
		 }else{
				//chmod($uploadfile, 0644); 
			 $errorFoto= "SI";
		} 
		
	 }
         
    include_once('./slug.php');
    $titulo = $_POST["titulo"];
    $seo_url=clean($titulo);
    $fecha=$_POST['fecha'];
    $fecha=str_replace("-","",$fecha);
    $hora=$_POST['hora'];
    $noticia=nl2br($_POST['noticia']);
    $sql_noticia="UPDATE noticias SET fecha='".$fecha."', hora='".$hora."'";
    
    if($_POST['categoria']){
         $sql_noticia.=", idcatego=".$_POST['categoria'];
    }   
    $sql_noticia.=", titulo='".addslashes($_POST['titulo'])."', titulo_corto='".addslashes($_POST['titulo_seo'])."', seo='".$seo_url."'";
    $sql_noticia.=", fuente='".$_POST['fuente']."', intro='".$_POST['intro']."', descripcion='".addslashes($_POST['noticia'])."', youtube='".$_POST['youtube']."'";
    $sql_noticia.=", publicar='".$_POST['publicar']."' WHERE id=".$id;
    $result_noticia= mysqli_query($connect, $sql_noticia);
    if ($result_noticia) {
        header ("Location: listado.php?mensaje=ok");
	exit(); 
    }else{
        header ("Location: listado.php?mensaje=no");
        exit();
    }
    
    
    
    
    
?>