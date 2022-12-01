<?php 
$ruta=parse_url($_SERVER['REQUEST_URI']);

if(isset($ruta["query"])){
  if($ruta["query"]=="ctrRegVehiculo"||
     $ruta["query"]=="ctrEditVehiculo"||
     $ruta["query"]=="ctrEliVehiculo"||
    $ruta["query"]=="ctrBusVehiculo"){
    $metodo=$ruta["query"];
    $Vehiculo=new ControladorVehiculo();
    $Vehiculo->$metodo();
  }
}


class ControladorVehiculo{

  static public function ctrListaVehiculos(){
    $respuesta=ModeloVehiculo::mdlListaVehiculos();

    return $respuesta;
  }

  static public function ctrRegVehiculo(){
    require "../modelo/VehiculoModelo.php";

    $data=array(
      "rsVehiculo"=>$_POST["rsVehiculo"],
      "NitCiVehiculo"=>$_POST["NitCiVehiculo"],
      "dirVehiculo"=>$_POST["dirVehiculo"],
      "nombreVehiculo"=>$_POST["nombreVehiculo"],
      "telVehiculo"=>$_POST["telVehiculo"]
    );

    $respuesta=ModeloVehiculo::mdlRegVehiculo($data);

    echo $respuesta;
  }

  static public function ctrInfoVehiculo($id){
    $respuesta=ModeloVehiculo::mdlInfoVehiculo($id);

    return $respuesta;
  }

  static public function ctrEditVehiculo(){
    require "../modelo/VehiculoModelo.php";

     $data=array(
      "idVehiculo"=>$_POST["idVehiculo"],
      "dirVehiculo"=>$_POST["dirVehiculo"],
      "nombreVehiculo"=>$_POST["nombreVehiculo"],
      "telVehiculo"=>$_POST["telVehiculo"]
    );

    $respuesta=ModeloVehiculo::mdlEditVehiculo($data);

    echo $respuesta;

  }

  static public function ctrEliVehiculo(){
    require "../modelo/VehiculoModelo.php";
    $data=$_POST["id"];

    $respuesta=ModeloVehiculo::mdlEliVehiculo($data);

    echo $respuesta;

  }
  
  static public function ctrBusVehiculo(){
    require "../modelo/VehiculoModelo.php";
    $nitVehiculo=$_POST["nitVehiculo"];
    
    $respuesta=ModeloVehiculo::mdlBusVehiculo($nitVehiculo);

    echo json_encode($respuesta);
    
  }
  
  static public function ctrCantidadVehiculos(){
    $respuesta=ModeloVehiculo::mdlCantidadVehiculos();
    return $respuesta;
  }
}