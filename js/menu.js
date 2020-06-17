$(document).ready(function(){

    $(window).scroll(function(){
        if($(this).scrollTop() > 0){
            $('.menu').addClass('menu2');
            $('.contenedor-menu').addClass('contenedor-menu-2');
            $("#img-menu").attr("src","img/fullwings.png");
        }else{
            $('.menu').removeClass('menu2');
            $('.contenedor-menu').removeClass('contenedor-menu-2');
            $("#img-menu").attr("src","img/tragonauta.png");
        }
    });
});