<?php 
require_once "conexion.php";
class ModeloProducto{


  static public function mdlInfoProductos(){
    $stmt=Conexion::conectar()->prepare("select * from producto");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegProducto($data){

    $codProducto=$data["codProducto"];
    $descProducto=$data["descProducto"];
    $imgProducto=$data["imgProducto"];

    $stmt=Conexion::conectar()->prepare("insert into producto(cod_producto, nombre_producto, imagen_producto)values('$codProducto', '$descProducto', '$imgProducto')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoProducto($id){
    $stmt=Conexion::conectar()->prepare("select * from producto where id_producto=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditProducto($data){

    $descProducto=$data["descProducto"];
    /* $UMProducto=$data["UMProducto"]; */
    $idProducto=$data["idProducto"];
    $ImgProducto=$data["ImgProducto"];
    $estadoProducto=$data["estadoProducto"];


    $stmt=Conexion::conectar()->prepare("update producto set nombre_producto='$descProducto', imagen_producto='$ImgProducto', estado='$estadoProducto' where id_producto=$idProducto");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlActualizarAcceso($fechaHora, $id){

    $stmt=Conexion::conectar()->prepare("update Producto set ultimo_login='$fechaHora' where id_Producto=$id");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliProducto($data){
    $factura = Conexion::conectar()->prepare("select * from factura where id_producto=$data");
    $factura->execute();
    if($factura->fetch() > 0){
      echo "error";
    } else {
      $notaEntrega = Conexion::conectar()->prepare("select * from nota_entrega id_producto=$data");
      $notaEntrega->execute();
      if($notaEntrega->fetch() > 0){
        echo "error";
      } else {
        $stmt=Conexion::conectar()->prepare("delete from producto where id_producto=$data");
        if($stmt->execute()){
          return "ok";
        }
      }
    }

    $stmt->close();
    $stmt->null;
  }
  
  static public function mdlBusProducto($idProducto){
    $stmt=Conexion::conectar()->prepare("select * from producto where id_producto='$idProducto'");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
  
  static public function mdlCantidadProductos(){
    $stmt=Conexion::conectar()->prepare("select count(*) as producto from producto");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
  
  static public function mdlInfoProductosVenta(){
    $stmt=Conexion::conectar()->prepare("select * from producto where estado=1");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

}