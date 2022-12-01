<?php 
require_once "conexion.php";

class ModeloVenta{


  static public function mdlRegNotaVenta($data){

    $chofer=$data["chofer"];
    $vehiculo=$data["vehiculo"];
    $usuario=$data["usuario"];
    $fechaHora=$data["fechaHora"];
    $productos=$data["productos"];
    $zonaVenta=$data["zonaVenta"];


    $stmt=Conexion::conectar()->prepare("insert into nota_entrega(id_personal, id_vehiculo, id_usuario, fecha_hora_ne, detalle_ne, zona_venta) values($chofer, $vehiculo, $usuario, '$fechaHora', '$productos', '$zonaVenta')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "n";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoNotasEntrega(){
    $stmt=Conexion::conectar()->prepare("select id_nota_entrega, nombre_usuario, nombre_personal, ap_pat_personal, fecha_hora_ne, zona_venta from nota_entrega join personal on nota_entrega.id_personal=personal.id_personal join vehiculo on nota_entrega.id_vehiculo=vehiculo.id_vehiculo join usuario on nota_entrega.id_usuario=usuario.id_usuario");

    $stmt->execute();
    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoNotaVenta($id){
    $stmt=Conexion::conectar()->prepare("select * from nota_entrega join personal on nota_entrega.id_personal=personal.id_personal join vehiculo on nota_entrega.id_vehiculo=vehiculo.id_vehiculo join usuario on nota_entrega.id_usuario=usuario.id_usuario where id_nota_entrega=$id");

    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoVentas(){
    $stmt=Conexion::conectar()->prepare("select * from factura join cliente on cliente.id_cliente=factura.id_cliente");

    $stmt->execute();
    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoFactura($id){
    $stmt=Conexion::conectar()->prepare("select * from factura join cliente on cliente.id_cliente=factura.id_cliente where id_factura=$id");

    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlReporteVentas($fechaInicio, $fechaFinal){
    $stmt=Conexion::conectar()->prepare("SELECT * FROM `factura` WHERE `fecha_emision` BETWEEN '$fechaInicio' AND '$fechaFinal 23:59:59'");

    $stmt->execute();
    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlAnularFactura($cuf){
    $stmt=Conexion::conectar()->prepare("update factura set estado_factura=0 where cuf='$cuf'");

    if($stmt->execute()){
      return "ok";
    }else{
      return "n";
    }

    $stmt->close();
    $stmt->null;
  }


}