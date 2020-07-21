<?php
    function show($id, $server, $user, $pass, $db){
        $con= @mysqli_connect($server,$user,$pass,$db);

        $statement = $con->query("SELECT * FROM imagenes WHERE no_imagen = '$id'");

        $fotos = $statement->fetch_assoc();

        return $fotos;
    }
?>