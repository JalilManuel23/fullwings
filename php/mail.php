<?php
    if(isset($_POST['enviar-mail'])){
        // $nombre = $_POST['nombre'];
        // $mail = $_POST['mail'];
        // $mensaje = $_POST['mensaje'];

        // mail("jalilmanuel25@gmail.com", "Prubea", "Pruebaa");
    
        include("../html/contacto.php");
        ?>
        <script>
            function alerta(){
                swal({
                    title: "¡Mensaje Enviado!",
                    text: "Da click en el botón para continuar",
                    icon: "success",
                }).then(function() {
                    window.location = "../html/contacto.php";
                });;
            }
            alerta();                   
        </script>
    <?php
    }

?>