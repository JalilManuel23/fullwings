<?php
    include("config.php");
    session_start();
    $usuario_old = $_SESSION['usuario'];

    if(isset($_POST['editar-usuario'])){
        $usuario = $_POST['usuario'];
        $contrasenia = $_POST['contrasenia'];
        $confirm_contrasenia = $_POST['confirm-contra'];

        if($contrasenia != $confirm_contrasenia){
            ?>
                <p class="error" id="error">La contraseña no coincide.</p>
            <?php
        }else{
            $sql = "UPDATE administrador SET nom_usuario = '$usuario', contrasenia = '$contrasenia' WHERE nom_usuario = '$usuario_old'";
            $result = mysqli_query($conexion, $sql);

            header("location: ../html/cambiar_imagen.php");
            $_SESSION['usuario'] = $usuario;
        }
    }

    ?>