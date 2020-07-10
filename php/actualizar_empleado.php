<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    if($usuario == null || $usuario = ""){
        echo "<h2>Acceso no autorizado. Inicie sesión.</h2>";
        die();
    } 

    include("config.php");
    
    $id = $_GET['no'];

    $sql = "SELECT * FROM empleado WHERE No_Empleado = '$id'";
    $result = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_array($result);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Registro</title>
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

    <div class="main">
        <section class="menu">
            <nav>
                <ul>
                    <li class="icon-picture-streamline-1"><a href="../html/cambiar_imagen.php">Cambiar Imagenes</a></li>
                    <li class="icon-paint-brush"><a href="../html/apariencia.php">Apariencia</a></li>
                    <li class="icon-truck"><a href="../html/pedidos.php">Gestionar Pedidos</a></li>
                    <li class="icon-users" id="seleccionado"><a href="#">Gestionar Empleados</a></li>
                </ul>
            </nav>
        </section>
        <section class="contenido">
            <h2>Editar Registro de Empleado</h2>
            <div class="editar">
            <form class="form-editar" action="actualizar.php" method="post">
                <div >
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre']; ?>">
                </div>
                <div >
                    <label>Teléfono</label>
                    <input type="text" name="telefono" class="form-control" value="<?php echo $row['telefono']; ?>">
                </div>
                <div >
                    <label>Puesto</label>
                    <input type="text" name="puesto" class="form-control" value="<?php echo $row['puesto']; ?>">
                </div>
                <div >
                    <label for="turno">Turno</label>
                    <select class="custom-select" id="turno" name="turno">
                        <option selected value="<?php echo $row['turno']; ?>"><?php echo $row['turno']; ?></option>
                        <?php
                            if($row['turno'] == "matutino" || $row['turno'] == "Matutino"){
                                echo "<option value='Vespertino'>". Vespertino ."</option>";
                            }else{
                                echo "<option value='Matutino'>". Matutino ."</option>";
                            }
                        ?>
                    </select>
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                <input type="submit" class="btn btn-primary" value="Actualizar" name="actualizar">
                </form>
            </div>
        </section>
    </div>
</body>
</html>