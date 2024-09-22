<?php
require('../../../controlador/reports/fpdf.php');
include_once("../../../modelo/conexion_bd.php");
class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->Image('../../img/logo-principal.png', 10, 6, 20);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(80);
        $this->Cell(30, 10, 'Reporte de Usuarios Global Gaming', 0, 0, 'C');
        $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Cabecera de la tabla

$pdf->Cell(20, 10, 'Codigo', 1);
$pdf->Cell(30, 10, 'Identificacion', 1);
$pdf->Cell(30, 10, 'Tipo ID', 1);
$pdf->Cell(40, 10, 'Nombre', 1);
$pdf->Cell(40, 10, 'Apellido', 1);
$pdf->Cell(30, 10, 'Telefono', 1);
$pdf->Ln();

// Datos de la tabla
$query = mysqli_query($conn, "SELECT * FROM usuario ORDER BY usua_codigo ASC");
$numerofila = 0;
while ($data = mysqli_fetch_array($query)) {
    $numerofila++;
    $pdf->SetFont('Arial', '', 10);
    
    $pdf->Cell(20, 10, $data['usua_codigo'], 1);
    $pdf->Cell(30, 10, $data['usua_identificacion'], 1);
    $pdf->Cell(30, 10, $data['usua_tipoidentificacion'], 1);
    $pdf->Cell(40, 10, $data['usua_nombre'], 1); // Sin utf8_decode
    $pdf->Cell(40, 10, $data['usua_apellido'], 1); // Sin utf8_decode
    $pdf->Cell(30, 10, $data['usua_celular'], 1);
    $pdf->Ln();
}

// Generar el PDF
$pdf->Output('I', 'Reporte_Usuarios.pdf');
?>
