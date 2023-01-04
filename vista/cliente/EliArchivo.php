<?php 

$nombre=$_GET['nombre'];
$archivo=$_GET["archivo"];
$ruta = "../../assest/dist/file/cliente/".$nombre;
unlink($ruta."/".$archivo);

var_dump("hola desde eliarchivo");
?>

