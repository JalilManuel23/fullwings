<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Wings | Nosotros</title>

    <!-- Favicon -->
    <link rel="icon" href="../favicon.ico">

    <?php include("scripts_links.php"); ?>

    <!-- Estilos de Floating WhatsApp -->
    <link rel="stylesheet" href="../css/floating-wpp.min.css">

    <!--Floating WhatsApp javascript-->
    <script type="text/javascript" src="../js/floating-wpp.min.js"></script>
    <script src="../js/whastapp-2.js"></script>

    <!-- Scripts Locales -->
    <script src="../js/menu.js"></script>

    <!-- Normalize -->
    <link rel="stylesheet" href="../css/normalize.css">

    <!-- Iconos Fontastic -->
    <link rel="stylesheet" href="../css/styles.css">

    <!-- Hoja de Estilos -->
    <link rel="stylesheet" href="../css/estilos.css">

    <!-- Hoja de estilos del tema -->
    <?php
    include("../php/tema.php");
    echo "<link rel='stylesheet' href='../css/temas/tema" . $tema . ".css'>";
    ?>
</head>

<body>
    <header class="header-nos-con">
        <div class="log">
            <a href="../"><img src="../img/fullwings.png" alt="logo_fullwings"></a>
        </div>
        <div class="contenedor-menu">
            <input type="checkbox" id="boton-menu">
            <label for="boton-menu"><img src="../img/menu.png" alt="menu"></label>
            <div class="menu">
                <a href="../"><img src="../img/fullwings.png" alt="logo_fullwings"></a>
                <nav>
                    <ul class="lista">
                        <li><a href="../index.php">Inicio</a></li>
                        <li><a href="menu.php">Menú</a></li>
                        <li><a href="nosotros.php" id="seleccionado">Nosotros</a></li>
                        <li><a href="contacto.php">Contacto</a></li>
                        <li>
                            <a class="icon-facebook" href="https://www.facebook.com/Fullwingsdgo" target="_blank"></a>
                        </li>
                        <li >
                            <a class="icon-user" href="login.php"></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <section class="contenedor-nosotros">
        <div class="nosotros">
            <h2 class="titulo-nosotros">
                ¿Quiénes somos?
            </h2>
            <p class="descripcion">
                Somos una empresa dedicada a la venta de alitas y snacks con el objetivo de llegar a las preferencias de nuestros clientes, ofreciendo servicios y productos de gran calidad.
            </p>

        </div>


        <div id="slides" class="carousel slide" data-ride="carousel">
            <div id="slide" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <h2 class="titulo-nosotros">Misión</h2>
                        <p class="descripcion">
                            Ser reconocidos como el mejor restaurante de alitas de la zona, con excelente servicio y calidad en nuestros productos.
                        </p>
                    </div>
                    <div class="carousel-item">
                        <h2 class="titulo-nosotros">Visión</h2>
                        <p class="descripcion">
                            Satisfacer las necesidades gastronómicas de nuestros clientes, ofreciendo alimentos y servicios de mas alta calidad.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <p>
            Full Wings 2020 &copy;
        </p>
    </footer>
    <div id="WAButton"></div>
</body>
</html>