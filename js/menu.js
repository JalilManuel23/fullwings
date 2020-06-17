$(document).ready(function(){

    $(window).scroll(function(){
        if($(this).scrollTop() > 0){
            $('.menu').addClass('menu2');
            $('.contenedor-menu').addClass('contenedor-menu-2');
        }else{
            $('.menu').removeClass('menu2');
            $('.contenedor-menu').removeClass('contenedor-menu-2');
        }
    });
});