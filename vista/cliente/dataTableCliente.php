<?php
require_once "../../controlador/clienteControlador.php";
require_once "../../modelo/clienteModelo.php";

$cliente=ControladorCliente::ctrInfoClientes();

$datosJson= '{
    "data":[';
foreach($cliente as $key => $value){

  
  $botones="<div class='btn-group'><button class='btn btn-info' onclick='MVerCliente(".$value['id_cliente'].")'><i class='fas fa-eye'></i></button><button class='btn btn-secondary' onclick='MEditCliente(".$value['id_cliente'].")'><i class='fa fa-edit'></i></button><button class='btn btn-danger' onclick='MEliCliente(".$value['id_cliente'].")'><i class='fa fa-trash'></i></button></div>";
  $btnUbicacion="<button class='btn btn-success' onclick='MVerUbicacionCliente(".$value['id_cliente'].")'><i class='fa-solid fa-location-dot'></i></button>";
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
