<?php
    include("config.php");

    if(isset($_POST['actualizar'])){
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $puesto = $_POST['puesto'];
        $turno = $_POST['turno'];
        $id = $_POST['id'];
        $sql = "UPDATE empleado SET nombre = '$nombre', telefono = '$telefono', puesto = '$puesto', turno = '$turno' WHERE No_Empleado = '$id'";
        $result = mysqli_query($conexion, $sql);

        header("location: ../html/empleados.php");
    }

    if(isset($_POST['actualizar-pedido'])){
        $empleado = $_POST['empleado'];
        $fecha = $_POST['fecha'];
        $orden = $_POST['orden'];
        $total = $_POST['total'];
        $id = $_POST['id'];
        $sql = "UPDATE pedido SET Empleado = '$empleado', fecha = '$fecha', orden = '$orden', total = '$total' WHERE No_orden= '$id'";
        $result = mysqli_query($conexion, $sql);

        header("location: ../html/pedidos.php");
    }
?>