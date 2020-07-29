<?php 
    include("config.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)){
        	$check = @getimagesize($_FILES['foto']['tmp_name']);
    
        $id = $_REQUEST['id'];

        if($check !== false){
            $carpeta_destino = '../img/';
            $archivo_subido = $carpeta_destino . $_FILES['foto']['name'];
            move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);

            $titulo = $_POST['titulo'];
            $imagen = $_FILES['foto']['name'];
            $texto = $_POST['texto'];

            $query = ("UPDATE imagenes SET titulo = '$titulo', imagen = '$imagen', descripcion = '$texto' WHERE no_imagen = '$id'");
            $resultado = $conexion->query($query);

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
    }
?>