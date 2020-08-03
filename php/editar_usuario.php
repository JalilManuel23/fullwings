<?php
    include("config.php");
    include("../html/scripts_links.php");
    include("../html/cambiar_imagen.php");
    
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
            $_SESSION['usuario'] = $usuario;
            $sql = "UPDATE usuario SET nom_usuario = '$usuario', contrasenia = HEX(AES_ENCRYPT('$contrasenia','verpass')) WHERE nom_usuario = '$usuario_old'";
            $result = mysqli_query($conexion, $sql);
                    ?>
            <script>
                function alerta(){
                    swal({
                        title: "¡Usuario actualizado correctamente!",
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