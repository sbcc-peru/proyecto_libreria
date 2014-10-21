<?php
 @session_start();
 $user=$_SESSION['usuario'];
 $fecha_actual= date("Y-m-d");
require_once("../../conexiones/class_usuario.php");
require_once("../../conexiones/conexion.php");
//print_r($_POST);nick_usu
$tra=new usuario();
$tra->add_usuario($_POST["nombres_usu"],
					$_POST["ap_pat"],
					$_POST["ap_mat"],
					$_POST["nick_usu"],
					$_POST["clave_usu"],
					$_POST["rol"],
					$_POST["estado"],
					$user,
					$fecha_actual,
					$user,
					$fecha_actual);
?>