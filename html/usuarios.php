<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    $privilegio = $_SESSION['privilegio'];

    if($usuario == null || $usuario == "" || $privilegio == 'empleado'){
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
            $opcion_seleccionada = 6;
            $ruta = "";
            include("ventanas_modales/menu.php");
        ?>

        <section class="contenido">
            <h2>Administrar Usuarios</h2>
                <div class="">
                    <div class="encabezado">
                        <h5>Usuarios</h5>
                        <div class="opciones-us">
                            <a href="registro.php"class="boton-us">AGREGAR</a>
                        </div>
                    </div>
                    <div  class="contenido-imagenes tablas-historial" id="usuarios">
                        <?php         
                            require_once "../php/config.php";
                            
                            $sql = "SELECT * FROM usuario";
                            if($result = mysqli_query($conexion, $sql)){
                                if(mysqli_num_rows($result) > 0){
                                    echo "<table class='table'>";
                                        echo "<thead>";
                                            echo "<tr>";
                                                echo "<th>#</th>";
                                                echo "<th>Nombre</th>";
                                                echo "<th>Usuario</th>";
                                                echo "<th>Privilegios</th>";
                                                echo "<th>Telefono</th>";
                                                echo "<th>Correo</th>";
                                                echo "<th>Acciones</th>";
                                            echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        while($row = mysqli_fetch_array($result)){
                                            echo "<tr>";
                                                echo "<td>" . $row['id_usuario'] . "</td>";
                                                echo "<td>" . $row['nombre'] . "</td>";
                                                echo "<td>" . $row['nom_usuario'] . "</td>";

                                                $query_priv = "SELECT * FROM usuario WHERE id_usuario = '" . $row['id_usuario'] ."'";
                                                $result_priv = mysqli_query($conexion, $query_priv);
                                                $row_priv = mysqli_fetch_array($result_priv);

                                                $img = $row_priv['seccion_img'];
                                                $ven = $row_priv['seccion_ventas'];
                                                $emp = $row_priv['seccion_empleados'];

                                                $fila = "<td> <button class='btn btn-primary'";
                                                $fila .= "onClick=\"privilegios('".$row['nom_usuario']."','".$img."','".$ven."','".$emp."');\"style='width: 100%;'>";
                                                $fila .= "Ver</button></td>";

                                                echo $fila;

                                                echo "<td>" . $row['telefono'] . "</td>";
                                                echo "<td>" . $row['correo'] . "</td>";
                                                echo "<td class='acciones'>";
                                                    echo "<a href='../php/actualizar_usuario.php?no=". $row['id_usuario']."' class='icon-pencil' title='Editar registro' name='actualizar'></a>";
                                                    echo "<a href='../php/borrar_usuario.php?no=". $row['id_usuario']."' class='icon-trash' title='Eliminar Usuario'></a>";
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

<script>
    function privilegios(nombre, img, ventas, empleados){
        var sec_img = "► Gestionar Imágenes: ";
        var sec_ventas = "► Gestionar Ventas: ";
        var sec_empleados = "► Gestionar Empleados: ";

        if(img == 'c'){
            sec_img += " Consultas";
        }else{
            if(img == 'e'){
                sec_img += " Editar";
            }else{
                if(img == 'd'){
                    sec_img += " Eliminar";
                }else{
                    if(img == 't'){
                        sec_img += " Todos los privilegios";
                    }
                }
            }
        }

        if(ventas == 'c'){
            sec_ventas += " Consultas";
        }else{
            if(ventas == 'e'){
                sec_ventas += " Editar";
            }else{
                if(ventas == 'd'){
                    sec_ventas += " Eliminar";
                }else{
                    if(ventas == 't'){
                        sec_ventas += " Todos los privilegios";
                    }
                }
            }
        }
        
        if(empleados == 'c'){
            sec_empleados += " Consultas";
        }else{
            if(empleados == 'e'){
                sec_empleados += " Editar";
            }else{
                if(empleados == 'd'){
                    sec_empleados += " Eliminar";
                }else{
                    if(empleados == 't'){
                        sec_empleados += " Todos los privilegios";
                    }
                }
            }
        }

        
        swal("Los privilegios de "+ nombre + " son: ", sec_img + "\n" + sec_ventas + "\n" + sec_empleados);
    }
</script>