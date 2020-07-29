<?php
    include("config.php");

    if(isset($_POST['borrar'])){
        $no = $_POST['id'];
        $sql = "DELETE FROM pedido WHERE No_orden = '$no'";  
        $result = mysqli_query($conexion, $sql);  

        include("../html/pedidos.php");

        ?>
            <script>
                function alerta(){
                    swal({
                        title: "¡Pedido eliminado exitosamente!",
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Pedido</title>
        <!-- Favicon -->
        <link rel="icon" href="../favicon.ico">
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
                                <a href="../html/pedidos.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>