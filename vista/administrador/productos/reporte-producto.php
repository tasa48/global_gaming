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
        $this->Cell(30, 10, 'Reporte de productos Global Gaming', 0, 0, 'C');
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
$pdf->SetFont('Arial', 'B', 11);

// Cabecera de la tabla

$pdf->Cell(20, 10, 'Codigo', 1);
$pdf->Cell(100, 10, 'Nombre', 1);
$pdf->Cell(30, 10, 'precio venta', 1);
$pdf->Cell(13, 10, 'stock', 1);
$pdf->Cell(40, 10, 'unidad de medida', 1);

$pdf->Ln();

// Datos de la tabla
$query = mysqli_query($conn, "SELECT * FROM producto ORDER BY prod_codigo ASC");
$numerofila = 0;
while ($data = mysqli_fetch_array($query)) {
    $numerofila++;
    $pdf->SetFont('Arial', '', 10);
    
    $pdf->Cell(20, 10, $data['prod_codigo'], 1);
    $pdf->Cell(100, 10, $data['prod_nombre'], 1);
    $pdf->Cell(30, 10, $data['prod_precioventa'], 1);
    $pdf->Cell(13, 10, $data['prod_stock'], 1); // Sin utf8_decode
    $pdf->Cell(40, 10, $data['prod_unidaddemedida'], 1); // Sin utf8_decode
    
    $pdf->Ln();
}

// Generar el PDF
$pdf->Output('I', 'Reporte_producto.pdf');
?>
