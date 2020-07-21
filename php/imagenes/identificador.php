<?php 
    include('mostrar.php');

    function devolver_id(){
             $id = show($_GET['no']);
             return $id;
    }

?>