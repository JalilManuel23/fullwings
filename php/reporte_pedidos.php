<?php
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
    $this->Cell(70,10,'Reporte de Pedidos',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(10, 10, utf8_decode('#'), 1, 0, 'C', 0);
    $this->Cell(30, 10, utf8_decode('Empleado'), 1, 0, 'C', 0);
    $this->Cell(30, 10, utf8_decode('Fecha'), 1, 0, 'C', 0);
    $this->Cell(100, 10, utf8_decode('Descripción'), 1, 0, 'C', 0);
    $this->Cell(20, 10, utf8_decode('Total'), 1, 1, 'C', 0);
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
$consulta = "SELECT * FROM pedido";
$resultado = $conexion->query($consulta);


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(10, 10, utf8_decode($row['No_orden']), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($row['Empleado']), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($row['fecha']), 1, 0, 'C', 0);
    $pdf->Cell(100, 10, utf8_decode($row['orden']), 1, 0, 'C', 0);
    $pdf->Cell(20, 10, utf8_decode($row['Total']), 1, 1, 'C', 0);
}

$pdf->Output();
echo "<link rel='icon' href='../favicon.ico'>";
?>