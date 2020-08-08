<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    $privilegio = $_SESSION['privilegio'];

    if($usuario == null || $usuario = "" || $privilegio == 'empleado'){
        header("Location: ../html/errores/iniciar_sesion.html");
        die();
    } 

    include("config.php");

    $correcto = FALSE;

    if(isset($_POST['borrar'])){
        $no = $_POST['id'];
        $sql = "DELETE FROM usuario WHERE id_usuario = '$no'";  
        $result = mysqli_query($conexion, $sql);  
        $correcto = TRUE;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Pedido</title>
        <!-- Favicon -->
        <link rel="icon" href="../favicon.ico">
            <!-- Script y links externos -->
    <?php include("../html/scripts_links.php"); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }

        @media screen and (max-width:768px){
            .wrapper{
                width: 300px;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Borrar Registro</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["no"]); ?>"/>
                            <p>Está seguro que deseas borrar el registro</p><br>
                            <p>
                                <input type="submit" value="Si" class="btn btn-danger" name="borrar">
                                <a href="../html/usuarios.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
<?php 
if($correcto){
    ?>
    <script>
        function alerta(){
            swal({
                title: "¡Usuario eliminado exitosamente!",
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