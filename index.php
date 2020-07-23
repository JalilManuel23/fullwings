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
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,600&display=swap" rel="stylesheet"> 

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
                            <a class="icon-whatsapp" href="https://api.whatsapp.com/send?phone=526181744864&text=Hola,%20me%20ha%20interesado%20la%20página%20de%20Fullwings%20y%20me%20gustaría%20ponerme%20en%20contacto%20para%20solicitar%20información%20de%20una%20reservación,%20pedido%20o%20precios%20y%20sucursales." target="_blank"></a>
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
                <img src="img/fullwings.png" alt="logo-fullwings" id="logo">
            </div>
            <h2 id="slogan">Creando el sabor de tu vida</h2>
        </div>
    </header>
    <a href="#"><img src="img/flecha_arriba.png" alt="flecha arriba" class="flecha_arriba"></a>

    <section id="info">
        <div class="contenedor-info">
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
    <section class="banner">
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
</body>

</html>