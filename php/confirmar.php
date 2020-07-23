<?php
    include("../html/mensajes.php");
    $id = $_GET['id'];

    ?>
        <script>
            function alerta(){
                swal({
                    title: "¿Está seguro que desea borrar el mensaje?",
                    text: "Presione el botón para confirmar",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "mail.php?id=<?php echo $id ?>";
                    }else{
                        window.location = "../html/mensajes.php";
                    }
                });
            }
            alerta();                   
        </script>
    <?php
?>