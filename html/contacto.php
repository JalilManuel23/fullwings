<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Wings | Contacto</title>
    <!-- Favicon -->
    <link rel="icon" href="../favicon.ico">

    <?php include("scripts_links.php"); ?>

    <!-- Scripts Locales -->
    <script src="../js/menu.js"></script>

<!-- Validación de formularios -->
<script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#contacto').validate({
                rules :{
                    name : {
                        required : true,
                        minlength : 3, //para validar campo con minimo 3 caracteres
                        maxlength : 9  //para validar campo con maximo 9 caracteres
                    },
                    mail : {
                        required : true
                    },
                    msg : {
                        required :true
                    }

                },
                messages : {
                    nombre : {
                        required : "Debe ingresar un nombre",
                        minlength : "El nombre debe tener un minimo de 3 caracteres",
                        maxlength : "El nombre debe tener un máximo de 9 caracteres"
                    },
                    mail : {
                        required : "Debe ingresar un email"
                    },
                    puesto : {
                        required : "Debe ingresar un mensaje"
                    }
                }
            });    
        });
    </script>

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
                        <li><a href="menu.php" >Menú</a></li>
                        <li><a href="nosotros.php">Nosotros</a></li>
                        <li><a href="contacto.php" id="seleccionado">Contacto</a></li>
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
    </header>

    <section class="contenido">
        <div class="contenedor-contenido">
            <div class="escribenos">
                <h2>ESCRÍBENOS</h2>
                <form action="../php/mail.php" id="form-escribenos" method="post" id="contacto">
                    <input type="text" id="name" name="nombre" class="txt" placeholder="Nombre">
                    <input type="email" id="mail" name="mail" class="txt" placeholder="Email">
                    <textarea id="msg" name="mensaje" class="txt" placeholder="Mensaje"></textarea>
                    <button type="submit" class="btn btn-danger" name="enviar-mail">ENVIAR</button>
                </form>
            </div>
            <div class="contacto-info">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2230.5681655573903!2d-104.67001935077727!3d24.011310882326388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1592496395108!5m2!1ses-419!2smx" width="100%" height="400px"
                    frameborder="0" style="border:2;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                <div class="datos">
                    <p class="icon-telephone">618 174 48 64</p>
                    <p class="icon-facebook">@fullwings</p>
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