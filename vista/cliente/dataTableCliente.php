<?php
require_once "../../controlador/clienteControlador.php";
require_once "../../modelo/clienteModelo.php";

$cliente=ControladorCliente::ctrInfoClientes();

$datosJson= '{
    "data":[';
foreach($cliente as $key => $value){

  
  $botones="<div class='btn-group'><button class='btn btn-info' onclick='MVerCliente(".$value['id_cliente'].")'><i class='fas fa-eye'></i></button><button class='btn btn-secondary' onclick='MEditCliente(".$value['id_cliente'].")'><i class='fa fa-edit'></i></button><button class='btn btn-danger' onclick='MEliCliente(".$value['id_cliente'].")'><i class='fa fa-trash'></i></button></div>";
  $btnUbicacion="<a class='btn btn-success' href='https://maps.google.com/?q=".$value['ubicacion_cliente']."&z=18' target='_blank'><i class='fa-solid fa-location-dot'></i></a>";
  $datosJson.='[
        "'.$value["razon_social_cliente"].'",
        "'.$value["direccion_cliente"].'",
        "'.$value["telefono_cliente"].'",
        "'.$btnUbicacion.'",
        "'.$botones.'"
      ],';

}
$datosJson=substr($datosJson, 0, -1);
$datosJson.=']
  }';

echo $datosJson;
