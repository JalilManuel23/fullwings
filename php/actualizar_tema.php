<?php 
    include("config.php");

    if(isset($_POST['actualizar_tema'])){
        $numero = $_POST['tema'];
        $update = "UPDATE tema SET numero_tema = $numero";

        $result = mysqli_query($conexion, $update);

        if($result){
            include("../html/apariencia.php");
            ?>
            <script>
                function alerta(){
                    swal({
                        title: "¡Tema actualizado correctamente!",
                        text: "Da click en el botón para continuar",
                        icon: "success",
                    }).then(function() {
                        window.location = "../html/apariencia.php";
                    });;
                }
                alerta();                   
            </script>
        <?php
        }
    }
?>