<?php

include("config.php");

if(isset($_POST['registrar'])){
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];
    $confirm_contrasenia = $_POST['contrasenia_confirm'];

    if($contrasenia != $confirm_contrasenia){
        ?>
            <p class="error" id="error">La contraseña no coincide.</p>
        <?php
    }else{

        $validar = $conexion->query("select * from administrador where nom_usuario = '$usuario'");
        $contar = $validar ->num_rows;
    
        if ($contar) {
            ?>
                <p class="error" id="error">Nombre de usuario ya existente, intente con otro por favor.</p>
            <?php
        }
        else{
            $query = $conexion->query("INSERT INTO administrador(nom_usuario,contrasenia,nombre,telefono,correo) VALUES ('$usuario',HEX(AES_ENCRYPT('$contrasenia','verpass')),'$nombre','$telefono','$correo')");
            $comprobar = $conexion->query("SELECT * FROM administrador WHERE nom_usuario = '$usuario'");
            $exito = $comprobar ->num_rows;
            if ($exito) {     
                ?>
                    <a class="correcto" id="correcto" href="login.php">¡Cuenta creada exitosamente!. Da click para iniciar Sesión.</a>
                <?php
            }
        }
    }
}

if(isset($_POST['login'])){

    include("config.php");

    $user = $_POST['usuario'];
    $pass = $_POST['contrasenia'];

    $validar = $conexion->query("select * from administrador where nom_usuario = '$user' and contrasenia = HEX(AES_ENCRYPT('$pass','verpass')) ");
    $contar = $validar ->num_rows;

     if($contar == 1) {
        session_start();
        $_SESSION['usuario'] = $user;
        header ("location: ../html/cambiar_imagen.php");
     } else if ($contar == 0){
        ?>
            <p class="error" id="error">La contraseña o usuario son incorrectos. Por favor, intente de nuevo.</p>
        <?php
     }
}
?>