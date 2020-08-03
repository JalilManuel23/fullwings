<?php
include("config.php");

if(isset($_POST['agregar-empleado'])){
    include("../html/empleados.php");

    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $puesto = $_POST['puesto'];
    $turno = $_POST['turno'];

    $usuario = $_SESSION['usuario'];
    $consulta = "SELECT * FROM usuario WHERE nom_usuario = '$usuario'";
    $registros = mysqli_query($conexion,$consulta);
    $admin = mysqli_fetch_row($registros);

    $query = $conexion->query("INSERT INTO empleado(telefono,nombre,puesto,turno,usuario) VALUES ('$telefono','$nombre','$puesto','$turno','$admin[0]')");
    $comprobar = $conexion->query("SELECT * FROM empleado WHERE nombre = '$nombre'");
    $exito = $comprobar ->num_rows;

    if ($exito) {   
        ?>
            <script>
                function alerta(){
                    swal({
                        title: "¡Empleado agregado correctamente!",
                        text: "Da click en el botón para continuar",
                        icon: "success",
                    }).then(function() {
                        window.location = "../html/empleados.php";
                    });;
                }
                alerta();                   
            </script>
        <?php
    }
}

if(isset($_POST['agregar-pedido'])){
    include("../html/pedidos.php");

    $empleado = $_POST['empleado'];
    $fecha = $_POST['fecha'];
    $orden = $_POST['orden'];
    $total = $_POST['total'];

    $query = "INSERT INTO pedido(Empleado,fecha,orden,Total) VALUES ('$empleado','$fecha','$orden','$total')";

    $insertar = mysqli_query($conexion,$query);

    ?>
    <script>
        function alerta(){
            swal({
                title: "¡Pedido agregado correctamente!",
                text: "Da click en el botón para continuar",
                icon: "success",
            }).then(function() {
                window.location = "../html/pedidos.php";
            });;
        }
        alerta();                   
    </script>
<?php   
    
}

?>