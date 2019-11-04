<?php 
require('../fpdf/fpdf.php');
require_once("productos.php");
$obj = new Productos();

$res = $obj->consulta(); 
         
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    //$this->Image('logo_pb.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(70,10,'Reporte de Productos',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}


$pdf = new PDF();
//pie de pagina
$pdf ->AliasNBPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

$pdf->Cell(40,10,"nombre",1,0,'C',0);
$pdf->Cell(10,10,"$",1,0,'C',0);
$pdf->Cell(10,10,"u",1,0,'C',0);
$pdf->Cell(10,10,"e",1,0,'C',0);
$pdf->Cell(10,10,"c",1,0,'C',0);
$pdf->Cell(60,10,"descripcion",1,0,'C',0);
$pdf->Cell(10,10,"a",1,0,'C',0);
$pdf->Cell(40,10,"cat",1,1,'C',0);


while ($fila = $res->fetch_assoc()){
$pdf->Cell(40,10,$fila["nombre"],1,0,'C',0);
$pdf->Cell(10,10,$fila["costo"],1,0,'C',0);
$pdf->Cell(10,10,$fila["unidad"],1,0,'C',0);
$pdf->Cell(10,10,$fila["existencia"],1,0,'C',0);
$pdf->Cell(10,10,$fila["codigo"],1,0,'C',0);
$pdf->Cell(60,10,$fila["descripcion"],1,0,'C',0);
$pdf->Cell(10,10,$fila["almacen"],1,0,'C',0);
$pdf->Cell(40,10,$fila["categoria"],1,1,'C',0);
}

$pdf->Output();


 ?>