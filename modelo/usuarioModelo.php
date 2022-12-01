<?php 
require_once "conexion.php";
class ModeloUsuario{

  /*================
  acceso al sistema
  =================*/
  static public function mdlAccesoUsuario($usuario){
    $stmt=Conexion::conectar()->prepare("select * from usuario where login_usuario='$usuario'");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoUsuarios(){
    $stmt=Conexion::conectar()->prepare("select * from usuario");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegUsuario($data){

    $loginUsuario=$data["loginUsuario"];
    $nomUsuario=$data["nomUsuario"];
    $passUsuario=$data["passUsuario"];
    $perfilUsuario=$data["perfilUsuario"];

    date_default_timezone_set("America/La_Paz");
    $fecha=date("Y-m-d");

    $stmt=Conexion::conectar()->prepare("insert into usuario(login_usuario, nombre_usuario, password, perfil, estado, fecha_registro)values('$loginUsuario', '$nomUsuario', '$passUsuario', '$perfilUsuario', 0, '$fecha')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoUsuario($id){
    $stmt=Conexion::conectar()->prepare("select * from usuario where id_usuario=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditUsuario($data){
    $idUsuario=$data["idUsuario"];
    $nomUsuario=$data["nomUsuario"];
    $passUsuario=$data["passUsuario"];
    $perfilUsuario=$data["perfilUsuario"];
    $estadoUsuario=$data["estadoUsuario"];


    $stmt=Conexion::conectar()->prepare("update usuario set password='$passUsuario', nombre_usuario='$nomUsuario', perfil='$perfilUsuario', estado='$estadoUsuario' where id_usuario=$idUsuario");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlActualizarAcceso($fechaHora, $id){

    $stmt=Conexion::conectar()->prepare("update usuario set ultimo_login='$fechaHora' where id_usuario=$id");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliUsuario($data){
    $login_sql=ModeloUsuario::mdlInfoUsuario($data);
    $login=$login_sql["login_usuario"];

    $usuario=Conexion::conectar()->prepare("select * from factura where usuario='$login'");
    $usuario->execute();
    if($usuario->fetch()>0){
      echo "error";
    }else{
      $stmt=Conexion::conectar()->prepare("delete from usuario where id_usuario=$data");

      if($stmt->execute()){
        return "ok";
      }else{
        return "error";
      }
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlBusUsuario($data){
    $stmt=Conexion::conectar()->prepare("select * from usuario WHERE login_usuario like '$data' ");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
  
  static public function mdlCantidadUsuarios(){
    $stmt=Conexion::conectar()->prepare("select count(*) as usuario from usuario");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

}