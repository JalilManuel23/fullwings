<?php

include("config.php");

$usuario = $_SESSION['usuario'];
if($usuario == null || $usuario = ""){
    echo "<h2>Acceso no autorizado. Inicie sesión.</h2>";
    die();
}    

if(isset($_POST['agregar-empleado'])){
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $puesto = $_POST['puesto'];
    $turno = $_POST['turno'];

    $usuario = $_SESSION['usuario'];
    $consulta = "SELECT * FROM administrador WHERE nom_usuario = '$usuario'";
    $registros = mysqli_query($conexion,$consulta);
    $admin = mysqli_fetch_row($registros);

    $query = $conexion->query("INSERT INTO empleado(telefono,nombre,puesto,turno,admin) VALUES ('$telefono','$nombre','$puesto','$turno','$admin[0]')");
    $comprobar = $conexion->query("SELECT * FROM empleado WHERE nombre = '$nombre'");
    $exito = $comprobar ->num_rows;
    if ($exito) {     
        ?>
            <p class="correcto" id="correcto">¡El empleado ha sido agregado!</p>
        <?php
    }
}

if(isset($_POST['agregar-pedido'])){
    $empleado = $_POST['empleado'];
    $fecha = $_POST['fecha'];
    $orden = $_POST['orden'];
    $total = $_POST['total'];

    $query = "INSERT INTO pedido(Empleado,fecha,orden,Total) VALUES ('$empleado','$fecha','$orden','$total')";

    $insertar = mysqli_query($conexion,$query);

    echo"<p class='correcto' id='correcto'>¡El pedido ha sido agregado!</p>";
      
    
}

?>