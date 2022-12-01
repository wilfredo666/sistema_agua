<?php 
$ruta=parse_url($_SERVER['REQUEST_URI']);

if(isset($ruta["query"])){
  if($ruta["query"]=="ctrRegPersonal"||
     $ruta["query"]=="ctrEditPersonal"||
     $ruta["query"]=="ctrEliPersonal"||
    $ruta["query"]=="ctrBusPersonal"){
    $metodo=$ruta["query"];
    $Personal=new ControladorPersonal();
    $Personal->$metodo();
  }
}


class ControladorPersonal{

  static public function ctrListaPersonal(){
    $respuesta=ModeloPersonal::mdlListaPersonal();

    return $respuesta;

  }
  
  static public function ctrInfoChoferes(){
    $respuesta=ModeloPersonal::mdlInfoChoferes();

    return $respuesta;

  }


  static public function ctrRegPersonal(){
    require "../modelo/PersonalModelo.php";

    $data=array(
      "rsPersonal"=>$_POST["rsPersonal"],
      "NitCiPersonal"=>$_POST["NitCiPersonal"],
      "dirPersonal"=>$_POST["dirPersonal"],
      "nombrePersonal"=>$_POST["nombrePersonal"],
      "telPersonal"=>$_POST["telPersonal"]
    );

    $respuesta=ModeloPersonal::mdlRegPersonal($data);

    echo $respuesta;
  }

  static public function ctrInfoPersonal($id){
    $respuesta=ModeloPersonal::mdlInfoPersonal($id);

    return $respuesta;
  }

  static public function ctrEditPersonal(){
    require "../modelo/PersonalModelo.php";

     $data=array(
      "idPersonal"=>$_POST["idPersonal"],
      "dirPersonal"=>$_POST["dirPersonal"],
      "nombrePersonal"=>$_POST["nombrePersonal"],
      "telPersonal"=>$_POST["telPersonal"]
    );

    $respuesta=ModeloPersonal::mdlEditPersonal($data);

    echo $respuesta;

  }

  static public function ctrEliPersonal(){
    require "../modelo/PersonalModelo.php";
    $data=$_POST["id"];

    $respuesta=ModeloPersonal::mdlEliPersonal($data);

    echo $respuesta;

  }
  
  static public function ctrBusPersonal(){
    require "../modelo/PersonalModelo.php";
    $nitPersonal=$_POST["nitPersonal"];
    
    $respuesta=ModeloPersonal::mdlBusPersonal($nitPersonal);

    echo json_encode($respuesta);
    
  }
  
  static public function ctrCantidadPersonals(){
    $respuesta=ModeloPersonal::mdlCantidadPersonals();
    return $respuesta;
  }
}