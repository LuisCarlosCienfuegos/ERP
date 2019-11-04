<?php 
require('../fpdf/fpdf.php');
require_once("proveedores.php");
$obj = new Proveedores();

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
    $this->Cell(70,10,'Reporte de Proveedores',1,0,'C');
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

while ($fila = $res->fetch_assoc()){
$pdf->Cell(40,10,$fila["nombre"],1,0,'C',0);
$pdf->Cell(30,10,$fila["razonsocial"],1,0,'C',0);
$pdf->Cell(50,10,$fila["correo"],1,0,'C',0);
$pdf->Cell(40,10,$fila["diireccion"],1,0,'C',0);
$pdf->Cell(30,10,$fila["telefono"],1,1,'C',0);

}

$pdf->Output();


 ?>