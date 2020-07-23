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
    <title>Sistema Full Wings | Gestionar Empleados</title>
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

    <!-- Hoja de estilos del tema -->
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

        <?php 
            $opcion_seleccionada = 4;
            $ruta = "";
            include("ventanas_modales/menu.php");
        ?>

        <section class="contenido">
            <h2>Empleados</h2>
            <div class="registro-pedidos">
                <div class="registro">
                    <h5>Registar Empleado</h5>
                    <form class="formulario-sis" method="POST" id="form-empleados" action="../php/agregar_pedido_empleado.php">
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
                                <option value="Matutino">Matutino</option>
                                <option value="Vespertino">Vespertino</option>
                            </select>
                        </div>
                        <button class="btn btn-danger" name="agregar-empleado">AGREGAR</button>
                        <p id="mensaje"></p>
                    </form>
                </div>
                <div class="historial">
                    <div class="encabezado">
                        <h5>Empleados</h5>
                        <a href="../php/reporte_empleados.php" class="print"><img src="../img/print.png" alt=""></a>
                    </div>
                    <div  class="contenido-imagenes tablas-historial">
                        <?php         
                            require_once "../php/config.php";
                            
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
                                    
                                } else{
                                    echo "<p class='lead'><em>LA BASE DE DATOS SE ENCUENTRA VACIA</em></p>";
                                }
                            } else{
                                echo "ERROR: $sql. " . mysqli_error($conexion);
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</body>

</html>