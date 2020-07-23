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
                <form  method="POST" action="../php/registro_login.php">
                    <h3>INICIAR SESIÓN</h3>
                    <div class="input-icono">
                        <div class="icon-user icono"></div>
                        <input type="text" name="usuario" value="" class="txt" placeholder="Usuario">
                    </div>
                    <div class="input-icono">
                        <div class="icon-key"></div>
                        <input type="password" name="contrasenia" value="" class="txt" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-danger" name="login">ENTRAR</button>
                    <a href="registro.php" class="espacio_abajo">Crea Cuenta</a>
                </form>
            </div>
    </section>
</body>
</html>