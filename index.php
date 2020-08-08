<?php
    include("php/config.php");

    mysqli_query($conexion, "INSERT INTO visitas VALUES(null, NOW())");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Wings | Las mejores Alitas</title>

    <!-- Favicon -->
    <link rel="icon" href="favicon.ico">

    <?php include("html/scripts_links.php");?>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,600&display=swap" rel="stylesheet">     <!--Floating WhatsApp css-->
    
    <!-- Estilos de Floating WhatsApp -->
    <link rel="stylesheet" href="css/floating-wpp.min.css">

    <!--Floating WhatsApp javascript-->
    <script type="text/javascript" src="js/floating-wpp.min.js"></script>
    <script src="js/whastapp.js"></script>

    <!-- Scripts Locales -->
    <script src="js/menu.js"></script>

    <!-- Normalize -->
    <link rel="stylesheet" href="css/normalize.css">

    <!-- Iconos Fontastic -->
    <link rel="stylesheet" href="css/styles.css">

    <!-- Hoja de Estilos -->
    <link rel="stylesheet" href="css/estilos_principal.css">

    <!-- Hoja de estilos del tema -->
    <?php
    include("php/tema.php");
    echo "<link rel='stylesheet' href='css/temas/tema" . $tema . ".css'>";
    ?>
</head>

<body>
    <header id="inicio">
        <div class="contenedor-menu">
            <input type="checkbox" id="boton-menu">
            <label for="boton-menu"><img src="img/menu.png" alt=""></label>
            <div class="menu animate__animated animate__bounce">
                <a href="#"><img src="img/fullwings.png" alt="logo" id="img-menu"></a>
                <nav>
                    <ul class="lista">
                        <li><a href="#" id="seleccionado">Inicio</a></li>
                        <li><a href="html/menu.php">Menú</a></li>
                        <li><a href="html/nosotros.php">Nosotros</a></li>
                        <li><a href="html/contacto.php">Contacto</a></li>
                        <li>
                            <a class="icon-facebook" href="https://www.facebook.com/Fullwingsdgo" target="_blank"></a>
                        </li>
                        <li >
                            <a class="icon-user" href="html/login.php"></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="contenedor">
            <div class="logo">
                <img src="img/fullwings_00.png" alt="logo-fullwings" id="logo">
            </div>
            <div class="imgs-sucursal">
            <?php
                include("php/config.php");
                include("php/imagenes/mostrar.php");    

                $i = 13;
                while($i <= 15){
                    echo "<a class='imgs-sucursal'  data-toggle='modal' data-target='#ver-producto-$i'>";
                        $fotos = show($i,$Conserver,$Conuser,$Conpass,$Condb);
                        echo "<img src='img/". $fotos['imagen'] . "' alt='Imagen de sucursal'>"; 
                    echo "</a>";
                    include("html/ventanas_modales/productos.php");
                    $i++;
                }
            ?>
            </div>
        </div>
    </header>
    <a href="#"><img src="img/flecha_arriba.png" alt="flecha arriba" class="flecha_arriba"></a>

    <section id="info">
        <div class="contenedor-info animacion">
            <div class="info-1">
                <img src="img/hamburguesa.png" alt="atencion-cliente">
                <p>
                    Encuentra comida deliciosa para compartir en familia o pasar momentos únicos.
                </p>
            </div>
            <div class="info-2">
                <img src="img/atencion_cliente.png" alt="atencion-cliente">
                <p>
                    Full Wings ofrece servicio a domicilio eficiente que garantiza satisfacción.
                </p>
            </div>
            <div class="info-3">
                <img src="img/manoslavandose.png" alt="lavado-manos">
                <p>
                    Full Wings está al tanto de las normas que se deben seguir ante la situación actual.
                </p>
            </div>
        </div>
    </section>
    <section class="banner animacion">
        <h2>LOS FAVS</h2>
        <div class="imgs">
            <?php
                include("php/config.php");
                include("php/imagenes/mostrar.php");    

                $i = 10;
                while($i <= 12){
                    echo "<a class='imgs-menu'  data-toggle='modal' data-target='#ver-producto-$i'>";
                        $fotos = show($i,$Conserver,$Conuser,$Conpass,$Condb);
                        echo "<img class='d-block w-100' src='img/". $fotos['imagen'] . "'>"; 
                        echo "<p>" . $fotos['titulo'] . "</p>";
                    echo "</a>";
                    include("html/ventanas_modales/productos.php");
                    $i++;
                }
            ?>
        </div>
    </section>

    <footer>
        <p>
            Full Wings 2020 &copy;
        </p>
        <a href="html/login.php">Administrar</a>
    </footer>
    <div id="WAButton"></div>
</body>
</html>
<script src="js/scroll.js"></script>