<?php
$ruta=parse_url($_SERVER['REQUEST_URI']);

if(isset($ruta["query"])){
  if($ruta["query"]=="ctrNuevoCufd"||
     $ruta["query"]=="ctrUltimoCufd"||
     $ruta["query"]=="ctrRegistroFactura"||
     $ruta["query"]=="ctrLeyenda"||
     $ruta["query"]=="ctrReporteVentas"||
     $ruta["query"]=="ctrAnularFactura"||
     $ruta["query"]=="ctrRegNotaVenta"){
    $metodo=$ruta["query"];
    $Producto=new ControladorVenta();
    $Producto->$metodo();
  }
}


class ControladorVenta{

  static public function ctrRegistroFactura(){
    require_once "../modelo/ventaModelo.php";

    $data=array(
      "numFactura"=>$_POST["numFactura"],
      "idCliente"=>$_POST["idCliente"],
      "productos"=>$_POST["productos"],
      "subTotal"=>$_POST["subTotal"],
      "descAdicional"=>$_POST["descAdicional"],
      "totApagar"=>$_POST["totApagar"],
      "fechaEmision"=>$_POST["fechaEmision"],
      "cuf"=>$_POST["cuf"],
      "cufd"=>$_POST["cufd"],
      "xml"=>$_POST["xml"],
      "usuarioLogin"=>$_POST["usuarioLogin"],
      "leyenda"=>$_POST["leyenda"]
    );

    $respuesta=ModeloVenta::mdlRegistroFactura($data);
    echo $respuesta;

  }

  static public function ctrInfoVentas(){
    $respuesta=ModeloVenta::mdlInfoVentas();
    return $respuesta;
  }

  static public function ctrInfoFactura($id){

    $respuesta=ModeloVenta::mdlInfoFactura($id);
    return $respuesta;
  }

  static public function ctrReporteVentas(){
    require_once "../modelo/ventaModelo.php";
    $fechaInicio=$_POST["inicio"];
    $fechaFinal=$_POST["final"];

    $respuesta=ModeloVenta::mdlReporteVentas($fechaInicio, $fechaFinal);

    echo json_encode($respuesta);
  }

  static public function ctrAnularFactura(){
    require_once "../modelo/ventaModelo.php";

    $cuf=$_POST["cuf"];
    ModeloVenta::mdlAnularFactura($cuf);

  }

  static public function ctrRegNotaVenta(){
    session_start();
    require_once "../modelo/ventaModelo.php";

    date_default_timezone_set("America/La_Paz");
    $fecha=date("Y-m-d");
    $hora=date("H-i-s");

    $data=array(
      "chofer"=>$_POST["chofer"],
      "vehiculo"=>$_POST["vehiculo"],
      "usuario"=>$_SESSION["idUsuario"],
      "fechaHora"=>$fecha." ".$hora,
      "productos"=>$_POST["productos"],
      "zonaVenta"=>$_POST["zonaVenta"]
    );

    $respuesta=ModeloVenta::mdlRegNotaVenta($data);
    echo $respuesta;

  }

  static public function ctrInfoNotasEntrega(){
    $respuesta=ModeloVenta::mdlInfoNotasEntrega();
    return $respuesta;
  }

  static public function ctrInfoNotaEntrega($id){
    
    $respuesta=ModeloVenta::mdlInfoNotaVenta($id);
    return $respuesta;
  }
}