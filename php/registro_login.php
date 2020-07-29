<?php

include("config.php");

if(isset($_POST['registrar'])){
    include("../html/registro.php");

    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];
    $confirm_contrasenia = $_POST['contrasenia_confirm'];

    $incorrecto = FALSE;
    $errores = "";

    if(!empty($nombre)){
        $nombre = trim($nombre);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    }else{
        $incorrecto = TRUE;
        $errores .= "Ingrese un nombre. ";
    }

    if(!empty($telefono)){
        if((!is_numeric($telefono))){
            $incorrecto = TRUE;
            $errores .= "Telefono Invalido";
        } 
        
        if(strlen($telefono) != 10){
            $incorrecto = TRUE;
            $errores .= "El telefono debe tener 10 digitos";
        }
    }else{
        $incorrecto = TRUE;
        $errores .= "Ingrese un nombre. ";
    }

    if(!empty($correo)){
        $correo = filter_var($correo, FILTER_SANITIZE_STRING);

        if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $incorrecto = TRUE;
            $errores .= "Ingrese un correo electrónico valido. ";
        }
    }else{
        $incorrecto = TRUE;
        $errores .= "Ingrese un correo electrónico. ";
    }

    if(!empty($usuario)){
        $usuario = htmlspecialchars($usuario);
        $usuario = trim($usuario);
        $usuario = stripslashes($usuario);
    }else{
        $incorrecto = TRUE;
        $errores .= "Ingrese un usuario. ";
    }

    if($contrasenia != $confirm_contrasenia){
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
        $validar = $conexion->query("select * from administrador where nom_usuario = '$usuario'");
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
                $query = $conexion->query("INSERT INTO administrador(nom_usuario,privilegios,contrasenia,nombre,telefono,correo) VALUES ('$usuario','empleado',HEX(AES_ENCRYPT('$contrasenia','verpass')),'$nombre','$telefono','$correo')");
                $comprobar = $conexion->query("SELECT * FROM administrador WHERE nom_usuario = '$usuario'");
                $exito = $comprobar ->num_rows;
                
                if ($exito) {     
                    ?>
                        <script>
                            function alerta(){
                                swal({
                                    title: "¡Cuenta creada con éxito!",
                                    text: "Da click en el botón para iniciar sesión",
                                    icon: "success",
                                }).then(function() {
                                    window.location = "../html/login.php";
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

if(isset($_POST['login'])){    
    $user = $_POST['usuario'];
    $pass = $_POST['contrasenia'];

    $validar = $conexion->query("select * from administrador where nom_usuario = '$user' and contrasenia = HEX(AES_ENCRYPT('$pass','verpass')) ");
    $datos = $validar->fetch_assoc();

    $contar2 = $validar ->num_rows;

    if($contar2 == 1) {
        session_start();
        $_SESSION['usuario'] = $user;
        $_SESSION['pass'] = $pass;
        $_SESSION['privilegio'] = $datos['privilegios'];
        
        echo "<script>location.href='../html/cambiar_imagen.php'</script>";
    } else if ($contar2 == 0){
        include("../html/login.php");
        ?>
            <script>
                function alerta(){
                    swal({
                        title: "Usuario o contraseña incorrectos",
                        text: "Por favor, intenta de nuevo.",
                        icon: "warning",
                        dangerMode: true,
                    }).then(function() {
                        window.location = "../html/login.php";
                    });;
                }
                alerta();                   
            </script>
        <?php
    }
}
?>