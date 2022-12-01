<?php
require "../../assest/fpdf/fpdf.php";
require_once "../../controlador/ventaControlador.php";
require_once "../../modelo/ventaModelo.php";


$id=$_GET["id"];

$factura=ControladorVenta::ctrInfoFactura($id);
$productos=json_decode($factura["detalle"],true);

class PDF extends FPDF
{

  // Pie de página
  function Footer()
  {
    global $factura;
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode($factura["leyenda"]),0,0,'C');
  }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
$pdf->Cell(100,20,'Sistema POS', 0, 1);
$pdf->Line(10,25, 180,25);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 8, "NIT: 3726922011", 0, 0);
$pdf->setX(110);
$pdf->Cell(50, 8, "Nro. Factura: ".$factura["cod_factura"], 0, 1);
$pdf->Cell(50, 8, utf8_decode("Teléfono(s): +(591)4 4594817"), 0, 0);
$pdf->setX(110);
$pdf->Cell(50, 8, utf8_decode("Fecha de emisión: ").$factura["fecha_emision"], 0, 1);
$pdf->Cell(50, 8, "Emitido por: ".$factura["usuario"], 0, 1);
$pdf->Cell(50, 8, utf8_decode("Dirección: Calle Ballivian #3390, Cbba - Bolivia"), 0, 1);
$pdf->Cell(50,10,"",0,1);
$pdf->Cell(100, 8, "Nombre: ".utf8_decode($factura["razon_social_cliente"]), 0, 1);
$pdf->Cell(50, 8, "NIT/CI: ".$factura["nit_ci_cliente"], 0, 1);

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(180, 20, "", 0, 1);
$pdf->Cell(180, 10, "Detalle", 0, 1, "C");


$pdf->SetFont('Arial', 'B', 10);
$pdf->setFillColor(75,98,241);
$pdf->setTextColor(255,255,255);
$pdf->Cell(100,8, utf8_decode("Descripción"),1,0,"L",true);
$pdf->Cell(20, 8, "Cantidad", 1, 0, "L", true);
$pdf->Cell(20, 8, "P. Unitario", 1, 0, "L", true);
$pdf->Cell(20, 8, "Descuento", 1, 0, "L", true);
$pdf->Cell(20, 8, "P. Total", 1, 1, "L", true);

$pdf->SetFont("Arial", "", 10);
$pdf->setTextColor(0,0,0);
$total=0;
foreach($productos as $value){
  $pdf->Cell(100, 8, $value["descripcion"],1,0);
  $pdf->Cell(20, 8, $value["cantidad"],1,0);
  $pdf->Cell(20, 8, $value["precioUnitario"],1,0);
  $pdf->Cell(20, 8, $value["montoDescuento"],1,0);
  $pdf->Cell(20, 8, $value["subTotal"],1,1);
  $total=$total+$value["subTotal"];
}

$pdf->SetFont("Arial", "B", 10);
$pdf->cell(160,8,"Total (Bs.) ",1, 0);
$pdf->cell(20,8,$total,1, 0);

$pdf->Output();

?>