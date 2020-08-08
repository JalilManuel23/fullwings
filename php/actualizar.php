<?php
    include("config.php");

    if(isset($_POST['actualizar'])){
        $incorrecto = FALSE;
        $turno = $_POST['turno'];
        $id = $_POST['id'];
        $errores = "";

        $nombre=""; $telefono=""; $puesto="";  
        
        $nombre_in = trim($_POST['nombre']);
        if(empty($nombre_in)){
            $errores .= "Ingresa tu nombre.";$incorrecto = TRUE;
        } elseif(!filter_var($nombre_in, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$/")))){
            $errores .= "El nombre ingresado no es válido.";$incorrecto = TRUE;
        } else{
            $nombre = $nombre_in;
        }  


        $puesto_in = trim($_POST['puesto']);
        if(empty($puesto_in)){
            $errores .= "Ingresa un puesto.";$incorrecto = TRUE;
        } elseif(!filter_var($puesto_in, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^(?=.{3,20}$)[a-zñA-ZÑ](\s?[a-zñA-ZÑ])*$/")))){
            $errores .= "El puesto ingresado no es válido.";$incorrecto = TRUE;
        } else{
            $puesto = $puesto_in;
        }  

        $telefono_in = trim( $_POST['telefono']);
        if(empty($telefono_in)){
            $errores .= "Por favor, ingresa el número telefónico del empleado.";     $incorrecto = TRUE;
        } elseif(!filter_var($telefono_in, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/([0-9]){10}/")))){
            $errores .= "Por favor, ingresa un valor de número telefónico correcto (Deben ser 10 digitos)";$incorrecto = TRUE;
        } else{
            $telefono = $telefono_in;
        }

        if($incorrecto == FALSE){
            include("../html/empleados.php");

            $sql = "UPDATE empleado SET nombre = '$nombre', telefono = '$telefono', puesto = '$puesto', turno = '$turno' WHERE No_Empleado = '$id'";
            $result = mysqli_query($conexion, $sql);
        ?>
            <script>
                function alerta(){
                    swal({
                        title: "¡Empleado actualizado correctamente!",
                        text: "Da click en el botón para continuar",
                        icon: "success",
                    }).then(function() {
                        window.location = "../html/empleados.php";
                    });
                }
                alerta();                   
            </script>
        <?php
        }else{
            include("../html/empleados.php");
        ?>
            <script>
                function alerta(){
                    swal({
                        title: "Por favor, complete el formulario correctamente",
                        text: "<?php echo $errores ?>",
                        icon: "warning",
                    }).then(function() {
                        window.location = "../html/empleados.php";
                    });
                }
                alerta();                   
            </script>
        <?php
        }
        
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
                });
            }
            alerta();                   
        </script>
<?php
    }

    if(isset($_POST['actualizar_usuario'])){
        include("../html/usuarios.php");

        $id = $_POST['id'];

        $incorrecto = FALSE;
        $errores = "";
    
        $nombre=""; $usuario=""; $telefono=""; $contrasenia=""; $correo="";  
    
        $usuario_in = trim($_POST['nom_usuario']);
            if(empty($usuario_in)){
                $errores .= "Ingresa un nombre de usuario.";$incorrecto = TRUE;
            } elseif(!filter_var($usuario_in, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^(?=.{3,20}$)[a-zñA-ZÑ0-9](\s?[a-zñA-ZÑ0-9])*$/")))){
                $errores .= "El nombre de usuario no es válido.";$incorrecto = TRUE;
            } else{
                $usuario = $usuario_in;
            }   
            
            $nombre_in = trim($_POST['nombre']);
            if(empty($nombre_in)){
                $errores .= "Ingresa tu nombre.";$incorrecto = TRUE;
            } elseif(!filter_var($nombre_in, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$/")))){
                $errores .= "El nombre ingresado no es válido.";$incorrecto = TRUE;
            } else{
                $nombre = $nombre_in;
            }  
    
            $contrasenia_in = trim($_POST['contrasenia']);
            if(empty($contrasenia_in)){
                $errores .= "La contraseña debe tener minimo 8 caracteres";$incorrecto = TRUE;
            }  else{
                $contrasenia = $contrasenia_in;
            }

            $telefono_in = trim( $_POST['tel']);
            if(empty($telefono_in)){
                $errores .= "Por favor, ingresa el número telefónico del empleado.";     $incorrecto = TRUE;
            } elseif(!filter_var($telefono_in, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/([0-9]){10}/")))){
                $errores .= "Por favor, ingresa un valor de número telefónico correcto (Deben ser 10 digitos)";$incorrecto = TRUE;
            } else{
                $telefono = $telefono_in;
            }
    
          $correo_in = trim($_POST['mail']);
             if(empty($correo_in)){
             $errores .= "Por favor, ingresa una dirección de correo electrónico.";$incorrecto = TRUE;     
               } elseif(!filter_var($correo_in, FILTER_VALIDATE_EMAIL)) {
              $errores .= "El correo electrónico no es correcto";$incorrecto = TRUE;
              } else {
                $correo = $correo_in;
        }
            
            if($incorrecto === FALSE){
                $query = $conexion->query("UPDATE usuario SET nom_usuario = '$usuario', contrasenia = HEX(AES_ENCRYPT('$contrasenia','verpass')), nombre = '$nombre', telefono = '$telefono', correo = '$correo' WHERE id_usuario = '$id'");
                
                $iniciar = $conexion->query("START TRANSACTION;");
                $validar = $conexion->query("select * from usuario where nom_usuario = '$usuario'");
                $contar = $validar ->num_rows;
                
                if ($contar == 1) {
                    $cancelar = $conexion->query("COMMIT;");        
                    ?>
                        <script>
                            function alerta(){
                                swal({
                                    title: "¡Usuario editado correctamente!",
                                    text: "Da click para continuar",
                                    icon: "success",
                                }).then(function() {
                                    window.location = "../html/usuarios.php";
                                });
                            }
                            alerta();                   
                        </script>
                    <?php
                }else{
                    if($contar > 1){
                        $cancelar = $conexion->query("ROLLBACK;");                                   
                ?>
                        <script>
                            function alerta(){
                                swal({
                                    title: "Nombre de Usuario ya existente",
                                    text: "Por favor, intenta con otro.",
                                    icon: "warning",
                                    dangerMode: true,
                                }).then(function() {
                                    window.location = "../php/actualizar_usuario.php?no=<?php echo $id; ?>";
                                });
                            }
                            alerta();                   
                        </script>
                <?php
                    }
                }
            }else{
?>
                <script>
                    function alerta(){
                        swal({
                            title: "Por favor, complete el formulario correctamente",
                            text: "<?php echo $errores ?>",
                            icon: "warning",
                        })
                        .then(function() {
                            window.location = "../php/actualizar_usuario.php?no=<?php echo $id; ?>";
                        });
                    }
                    alerta();                   
                </script>
<?php
            }
        }
    
?>