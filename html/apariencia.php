<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    if($usuario == null || $usuario = ""){
        echo "<h2>Acceso no autorizado. Inicie sesión.</h2>";
        die();
    }        
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Full Wings | Apariencia</title>
    <!-- Favicon -->
    <link rel="icon" href="../favicon.ico">
    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Sriracha&display=swap" rel="stylesheet">

    <!-- Animaciones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />

    <!-- Bootstrap CSS y JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <!-- Scripts Locales -->
    <script src="../js/menu.js"></script>
    <script src="../js/validar_contrasenia.js"></script>

    <!-- Normalize -->
    <link rel="stylesheet" href="../css/normalize.css">

    <!-- Iconos Fontastic -->
    <link rel="stylesheet" href="../css/styles.css">

    <!-- Hoja de Estilos -->
    <link rel="stylesheet" href="../css/estilos_sistema.css">
</head>

<body>
    <header>
        <div class="contenedor-header">
        <label for="boton-menu"><img src="../img/menu.png" alt=""></label>
            <a href="../">
                <img src="../img/fullwings.png" alt="">
            </a>
            <h1>Administración Full Wings</h1>
            <div class="usuario dropdown-tooggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" id="opciones">
                <?php
                    $usuario = $_SESSION['usuario'];
                    echo "<p class='user'>$usuario</p>";    
                ?>
                <p class="icon-user"></p>
            </div>
            <div class="dropdown-menu" aria-labelledby="opciones">
                <button class="dropdown-item"   data-toggle="modal" data-target="#editar-cuenta">Editar Cuenta</button>
                <button class="dropdown-item"  data-toggle="modal" data-target="#cerrar-sesion">Cerrar Sesión</button>
            </div>
        </div>
    </header>

    <!-- Modal Cerrar Sesión-->
    <div class="modal fade" id="cerrar-sesion" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Cerrar Sesión</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ¿Está seguro que desea Cerrar Sesión?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <a href="../php/cerrar_sesion.php" class="btn btn-primary">Aceptar</a>
        </div>
        </div>
    </div>
    </div>
    <!-- Fin de Modal Cerrar Sesión -->
<!-- Modal de editar cuenta -->
<form action="../php/editar_usuario.php" method="post">
    <div class="modal fade" id="editar-cuenta" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Editar Cuenta de Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
            <div class="modal-body">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input name="usuario" class="form-control" type="text" id="usuario" required value="<?php echo $usuario; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pass1">Contraseña nueva</label>
                        <input name="contrasenia" type="password" class="form-control" required id="pass1">
                    </div>
                    <div class="form-group">
                        <label for="pass2">Confirmar Contraseña</label>
                        <input name="confirm-contra" type="password" class="form-control" required id="pass2">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button id="editar" type="submit" class="btn btn-primary" name="editar-usuario" disabled>Aceptar</button>
            </div>
            <p id="mensaje"></p>
        </div>
    </div>
    </div>
</form>
<!-- Fin de Modal de editar cuenta -->
    <div class="main">
    <input type="checkbox" id="boton-menu">
        <section class="menu">
            <nav>
                <ul>
                    <li class="icon-picture-streamline-1"><a href="cambiar_imagen.php">Cambiar Imagenes</a></li>
                    <li class="icon-paint-brush" id="seleccionado"><a href="#">Apariencia</a></li>
                    <li class="icon-truck"><a href="pedidos.php">Gestionar Pedidos</a></li>
                    <li class="icon-users"><a href="empleados.php">Gestionar Empleados</a></li>
                </ul>
            </nav>
        </section>
        <section class="contenido">
            <p>Seleccione una paleta de colores para cambiar la apariencia de la página.</p>
            <div class="temas">
                <div class="tema">
                    <p class="nombre_tema">Tema 1</p>
                    <img src="../img/tema1.png" alt="Color de tema 1" class="tema-seleccionado">

                </div>
                <div class="tema">
                    <p class="nombre_tema">Tema 2</p>
                    <img src="../img/tema2.png" alt="Color de tema 2">

                </div>
                <div class="tema">
                    <p class="nombre_tema">Tema 3</p>
                    <img src="../img/tema3.png" alt="Color de tema 3">
                </div>
            </div>
            <div class="vista-previa">
                <p>Vista Previa</p>
                <h2>TITULOS</h2>
                <button type="submit" class="btn btn-danger">BOTONES</button>
            </div>
            <button type="submit" class="btn btn-danger btn_aplicar">APLICAR CAMBIOS</button>
        </section>
    </div>
</body>

</body>

</html>