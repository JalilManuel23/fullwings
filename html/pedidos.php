<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    if($usuario == null || $usuario = ""){
        header("Location: errores/iniciar_sesion.html");
        die();
    }        
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Full Wings | Pedidos</title>
    <!-- Favicon -->
    <link rel="icon" href="../favicon.ico">
    
    <!-- Script y links externos -->
    <?php include("scripts_links.php"); ?>

    <!-- Scripts Locales -->
    <script src="../js/menu.js"></script>
    <script src="../js/validar_contrasenia.js"></script>

    <!-- Validación de formularios -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#form-pedido').validate({
                rules : {
                    total : {
                        required : true,
                        number : true
                    },
                    fecha : {
                        required : true
                    },
                    orden : {
                        required : true
                    }
                },
                messages : {
                    total : {
                        required : "Por favor introduzca el monto total del pedido",
                        number :  "Por favor ingrese una cantidad valida"
                    },
                    fecha : {
                        required : "Por favor introduzca la fecha del pedido"
                    },
                    orden : {
                        required : "Por favor introduzca una descripción del pedido"
                    }
                }
            });    
        });
    </script>

    <!-- Normalize -->
    <link rel="stylesheet" href="../css/normalize.css">
    <!-- Hoja de estilos del tema -->
    <?php
        include("../php/tema.php");
        echo "<link rel='stylesheet' href='../css/temas/tema" . $tema . ".css'>";
    ?>
    <!-- Iconos Fontastic -->
    <link rel="stylesheet" href="../css/styles.css">

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
        <?php include("ventanas_modales/cerrar_sesion.php"); ?>
    </div>

    <!-- Modal de editar cuenta -->
    <form action="../php/editar_usuario.php" method="post">
        <?php include("ventanas_modales/editar_cuenta.php"); ?>
    </form>

    <div class="main">
    <input type="checkbox" id="boton-menu">
        <section class="menu-sis">
            <nav>
                <ul>
                    <li class="icon-picture-streamline-1"><a href="cambiar_imagen.php">Cambiar Imagenes</a></li>
                    <li class="icon-paint-brush"><a href="apariencia.php">Apariencia</a></li>
                    <li class="icon-truck" id="seleccionado-sis"><a href="#">Gestionar Pedidos</a></li>
                    <li class="icon-users"><a href="empleados.php">Gestionar Empleados</a></li>
                </ul>
            </nav>
        </section>
        <section class="contenido">
            <h2>Pedidos</h2>
            <div class="registro-pedidos">
                <div class="registro">
                    <h5>Registar Pedido</h5>
                    <form method="POST" class="formulario-sis" id="form-pedido" action="../php/agregar_pedido_empleado.php">
                        <div class="form-elemento">
                            <label for="empleado">Empleado</label>
                            <select name="empleado" id="empleado">
                                <?php
                                    require_once "../php/config.php";
                            
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM empleado";
                                    if($result = mysqli_query($conexion, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_array($result)){
                                                echo "<option value=" . $row['No_Empleado'] .">#" . $row['No_Empleado'] . " " . $row['nombre'] . "</option>";
                                            }
                                            mysqli_free_result($result);
                                        } else{
                                            echo "<p class='lead'><em>NO HAY EMPLEADOS REGISTRADOS</em></p>";
                                        }
                                    } else{
                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-elemento">
                            <label for="fecha">Fecha</label>
                            <input name="fecha" type="date" placeholder="Fecha" id="fecha">
                        </div>
                        <div class="form-elemento">
                            <label for="descripcion">Descripción del pedido</label>
                            <textarea name="orden" id="orden" cols="30" rows="10" placeholder="Descripción del Pedido" id="descripcion"></textarea>
                        </div>
                        <div class="form-elemento">
                            <label for="total">Total</label>
                            <input name="total" type="text" placeholder="Monto Total $" id="total">
                        </div>
                        <button class="btn btn-danger" name="agregar-pedido">AGREGAR</button>                     
                    </form>
                </div>
                <div class="historial">
                    <div class="encabezado">
                        <h5>Historial de Pedidos</h5>
                        <a href="../php/reporte_pedidos.php" class="print"><img src="../img/print.png" alt=""></a>
                    </div>
                    <div class="contenido-imagenes tablas-historial">
                    <?php
                        // Include config file
                        require_once "../php/config.php";
                        
                        // Attempt select query execution
                        $sql = "SELECT * FROM pedido";
                        if($result = mysqli_query($conexion, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo "<table class='table'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Empleado</th>";
                                            echo "<th>Fecha</th>";
                                            echo "<th>Descripción</th>";
                                            echo "<th>Monto Total</th>";
                                            echo "<th>Acciones</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . $row['No_orden'] . "</td>";
                                            echo "<td>" . $row['Empleado'] . "</td>";
                                            echo "<td>" . $row['fecha'] . "</td>";
                                            echo "<td>" . $row['orden'] . "</td>";
                                            echo "<td>" . $row['Total'] . "</td>";
                                            echo "<td class='acciones'>";
                                                echo "<a href='../php/actualizar_pedido.php?no=". $row['No_orden']."' class='icon-pencil' title='Editar registro' name='actualizar'></a>";
                                                echo "<a href='../php/borrar_pedido.php?no=". $row['No_orden']."' class='icon-trash' title='Eliminar Empleado'></a>";
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