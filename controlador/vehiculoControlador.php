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
    require "../modelo/vehiculoModelo.php";
    $imagen = $_FILES["ImgVehiculo"];

    $nomImagen = $imagen["name"];
    $archImagen = $imagen["tmp_name"];

    move_uploaded_file($archImagen, "../assest/dist/img/vehiculos/".$nomImagen);

    $data=array(
      "placaVehiculo"=>$_POST["placaVehiculo"],
      "descVehiculo"=>$_POST["descVehiculo"],
      "imgVehiculo"=>$nomImagen
    );

    $respuesta=ModeloVehiculo::mdlRegVehiculo($data);

    echo $respuesta;
  }

  static public function ctrInfoVehiculo($id){
    $respuesta=ModeloVehiculo::mdlInfoVehiculo($id);

    return $respuesta;
  }

  static public function ctrEditVehiculo(){
    require "../modelo/vehiculoModelo.php";

    $imgVehiculoActual = $_POST["imgActVehiculo"];
    $imgVehiculo = $_FILES["ImgVehiculo"];

    if($imgVehiculo == ""){
      $imagen = $imgVehiculoActual;
    }else{
      $imagen = $imgVehiculo["name"];
      $archImagen = $imgVehiculo["tmp_name"];

      move_uploaded_file($archImagen, "../assest/dist/img/vehiculos/".$imagen);
    }

     $data=array(
      "idVehiculo"=>$_POST["idVehiculo"],
      "placaVehiculo"=>$_POST["placaVehiculo"],
      "descVehiculo"=>$_POST["descVehiculo"],
      "estadoVehiculo"=>$_POST["estadoVehiculo"],
      "imgVehiculo"=>$imagen
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