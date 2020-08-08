<?php
include("config.php");

if(isset($_POST['agregar-empleado'])){
    include("../html/empleados.php");

    $errores = "";
    $incorrecto = FALSE;

    $nombre_in = trim($_POST['nombre']);
    if(empty($nombre_in)){
        $errores .= "Ingresa tu nombre.";$incorrecto = TRUE;
    } elseif(!filter_var($nombre_in, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$/")))){
        $errores .= "El nombre ingresado no es válido.";$incorrecto = TRUE;
    } else{
        $nombre = $nombre_in;
    }  

    $telefono_in = trim( $_POST['telefono']);
    if(empty($telefono_in)){
        $errores .= "Por favor, ingresa el número telefónico del empleado.";     $incorrecto = TRUE;
    } elseif(!filter_var($telefono_in, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/([0-9]){10}/")))){
        $errores .= "Por favor, ingresa un valor de número telefónico correcto (Deben ser 10 digitos)";$incorrecto = TRUE;
    } else{
        $telefono = $telefono_in;
    }

    $puesto_in = trim($_POST['puesto']);
    if(empty($puesto_in)){
        $errores .= "Ingresa un puesto.";$incorrecto = TRUE;
    } elseif(!filter_var($puesto_in, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^(?=.{3,20}$)[a-zñA-ZÑ](\s?[a-zñA-ZÑ])*$/")))){
        $errores .= "El puesto ingresado no es válido.";$incorrecto = TRUE;
    } else{
        $puesto = $puesto_in;
    } 

    $turno = $_POST['turno'];

    if($incorrecto == FALSE){
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
                        });
                    }
                    alerta();                   
                </script>
            <?php
        }
    }else{
        ?>
        <script>
            function alerta(){
                swal({
                    title: "Por favor, complete correctamente el formulario",
                    text: "<?php echo $errores; ?>",
                    icon: "warning",
                    dangerMode: true,
                }).then(function() {
                        window.location = "../html/empleados.php";
                });
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