<?php
    include("config.php");
    
        $id = $_REQUEST['id'];

        $query = ("UPDATE imagenes SET titulo = 'Imagen en matenimiento', imagen = 'default.jpg', descripcion = ' ' WHERE no_imagen = '$id'");
        $resultado = $conexion->query($query);
        
        if($resultado){
            include('../html/cambiar_imagen.php');
            ?>
        <script>
            function alerta(){
                swal({
                    title: "¡Imagen actualizada correctamente!",
                    text: "Da click en el botón para continuar",
                    icon: "success",
                }).then(function() {
                    window.location = "../html/cambiar_imagen.php";
                });;
            }
            alerta();                   
        </script>
            <?php
        }
        ?>
