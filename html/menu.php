<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Wings | Menú</title>
    <!-- Favicon -->
    <link rel="icon" href="../favicon.ico">

    <?php include("scripts_links.php"); ?>

    <!-- Estilos de Floating WhatsApp -->
    <link rel="stylesheet" href="../css/floating-wpp.min.css">

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
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <header class="header-menu">
        <div class="contenedor-menu">
            <div class="log">
                <img src="../img/fullwings.png" alt="">
            </div>
            <input type="checkbox" id="boton-menu">
            <label for="boton-menu"><img src="../img/menu.png" alt=""></label>
            <div class="menu">
                <a href="../"><img src="../img/fullwings.png" alt="logo_fullwings"></a>
                <nav>
                    <ul class="lista">
                        <li><a href="../index.php">Inicio</a></li>
                        <li><a href="menu.php" id="seleccionado">Menú</a></li>
                        <li><a href="nosotros.php">Nosotros</a></li>
                        <li><a href="contacto.php">Contacto</a></li>
                        <li>
                            <a class="icon-facebook" href="https://www.facebook.com/Fullwingsdgo" target="_blank"></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="contenedor-titulo-menu">
            <h2>EN FULL WINGS TENEMOS LAS MEJORES ALITAS</h2>
            <a class="btn btn-danger" href="../pdf/menu.pdf" download="Menú Fullwings">Descargar Menú</a>
        </div>
    </header>

    <section class="contenido">
        <div class="contenedor-contenido-menu">
            <div class="productos animacion">
                <a href="#alitas">
                    <img src="../img/alitas.svg" alt="alitas">
                    <p>Alitas</p>
                </a>
                <a href="#bebidas">
                    <img src="../img/soda.png" alt="bebidas">
                    <p>Bebidas</p>
                </a>
                <a href="#snacks">
                    <img src="../img/snacks.png" alt="snacks">
                    <p>Snacks</p>
                </a>
            </div>

            <div id="wings" class="opcion animacion">
                <h2>ALITAS</h2>
                <div class="imgs">
 
                        <?php
                            include("../php/config.php");
                            include("../php/imagenes/mostrar.php");  
                                            
                            $i = 1;
                            while($i <= 3){
                                echo "<a class='imgs-menu'  data-toggle='modal' data-target='#ver-producto-$i'>";
                                    $fotos = show($i,$Conserver,$Conuser,$Conpass,$Condb);
                                    echo "<img src='../img/". $fotos['imagen'] . "'>"; 
                                    echo "<p>" . $fotos['titulo'] . "</p>";
                                echo "</a>";
                                include("ventanas_modales/productos.php");
                                $i++;
                            }
                        ?>
                </div>
            </div>

            <div id="bebidas" class="opcion animacion">
                <h2>BEBIDAS</h2>
                <div class="imgs">
                    <?php
                        $i = 4;
                        while($i <= 6){
                            echo "<a class='imgs-menu'  data-toggle='modal' data-target='#ver-producto-$i'>";
                                $fotos = show($i,$Conserver,$Conuser,$Conpass,$Condb);
                                echo "<img src='../img/". $fotos['imagen'] . "'>"; 
                                echo "<p>" . $fotos['titulo'] . "</p>";
                            echo "</a>";
                            include("ventanas_modales/productos.php");
                            $i++;
                        }
                    ?>
                </div>
            </div>

            <div id="snacks" class="opcion animacion">
                <h2>SNACKS</h2>
                <div class="imgs">
                    <?php
                        $i = 7;
                        while($i <= 9){
                            echo "<a class='imgs-menu'  data-toggle='modal' data-target='#ver-producto-$i'>";
                                $fotos = show($i,$Conserver,$Conuser,$Conpass,$Condb);
                                echo "<img src='../img/". $fotos['imagen'] . "'>"; 
                                echo "<p>" . $fotos['titulo'] . "</p>";
                            echo "</a>";
                            include("ventanas_modales/productos.php");
                            $i++;
                        }
                    ?>
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
<script src="../js/scroll.js"></script>
<!--Floating WhatsApp javascript-->
<script type="text/javascript" src="../js/floating-wpp.min.js"></script>
<script src="../js/whastapp-2.js"></script>