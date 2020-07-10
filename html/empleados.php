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
    <title>Sistema Full Wings | Gestionar Empleados</title>
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

    <!-- Validación de formularios -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#form-empleados').validate({
                rules :{
                    nombre : {
                        required : true,
                        minlength : 3, //para validar campo con minimo 3 caracteres
                        maxlength : 9  //para validar campo con maximo 9 caracteres
                    },
                    telefono : {
                        required : true,
                        number : true,   //para validar campo solo numeros
                        minlength : 10, //para validar campo con minimo 3 caracteres
                        maxlength : 10  //para validar campo con maximo 9 caracteres
                    },
                    puesto : {
                        required :true
                    }

                },
                messages : {
                    nombre : {
                        required : "Debe ingresar un nombre",
                        minlength : "El nombre debe tener un minimo de 3 caracteres",
                        maxlength : "El nombre debe tener un máximo de 9 caracteres"
                    },
                    telefono : {
                        required : "Debe ingresar un número de teléfono",
                        number : "Solo se aceptan números",
                        minlength : "El número de teléfono debe ser de 10 digitos",
                        maxlength : "El número de teléfono debe ser de 10 digitos"
                    },
                    puesto : {
                        required : "Debe ingresar un puesto"
                    
                    }
                }
            });    
        });
    </script>
    
    <!-- Normalize -->
    <link rel="stylesheet" href="../css/normalize.css">

    <!-- Iconos Fontastic -->
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://file.myfontastic.com/UEz7X7ddTT5UNuw9YHrPN5/icons.css" rel="stylesheet">

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
                        <input name="contrasenia" type="password" class="form-control"  id="pass1" required>
                    </div>
                    <div class="form-group">
                        <label for="pass2">Confirmar Contraseña</label>
                        <input name="confirm-contra" type="password" class="form-control" id="pass2" required>
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
                    <li class="icon-paint-brush"><a href="apariencia.php">Apariencia</a></li>
                    <li class="icon-truck"><a href="pedidos.php">Gestionar Pedidos</a></li>
                    <li class="icon-users" id="seleccionado"><a href="#">Gestionar Empleados</a></li>
                </ul>
            </nav>
        </section>
        <section class="contenido">
            
            <h2>Empleados</h2>
            <div class="registro-pedidos">
                <div class="registro">
                    <h5>Registar Empleado</h5>
                    <form class="formulario" method="POST" id="form-empleados">
                        <div class="form-elemento">
                            <label for="nombre">Nombre del empleado</label>
                            <input type="text" name="nombre" placeholder="Nombre" id="nombre" required>
                        </div>

                        <div class="form-elemento">
                            <label for="telefono">Teléfono</label>
                            <input type="text" name="telefono" placeholder="Teléfono" id="telefono" required>
                        </div>

                        <div class="form-elemento">
                            <label for="puesto">Puesto</label>
                            <input type="text" name="puesto" placeholder="Puesto" id="puesto" required>
                        </div>

                        <div class="form-elemento">
                            <label for="turno">Turno</label>
                            <select name="turno" id="turno" required>
                                <option value="matutino">Matutino</option>
                                <option value="vespertino">Vespertino</option>
                            </select>
                        </div>
                        <button class="btn btn-danger" name="agregar-empleado">AGREGAR</button>
                        <p id="mensaje"></p>
                    </form>
                    <?php
                        include("../php/agregar_pedido_empleado.php");
                    ?>
                </div>
                <div class="historial">
                    <div class="encabezado">
                        <h5>Empleados</h5>
                        <a href="../php/reporte_empleados.php" class="print"><img src="../img/print.png" alt=""></a>
                    </div>
                    <div  class="contenido-imagenes tablas-historial">
                        <?php
                        // Include config file
                        require_once "../php/config.php";
                        
                        // Attempt select query execution
                        $sql = "SELECT * FROM empleado";
                        if($result = mysqli_query($conexion, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo "<table class='table'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Nombre</th>";
                                            echo "<th>Teléfono</th>";
                                            echo "<th>Puesto</th>";
                                            echo "<th>Turno</th>";
                                            echo "<th>Acciones</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . $row['No_Empleado'] . "</td>";
                                            echo "<td>" . $row['nombre'] . "</td>";
                                            echo "<td>" . $row['telefono'] . "</td>";
                                            echo "<td>" . $row['puesto'] . "</td>";
                                            echo "<td>" . $row['turno'] . "</td>";
                                            echo "<td class='acciones'>";
                                                echo "<a href='../php/actualizar_empleado.php?no=". $row['No_Empleado']."' class='icon-pencil' title='Editar registro' name='actualizar'></a>";
                                                echo "<a href='../php/borrar.php?no=". $row['No_Empleado']."' class='icon-trash' title='Eliminar Empleado'></a>";
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>LA BASE DE DATOS SE ENCUENTRA NULL</em></p>";
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
                        }
    
                        // Close connection
                        // mysqli_close($conexion);
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</body>

</html>