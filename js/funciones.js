$(document).ready(function(){
//    $(".info_album").css("display","none");
    $(window).scroll(function(){
        
        if($(this).scrollTop()>200){
            $(".navbar-barra").css("display","block");
        }
        if($(this).scrollTop()<200){
            $(".navbar-barra").css("display","none");
        }
    });
    $("#b_inicio").click(function(){
        $('html, body').animate({scrollTop:0}, 800);
        
    });
    $(".b_menu").click(function(event){
        $(".menu_desplegable").slideDown("slow");
         event.stopImmediatePropagation();
    });
    $(":not(.menu_deplegable )").on('click',function(){
        if($(".menu_desplegable").is(":visible")){
        $(".menu_desplegable").slideUp("slow");
    }
    });
//    $(".album").mouseover(function(){
//        $(this).animate({top:"-5px"});
//        $(this).find(".info_album").animate(
//                {height: "80%"}, {animation: 2000}
//                );
//    });
////    $(".info_album").animate(
////                {height: "30%"}, {animation: 1000}
////                );
//    $(".album").mouseleave(function(){
//        $(this).animate({top:"0px"});
//        $(this).find(".info_album").animate(
//                {height: "20%"}, {animation: 1000}
//                );
//    });
//    $(".card").mouseover(function(){
//         $(this).animate({top:"-5px"});
//    });
//    $(".card").mouseleave(function(){
//         $(this).animate({top:"0px"});
//    });
});
function cambiarPestana(evt, seleccionada) {
  var i, pestana, cont_pestana;
  cont_pestana = document.getElementsByClassName("cont_pestana");
  for (i = 0; i < cont_pestana.length; i++) {
    cont_pestana[i].style.display = "none";
  }
  pestana = document.getElementsByClassName("pestanas");
  for (i = 0; i < pestana.length; i++) {
    pestana[i].className = pestana[i].className.replace(" active", "");
  }
  document.getElementById(seleccionada).style.display = "block";
  evt.currentTarget.className += " active";
  if(seleccionada=="pestana2"){
      document.getElementById("busqueda").focus();
  }
}
function buscar(){
    var texto=$("#busqueda").val();
    if(texto!=""){
        $.post("busqueda.php",{valorBusqueda: texto},function(mensaje){
            $("#resultado_busqueda").html(mensaje);
        });
    }else{
        $("#resultadoBusqueda").html("NO HAY NINGÚN RESULTADO");
    }
}