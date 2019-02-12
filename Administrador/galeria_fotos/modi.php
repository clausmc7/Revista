<?php
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    if ((!isset($_SESSION['elusuario']))) {
      header('location:index.php');
    }
    include '../../inc/db.php';
    if(isset($_GET["id"])){
        if($_GET["id"]!=''){
            $id=$_GET['id'];
            $sql="SELECT * FROM usuarios WHERE id=".$id;
            $result= mysqli_query($connect, $sql);
            $registro= mysqli_fetch_assoc($result);
            $pass=base64_decode($registro["pass"]);
        }
    }
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
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <link rel="stylesheet" href="../../css/bootstrap.min.css" >
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/dropzone.css">
    <script type="text/javascript" src="../js/tinymce/js/tinymce/tinymce.js"></script>
    <title>Administrador revistaalimentaria.es</title>  
  </head>
  <body onload="noback();">
      
      <?php include '../includes/cabecera.php';?>
      
      <div class="pagina-main">         
              <?php include '../includes/menu.php';?>
              <div class="contenido">
                  <div class="row">
                      <div class="col-10">
                        <h2>Subir galería</h2>
                      </div>
                      <div class="col-2">
                          <a href="listado.php">Volver <i class='fa fa-arrow-alt-circle-left'></i></a>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-12">
              <form action="modi_graba.php" method="post"  name="form1" size="100%" enctype="multipart/form-data">
                  <input type="submit" value="Guardar" name="b_guardar" class="b_guardar" >
                  <b>Nombre*</b><br><input type="text" name="nombre" class="input_login" value='<?php if(isset($_GET['id'])){ echo $registro["nombre"]; } ?>' size="75"><br><br>
                  <b>Nombre usuario*</b><br><input type="text" name="user" class="input_login" value='<?php if(isset($_GET['id'])){ echo $registro["user"]; } ?>' size="75"  required><br><br>
                  <b>Contraseña*</b><br><input type="text" name="pass" class="input_login" size="75" value='<?php if(isset($_GET['id'])){ echo $pass; } ?>' required><br><br>
                  <b>Permisos:* </b>
                 <div class="dropzone" id="my-dropzone" name="mainFileUploader"> <div class="fallback"> <input name="file" type="file" multiple /> </div> </div>
                  <b>Publicar:* </b>
                  <select name="publicar" class="input_login" >                      
                      <option value='SI'
                      <?php 
                       if(isset($_GET['id'])){
                           if($registro['publicar']=="SI"){
                               echo" selected";
                           }
                       }
                      ?>>SI</option>
                      <option value="NO"
                        <?php 
                       if(isset($_GET['id'])){
                           if($registro['publicar']=="NO"){
                               echo" selected";
                           }
                       }
                        ?>      
                       >NO</option>
                  </select><br>
                  <input type="hidden" value="<?php echo $id;?>" name="id">
                  <input type="submit" value="Guardar" name="b_guardar" class="b_guardar">
                  
              </form>
                      </div>
                  </div>
              </div>
      </div>
      <?php include '../includes/pie.php';?>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../js/dropzone.js"></script>
    <script src="../js/funciones.js"></script>
     <script> Dropzone.options.myDropzone = { url: "/Account/Create", autoProcessQueue: false, uploadMultiple: true, parallelUploads: 100, maxFiles: 100, acceptedFiles: "image/*", init: function () { var submitButton = document.querySelector("#submit-all"); var wrapperThis = this; submitButton.addEventListener("click", function () { wrapperThis.processQueue(); }); this.on("addedfile", function (file) { /* Create the remove button*/ var removeButton = Dropzone.createElement("<button class='btn btn-lg dark'>Remove File</button>");/*Listen to the click event*/ removeButton.addEventListener("click", function (e) { /* Make sure the button click doesn't submit the form:*/ e.preventDefault(); e.stopPropagation(); /* Remove the file preview.*/ wrapperThis.removeFile(file); /* If you want to the delete the file on the server as well, // you can do the AJAX request here.*/ }); /* Add the button to the file preview element.*/ file.previewElement.appendChild(removeButton); }); this.on('sendingmultiple', function (data, xhr, formData) { formData.append("Username", $("#Username").val()); }); } }; </script> 
    </body>
</html>


