<?php
    header('Content-Type: text/html; charset=UTF-8');
    
    if(isset($_GET['error'])){
    $mensaje="Nombre o password erroneos.";
}
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <link rel="icon" type="image/png" href="../img/icon.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/estilos.css">
    <title>Administrador Revista Alimnetaria</title>    
  </head>
  <body>
      <div class="container">
          <div class="row justify-content-around">
          <div class="col-6 login justify-content-around">
              <a href="../index.php"><img id="logo" src="../img/logo_revista.png" alt="logo revista alimentaria" width="100%"></a>
              <b>Revista T&eacute;nica, N&ordm;1 en España desde 1964</b>
              <form action="login.php" method="POST" id="login_admin">
                  <input type="text" name="user" id="user" class="input_login" placeholder="usuario" required><br><br>
                  <input type="password" name="pass" id="pass" class="input_login" placeholder="password" required><br><br>
                  <button type="submit" name="b_login" class="b_login"></button>                 
              </form>
              <?php if(isset($_GET['error'])){ echo $mensaje;}?>
          </div>
          </div>
          <div class="pie_login">              
              <b>Revista Alimentaria <?php echo date("Y");?> &reg;</b>              
          </div>
      </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
