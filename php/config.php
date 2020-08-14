<?php
// /* CONEXIÓN LOCAL HOST*/

$Conserver="localhost";
$Conuser="root";
$Conpass="Jml14";
$Condb="fullwings";

/*CONEXIÓN AL SERVIDOR DEL PROFE ISAAC*/

// $Conserver="10.209.81.2";
// $Conuser="1006416_eh53322";
// $Conpass="Utd_2020";
// $Condb="1006416-55";

/*CONEXIÓN AL SERVIDOR DE HOSTGATOR*/

// $Conserver="localhost:3306";
// $Conuser="fullwing_admin";
// $Conpass="Jalilkm2";
// $Condb="fullwing_fullwings";

$conexion= @mysqli_connect($Conserver,$Conuser,$Conpass,$Condb);

if($conexion->connect_errno){
    die("La conexión ha fallado");
}

?>