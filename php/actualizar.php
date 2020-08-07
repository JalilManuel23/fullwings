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
        include("../html/empleados.php");
        ?>
            <script>
                function alerta(){
                    swal({
                        title: "¡Empleado actualizado correctamente!",
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

    if(isset($_POST['actualizar-pedido'])){
        $empleado = $_POST['empleado'];
        $fecha = $_POST['fecha'];
        $orden = $_POST['orden'];
        $total = $_POST['total'];
        $id = $_POST['id'];
        $sql = "UPDATE pedido SET Empleado = '$empleado', fecha = '$fecha', orden = '$orden', total = '$total' WHERE No_orden= '$id'";
        $result = mysqli_query($conexion, $sql);

        include("../html/pedidos.php");
?>
        <script>
            function alerta(){
                swal({
                    title: "¡Pedido actualizado correctamente!",
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

    if(isset($_POST['actualizar_usuario'])){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $usuario = $_POST['nom_usuario'];
        $tel = $_POST['tel'];
        $correo = $_POST['mail'];
        $sql = "UPDATE usuario SET nombre = '$nombre', nom_usuario = '$usuario', telefono = '$tel', correo = '$correo' WHERE id_usuario = '$id'";
        $result = mysqli_query($conexion, $sql);

        include("../html/usuarios.php");
?>
        <script>
            function alerta(){
                swal({
                    title: "¡Usuario actualizado correctamente!",
                    text: "Da click en el botón para continuar",
                    icon: "success",
                }).then(function() {
                    window.location = "../html/usuarios.php";
                });
            }
            alerta();                   
        </script>
<?php
    }
?>