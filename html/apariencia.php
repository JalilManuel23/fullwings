<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    if($usuario == null || $usuario = ""){
        header("Location: errores/iniciar_sesion.html");
        die();
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
        <section class="menu-sis">
            <nav>
                <ul>
                    <li class="icon-picture-streamline-1"><a href="cambiar_imagen.php">Cambiar Imagenes</a></li>
                    <li class="icon-paint-brush" id="seleccionado-sis"><a href="#">Apariencia</a></li>
                    <li class="icon-truck"><a href="pedidos.php">Gestionar Pedidos</a></li>
                    <li class="icon-users"><a href="empleados.php">Gestionar Empleados</a></li>
                </ul>
            </nav>
        </section>
        <section class="contenido">
            <p>Seleccione una paleta de colores para cambiar la apariencia de la página.</p>
            <form class="temas" method="POST" action="../php/actualizar_tema.php">
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

</body>

</html>