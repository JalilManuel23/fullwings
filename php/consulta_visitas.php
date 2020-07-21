<?php 
    include("config.php");

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
