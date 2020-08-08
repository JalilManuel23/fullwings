<?php
// /* CONEXIÓN LOCAL HOST*/

// $Conserver="localhost";
// $Conuser="root";
// $Conpass="Jml14";
// $Condb="fullwings";

/*CONEXIÓN AL SERVIDOR DEL PROFE ISAAC*/

$Conserver="10.209.81.2";
$Conuser="1006416_eh53322";
$Conpass="Utd_2020";
$Condb="1006416-55";

/*CONEXIÓN A SERVIDOR DE EPIZY */

// $Conserver="sql200.epizy.com";
// $Conuser="epiz_26161579";
// $Conpass="4coUyGPKqiYh4";
// $Condb="epiz_26161579_fullwings";

$conexion= @mysqli_connect($Conserver,$Conuser,$Conpass,$Condb);

if($conexion->connect_errno){
    die("La conexión ha fallado");
}

?>