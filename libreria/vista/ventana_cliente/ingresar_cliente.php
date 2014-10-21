<?php
 @session_start();
 $user=$_SESSION['usuario'];
 $fecha_actual= date("Y-m-d");
require_once("../../conexiones/class_cliente.php");
require_once("../../conexiones/conexion.php");
//print_r($_POST);nick_usu
$tra=new cliente();
$tra->add_cliente($_POST['rsoc'],
				 $_POST['estado'],
				 $_POST['tip_per'],
				 $_POST['ruc'],
				 $_POST['direccion'],
				 $_POST['pais'],
				 $_POST['departamento'],
				 $_POST['provincia'],
				 $_POST['distrito'],
				 $_POST['telefono'],
				 $_POST['fax'],
				 $_POST['dni'],
				 $_POST['correo'],
				 $user,
				 $fecha_actual,
				 $user,
				 $fecha_actual);
?>