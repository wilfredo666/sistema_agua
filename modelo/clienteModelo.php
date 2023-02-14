<?php 
require_once "conexion.php";
class ModeloCliente{


  static public function mdlInfoClientes(){
    $stmt=Conexion::conectar()->prepare("select * from cliente");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegCliente($data){

    $rsCliente=$data["rsCliente"];
    $NitCiCliente=$data["NitCiCliente"];
    $dirCliente=$data["dirCliente"];
    $nombreCliente=$data["nombreCliente"];
    $telCliente=$data["telCliente"];
    $imgFachada=$data["imgFachada"];
    $precioEntregaCli=$data["precioEntregaCli"];
    $ubicacion=$data["ubicacion"];

    date_default_timezone_set('America/La_Paz');
    $fecha = date('Y-m-d');


    $stmt=Conexion::conectar()->prepare("insert into cliente(razon_social_cliente, nit_ci_cliente, direccion_cliente, nombre_cliente, telefono_cliente, ubicacion_cliente, foto_fachada, precio_entrega, fecha_registro_cliente ) values('$rsCliente', '$NitCiCliente', '$dirCliente', '$nombreCliente', '$telCliente', '$ubicacion', '$imgFachada', '$precioEntregaCli', '$fecha')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoCliente($id){
    $stmt=Conexion::conectar()->prepare("select * from cliente where id_cliente=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditCliente($data){

    $dirCliente=$data["dirCliente"];
    $idCliente=$data["idCliente"];
    $nombreCliente=$data["nombreCliente"];
    $telCliente=$data["telCliente"];
    $precioEntregaCli=$data["precioEntregaCli"];
    $imgProducto=$data["imgProducto"];
    $ubicacion=$data["ubicacion"];

    $stmt=Conexion::conectar()->prepare("update cliente set direccion_cliente='$dirCliente', nombre_cliente='$nombreCliente', telefono_cliente='$telCliente', ubicacion_cliente='$ubicacion', foto_fachada='$imgProducto', precio_entrega='$precioEntregaCli' where id_cliente=$idCliente");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliCliente($data){
    $cliente=Conexion::conectar()->prepare("select * from factura where id_cliente=$data");
    $cliente->execute();
    if($cliente->fetch()>0){
      echo "error";
    }else{
      $stmt=Conexion::conectar()->prepare("delete from cliente where id_cliente=$data");

      if($stmt->execute()){
        return "ok";
      }else{
        return "error";
      }
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlBusCliente($nitCliente){
    $stmt=Conexion::conectar()->prepare("select * from cliente where nit_ci_cliente=$nitCliente");
    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
  
  static public function mdlCantidadClientes(){
    $stmt=Conexion::conectar()->prepare("select count(*) as cliente from cliente");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

}