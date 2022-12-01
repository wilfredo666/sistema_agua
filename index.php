<?php
session_start();
/* controladores */
require_once "controlador/usuarioControlador.php";
require_once "controlador/plantillaControlador.php";
require_once "controlador/clienteControlador.php";
require_once "controlador/productoControlador.php";
require_once "controlador/ventaControlador.php";
require_once "controlador/personalControlador.php";
require_once "controlador/vehiculoControlador.php";


/* modelos */
require_once "modelo/productoModelo.php";
require_once "modelo/usuarioModelo.php";
require_once "modelo/clienteModelo.php";
require_once "modelo/ventaModelo.php";
require_once "modelo/personalModelo.php";
require_once "modelo/vehiculoModelo.php";

$plantilla=new ControladorPlantilla();
$plantilla->ctrPlantilla();