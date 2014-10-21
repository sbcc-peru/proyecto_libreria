<?php
 @session_start();
 $user=$_SESSION['usuario'];/*captura la variable de session del usuario que ingresa al sistema*/
 $fecha_actual= date("Y-m-d");
require_once("../../conexiones/class_proveedor.php");
require_once("../../conexiones/conexion.php");
//print_r($_POST);nick_usu
$tra=new proveedor();
$tra->add_proveedor($_POST["raz_soc"],
					$_POST["nro_doc"],
					$_POST["tip_per"],					
					$_POST["estado"],
					$_POST["direccion"],
					$_POST["pais"],
					$_POST["departamento"],
					$_POST["provincia"],
					$_POST["distrito"],
					$_POST["celular"],				
					$_POST["telefono"],				
					$_POST["fax"],
					$user,
					$fecha_actual,
					$user,
					$fecha_actual);
?>