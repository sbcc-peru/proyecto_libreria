<?php
 @session_start();
 $user=$_SESSION['usuario'];/*captura la variable de session del usuario que ingresa al sistema*/
 $fecha_actual= date("Y-m-d");
require_once("../../conexiones/class_titulos.php");
require_once("../../conexiones/conexion.php");
//print_r($_POST);
$tra=new titulos();
$tra->add_titulos($_POST["titulo"],
					$_POST["autor"],
					$_POST["descripcion"],
					$_POST["isbn"],
					$_POST["edicion"],
					$_POST["n_pagina"],
					$_POST["editorial"],
					$_POST["genero"],
					$_POST["pais"],
					$_POST["pre_definido"],
					$_POST["pre_sugerido"],
					$_POST["estado"],
					$_POST["cod_barra"],					
					$user,
					$fecha_actual,
					$user,
					$fecha_actual);
?>