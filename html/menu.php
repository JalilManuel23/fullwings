<?php
    include("../php/config.php");
    include("../php/imagenes/mostrar.php");  
?>
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
        <div>
            <div class="log">
                <img src="../img/fullwings.png" alt="logo">
            </div>
            <input type="checkbox" id="boton-menu">
            <label for="boton-menu"><img src="../img/menu.png" alt="boton-menu"></label>
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
                        <li >
                            <a class="icon-user" href="login.php"></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="contenedor-titulo-menu">
            <h2>MENÚ</h2>
            <!-- <img src="../img/menu1.jpeg" alt="Menú" id="img-1"> -->
            <img src="../img/fullwings_00.png " alt="Menú" id="img-2">

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <?php
                            $i = 16;
                            while($i <= 18){
                                if($i == 16){
                                    echo "<div class='carousel-item active'>";  
                                }else{
                                    echo "<div class='carousel-item'>";
                                }
                                    $fotos = show($i,$Conserver,$Conuser,$Conpass,$Condb);
                                    echo "<img src='../img/". $fotos['imagen'] . "' class='d-block w-100' alt='Menú'>"; 
                                echo "</div>";
                                $i++;
                            }
                    ?>
                    <!-- <div class="carousel-item active">
                    <img src="../img/menu1.jpeg" class="d-block w-100" alt="Menú 1">
                    </div>
                    <div class="carousel-item">
                    <img src="../img/menu2.jpeg" class="d-block w-100" alt="Menú 2">
                    </div>
                    <div class="carousel-item">
                    <img src="../img/menu3.jpg" class="d-block w-100" alt="Menú 3">
                    </div> -->
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <a class="btn btn-danger" href="../pdf/menu.pdf" download="Menú Fullwings">Descargar Menú</a>
        </div>
    </header>
    <a href="#"><img src="../img/flecha_arriba.png" alt="flecha arriba" class="flecha_arriba"></a>
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

<!-- Scripts Locales -->
<script src="../js/menu.js"></script>