<?php 
    session_start();
    $usuario = $_SESSION['usuario'];
    if($usuario == null || $usuario = ""){
        header("Location: errores/iniciar_sesion.html");
        die();
    }       

    include("../php/config.php");

    $year = '2020';

    if($_POST){
        $year = $_POST['year'];
    }

    $enero = mysqli_fetch_array(mysqli_query($conexion, "SELECT SUM(Total) AS resultado FROM pedido WHERE MONTH(fecha) = 1 AND YEAR(fecha) = '$year'"));
    $febrero = mysqli_fetch_array(mysqli_query($conexion, "SELECT SUM(Total) AS resultado FROM pedido WHERE MONTH(fecha) = 2 AND YEAR(fecha) = '$year'"));
    $marzo = mysqli_fetch_array(mysqli_query($conexion, "SELECT SUM(Total) AS resultado FROM pedido WHERE MONTH(fecha) = 3 AND YEAR(fecha) = '$year'"));
    $abril = mysqli_fetch_array(mysqli_query($conexion, "SELECT SUM(Total) AS resultado FROM pedido WHERE MONTH(fecha) = 4 AND YEAR(fecha) = '$year'"));
    $mayo = mysqli_fetch_array(mysqli_query($conexion, "SELECT SUM(Total) AS resultado FROM pedido WHERE MONTH(fecha) = 5 AND YEAR(fecha) = '$year'"));
    $junio = mysqli_fetch_array(mysqli_query($conexion, "SELECT SUM(Total) AS resultado FROM pedido WHERE MONTH(fecha) = 6 AND YEAR(fecha) = '$year'"));
    $julio = mysqli_fetch_array(mysqli_query($conexion, "SELECT SUM(Total) AS resultado FROM pedido WHERE MONTH(fecha) = 7 AND YEAR(fecha) = '$year'"));
    $agosto = mysqli_fetch_array(mysqli_query($conexion, "SELECT SUM(Total) AS resultado FROM pedido WHERE MONTH(fecha) = 8 AND YEAR(fecha) = '$year'"));
    $septiembre = mysqli_fetch_array(mysqli_query($conexion, "SELECT SUM(Total) AS resultado FROM pedido WHERE MONTH(fecha) = 9 AND YEAR(fecha) = '$year'"));
    $octubre = mysqli_fetch_array(mysqli_query($conexion, "SELECT SUM(Total) AS resultado FROM pedido WHERE MONTH(fecha) = 10 AND YEAR(fecha) = '$year'"));
    $noviembre = mysqli_fetch_array(mysqli_query($conexion, "SELECT SUM(Total) AS resultado FROM pedido WHERE MONTH(fecha) = 11 AND YEAR(fecha) = '$year'"));
    $diciembre = mysqli_fetch_array(mysqli_query($conexion, "SELECT SUM(Total) AS resultado FROM pedido WHERE MONTH(fecha) = 12 AND YEAR(fecha) = '$year'"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Full Wings | Estadísticas</title>
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
            $opcion_seleccionada = 5;
            $ruta = "";
            include("ventanas_modales/menu.php")
        ?>

        <section class="contenido">
            <span class="subtitulos">
                <a href="estadisticas.php" class="no-seleccionado"><h2 class="no-seleccionado">Visitas</h2></a>
                <h2>Ventas</h2>
            </span>
                <div class="con-visitas">
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

                    <canvas id="myChart"></canvas>
                    
                    <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                            datasets: [{
                                label: 'Ventas de <?php echo $year; ?>',
                                data: ["<?php echo $enero['resultado']; ?>",
                                        "<?php echo $febrero['resultado']; ?>",
                                        "<?php echo $marzo['resultado']; ?>",
                                        "<?php echo $abril['resultado']; ?>",
                                        "<?php echo $mayo['resultado']; ?>",
                                        "<?php echo $junio['resultado']; ?>",
                                        "<?php echo $julio['resultado']; ?>",
                                        "<?php echo $agosto['resultado']; ?>",
                                        "<?php echo $septiembre['resultado']; ?>",
                                        "<?php echo $octubre['resultado']; ?>",
                                        "<?php echo $noviembre['resultado']; ?>",
                                        "<?php echo $diciembre['resultado']; ?>"
                                ],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                    </script>

                    
                    <form class="formulario-sis form-visitas" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="form-elemento">
                            <label for="year">Seleccionar Año:</label>
                            <select name="year" id="year" >
                                <?php
                                    for($k = 2020; $k <= 2030; $k+=1){
                                        if($k == 2020){
                                            echo  "<option value='". $k . "' selected>" . $k . "</option>";
                                        }else{
                                            echo  "<option value='". $k . "'>" . $k . "</option>";
                                        }
                                        
                                    }
                                ?>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Consultar Gráfica" name="consulta">
                    </form>
                </div>
        </section>
    </body>
</html>