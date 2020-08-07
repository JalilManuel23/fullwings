<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    if($usuario == null || $usuario = ""){
        header("Location: errores/iniciar_sesion.html");
        die();
    }    

    include('../php/config.php');
    $query = "SELECT * FROM usuario WHERE nom_usuario = '" . $_SESSION['usuario'] ."'";
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_array($result);
    $priv = $row['seccion_img'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Full Wings | Cambiar Imagenes</title>
    <!-- Favicon -->
    <link rel="icon" href="../favicon.ico">

    <!-- Script y links externos -->
    <?php include("scripts_links.php"); ?>
    
    <!-- Scripts Locales -->
    <script src="../js/menu.js"></script>
    <script src="../js/validar_contrasenia.js"></script>

    <!-- Normalize -->
    <link rel="stylesheet" href="../css/normalize.css">

    <!-- Iconos Fontastic -->
    <link rel="stylesheet" href="../css/styles.css">

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
            $opcion_seleccionada = 1;
            $ruta = "";
            include("ventanas_modales/menu.php");
        ?>
        <section class="contenido-imagenes">

            <table class="table">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Sección</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <?php if($priv != 'c') echo "<th>Acciones</th>"; ?>
                    </tr>

                    <?php
                        $con = 1;

                        include("../php/config.php");
                        include("../php/imagenes/mostrar.php");

                        while($con < 13){

                            $seccion = "";

                            if($con >= 1 && $con <= 9){
                                $seccion = "Menú";
                            }elseif($con >= 10 && $con <= 12){
                                $seccion = "Inicio";
                            }

                            $fotos = show($con,$Conserver,$Conuser,$Conpass,$Condb);
                            echo "<tr>";
                                echo "<td> ". $fotos['titulo'] . "</td>";
                                echo "<td>" . $seccion . "</td>";
                                echo "<td>". $fotos['descripcion'] . "</td>";
                                echo "<td> <img src='../img/". $fotos['imagen'] . "'></td>";
                                
                                echo "<td>";
                                    if($priv == 'e' || $priv == 't'){
                                        echo "<a href='../php/imagenes/subir.php?id=" .$con."' class='icon-pencil'></a>";
                                    }
                                    if($priv == 'd' || $priv == 't'){
                                        echo "<a href='../php/cambiar_img_default.php?id= " .$con."' class='icon-trash'></a>";
                                    }
                                echo "</td>";
                            echo "</tr>";

                            $con++;
                        }
                    ?>
                </thead>
            </table>
        </section>
    </div>
</body>
</html>