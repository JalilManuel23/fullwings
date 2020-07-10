$(document).ready(function() {
    $('#pass2').keyup(function() {
        var pass1 = $('#pass1').val();
        var pass2 = $('#pass2').val();

        if (pass1 == pass2) {
            $('#mensaje').text("La contraseña coincide");
            $('#mensaje').addClass('verde');
            $('#mensaje').removeClass('rojo');
            $("#editar").removeAttr('disabled');
        } else {
            $('#mensaje').text("La contraseña no coincide");
            $('#mensaje').addClass('rojo');
        }
    });
});