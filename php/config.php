<?php
// /* CONEXIÓN LOCAL HOST*/

$Conserver="localhost";
$Conuser="root";
$Conpass="Jml14";
$Condb="fullwings";

/*CONEXIÓN AL SERVIDOR DEL PROFE ISAAC*/

// $Conserver="162.241.61.200";
// $Conuser="fullwing_admin";
// $Conpass="Jml14";
// $Condb="fullwing_fullwings";

$conexion= @mysqli_connect($Conserver,$Conuser,$Conpass,$Condb);

if($conexion->connect_errno){
    die("La conexión ha fallado");
}

?>