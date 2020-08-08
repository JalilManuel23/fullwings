<?php
$incorrecto = FALSE;

if(isset($_POST['login'])){ 
    include("../php/config.php");

    $user = $_POST['usuario'];
    $pass = $_POST['contrasenia'];

    $validar = $conexion->query("select * from usuario where nom_usuario = '$user' and contrasenia = HEX(AES_ENCRYPT('$pass','verpass')) ");
    $datos = $validar->fetch_assoc();

    $contar2 = $validar ->num_rows;

    if($contar2 == 1) {
        session_start();
        $_SESSION['usuario'] = $user;
        $_SESSION['pass'] = $pass;
        $_SESSION['privilegio'] = $datos['tipo'];
    } else if ($contar2 == 0){
        $incorrecto = TRUE;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Wings | Login</title>
    <!-- Favicon -->
    <link rel="icon" href="../favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Wings | Login</title>
    <!-- Favicon -->
    <link rel="icon" href="../favicon.ico">
    
    <?php include("scripts_links.php") ?>

    <!-- Scripts Locales -->
    <script src="../js/menu.js"></script>

    <?php include("scripts_links.php") ?>
    
    <!-- Normalize -->
    <link rel="stylesheet" href="../css/normalize.css">

    <!-- Iconos Fontastic -->
    <link rel="stylesheet" href="../css/styles.css">
    <!-- Hoja de estilos del tema -->
    <?php
        include("../php/tema.php");
        echo "<link rel='stylesheet' href='../css/temas/tema" . $tema . ".css'>";
    ?>

    <!-- Hoja de Estilos -->
    <link rel="stylesheet" href="../css/estilos_login.css">
</head>

<body>
    <header class="header-sis">
        <div class="contenedor_header">
            <a href="../"><img src="../img/fullwings.png" class="img-header" alt="logo Full Wings"></a>
            <h1>Administración Full Wings</h1>
        </div>
    </header>
    <section class="contenedor">
            <div class="formulario">
                <form  method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <h3>INICIAR SESIÓN</h3>
                    <div class="input-icono">
                        <div class="icon-user icono"></div>
                        <input type="text" name="usuario" class="txt" placeholder="Usuario">
                    </div>
                    <div class="input-icono">
                        <div class="icon-key"></div>
                        <input type="password" name="contrasenia" class="txt" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-danger espacio_abajo" name="login">ENTRAR</button>
                </form>
            </div>
    </section>
</body>
</html>
<?php
if(isset($_POST['login'])){
    if($incorrecto){
    ?>
        <script>
            function alerta(){
                swal({
                    title: "Usuario o contraseña incorrectos",
                    text: "Por favor, intenta de nuevo.",
                    icon: "warning",
                    dangerMode: true,
                })
            }
            alerta();                   
        </script>
    <?php
    }elseif($incorrecto == FALSE){
    ?>
    <script>
        function alerta(){
            swal({
                title: "¡Bienvenido <?php echo $user ?>!",
                text: "Sesión iniciada correctamente, da click para continuar",
                icon: "success",
            }).then(function() {
                window.location = "cambiar_imagen.php";
            });;
        }
        alerta();                   
    </script>
    <?php
    }
}
?>