<?php
	require_once("conexion.php");
	$term=$_GET["term"];
	$clie=new clientes();
	$results=$clie->get_cliente_por_nombre($term);
	echo json_encode($results);	

?>		