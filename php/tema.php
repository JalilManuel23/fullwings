<?php 
    include("config.php");
    $select = "SELECT * FROM tema";

    $result = mysqli_query($conexion, $select);
    $row_tema = mysqli_fetch_array($result);

    $tema = $row_tema['numero_tema'];
?>