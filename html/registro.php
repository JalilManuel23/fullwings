<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Wings | Login</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Wings | Registro</title>
    <!-- Favicon -->
    <link rel="icon" href="../favicon.ico">
    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Sriracha&display=swap" rel="stylesheet">

    <!-- Animaciones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />

    <!-- Bootstrap CSS y JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Scripts Locales -->
    <script src="../js/menu.js"></script>
    <script src="../js/validar_contrasenia.js"></script>

    <!-- Normalize -->
    <link rel="stylesheet" href="../css/normalize.css">

    <!-- Iconos Fontastic -->
    <link rel="stylesheet" href="../css/styles.css">

    <!-- Hoja de Estilos -->
    <link rel="stylesheet" href="../css/estilos_login.css">
</head>

<body>
    <header>
        <div class="contenedor_header">
            <a href="../"><img src="../img/fullwings.png" alt=""></a>
            <h1>Sistema de Full Wings</h1>
        </div>
    </header>
    <section>
        <div class="contenedor-registro">
            <div id="formulario-registro" class="formulario">
                <form id="registro"  method="POST">
                    <h3>REGISTRO</h3>
                    <div class="input-icono">
                        <div class="icon-user icono"></div>
                        <input type="text" name="nombre"  class="txt" required placeholder="Nombre" autofocus>
                    </div>
                    <div class="input-icono">
                        <div class="icon-phone"></div>
                        <input type="tel" minlength="10" maxlength="10" name="telefono" class="txt" required placeholder="Telefóno">
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
                    <button type="submit" class="btn btn-danger espacio_abajo" name="registrar" value="registrar">REGISTRAR</button>
                </form>
            </div>
            <?php
                include("../php/registro_login.php")
            ?>
        </div>
    </section>
</body>
</html>