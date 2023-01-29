<?php
require "../../assest/fpdf/fpdf.php";
require_once "../../controlador/ventaControlador.php";
require_once "../../modelo/ventaModelo.php";


$id=$_GET["id"];

$NotaVenta=ControladorVenta::ctrInfoNotaEntrega($id);
$productos=json_decode($NotaVenta["detalle_ne"],true);


$pdf = new FPDF("P","mm","Letter");
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 0, "CONTROL DE VENTAS AQUAVIP", 0, 1, "C");
$pdf->setX(110);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 5, "", 0, 1);
$pdf->Cell(50,8,"FECHA:",0,0);
$pdf->setX(90);
$pdf->Cell(50,8,"CHOFER:",0,1);
$pdf->Cell(50,3,"PERSONAL A GARGO:",0,0);
$pdf->SetX(90);
$pdf->Cell(50,3,utf8_decode("VEHÍCULO:"),0,0); 
$pdf->SetX(155);
$pdf->Cell(50,3,"CANTIDAD DE SALIDA:",0,1);
$pdf->Cell(50,8,"DISPONIBLE:",0,0);
$pdf->SetX(90);
$pdf->Cell(50,8,"CANTIDAD BOT. VENDIDAS:",0,0);
$pdf->SetX(155);
$pdf->Cell(50,8,"ZONA DE VENTA:",0,1);
/* TABLA 1RA FILA ESTATICA*/
/* $pdf->SetY(37);
$pdf->SetX(15);
$pdf->Cell(12,8,"",1,0);
$pdf->SetX(27);
$pdf->Cell(50,8,"",1,0);
$pdf->SetX(77);
$pdf->Cell(50,8,"",1,0);
$pdf->SetX(127);
$pdf->Cell(45,8,"",1,0);
$pdf->SetX(172);
$pdf->Cell(30,8,"",1,1); */
/*  */
$pdf->SetY(37);
$pdf->SetX(15);
$pdf->Cell(12,8, utf8_decode("Nro"),1,0,"C");
$pdf->Cell(50, 8, utf8_decode("Descripción"), 1, 0,"C");
$pdf->Cell(50, 8, utf8_decode("Estado Botellón") , 1, 0, "C");
$pdf->Cell(45, 8, "Cantidad", 1, 0, "C");
$pdf->Cell(30, 8, "Obs.", 1, 1, "C");


$pdf->SetFont("Arial", "", 10);
$pdf->setTextColor(0,0,0);
$total=0;
foreach($productos as $value){
  $pdf->SetX(15);
  $pdf->Cell(12, 8, utf8_decode($value["cantProducto"]),1,0);
  $pdf->Cell(50, 8, $value["cantProducto"],1,0);
  $pdf->Cell(50, 8, $value["cantProducto"],1,0);
  $pdf->Cell(45, 8, $value["cantProducto"],1,0);
  $pdf->Cell(30, 8, $value["cantProducto"],1,1);
}

$pdf->SetY(70);
$pdf->Cell(50,6,"Cambio:",0,1);
$pdf->Cell(50,6,"Venta de bolsitas:",0,1);
$pdf->Cell(50,6,"Venta de dispencers:",0,0);
$pdf->SetX(100);
$pdf->Cell(50,6,"CANTIDAD BOTELLONES VENDIDOS:",0,1);
$pdf->Cell(50,6,utf8_decode("Venta de Botellón:"),0,0);
$pdf->SetX(100);
$pdf->Cell(50,6,"TOTAL VENTAS:",0,1);

/* TERCERA PARTE CONTROL DE SALIDAS Y GASTOS */
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(190, 12, "CONTROL DE SALIDAS Y GASTOS", 0, 1, "C");
$pdf->SetFont("Arial", "", 10);
$pdf->SetX(20);
$pdf->Cell(65, 8, "Bot. fiados:", 0, 0);
$pdf->Cell(65,8,"Almuerzo chofer:",0,0);
$pdf->Cell(70,8,"Almuerzo ayudante:",0,1);
$pdf->SetX(20);
$pdf->Cell(70,5,"Combustible:",0,1);
$pdf->SetX(20);
$pdf->Cell(70,8,"Extras:",0,1);

/* CUARTA PARTE TABLA FIADOS Y COBROS */
$pdf->SetY(130);
$pdf->SetX(12);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(95,8, utf8_decode("FIADOS PRESTADOS"),1,0,"C");
$pdf->Cell(95, 8, utf8_decode("DEVOLUCIONES Y CANCELADOS"), 1, 1,"C");
$pdf->SetX(12);
$pdf->Cell(65,8, utf8_decode("NOMBRE"),1,0,"C");
$pdf->Cell(10, 8, utf8_decode("BS"), 1, 0,"C");
$pdf->Cell(10, 8, utf8_decode("BOT") , 1, 0, "C");
$pdf->Cell(10, 8, "DISP", 1, 0, "C");
$pdf->SetX(107);
$pdf->Cell(65,8, utf8_decode("NOMBRE"),1,0,"C");
$pdf->Cell(10, 8, utf8_decode("BS"), 1, 0,"C");
$pdf->Cell(10, 8, utf8_decode("BOT") , 1, 0, "C");
$pdf->Cell(10, 8, "DISP", 1, 1, "C");


$pdf->SetFont("Arial", "", 10);
$pdf->setTextColor(0,0,0);
$total=0;
foreach($productos as $value){
    $pdf->SetX(12);
  $pdf->Cell(65, 8, $value["cantProducto"],1,0);
  $pdf->Cell(10, 8, $value["cantProducto"],1,0);
  $pdf->Cell(10, 8, $value["cantProducto"],1,0);
  $pdf->Cell(10, 8, $value["cantProducto"],1,0);
  $pdf->Cell(65, 8, $value["cantProducto"],1,0);
  $pdf->Cell(10, 8, $value["cantProducto"],1,0);
  $pdf->Cell(10, 8, $value["cantProducto"],1,0);
  $pdf->Cell(10, 8, $value["cantProducto"],1,1);
}
$pdf->SetY(200);
$pdf->SetX(20);
$pdf->Cell(40, 8, "Total gasto:", 0, 0);
$pdf->Cell(40,8,"Total ventas:",0,0);
$pdf->Cell(40,8,"Total dinero:",0,0);
$pdf->Cell(40,8,"TOTAL RECAUDADO:",0,1);
$pdf->SetX(100);
$pdf->Cell(40, 5, "Monto faltante:", 0, 0);
$pdf->Cell(20, 5,"BOT:",0,0);
$pdf->Cell(40, 5,"DISP:",0,1);
/* 5TO FIRMAS */
$pdf->SetY(251);
$pdf->SetX(50);
$pdf->Cell(40, 8, "FIRMA CHOFER", "T",0, "C");
$pdf->Cell(40, 8, "", 0, "C");

$pdf->Cell(40, 8,"FIRMA ENCARGADO","T",0, "C");

$pdf->Output();
?>