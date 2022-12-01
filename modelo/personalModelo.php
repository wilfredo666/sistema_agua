<?php 
require_once "conexion.php";
class ModeloPersonal{


  static public function mdlListaPersonal(){
    $stmt=Conexion::conectar()->prepare("select * from personal");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }
  
   static public function mdlInfoChoferes(){
    $stmt=Conexion::conectar()->prepare("select * from personal where cargo_personal='Chofer' and estado_personal=1");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegPersonal($data){

    $rsPersonal=$data["rsPersonal"];
    $NitCiPersonal=$data["NitCiPersonal"];
    $dirPersonal=$data["dirPersonal"];
    $nombrePersonal=$data["nombrePersonal"];
    $telPersonal=$data["telPersonal"];


    $stmt=Conexion::conectar()->prepare("insert into Personal(razon_social_Personal, nit_ci_Personal, direccion_Personal, nombre_Personal, telefono_Personal)values('$rsPersonal', '$NitCiPersonal', '$dirPersonal', '$nombrePersonal', '$telPersonal')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoPersonal($id){
    $stmt=Conexion::conectar()->prepare("select * from Personal where id_Personal=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditPersonal($data){

    $dirPersonal=$data["dirPersonal"];
    $idPersonal=$data["idPersonal"];
    $nombrePersonal=$data["nombrePersonal"];
    $telPersonal=$data["telPersonal"];


    $stmt=Conexion::conectar()->prepare("update Personal set direccion_Personal='$dirPersonal', nombre_Personal='$nombrePersonal', telefono_Personal='$telPersonal' where id_Personal=$idPersonal");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliPersonal($data){
    $Personal=Conexion::conectar()->prepare("select * from factura where id_Personal=$data");
    $Personal->execute();
    if($Personal->fetch()>0){
      echo "error";
    }else{
      $stmt=Conexion::conectar()->prepare("delete from Personal where id_Personal=$data");

      if($stmt->execute()){
        return "ok";
      }else{
        return "error";
      }
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlBusPersonal($data){
    $stmt=Conexion::conectar()->prepare("select * from Personal where nit_ci_Personal=$data");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
  
  static public function mdlCantidadPersonals(){
    $stmt=Conexion::conectar()->prepare("select count(*) as Personal from Personal");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

}