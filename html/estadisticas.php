<?php 
    include("../php/config.php");

    $year = '2020';

    if($_POST){
        $year = $_POST['year'];
    }

    $enero = mysqli_fetch_array(mysqli_query($conexion, "SELECT COUNT(id_visita) AS resultado FROM visitas WHERE MONTH(fecha) = 1 AND YEAR(fecha) = '$year'"));
    $febrero = mysqli_fetch_array(mysqli_query($conexion, "SELECT COUNT(id_visita) AS resultado FROM visitas WHERE MONTH(fecha) = 2 AND YEAR(fecha) = '$year'"));
    $marzo = mysqli_fetch_array(mysqli_query($conexion, "SELECT COUNT(id_visita) AS resultado FROM visitas WHERE MONTH(fecha) = 3 AND YEAR(fecha) = '$year'"));
    $abril = mysqli_fetch_array(mysqli_query($conexion, "SELECT COUNT(id_visita) AS resultado FROM visitas WHERE MONTH(fecha) = 4 AND YEAR(fecha) = '$year'"));
    $mayo = mysqli_fetch_array(mysqli_query($conexion, "SELECT COUNT(id_visita) AS resultado FROM visitas WHERE MONTH(fecha) = 5 AND YEAR(fecha) = '$year'"));
    $junio = mysqli_fetch_array(mysqli_query($conexion, "SELECT COUNT(id_visita) AS resultado FROM visitas WHERE MONTH(fecha) = 6 AND YEAR(fecha) = '$year'"));
    $julio = mysqli_fetch_array(mysqli_query($conexion, "SELECT COUNT(id_visita) AS resultado FROM visitas WHERE MONTH(fecha) = 7 AND YEAR(fecha) = '$year'"));
    $agosto = mysqli_fetch_array(mysqli_query($conexion, "SELECT COUNT(id_visita) AS resultado FROM visitas WHERE MONTH(fecha) = 8 AND YEAR(fecha) = '$year'"));
    $septiembre = mysqli_fetch_array(mysqli_query($conexion, "SELECT COUNT(id_visita) AS resultado FROM visitas WHERE MONTH(fecha) = 9 AND YEAR(fecha) = '$year'"));
    $octubre = mysqli_fetch_array(mysqli_query($conexion, "SELECT COUNT(id_visita) AS resultado FROM visitas WHERE MONTH(fecha) = 10 AND YEAR(fecha) = '$year'"));
    $noviembre = mysqli_fetch_array(mysqli_query($conexion, "SELECT COUNT(id_visita) AS resultado FROM visitas WHERE MONTH(fecha) = 11 AND YEAR(fecha) = '$year'"));
    $diciembre = mysqli_fetch_array(mysqli_query($conexion, "SELECT COUNT(id_visita) AS resultado FROM visitas WHERE MONTH(fecha) = 12 AND YEAR(fecha) = '$year'"));
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
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <select name="year" id="year" >
                <option value="2020" selected>2020</option>
                <option value="2021">2021</option>
            </select>
            <input type="submit" value="Consultar Gráfica" name="consulta">
        </form>

        <canvas id="myChart" width="400" height="400"></canvas>

        <?php include("../php/consulta_visitas.php");?>
        
        <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                datasets: [{
                    label: 'Número de Visitas',
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
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
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
    </body>
</html>