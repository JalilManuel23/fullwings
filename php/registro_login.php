<?php

include("config.php");

if(isset($_POST['registrar'])){
    include("../html/registro.php");

    $confirm_contrasenia = $_POST['contrasenia_confirm'];

    $incorrecto = FALSE;
    $errores = "";

    $nombre=""; $usuario=""; $telefono=""; $contrasenia=""; $correo="";  

    $usuario_in = trim($_POST['usuario']);
        if(empty($usuario_in)){
            $errores .= "Ingresa un nombre de usuario.";$incorrecto = TRUE;
        } elseif(!filter_var($usuario_in, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^(?=.{3,20}$)[a-zñA-ZÑ0-9](\s?[a-zñA-ZÑ0-9])*$/")))){
            $errores .= "El nombre de usuario no es válido.";$incorrecto = TRUE;
        } else{
            $usuario = $usuario_in;
        }   
        
        $nombre_in = trim($_POST['nombre']);
        if(empty($nombre_in)){
            $errores .= "Ingresa tu nombre.";$incorrecto = TRUE;
        } elseif(!filter_var($nombre_in, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$/")))){
            $errores .= "El nombre ingresado no es válido.";$incorrecto = TRUE;
        } else{
            $nombre = $nombre_in;
        }  

        $telefono_in = trim( $_POST['telefono']);
        if(empty($telefono_in)){
            $errores .= "Por favor, ingresa el número telefónico del empleado.";     $incorrecto = TRUE;
        } elseif(!filter_var($telefono_in, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/([0-9]){10}/")))){
            $errores .= "Por favor, ingresa un valor de número telefónico correcto (Deben ser 10 digitos)";$incorrecto = TRUE;
        } else{
            $telefono = $telefono_in;
        }
        
        $contrasenia_in = trim($_POST['contrasenia']);
          if(empty($contrasenia_in)){
          $errores .= "La contraseña debe tener minimo 8 caracteres";$incorrecto = TRUE;
          }  else{
        $contrasenia = $contrasenia_in;
        }

      $correo_in = trim($_POST['correo']);
         if(empty($correo_in)){
         $errores .= "Por favor, ingresa una dirección de correo electrónico.";$incorrecto = TRUE;     
           } elseif(!filter_var($correo_in, FILTER_VALIDATE_EMAIL)) {
          $errores .= "El correo electrónico no es correcto";$incorrecto = TRUE;
          } else {
            $correo = $correo_in;
    }

    if($contrasenia_in != $confirm_contrasenia){
        ?>
            <script>
                function alerta(){
                    swal({
                        title: "¡Las contraseñas no coinciden!",
                        text: "Por favor, intenta de nuevo.",
                        icon: "warning",
                        dangerMode: true,
                    }).then(function() {
                        window.location = "../html/registro.php";
                    });;
                }
                alerta(); 
            </script> 
        <?php
    }else{
        $validar = $conexion->query("select * from usuario where nom_usuario = '$usuario'");
        $contar = $validar ->num_rows;
    
        if ($contar) {
            ?>
            <script>
                function alerta(){
                    swal({
                        title: "Nombre de Usuario ya existente",
                        text: "Por favor, intenta con otro.",
                        icon: "warning",
                        dangerMode: true,
                    }).then(function() {
                        window.location = "../html/registro.php";
                    });;
                }
                alerta();                   
            </script>
<?php
        }
        else{
            if($incorrecto === FALSE){
                $query = $conexion->query("INSERT INTO usuario(nom_usuario,tipo,contrasenia,nombre,telefono,correo,seccion_img,seccion_ventas,seccion_empleados) VALUES ('$usuario','empleado',HEX(AES_ENCRYPT('$contrasenia','verpass')),'$nombre','$telefono','$correo','c','c','c')");
                $comprobar = $conexion->query("SELECT * FROM usuario WHERE nom_usuario = '$usuario'");
                $exito = $comprobar ->num_rows;
                
                if ($exito) {     
                    ?>
                        <script>
                            function alerta(){
                                swal({
                                    title: "Selecciona los privilegios del usuario",
                                    text: "Escoge las acciones que el usuarios podrá realizar",
                                    icon: "info",
                                }).then(function() {
                                    window.location = "../html/privilegios.php?user=<?php echo $usuario ?>";
                                });;
                            }
                            alerta();                   
                        </script>
                    <?php
                }
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
                            window.location = "../html/registro.php";
                        });
                    }
                    alerta();                   
                </script>
<?php
            }
        }
    }
}

if(isset($_POST['priv'])){
    include("../html/privilegios.php");

    $img = $_POST['imagenes'];
    $ventas = $_POST['ventas'];
    $empleados = $_POST['empleados'];
    $usuario = $_POST['user'];

    $query = $conexion->query("UPDATE usuario SET  seccion_img = '$img', seccion_ventas = '$ventas', seccion_empleados = '$empleados' WHERE nom_usuario = '$usuario'");
    $editar = $_POST['ed'];

    if($query &&  $editar == 's'){
        ?>
        <script>
            function alerta(){
                swal({
                    title: "¡Privilegios editados correctamente!",
                    text: "Da click para continuar",
                    icon: "success",
                }).then(function() {
                    window.location = "../html/usuarios.php";
                });
            }
            alerta();                   
        </script>
        <?php
    }else{
        ?>
        <script>
            function alerta(){
                swal({
                    title: "¡Usuario agregado correctamente!",
                    text: "Da click para continuar",
                    icon: "success",
                }).then(function() {
                    window.location = "../html/usuarios.php";
                });
            }
            alerta();                   
        </script>
        <?php
    }
}

?>