<?php 

class Conexion{
  static public function conectar(){
    $host="localhost";
    $db="sistema_agua";
    $userDB="root";
    $passDB="";
    
    /*$host="localhost";
    $db="u813468505_sistema_agua";
    $userDB="u813468505_root";
    $passDB="Administrador1!";*/
    
    $link=new PDO("mysql:host=".$host.";"."dbname=".$db,$userDB,$passDB);
    $link->exec("set names utf8");
    return $link;
  }
}