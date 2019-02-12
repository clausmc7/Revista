<header>        
          <div class="navbar  barra_cabecera d-none d-md-block">
            <div class="container-fluid">
                    <div class="col-md-6">
                        <button class="b_menu" id="b_menu"><i class="fa fa-bars d-inline"></i>&nbsp;<b>MENÚ</b></button>
                        
                    </div>
                    
                    <div class="col-md-6 d-none d-lg-block">
                        <ul class="list-inline list_button m-0">
                            <li class="list-inline-item "><button class="b_menu" onclick="window.location.href='http://www.revistaalimentaria.es/legislacion/portal.php'">Portal Alimentaria</button></li>
                            <li class="list-inline-item "><button class="b_menu" onclick="window.location.href='suscripciones.php'">Suscríbete</button></li>
                            <li class="list-inline-item "><button class="b_menu" onclick="window.location.href='alta_news.php'">Avance Semanal</button></li>
                        </ul>
                    </div>
            </div>           
          </div>
          <div class="cabecera">
              <div class="row">
                  <div class="col-10 col-md-12">
                        <img id="logo" src="img/logo_revista.png" alt="logo revista alimentaria" width="400">
                  </div>
                  <div class="col-2 d-md-none">
                        <button class="b_menu mt-4" id="b_menu"><i class="fa fa-bars d-inline"></i>&nbsp;</button>
                  </div>
              </div>
              
            <p class="text-center fecha"><?php  
                $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
            echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
            ?></p>
            <hr id="separador">
            <ul class="menu_noticias text-center list-inline">
                <li class="list-inline-item"><a href="Noticias-de-bebidas">BEBIDAS</a></li>
		<li class="list-inline-item"><a href="Noticias-de-productos-frescos">FRESCOS</a></li>
		<li class="list-inline-item"><a href="Noticias-de-productos-elaborados">ELABORADOS</a></li>
		<li class="list-inline-item"><a href="Noticias-de-productos-en-conservacion">CONSERVACIÓN</a></li>
		<li class="list-inline-item"><a href="Noticias-de-materias-primas">MATERIAS PRIMAS</a></li>
		<li class="list-inline-item"><a href="Noticias-de-distribucion-de-alimentos">DISTRIBUCIÓN</a></li>
		<li class="list-inline-item"><a href="Noticias-de-servicios">SERVICIOS</a></li>
		<li class="list-inline-item"><a href="Noticias-de-alimentos-especiales">ALIM. ESPECIAL</a></li>
		<li class="list-inline-item"><a href="Noticias-de-el-mundo-animal">MUNDO ANIMAL</a></li>
		<li class="list-inline-item"><a href="Noticias-de-medio-ambiente">MEDIO AMBIENTE</a></li>

            </ul>
          </div>
          <nav class="navbar navbar-expand fixed-top navbar-barra">
            <div class="container-fluid">
                    <div class="col-md-4">
                        <button class="b_menu"><i class="fa fa-bars d-inline"></i>&nbsp;<b>MENÚ</b></button>
                        <button  id="b_inicio"><b>INICIO</b></button>
                    </div>
                    <div class="col-lg-3">
                        <img id="logo_mini" src="img/logo_revista.png" alt="logo revista alimentaria" width="200" >
                    </div>
                    <div class="col-md-5 d-none d-lg-block">
                        <ul class="navbar-nav list_button">
                            <li class="list-inline-item "><button class="b_menu" onclick="window.location.href='http://www.revistaalimentaria.es/legislacion/portal.php'">Portal Alimentaria</button></li>
                            <li class="list-inline-item "><button class="b_menu" onclick="window.location.href='http://www.revistaalimentaria.es/suscripciones.php'">Suscríbete</button></li>
                            <li class="list-inline-item "><button class="b_menu" onclick="window.location.href='http://www.revistaalimentaria.es/alta_news.php'">Avance Semanal</button></li>
                        </ul>
                    </div>
            </div> 
                            
            </div>
          </nav>
          <div class="menu_desplegable fixed-top">
              <ul class="p-0">
                <a href="Noticias-de-bebidas"><li>BEBIDAS</li></a>
		<a href="Noticias-de-productos-frescos"><li>FRESCOS</li></a>
                <a href="Noticias-de-productos-elaborados"><li>ELABORADOS</li></a>
		<a href="Noticias-de-productos-en-conservacion"><li>CONSERVACIÓN</li></a>
		<a href="Noticias-de-materias-primas"><li>MATERIAS PRIMAS</li></a>
		<a href="Noticias-de-distribucion-de-alimentos"><li>DISTRIBUCIÓN</li></a>
		<a href="Noticias-de-servicios"><li>SERVICIOS</li></a>
		<a href="Noticias-de-alimentos-especiales"><li>ALIM. ESPECIAL</li></a>
		<a href="Noticias-de-el-mundo-animal"><li>MUNDO ANIMAL</li></a>
		<a href="Noticias-de-medio-ambiente"><li>MEDIO AMBIENTE</li></a>
                <hr>
                <a href="Administrador/index.php"><li>ZONA PRIVADA</li></a>
            </ul>
          </div>
        </header> 
