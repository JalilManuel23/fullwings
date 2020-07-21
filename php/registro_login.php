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
            $query = $conexion->query("INSERT INTO administrador(nom_usuario,contrasenia,nombre,telefono,correo) VALUES ('$usuario',HEX(AES_ENCRYPT('$contrasenia','verpass')),'$nombre','$telefono','$correo')");
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
        }
    }
}

if(isset($_POST['login'])){    
    $user = $_POST['usuario'];
    $pass = $_POST['contrasenia'];

    $validar = $conexion->query("select * from administrador where nom_usuario = '$user' and contrasenia = HEX(AES_ENCRYPT('$pass','verpass')) ");
    $contar2 = $validar ->num_rows;

    if($contar2 == 1) {
        session_start();
        $_SESSION['usuario'] = $user;
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