<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    $privilegio = $_SESSION['privilegio'];

    if($usuario == null || $usuario = "" || $privilegio == 'empleado'){
        header("Location: ../html/errores/iniciar_sesion.html");
        die();
    } 
    include("../html/cerrar_sesion.php");
    include("config.php");
    
    $id = $_GET['no'];

    $select= "SELECT *,AES_DECRYPT(UNHEX(contrasenia),'verpass') as contrasenia FROM usuario WHERE id_usuario = '$id'";
    $resultado = mysqli_query($conexion, $select);
    $fila = mysqli_fetch_array($resultado);
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Registro</title>
    <link rel="icon" href="../favicon.ico"> 

    <!-- Script y links externos -->
    <?php include("../html/scripts_links.php"); ?>

    <!-- Scripts Locales -->
    <script src="../js/menu.js"></script>

    <!-- Normalize -->
    <link rel="stylesheet" href="../css/normalize.css">

    <!-- Iconos Fontastic -->
    <link rel="stylesheet" href="../css/styles.css">

    <?php
        include("../php/tema.php");
        echo "<link rel='stylesheet' href='../css/temas/tema" . $tema . ".css'>";
    ?>

    <!-- Hoja de Estilos -->
    <link rel="stylesheet" href="../css/estilos_sistema.css">
</head>
<body>
    <header class="header-sis">
        <div class="contenedor-header">
            <label for="boton-menu"><img src="../img/menu.png" alt=""></label>
            <a href="../">
                <img src="../img/fullwings.png" alt="">
            </a>
            <h1>Administración Full Wings</h1>
            <div class="usuario dropdown-tooggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" id="opciones">
                <?php
                    $usuario = $_SESSION['usuario'];
                    echo "<p>$usuario</p>";    
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
        <?php include("../html/ventanas_modales/cerrar_sesion.php"); ?>
    </div>

    <!-- Modal de editar cuenta -->
    <form action="editar_usuario.php" method="post">
        <?php include("../html/ventanas_modales/editar_cuenta.php"); ?>
    </form>

    <div class="main">
        <input type="checkbox" id="boton-menu">
        <?php 
            $opcion_seleccionada = 6;
            $ruta = "../html/";
            include("../html/ventanas_modales/menu.php");
        ?>
        <section class="contenido">
            <h2>Editar Registro de Usuario</h2>
            <div class="editar">
                <form class="form-editar" action="actualizar.php" method="post">
                    <div >
                        <label>Nombre Completo</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $fila['nombre']; ?>">
                    </div>
                    <div >
                        <label>Usuario</label>
                        <input type="text" name="nom_usuario" class="form-control" value="<?php echo $fila['nom_usuario']; ?>">
                    </div>
                    <div>
                        <label>Contraseña</label>
                        <div class="zona-pass"><input type="password" name="contrasenia" id="contrasenia_in" class="form-control" value="<?php echo $fila['contrasenia']; ?>">
                        <input type="checkbox" name="ver" id="ver" onclick="ver_pass();">
                        <label for="ver"><img src="../img/ver.png" alt="Icono de Ver"</label></div>
                    </div>
                    <div >
                        <label>Privilegios</label>
                        <a href="../html/privilegios.php?ed=s&user=<?php echo $fila['nom_usuario'];?>" class='icon-pencil'>Editar Privilegios</a>
                    </div>
                    <div >
                        <label>Telefono</label>
                        <input type="text" name="tel" class="form-control" value="<?php echo $fila['telefono']; ?>">
                    </div>
                    <div >
                        <label>Correo</label>
                        <input type="text" name="mail" class="form-control" value="<?php echo $fila['correo']; ?>">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>

                    <input type="submit" class="btn btn-primary" value="Actualizar" name="actualizar_usuario">
                </form>
            </div>
        </section>
    </div>
</body>
</html>
<script>
    function ver_pass(){
        var isChecked = document.getElementById('ver').checked;
        var input_pass = document.getElementById('contrasenia_in');
        
        if(isChecked){
            input_pass.setAttribute("type","text");
        }else{
            input_pass.setAttribute("type","password");
        }
    }
</script>