<?php
    include("config.php");

    if(isset($_POST['enviar-mail'])){
        $nombre = $_POST['nombre'];
        $mail = $_POST['mail'];
        $mensaje = $_POST['mensaje'];

        $incorrecto = FALSE;
        $errores = "";

		if(!empty($nombre)){
			$nombre = trim($nombre);
			$nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
		}else{
            $incorrecto = TRUE;
            $errores .= "Ingrese un nombre. ";
		}

		if(!empty($mail)){
			$mail = filter_var($mail, FILTER_SANITIZE_STRING);

			if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
                $incorrecto = TRUE;
                $errores .= "Ingrese un email valido. ";
			}
		}else{
            $incorrecto = TRUE;
            $errores .= "Ingrese un email. ";
		}

		if(!empty($mensaje)){
			$mensaje = htmlspecialchars($mensaje);
			$mensaje = trim($mensaje);
			$mensaje = stripslashes($mensaje);
		}else{
            $incorrecto = TRUE;
            $errores .= "Ingrese un mensaje. ";
        }
        
        include("../html/contacto.php");
        if($incorrecto === FALSE){
            $enviar_msg = $conexion->query("INSERT INTO mensajes VALUES (null, '$nombre', '$mail', NOW() ,'$mensaje')");
            mail('fullwings@gmail.com', "Mensaje de: $mail", $mensaje);
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
        }else{
?>
            <script>
                function alerta(){
                    swal({
                        title: "Por favor, complete el formulario correctamente",
                        text: "<?php echo $errores ?>",
                        icon: "warning",
                    })
                    .then(function() {
                        window.location = "../html/contacto.php";
                    });
                }
                alerta();                   
            </script>
<?php  
        }
    }else{
        $id = $_GET['id'];

        $eliminar_msg =  $conexion->query("DELETE FROM mensajes WHERE id_mensaje = '$id'"); 

        include("../html/mensajes.php");
?>
        <script>
            function alerta2(){
                swal({
                    title: "¡Mensaje Eliminado!",
                    text: "Da click en el botón para continuar",
                    icon: "success",
                }).then(function() {
                    window.location = "../html/mensajes.php";
                });
            }
            alerta2();                   
        </script>
<?php
    }
?>