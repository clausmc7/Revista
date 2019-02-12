
//function eliminar(){
//    swal({
//  title: 'Are you sure?',
//  text: "You won't be able to revert this!",
//  type: 'warning',
//  showCancelButton: true,
//  timer: 10000,
//  confirmButtonColor: '#3085d6',
//  cancelButtonColor: '#d33',
//  confirmButtonText: 'Yes, delete it!'
//}).then((result) => {
//  if (result.value) {
//      return true;
//    swal(
//      'Deleted!',
//      'Your file has been deleted.',
//      'success'
//      
//    )
//  }else{
//      return false;
//  }
//});
//}

function confirmar(id,texto,url){
    swal({
  title: '¿Estas seguro?',
  text: texto,
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#b8dd65',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Borrar'
}).then((result) => {
  if (result.value) {
//    swal({
//      title: '¡Borrado!',
//      text: 'La noticia ha sido borrada.',
//      type: 'success',
//      confirmButtonColor: '#b8dd65'}     
//    );
    location.href=url+'.php?id='+id;
  }
});
}

function noback(){
   window.location.hash="no-back-button";
   window.location.hash="Again-No-back-button"
   window.onhashchange=function(){window.location.hash="no-back-button";}
}

$(document).ready(function(){
    $(".fa-chevron-down").css("display", "none");
    $(".b_menu").click(function(){     
        $(this).children(".submenu").slideToggle();
            $(this).children(".fa-chevron-right").toggle();
            $(this).children(".fa-chevron-down").toggle();
        
    });
});