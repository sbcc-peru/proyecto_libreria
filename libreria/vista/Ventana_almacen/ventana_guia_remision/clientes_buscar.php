<?php
	require_once("conexion.php");
		$response = array (
            "razon_social" => "",
            "ruc" => "",
            "direccion" => "",
            "distrito" => "",
            "telefono" => "",
            "referencia" => ""
    	);
	$tra=new clientes();
	$reg=$tra->get_cliente_por_id($_GET["id"]);
	if($reg){

		$response["razon_social"]=$reg[0]["var_rsoc_cli"];
		$response["ruc"]=$reg[0]["var_ruc_cli"];
		$response["direccion"]=$reg[0]["var_dir_cli"];
		$response["distrito"]=$reg[0]["var_dist_cli"];
		$response["telefono"]=$reg[0]["var_telf_cli"];
		$response["referencia"]=$reg[0]["var_refdom_cli"];
		
	}else{

		$response["razon_social"]="";
		$response["ruc"]="";
		$response["direccion"]="";
		$response["distrito"]="";
		$response["telefono"]="";
		$response["referencia"]="";

	}
	echo json_encode($response);	

?>		