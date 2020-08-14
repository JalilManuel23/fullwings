<?php
$sesion_iniciada = FALSE; //VARIABLE PARA SABER SI LAS CREDENCIALES FUERON CORRECTAS O NO SE DEBE INICIALIZAR
                        //CON UN VALOR POR DEFECTO EN ESTE CASO LE PUSE FALSE

if(isset($_POST['login'])){ //COMPRUEBA QUE SE HAYA PRESIONADO EL BOTON DE LOGIN
    include("../php/config.php");

    $user = $_POST['usuario'];
    $pass = $_POST['contrasenia'];

    $validar = $conexion->query("select * from usuario where nom_usuario = '$user' and contrasenia = HEX(AES_ENCRYPT('$pass','verpass')) ");
    $datos = $validar->fetch_assoc();

    $contar = $validar ->num_rows;    // DE LAS LINEAS 6 A 15 SE VERIFICAN LOS DATOS QUE SEAN CORRECTOS

    if($contar == 1) {
        session_start();
        $_SESSION['usuario'] = $user;
        $_SESSION['pass'] = $pass;
        $_SESSION['privilegio'] = $datos['tipo'];
        $sesion_iniciada = TRUE;  // SI SON CORRECTOS EL VALOR DE LA VARIABLE SE CAMBIA A TRUE (ABAJO ESTÁ EL RESTO PARA QUE FUNCIONE)
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <form  method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <h3>INICIAR SESIÓN</h3>

            <input type="text" name="usuario" placeholder="Usuario">

            <input type="password" name="contrasenia" placeholder="Contraseña">

        <button type="submit" name="login">ENTRAR</button>
</body>

    <script>// EN ESTE SCRIPT CREO DOS FUNCIONES CON VENTANAS MODALES UNO POR SI SON CORRECTOS LOS DATOS Y OTRA SI SON INCORRECTOS
            function correcto(){
                swal({
                    title: "Sesión iniciada",
                    text: "Da click para continuar",
                    icon: "success",
                }).then(function() {
                    window.location = "menu.php";
                });
            }

            function incorrecto(){
                swal({
                    title: "Usuario o contraseña incorrectos",
                    text: "Por favor, intenta de nuevo.",
                    icon: "warning",
                    dangerMode: true,
                });
            }
        </script>
</html>
<?php
    if(isset($_POST['login'])){ //VERIFICA QUE SE HAYA PRESIONADO EL BOTON DE LOGIN ES MUY IMPORTANTE O SINO SE BUGGEA MOSTRANDO EL MENSAJE
                                // DE INCORRECTO INFINITAMENTE XD
        if($sesion_iniciada == TRUE){
            echo "<script> correcto(); </script>";  // SI LA VARIABLE TIENE EL VALOR DE TRUE MUESTRA LA VENTANA DE CORRECTO O SINO LA OTRA
        }else{
            echo "<script> incorrecto(); </script>";               
        }
    }
?>