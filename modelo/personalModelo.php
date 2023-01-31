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

  static public function mdlInfoVentasPersonal(){
    $stmt=Conexion::conectar()->prepare("select * from personal where cargo_personal='Chofer' or cargo_personal='Secretaria' ");
    $stmt->execute();
    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoPersonalDisp(){
    $stmt=Conexion::conectar()->prepare("select * from personal where cargo_personal='Chofer' and estado_personal=1 or cargo_personal='Secretaria' and estado_personal=1");
    $stmt->execute();
    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegPersonal($data){

    $nomPersonal=$data["nomPersonal"];
    $patPersonal=$data["patPersonal"];
    $matPersonal=$data["matPersonal"];
    $ciPersonal=$data["ciPersonal"];
    $telPersonal=$data["telPersonal"];
    $contactoReferencia=$data["contactoReferencia"];
    $cargoPersonal=$data["cargoPersonal"];
    $fechaNacPersonal=$data["fechaNacPersonal"];
    $fechaIngPersonal=$data["fechaIngPersonal"];

    /* var_dump($nomPersonal); */
    $stmt=Conexion::conectar()->prepare("insert into personal(nombre_personal, ap_pat_personal, ap_mat_personal, ci_personal, cargo_personal, fecha_nac_personal, telefono_personal, contacto_referencia, fecha_ingreso) values('$nomPersonal', '$patPersonal', '$matPersonal', '$ciPersonal', '$cargoPersonal', '$fechaNacPersonal', '$telPersonal', '$contactoReferencia', '$fechaIngPersonal')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoPersonal($id){
    $stmt=Conexion::conectar()->prepare("select * from personal where id_personal=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditPersonal($data){

    $idPersonal=$data["idPersonal"];
    $nomPersonal=$data["nomPersonal"];
    $patPersonal=$data["patPersonal"];
    $matPersonal=$data["matPersonal"];
    $ciPersonal=$data["ciPersonal"];
    $telPersonal=$data["telPersonal"];
    $contactoReferencia=$data["contactoReferencia"];
    $cargoPersonal=$data["cargoPersonal"];
    $fechaNacPersonal=$data["fechaNacPersonal"];
    $fechaIngPersonal=$data["fechaIngPersonal"];
    $estadoPersonal=$data["estadoPersonal"];

    $stmt=Conexion::conectar()->prepare("update personal set nombre_personal='$nomPersonal', ap_pat_personal='$patPersonal', ap_mat_personal='$matPersonal', ci_personal='$ciPersonal', cargo_personal='$cargoPersonal', fecha_nac_personal='$fechaNacPersonal', telefono_personal='$telPersonal', contacto_referencia='$contactoReferencia', fecha_ingreso='$fechaIngPersonal', estado_personal='$estadoPersonal' where id_personal=$idPersonal");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliPersonal($data){
    
    $personal=Conexion::conectar()->prepare("select * from nota_entrega where id_personal=$data");
    $personal->execute();
    if($personal->fetch()>0){
      echo "error";
    }else{
      $stmt=Conexion::conectar()->prepare("delete from personal where id_personal=$data");

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