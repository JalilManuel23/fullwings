<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    $privilegio = $_SESSION['privilegio'];
    
    if($usuario == null || $usuario == "" ){
        header("Location: ../html/errores/iniciar_sesion.html");
        die();
    } 

    require('../fpdf/fpdf.php');

    class PDF extends FPDF
    {
        // Cabecera de página
        function Header()
        {
            // Arial bold 15
            $this->SetFont('Arial','B',18);
            // Movernos a la derecha
            $this->Cell(60);
            // Título
            $this->Cell(70,10,'Reporte de Empleados',0,0,'C');
            // Salto de línea
            $this->Ln(20);

            $this->Cell(20, 10, utf8_decode('#'), 1, 0, 'C', 0);
            $this->Cell(45, 10, utf8_decode('Nombre'), 1, 0, 'C', 0);
            $this->Cell(40, 10, utf8_decode('Teléfono'), 1, 0, 'C', 0);
            $this->Cell(45, 10, utf8_decode('Puesto'), 1, 0, 'C', 0);
            $this->Cell(40, 10, utf8_decode('Turno'), 1, 1, 'C', 0);
        }

        // Pie de página
        function Footer()
        {
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Número de página
            $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
        }
    }

    require('config.php');
    $consulta = "SELECT * FROM empleado";
    $resultado = $conexion->query($consulta);


    // Creación del objeto de la clase heredada
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',12);

    while($row = $resultado->fetch_assoc()){
        $pdf->Cell(20, 10, utf8_decode($row['No_Empleado']), 1, 0, 'C', 0);
        $pdf->Cell(45, 10, utf8_decode($row['nombre']), 1, 0, 'C', 0);
        $pdf->Cell(40, 10, utf8_decode($row['telefono']), 1, 0, 'C', 0);
        $pdf->Cell(45, 10, utf8_decode($row['puesto']), 1, 0, 'C', 0);
        $pdf->Cell(40, 10, utf8_decode($row['turno']), 1, 1, 'C', 0);
    }

    $pdf->Output();
    echo "<link rel='icon' href='../favicon.ico'>";
?>

//require('../fpdf/fpdf.php');