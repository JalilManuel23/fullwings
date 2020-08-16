<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    $privilegio = $_SESSION['privilegio'];

    if($usuario == null || $usuario == "" || $privilegio == 'empleado'){
        header("Location: errores/iniciar_sesion.html");
        die();
    } 

    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Wings | Registro</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Wings | Registro</title>
    <!-- Favicon -->
    <link rel="icon" href="../favicon.ico">
    
    <?php include("scripts_links.php") ?>

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
    <link rel="stylesheet" href="../css/estilos_login.css">
    <link rel="stylesheet" href="ventanas_modales/style.css">
</head>

<body>
    <header class="header-sis"> 
        <div class="contenedor_header">
            <a href="../"><img src="../img/fullwings.png" alt=""></a>
            <h1>Sistema de Full Wings</h1>
        </div>
    </header>
 
    <section>
        <div class="contenedor-registro">

            <div id="formulario-registro" class="formulario">
                <form id="registro" action="../php/registro_login.php" method="POST">
                    <h3>REGISTRO</h3>
                    <div class="input-icono">
                        <div class="icon-user icono"></div>
                        <input type="text" name="nombre"  class="txt" required placeholder="Nombre Completo" autofocus>
                    </div>
                    <div class="input-icono">
                        <div class="icon-phone"></div>
                        <input type="number" minlength="10" maxlength="10" name="telefono" class="txt" required placeholder="Teléfono">
                    </div>
                    <div class="input-icono">
                        <div class="icon-envelope"></div>
                        <input type="email" name="correo" class="txt" required placeholder="Correo">
                    </div>
                    <div class="input-icono">
                        <div class="icon-user"></div>
                        <input type="text" name="usuario" class="txt" required placeholder="Usuario">
                    </div>
                    <div class="input-icono">
                        <div class="icon-key"></div>
                        <input id="pass1" minlength="8" type="password" name="contrasenia" required class="txt" placeholder="Contraseña">
                    </div>
                    <div class="input-icono">
                        <div class="icon-key"></div>
                        <input id="pass2" type="password" name="contrasenia_confirm" required class="txt" placeholder="Confirmar Contraseña">
                    </div>
                    <p id="mensaje" class="rojo"></p>
                    <button type="submit" class="btn btn-danger espacio_abajo" name="registrar" value="registrar"  data-toggle="modal" data-target="#cerrar-sesion">REGISTRAR</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>