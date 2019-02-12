var estat = 0;
$(document).ready(function () {
   /**
    7.2	Una vez iniciada la web el elemento #divMobil se muestre de color azul
    */
    $("#divMobil").css("background-color", "blue");
//7.3	Al entrar el ratón encima de #setBlueColor establezca al div #divMobil un color de fondo verde.
    $("#setBlueColor").mouseenter(changeGreen);
//7.4	Al clicar sobre #setBlueColor establezca al div #divMobil un color de fondo azul.
    $("#setBlueColor").click(changeBlue);
//7.5	Al quitar el ratón  de encima de #setBlueColor , establezca al div #divMobil un color de fondo naranja.
    $("#setBlueColor").mouseleave(changeOrange);
//7.6	Al clicar sobre #setRedColor   establezca al div #divMobil un color de fondo rojo.
  $("#setRedColor").mouseleave(changeRed);
//8.2	Al clicar sobre #setInvisible se oculte el div #divMobil con la función .fadeOut()
    $("#setInvisible").click(fadeout);
//8.3	Al clicar sobre #setVisible se muestre  el div #divMobil con la función .fadeIn()
    $("#setVisible").click(fadein);
//8.4	Al clicar sobre #toggleVisible se alterne entre visible/invisible el div #divMobil con la función .fadeToggle()
    $("#toggleVisible").click(toogle);
//9.2	Al clicar sobre #incSize aumente en “50px” la altura del elemento #divMobil con una transición de 1.5 segundos.
    $("#incSize").click(altura);
//9.3	Al clicar sobre #decSize disminuya “50px” la altura del elemento #divMobil con una transición de 2 segundos. 
    $("#decSize").click(altura2);
//9.4	Al clicar sobre #incRight aumente “50px” la distancia a la izquierda del elemento #divMobil con una transición de 1.5 segundos
    $("#incRight").click(dreta);
//9.5	Al clicar sobre # decRight disminuya “50px” la distancia a la izquierda del elemento #divMobil con una transición de 1.5 segundos. 
    $("#decRight").click(esquerra);
//9.6	Al situar el ratón sobre la imagen , el div #infoImg ocupe el 100% de la altura de la imagen con una transición de 1 segundo. Al quitar el ratón de encima, el div #infoImg ocupe de nuevo el 30% de la imagen con una transición de 1 segundo.
    $(".contentImg>img").mouseover(imatge);
    
    $("#infoImg").mouseout(imatge2);
    /**
9.7	Al clicar encima de #movContinuo se mueva continuamente el elemento #divMobil de izquierda a derecha. Para conseguirlo utiliza la propiedad complete de animate para que una vez haya terminado la animación hacia la derecha, llame a una función que realize la animación a la izquierda.
9.8	Al clicar por segunda vez sobre #movContinuo se detenga el movimiento #de divMobil con la función .stop( ).
*/
    $("#movContinuo").click(stop2);
});
function changeBlue() {
    $("#divMobil").css("background-color", "blue");
}
function changeRed() {
    $("#divMobil").css("background-color", "red");
}
function changeGreen() {
    $("#divMobil").css("background-color", "green");
}
function changeOrange(){
      $("#divMobil").css("background-color", "orange");
}
function fadeout() {
    $("#divMobil").fadeOut();
}
function fadein() {
    $("#divMobil").fadeIn();
}
function toogle() {
    $("#divMobil").fadeToggle();
}
function altura() {
    $("#divMobil").animate(
            {height: "+=50px"}, {duration: 1500}
    );
}
function altura2() {
    $("#divMobil").animate(
            {height: "-=50px"}, {duration: 2000}
    );
}
function dreta() {
    $("#divMobil").animate(
            {left: "+=50px"}, {duration: 1500}
    );
}
function esquerra() {
    $("#divMobil").animate(
            {left: "-=50px"}, {duration: 1500}
    );
}
function imatge() {
    $("#infoImg").animate(
            {height: "100%"}, {animation: 1000}
    );
}
function imatge2() {
    $("#infoImg").animate(
            {height: "30%"}, {animation: 1000}
    );
}
function movment() {
    $("#divMobil").animate(
            {left: "50px"},
    {duration: 100, complete: movment2}
    );
}
function movment2() {
    $("#divMobil").animate(
            {left: "0px"},
    {duration: 100, complete: movment}
    );
    $("#divMobil").css("background-color", "orange");

}
function stop2() {
    if (estat === 1) {
        $("#divMobil").stop();
        estat = 0;
    }
    else {
        estat = 1;
        movment();
    }
}