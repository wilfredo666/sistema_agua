<?php
require "../../assest/fpdf/fpdf.php";
require_once "../../controlador/ventaControlador.php";
require_once "../../modelo/ventaModelo.php";


$id=$_GET["id"];

$NotaVenta=ControladorVenta::ctrInfoNotaEntrega($id);
$productos=json_decode($NotaVenta["detalle_ne"],true);


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 8, "# Nota de Entrega: ".$NotaVenta["id_nota_entrega"], 0, 0);
$pdf->setX(110);
$pdf->Cell(50, 8, "", 0, 1);
$pdf->Cell(50, 8, "Zona: ".$NotaVenta["zona_venta"], 0, 0);
$pdf->setX(110);
$pdf->Cell(50, 8, utf8_decode("Fecha de emisión: ").$NotaVenta["fecha_hora_ne"], 0, 1);
$pdf->Cell(50, 8, "Emitido por: ".$NotaVenta["nombre_usuario"], 0, 0);
$pdf->setX(110);
$pdf->Cell(50, 8, "Chofer: ".$NotaVenta["nombre_personal"]." ".$NotaVenta["ap_pat_personal"]." ".$NotaVenta["ap_mat_personal"], 0, 1);
$pdf->Cell(100, 8, utf8_decode("Vehículo: ".$NotaVenta["desc_vehiculo"]." - ".$NotaVenta["placa_vehiculo"]), 0, 1);

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(180, 5, "", 0, 1);

$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(100,8, utf8_decode("Descripción"),1,0,"L");
$pdf->Cell(26, 8, "Cantidad", 1, 0, "L");
$pdf->Cell(27, 8, "P. Unitario", 1, 0, "L");
$pdf->Cell(27, 8, "P. Total", 1, 1, "L");

$pdf->SetFont("Arial", "", 10);
$pdf->setTextColor(0,0,0);
$total=0;
foreach($productos as $value){
  $pdf->Cell(100, 8, $value["descProducto"],1,0);
  $pdf->Cell(26, 8, $value["cantProducto"],1,0);
  $pdf->Cell(27, 8, $value["precioProducto"],1,0);
  $pdf->Cell(27, 8, $value["precioTotalPro"],1,1);
  /* $total=number_format($total+$value["precioTotalPro"],2,"."); */
}

$pdf->SetFont("Arial", "B", 10);
$pdf->cell(153,8,"Total (Bs.) ",1, 0);
$pdf->cell(27,8,$total,1, 0);
/*==============
segunda parte
==============*/
$pdf->Line(10,135, 190,135);
$pdf->setY(160);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 8, "# Nota de Entrega: ".$NotaVenta["id_nota_entrega"], 0, 0);
$pdf->setX(110);
$pdf->Cell(50, 8, "", 0, 1);
$pdf->Cell(50, 8, "Zona: ".$NotaVenta["zona_venta"], 0, 0);
$pdf->setX(110);
$pdf->Cell(50, 8, utf8_decode("Fecha de emisión: ").$NotaVenta["fecha_hora_ne"], 0, 1);
$pdf->Cell(50, 8, "Emitido por: ".$NotaVenta["nombre_usuario"], 0, 0);
$pdf->setX(110);
$pdf->Cell(50, 8, "Chofer: ".$NotaVenta["nombre_personal"]." ".$NotaVenta["ap_pat_personal"]." ".$NotaVenta["ap_mat_personal"], 0, 1);
$pdf->Cell(100, 8, utf8_decode("Vehículo: ".$NotaVenta["desc_vehiculo"]." - ".$NotaVenta["placa_vehiculo"]), 0, 1);

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(180, 5, "", 0, 1);

$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(100,8, utf8_decode("Descripción"),1,0,"L");
$pdf->Cell(26, 8, "Cantidad", 1, 0, "L");
$pdf->Cell(27, 8, "P. Unitario", 1, 0, "L");
$pdf->Cell(27, 8, "P. Total", 1, 1, "L");

$pdf->SetFont("Arial", "", 10);
$pdf->setTextColor(0,0,0);
$total=0;
foreach($productos as $value){
  $pdf->Cell(100, 8, $value["descProducto"],1,0);
  $pdf->Cell(26, 8, $value["cantProducto"],1,0);
  $pdf->Cell(27, 8, $value["precioProducto"],1,0);
  $pdf->Cell(27, 8, $value["precioTotalPro"],1,1);
  /* $total=number_format($total+$value["precioTotalPro"],2,"."); */
}

$pdf->SetFont("Arial", "B", 10);
$pdf->cell(153,8,"Total (Bs.) ",1, 0);
$pdf->cell(27,8,$total,1, 0);
$pdf->Output();

?>