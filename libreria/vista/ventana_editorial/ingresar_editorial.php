<?php
 @session_start();
 $user=$_SESSION['usuario'];/*captura la variable de session del usuario que ingresa al sistema*/
 $fecha_actual= date("Y-m-d");
require_once("../../conexiones/class_editorial.php");
require_once("../../conexiones/conexion.php");
//print_r($_POST);
$tra=new editorial();
$tra->add_editorial($_POST["nom_edit"],$_POST["desc_edit"],$_POST["est_edit"],$user,$fecha_actual,$user,$fecha_actual);
?>