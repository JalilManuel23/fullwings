<?php
    include("../html/empleados.php");
    include("php/config.php");
    $id = $_GET['id'];

    ?>
        <script>
            function alerta(){
                swal({
                    title: "¿Está seguro que desea borrar la venta?",
                    text: "Presione el botón para confirmar",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "../html/empleados.php?id=<?php echo $id; ?>&b=s";
                    }else{
                        window.location = "../html/empleados.php";
                    }
                });
            }
            alerta();                   
        </script>
    <?php
?>