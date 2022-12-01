<?php 
require_once "conexion.php";
class ModeloVehiculo{


  static public function mdlListaVehiculos(){
    $stmt=Conexion::conectar()->prepare("select * from vehiculo");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegVehiculo($data){

    $rsVehiculo=$data["rsVehiculo"];
    $NitCiVehiculo=$data["NitCiVehiculo"];
    $dirVehiculo=$data["dirVehiculo"];
    $nombreVehiculo=$data["nombreVehiculo"];
    $telVehiculo=$data["telVehiculo"];


    $stmt=Conexion::conectar()->prepare("insert into Vehiculo(razon_social_Vehiculo, nit_ci_Vehiculo, direccion_Vehiculo, nombre_Vehiculo, telefono_Vehiculo)values('$rsVehiculo', '$NitCiVehiculo', '$dirVehiculo', '$nombreVehiculo', '$telVehiculo')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoVehiculo($id){
    $stmt=Conexion::conectar()->prepare("select * from Vehiculo where id_Vehiculo=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditVehiculo($data){

    $dirVehiculo=$data["dirVehiculo"];
    $idVehiculo=$data["idVehiculo"];
    $nombreVehiculo=$data["nombreVehiculo"];
    $telVehiculo=$data["telVehiculo"];


    $stmt=Conexion::conectar()->prepare("update Vehiculo set direccion_Vehiculo='$dirVehiculo', nombre_Vehiculo='$nombreVehiculo', telefono_Vehiculo='$telVehiculo' where id_Vehiculo=$idVehiculo");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliVehiculo($data){
    $Vehiculo=Conexion::conectar()->prepare("select * from factura where id_Vehiculo=$data");
    $Vehiculo->execute();
    if($Vehiculo->fetch()>0){
      echo "error";
    }else{
      $stmt=Conexion::conectar()->prepare("delete from Vehiculo where id_Vehiculo=$data");

      if($stmt->execute()){
        return "ok";
      }else{
        return "error";
      }
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlBusVehiculo($data){
    $stmt=Conexion::conectar()->prepare("select * from Vehiculo where nit_ci_Vehiculo=$data");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
  
  static public function mdlCantidadVehiculos(){
    $stmt=Conexion::conectar()->prepare("select count(*) as Vehiculo from Vehiculo");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

}