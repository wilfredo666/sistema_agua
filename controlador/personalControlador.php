<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegPersonal" ||
    $ruta["query"] == "ctrEditPersonal" ||
    $ruta["query"] == "ctrEliPersonal" ||
    $ruta["query"] == "ctrBusPersonal" ||
    $ruta["query"] == "ctrBuscarPersonal" 
  ) {
    $metodo = $ruta["query"];
    $Personal = new ControladorPersonal();
    $Personal->$metodo();
  }
}


class ControladorPersonal
{

  static public function ctrListaPersonal()
  {
    $respuesta = ModeloPersonal::mdlListaPersonal();

    return $respuesta;
  }

  static public function ctrInfoChoferes()
  {
    $respuesta = ModeloPersonal::mdlInfoChoferes();

    return $respuesta;
  }

  static public function ctrInfoVentasPersonal(){
    $respuesta = ModeloPersonal::mdlInfoVentasPersonal();
    return $respuesta;
  }


  static public function ctrRegPersonal()
  {
    require "../modelo/PersonalModelo.php";

    $data = array(
      "nomPersonal" => $_POST["nomPersonal"],
      "patPersonal" => $_POST["patPersonal"],
      "matPersonal" => $_POST["matPersonal"],
      "ciPersonal" => $_POST["ciPersonal"],
      "telPersonal" => $_POST["telPersonal"],
      "contactoReferencia" => $_POST["contactoReferencia"],
      "cargoPersonal" => $_POST["cargoPersonal"],
      "fechaNacPersonal" => $_POST["fechaNacPersonal"],
      "fechaIngPersonal" => $_POST["fechaIngPersonal"],
    );
    /* var_dump($data); */
    $respuesta = ModeloPersonal::mdlRegPersonal($data);

    echo $respuesta;
  }

  static public function ctrInfoPersonal($id)
  {
    $respuesta = ModeloPersonal::mdlInfoPersonal($id);

    return $respuesta;
  }

  static public function ctrEditPersonal()
  {
    require "../modelo/personalModelo.php";

    $data = array(
      "idPersonal" => $_POST["idPersonal"],
      "nomPersonal" => $_POST["nomPersonal"],
      "patPersonal" => $_POST["patPersonal"],
      "matPersonal" => $_POST["matPersonal"],
      "ciPersonal" => $_POST["ciPersonal"],
      "telPersonal" => $_POST["telPersonal"],
      "contactoReferencia" => $_POST["contactoReferencia"],
      "cargoPersonal" => $_POST["cargoPersonal"],
      "fechaNacPersonal" => $_POST["fechaNacPersonal"],
      "fechaIngPersonal" => $_POST["fechaIngPersonal"],
      "estadoPersonal" => $_POST["estadoPersonal"],
    );
    /* var_dump($data); */
    $respuesta = ModeloPersonal::mdlEditPersonal($data);

    echo $respuesta;
  }

  static public function ctrEliPersonal()
  {
    require "../modelo/PersonalModelo.php";
    $data = $_POST["id"];

    $respuesta = ModeloPersonal::mdlEliPersonal($data);

    echo $respuesta;
  }

  static public function ctrBusPersonal()
  {
    require "../modelo/PersonalModelo.php";
    $nitPersonal = $_POST["nitPersonal"];

    $respuesta = ModeloPersonal::mdlBusPersonal($nitPersonal);

    echo json_encode($respuesta);
  }

  static public function ctrCantidadPersonals()
  {
    $respuesta = ModeloPersonal::mdlCantidadPersonals();
    return $respuesta;
  }

  static public function ctrInfoPersonalDisp(){
    $respuesta = ModeloPersonal::mdlInfoPersonalDisp();
    return $respuesta;
  }

  static public function ctrBuscarPersonal(){
    require "../modelo/personalModelo.php";
    require "../modelo/ventaModelo.php";

    $idPersonal = $_POST["idPersonal"];
    $fecha = $_POST["fecha"];

    $data = array(
      "idPersonal" => $idPersonal,
      "fecha" => $fecha,
    );

    $respuesta = ModeloPersonal::mdlBuscarPersonal($data);
    echo json_encode($respuesta);
  }
}
