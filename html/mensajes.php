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
    <title>Sistema Full Wings | Mensajes</title>
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
            $opcion_seleccionada = 6;
            $ruta = "";
            include("ventanas_modales/menu.php");
        ?>
        <section class="contenido-imagenes">
            <h5>Mensajes</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Enviado por...</th>
                        <th>Email</th>
                        <th>Fecha y Hora</th>
                        <th>Mensaje</th>
                        <th>Acciones</th>
                    </tr>

                    <?php
                        include("../php/config.php");

                        $sql = "SELECT * FROM mensajes";
                        if($result = mysqli_query($conexion, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['nombre'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['fecha_hora'] . "</td>";
                                        echo "<td>" . $row['mensaje'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='mailto:" . $row['email'] ."' class='icon-reply'></a>";
                                            echo "<a href='../php/confirmar.php?id=" .$row['id_mensaje']."' class='icon-trash'></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                            }
                        }
                    ?>
                </thead>
            </table>
        </section>
    </div>
</body>
</html>