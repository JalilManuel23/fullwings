<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Wings | Menú</title>
    <!-- Favicon -->
    <link rel="icon" href="../favicon.ico">

    <?php include("scripts_links.php"); ?>

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
                        <li >
                            <a class="icon-whatsapp" href="https://api.whatsapp.com/send?phone=526181744864&text=Hola,%20me%20ha%20interesado%20la%20página%20de%20Fullwings%20y%20me%20gustaría%20ponerme%20en%20contacto%20para%20solicitar%20información%20de%20una%20reservación,%20pedido%20o%20precios%20y%20sucursales." target="_blank"></a>
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
            <div class="productos">
                <a href="#alitas">
                    <img src="../img/alitas.svg" alt="">
                    <p>Alitas</p>
                </a>
                <a href="#bebidas">
                    <img src="../img/soda.png" alt="">
                    <p>Bebidas</p>
                </a>
                <a href="#snacks">
                    <img src="../img/snacks.png" alt="">
                    <p>Snacks</p>
                </a>
            </div>

            <div id="wings" class="opcion">
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

            <div id="bebidas" class="opcion">
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

            <div id="snacks" class="opcion">
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
</body>

</html>