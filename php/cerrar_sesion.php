<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    if($usuario == null || $usuario = ""){
        header("Location: ../html/errores/iniciar_sesion.html");
        die();
    }     
    
    session_destroy();
    header("Location:../index.php");
?>