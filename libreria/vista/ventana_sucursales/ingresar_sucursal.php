<?php
 @session_start();
 $user=$_SESSION['usuario'];
 $fecha_actual= date("Y-m-d");
require_once("../../conexiones/class_sucursal.php");
require_once("../../conexiones/conexion.php");
//print_r($_POST);
$tra=new sucursal();
$tra->add_sucursal($_POST["cod_emp"],$_POST["var_nom_suc"],$_POST["descripcion"],$_POST["estado"],$_POST["pais"],$_POST["departamento"],$_POST["provincia"],$_POST["direccion"],$_POST["telf"],$user,$fecha_actual,$user,$fecha_actual);
?>