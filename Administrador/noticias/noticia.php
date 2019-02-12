<?php
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    if ((!isset($_SESSION['elusuario']))) {
      header('location:index.php');
    }
    include '../../inc/db.php';
    
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <link rel="icon" type="image/png" href="../../img/icon.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" >
    <link rel="stylesheet" href="../css/estilos.css">
    <script type="text/javascript" src="../js/tinymce/js/tinymce/tinymce.js"></script>
    <title>Administrador news portal</title>  
    <script>
    tinymce.init({
        selector: "textarea#editor",
        theme: "modern",
        language : "es",
        width: 800,
        height: 400,
        plugins: [
             "print preview fullpage paste searchreplace autolink code directionality advcode\n\
              visualblocks visualchars fullscreen image link media template codesample table \n\
              charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor\n\
              wordcount tinymcespellchecker a11ychecker imagetools colorpicker textpattern help ",
       ],
       fullpage_default_font_family: "'Gotham-Book ','Times New Roman', Georgia, Serif;",
       fullpage_default_encoding: "UTF-8",
       entity_encoding: 'raw',
       content_css: "skins/",
       toolbar: "template charmap insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor code", 
       image_advtab: true,
       paste_data_images: true,
       paste_as_text: true,
       spellchecker_language: 'es',
       style_formats: [
            {title: 'h1', block: 'h1'},
            {title: 'h2', block: 'h2'},
//            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'h3', block: 'h3'},
//            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'h4', block: 'h4'},
            {title: 'h5', block: 'h5'},
            {title: 'h6', block: 'h6'},
            {title: 'parrafo', inline: 'p'},
            {title: 'caja izq',block: 'div', styles:{'float':'left', 'border':'1px black solid', 'width':'200px','height':'100px'}},
            {title: 'caja der', inline: 'div', styles:{'float':'rigth', 'border':'1px black solid', 'width':'200px','height':'100px'}} 
            
        ]
    }); 
</script>  
  </head>
  <body onload="noback();">
      
      <?php include '../includes/cabecera.php';?>
      
      <div class="pagina-main">         
              <?php include '../includes/menu.php';?>
              <div class="contenido">
              <h2>Subir noticia</h2>
              <form action="noticia_graba.php"  method="post" id="form1" name="form1" size="100%" enctype="multipart/form-data">
                  <input type="submit" value="Guardar" name="b_guardar" class="b_guardar" >
                  <b>Fecha inicio*</b><br><input type="date" name="fecha" class="input_login"  required><br><br>
                  <b>Hora inicio</b><br><input type="time" name="hora" class="input_login" value="00:00" ><br><br>
                  <b>Título noticia*</b><br><input type="text" name="titulo" class="input_login" size="75"  required><br><br>
                  <b>Título corto SEO (max 60 caracteres)*</b><br><input type="text" name="titulo_seo" class="input_login" size="75"  required><br><br>
                  <b>Introducción*</b><br><input type="text" name="intro" class="input_login" size="75"  required><br><br>
                  <b>Fuente</b><br><input type="text" name="fuente" class="input_login" size="75" ><br><br>
                  <b>Noticia</b><br><textarea id="editor" name="noticia" class="input_login" ></textarea><br><br>
                  <b>Enlace vídeo</b><br><input type="text" name="video" class="input_login" size="75" ><br><br>
                  <b>Imagen</b><br><input type="file" accept=".jpg" name="imagen" class="input_login" ><br><br>
                  <b>Titulo imagen</b><br><input type="text" name="titulo_imagen" class="input_login" size="75"><br><br>
                  <b>Descripcion imagen</b><br><input type="text" name="alt" class="input_login" size="75"><br><br>
                  <b>Categoria:* </b>
                  <select name="categoria" class="input_login" >
                      <option value="">Elige una categoria</option>
                      <?php 
                      $sql="SELECT * FROM categorias";
                      $result= mysqli_query($connect, $sql);
                      $filas= mysqli_num_rows($result);
                      $html='';
                      if($result>0){
                          while($registro= mysqli_fetch_assoc($result)){
                              $html.="<option value='".$registro['idcatego']."'>".$registro['nombre']."</option>";
                          }
                          echo $html;
                      }
                      ?>
                  </select><br>
                  <b>Publicar:* </b>
                  <select name="publicar" class="input_login" >
                      <option value="SI">SI</option>
                      <option value="NO" selected>NO</option>
                  </select><br>
                  <input type="submit" value="Guardar" name="b_guardar" class="b_guardar">
                  
              </form>
              </div>
      </div>
      <?php include '../includes/pie.php';?>a
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../js/funciones.js"></script>
    </body>
</html>
