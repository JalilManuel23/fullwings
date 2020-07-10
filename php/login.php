<?php

if(isset($_POST['login'])){

    require("../php/config.php");

    $user = $_POST['user_name'];
    $pass = $_POST['user_pass'];

    $validar = $conexion->query("select * from usuario where Nombre = '$user' and Password = '$pass' ");
    $contar = $validar ->num_rows;

    echo $contar;
     if($contar == 1) {
        $_SESSION['usuario'] = $user;
        header ("location: ../html/apariencia.html");
     } else if ($contar == 0){
         header ("location: ../html/login.html");
     }


}
?>