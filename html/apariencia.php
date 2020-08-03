<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    if($usuario == null || $usuario = ""){
        header("Location: errores/iniciar_sesion.html");
        die();
    }     
    
    include("../php/config.php");
    $correcto = FALSE;
    if(isset($_POST['actualizar_tema'])){
        $numero = $_POST['tema'];
        $update = "UPDATE tema SET numero_tema = $numero";

        $result = mysqli_query($conexion, $update);

        if($result){
            $correcto = TRUE;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Full Wings | Apariencia</title>
    <!-- Favicon -->
    <link rel="icon" href="../favicon.ico">

    <!-- Script y links externos -->
    <?php include("scripts_links.php"); ?>

    <!-- Scripts Locales -->
    <script src="../js/menu.js"></script>
    <script src="../js/validar_contrasenia.js"></script>

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
    <link rel="stylesheet" href="../css/estilos_sistema.css">
</head>

<body>
    <header class="header-sis">
        <div class="contenedor-header">
        <label for="boton-menu"><img src="../img/menu.png" alt=""></label>
            <a href="../">
                <img src="../img/fullwings.png" alt="">
            </a>
            <h1>Administración Full Wings</h1>
            <div class="usuario dropdown-tooggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" id="opciones">
                <?php
                    $usuario = $_SESSION['usuario'];
                    echo "<p class='user'>$usuario</p>";    
                ?>
                <p class="icon-user"></p>
            </div>
            <div class="dropdown-menu" aria-labelledby="opciones">
                <button class="dropdown-item"   data-toggle="modal" data-target="#editar-cuenta">Editar Cuenta</button>
                <button class="dropdown-item"  data-toggle="modal" data-target="#cerrar-sesion">Cerrar Sesión</button>
            </div>
        </div>
    </header>

    <!-- Modal Cerrar Sesión-->
    <div class="modal fade" id="cerrar-sesion" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <?php include("ventanas_modales/cerrar_sesion.php"); ?>
    </div>

    <!-- Modal de editar cuenta -->
    <form action="../php/editar_usuario.php" method="post">
        <?php include("ventanas_modales/editar_cuenta.php"); ?>
    </form>

    <div class="main">
    <input type="checkbox" id="boton-menu">
        <?php 
            $opcion_seleccionada = 2;
            $ruta = "";
            include("ventanas_modales/menu.php");
        ?>
        <section class="contenido">
            <p>Seleccione una paleta de colores para cambiar la apariencia de la página.</p>
            <form class="temas" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div>
                    <?php 
                        include("../php/tema.php");
                    ?>
                    <input type="radio" name="tema" id="tema1" value=1 <?php if($tema == 1){echo "checked";}?>>
                    <label for="tema1" class="tema">
                            <img src="../img/tema1.png" alt="Color de tema 1">
                    </label>
                    
                    <input type="radio" name="tema" id="tema2" value=2 <?php if($tema == 2){echo "checked";}?>>
                    <label for="tema2" class="tema">
                        <img src="../img/tema2.png" alt="Color de tema 2">
                    </label>
                    
                    <input type="radio" name="tema" id="tema3" value=3 <?php if($tema == 3){echo "checked";}?>>
                    <label for="tema3" class="tema">
                        <img src="../img/tema3.png" alt="Color de tema 3">
                    </label>
                </div>

                <div class="vista-previa">
                    <img src="" alt="">
                </div>
 
                <button type="submit" name="actualizar_tema" class="btn btn-danger btn_aplicar">APLICAR CAMBIOS</button>
            </form>

        </section>
    </div>
</body>
</html>
<?php
if($correcto){
    ?>
    <script>
        function alerta(){
            swal({
                title: "¡Tema actualizado correctamente!",
                text: "Da click en el botón para continuar",
                icon: "success",
            }).then(function() {
                window.location = "../html/apariencia.php";
            });;
        }
        alerta();                   
    </script>
<?php
}
?>