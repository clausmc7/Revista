<div class="sidebar">
                  <ul class="menu_admin">
                      <a href="http://localhost/revistaalimentaria_nueva/Administrador/principal.php"><li>Inicio</li></a>
                      <li class="b_menu"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-down"></i> Noticias
                          <ul class="submenu">
                            <a href="http://localhost/revistaalimentaria_nueva/Administrador/noticias/listado.php" ><li><i class='fa fa-newspaper'>&#xf1ea;</i> Noticias</li></a>
                            <a href="http://localhost/revistaalimentaria_nueva/Administrador/noticias/noticia.php" ><li><i class="fa fa-plus-square-o"></i> Nueva noticia</li></a>                         
                          </ul>                             
                      </li>
                      <li class="b_menu"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-down"></i> Vídeos
                          <ul class="submenu">                     
                            <a href="http://localhost/revistaalimentaria_nueva/Administrador/videos/listado.php" ><li><i class='fa fa-video-camera'></i> Vídeos</li></a>
                            <a href="http://localhost/revistaalimentaria_nueva/Administrador/videos/video.php" ><li><i class="fa fa-plus-square-o"></i> Nueva vídeo</li></a>   
                          </ul>                             
                      </li>
                      <li class="b_menu"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-down"></i> Galería de fotos
                          <ul class="submenu">                     
                            <a href="http://localhost/revistaalimentaria_nueva/Administrador/galeria_fotos/listado.php" ><li><i class='fa fa-edit'></i> Galerías</li></a>
                            <a href="#" ><li><i class="fa fa-plus-square-o"></i> Añadir galería</li></a>   
                          </ul>                             
                      </li>
                      <li class="b_menu"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-down"></i> Galería de vídeo
                          <ul class="submenu">                     
                            <a href="#" ><li><i class='fa fa-video-camera'></i> Galerías</li></a>
                            <a href="#" ><li><i class="fa fa-plus-square-o"></i> Añadir galería</li></a>   
                          </ul>                             
                      </li>
                      <li class="b_menu"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-down"></i> Banners
                          <ul class="submenu">                     
                            <a href="#" ><li><i class='fa fa-edit'></i> Banners</li></a>
                            <a href="#" ><li><i class="fa fa-plus-square-o"></i> Nueva banners</li></a>   
                          </ul>                             
                      </li>
                      <?php 
                      $permisos=$_SESSION['permisos'];
                      if($permisos=="AD"){
                      ?>
                      <li class="b_menu"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-down"></i> Usuarios
                          <ul class="submenu">                     
                            <a href="http://localhost/revistaalimentaria_nueva/Administrador/usuarios/listado.php" ><li><i class="fa fa-user"></i> Ver Usuarios</li></a> 
                            <a href="http://localhost/revistaalimentaria_nueva/Administrador/usuarios/user.php" ><li><i class="fa fa-plus-square-o"></i> Crear Usuario</li></a>   
                          </ul>                             
                      </li>
                      <?php }?>
                      <a href="http://localhost/revistaalimentaria_nueva/Administrador/calendario.php"><li>Calendario</li></a>         
                  </ul>
              </div>
