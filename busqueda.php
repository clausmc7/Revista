<?php
include 'inc/db.php';
$busqueda=$_POST['valorBusqueda'];
//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
$busqueda = str_replace($caracteres_malos, $caracteres_buenos, $busqueda);
$mensaje="";
$hoy=date("Ymd");
$meses = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
if(isset($busqueda)){
    $sql="SELECT noticias.*, categorias.nombre as catego, fotos_noticias.titulo as titulo_foto, fotos_noticias.alt as alt "
       . "FROM noticias, categorias, fotos_noticias WHERE noticias.idcatego=categorias.idcatego "
       . "AND noticias.id=fotos_noticias.idnoticia AND noticias.fecha<=".$hoy." "
       . "AND noticias.titulo LIKE '%".$busqueda."%' ORDER BY noticias.fecha DESC, noticias.hora DESC LIMIT 4";
    $result= mysqli_query($connect, $sql);
    $filas= mysqli_num_rows($result);
    if($filas>0){
        while($registro= mysqli_fetch_assoc($result)){
            $ano= substr($registro['fecha'], 0,4); 
            $mes= substr($registro['fecha'], 4,2); 
            $dia= substr($registro['fecha'], 6,2);
            $fecha=$dia." de ".$meses[$mes-1]." de ".$ano;
            $mensaje.='<div class="row p-3 "> 
                             <div class="col-8 texto_noticia">
                                 <h3 class="categoria">'.$registro["catego"].'</h3>
                                   <a href="ver_noticia.php?noticia='.$registro["seo"].'"><h4>'.$registro["titulo"].'</h4></a>
                                   <p class="d-none d-lg-block">'.$registro["intro"].'</p>
                                   <h6 class="text-left">Por:'.$registro["fuente"].'</h6>
                             </div>
                             <div class="col-4 img_noticia">
                                 <h6 class="text-right">'.$fecha.'</h6>
                                 <a href="ver_noticia.php?noticia='.$registro["seo"].'"><img  width="100%" height="auto"src="img_noticias/FOTO'.$registro["id"].'.jpg" alt="'.$registro["alt"].'"></a>
                                 <h6 class="text-right">'.$registro["titulo_foto"].'</h6>
                             </div>
                       </div> ';
        }
        
    }else{
            $mensaje.="NO HAY NINGÚN RESULTADO";
    }
    echo $mensaje;
}