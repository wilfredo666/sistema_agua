<?php
require "../../assest/fpdf/fpdf.php";
require_once "../../controlador/ventaControlador.php";
require_once "../../modelo/ventaModelo.php";


$id=$_GET["id"];

$NotaVenta=ControladorVenta::ctrInfoNotaVenta($id);
/* echo ('<pre>');        
var_dump($NotaVenta);
echo ('<pre>'); */
$productos=json_decode($NotaVenta["detalle_factura"],true);


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 8, "# Factura: ".$NotaVenta["codigo_factura"], 0, 0);
$pdf->setX(110);
$pdf->Cell(50, 8, "", 0, 1);
$pdf->Cell(50, 8, "Cliente: ". utf8_decode($NotaVenta["razon_social_cliente"]), 0, 0);
$pdf->setX(110);
$pdf->Cell(50, 8, utf8_decode("Fecha de emisión: ").utf8_decode($NotaVenta["fecha_emision"]), 0, 1);
$pdf->Cell(50, 8, "Emitido por: ".$NotaVenta["nombre_usuario"], 0, 0);
$pdf->setX(110);
$pdf->Cell(50, 8, utf8_decode("Personal que atendió: ".$NotaVenta["nombre_personal"]." ".$NotaVenta["ap_pat_personal"]." ".$NotaVenta["ap_mat_personal"]), 0, 1);

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(180, 5, "", 0, 1);

$pdf->SetFont('Arial', 'B', 10);

$pdf->SetX(20);
$pdf->Cell(114,8, utf8_decode("Descripción"),1,0,"L");
$pdf->Cell(26, 8, "Cantidad", 1, 0, "L");
$pdf->Cell(26, 8, "Total", 1, 1, "L");


$pdf->SetFont("Arial", "", 10);
$pdf->setTextColor(0,0,0);
$total=0;
foreach($productos as $value){
  $pdf->SetX(20);
  $pdf->Cell(114, 8, utf8_decode($value["descProducto"]),1,0);
  $pdf->Cell(26, 8, $value["cantProducto"],1,0,"C");
  $pdf->Cell(26, 8, $value["preTotal"]. " Bs.",1,1,"C");
}
$pdf->SetX(134);
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(26, 8, "TOTAL",1,0,"C");
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(26, 8, $NotaVenta["total"]. " Bs.",1,0,"C");

$pdf->Output();
