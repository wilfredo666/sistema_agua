<?php 

$nombre=$_GET['nombre'];
$archivo=$_GET["archivo"];
$ruta = "../../assest/dist/file/archivos/".$nombre;
unlink($ruta."/".$archivo);

var_dump("hola desde eliarchivo");
?>

