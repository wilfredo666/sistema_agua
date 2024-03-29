<?php
require_once "conexion.php";
class ModeloVehiculo
{


  static public function mdlListaVehiculos()
  {
    $stmt = Conexion::conectar()->prepare("select * from vehiculo");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }
  /* para mostrar solo vehiculos activos */
  static public function mdlVehiculosActivos()
  {
    $stmt = Conexion::conectar()->prepare("select * from vehiculo where estado_vehiculo=1");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegVehiculo($data)
  {

    $placaVehiculo = $data["placaVehiculo"];
    $descVehiculo = $data["descVehiculo"];
    $imgVehiculo = $data["imgVehiculo"];

    $stmt = Conexion::conectar()->prepare("insert into vehiculo(placa_vehiculo, desc_vehiculo, imagen_vehiculo) values('$placaVehiculo', '$descVehiculo', '$imgVehiculo')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoVehiculo($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from vehiculo where id_vehiculo=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditVehiculo($data)
  {

    $idVehiculo = $data["idVehiculo"];
    $placaVehiculo = $data["placaVehiculo"];
    $descVehiculo = $data["descVehiculo"];
    $estadoVehiculo = $data["estadoVehiculo"];
    $imgVehiculo = $data["imgVehiculo"];

    $stmt = Conexion::conectar()->prepare("update vehiculo set placa_vehiculo='$placaVehiculo', desc_vehiculo='$descVehiculo', imagen_vehiculo='$imgVehiculo', estado_vehiculo='$estadoVehiculo' where id_vehiculo=$idVehiculo");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliVehiculo($data)
  {
    $vehiculo = Conexion::conectar()->prepare("select * from nota_entrega where id_vehiculo=$data");
    $vehiculo->execute();
    if ($vehiculo->fetch() > 0) {
      echo "error";
    } else {
      $stmt = Conexion::conectar()->prepare("delete from vehiculo where id_vehiculo=$data");

      if ($stmt->execute()) {
        return "ok";
      } else {
        return "error";
      }
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlBusVehiculo($data)
  {
    $stmt = Conexion::conectar()->prepare("select * from Vehiculo where nit_ci_Vehiculo=$data");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlCantidadVehiculos()
  {
    $stmt = Conexion::conectar()->prepare("select count(*) as vehiculo from vehiculo");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
}
