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
   <!-- Estilos de Floating WhatsApp -->
   <link rel="stylesheet" href="../css/floating-wpp.min.css">

    <!--Floating WhatsApp javascript-->
    <script type="text/javascript" src="../js/floating-wpp.min.js"></script>
    <script src="../js/whastapp-2.js"></script>
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

<body class="body-nos">
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
                            <a class="icon-user" href="login.php"></a>
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d455.5682968923356!2d-104.66979707345364!3d24.01179068489422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x869bc930398a1139%3A0x8e62b200d976eaad!2sFull%20Wings%20Blvd%20Durango!5e0!3m2!1ses-419!2smx!4v1597439591599!5m2!1ses-419!2smx" width="100%" height="400" frameborder="0" style="border:2;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                <div class="datos">
                    <p class="icon-telephone">618 222 08 62</p>
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
    <div id="WAButton"></div>
</body>
</html>