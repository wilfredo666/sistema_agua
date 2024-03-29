<?php 
$ruta=parse_url($_SERVER['REQUEST_URI']);

if(isset($ruta["query"])){
  if($ruta["query"]=="ctrRegCliente"||
     $ruta["query"]=="ctrEditCliente"||
     $ruta["query"]=="ctrEliCliente"||
     $ruta["query"]=="ctrBusCliente"){
    $metodo=$ruta["query"];
    $Cliente=new ControladorCliente();
    $Cliente->$metodo();
  }
}


class ControladorCliente{

  static public function ctrInfoClientes(){
    $respuesta=ModeloCliente::mdlInfoClientes();

    return $respuesta;
  }

  static public function ctrRegCliente(){
    require "../modelo/clienteModelo.php";

    $imagen = $_FILES["ImgFachada"];

    $nomImagen= $imagen["name"];
    $archImagen= $imagen["tmp_name"];

    move_uploaded_file($archImagen, "../assest/dist/img/fachadas/".$nomImagen);

    $ubicacion=$_POST["ubiLatitud"].",".$_POST["ubiLongitud"];
    $data=array(
      "rsCliente"=>$_POST["rsCliente"],
      "NitCiCliente"=>$_POST["NitCiCliente"],
      "dirCliente"=>$_POST["dirCliente"],
      "nombreCliente"=>$_POST["nombreCliente"],
      "telCliente"=>$_POST["telCliente"],
      "precioEntregaCli"=>$_POST["precioEntregaCli"],
      "imgFachada"=>$nomImagen,
      "ubicacion"=>$ubicacion
    );

    $respuesta=ModeloCliente::mdlRegCliente($data);

    echo $respuesta;
  }

  static public function ctrInfoCliente($id){
    $respuesta=ModeloCliente::mdlInfoCliente($id);

    return $respuesta;
  }

  static public function ctrEditCliente(){
    require "../modelo/clienteModelo.php";

    $imgFachadaActual = $_POST["imgActFachada"];
    $imgFachada = $_FILES["ImgFachada"];

    if($imgFachada["name"]==""){
      $imagen = $imgFachadaActual;
    }else{
      $imagen = $imgFachada["name"];
      $archImagen=$imgFachada["tmp_name"];

      move_uploaded_file($archImagen,"../assest/dist/img/fachadas/".$imagen);
    }
    $ubicacion=$_POST["ubiLatitud"].",".$_POST["ubiLongitud"];
    $data=array(
      "idCliente"=>$_POST["idCliente"],
      "dirCliente"=>$_POST["dirCliente"],
      "nombreCliente"=>$_POST["nombreCliente"],
      "telCliente"=>$_POST["telCliente"],
      "precioEntregaCli"=>$_POST["precioEntregaCli"],
      "imgProducto"=>$imagen,
      "ubicacion"=>$ubicacion
    );

    $respuesta=ModeloCliente::mdlEditCliente($data);

    echo $respuesta;

  }

  static public function ctrEliCliente(){
    require "../modelo/ClienteModelo.php";
    $data=$_POST["id"];

    $respuesta=ModeloCliente::mdlEliCliente($data);

    echo $respuesta;

  }

  static public function ctrBusCliente(){
    require "../modelo/ClienteModelo.php";
    $nitCliente=$_POST["nitCliente"];

    $respuesta=ModeloCliente::mdlBusCliente($nitCliente);
    echo json_encode($respuesta);
  }

  static public function ctrCantidadClientes(){
    $respuesta=ModeloCliente::mdlCantidadClientes();
    return $respuesta;
  }
}