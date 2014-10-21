
<?php
require_once("../../../../conexiones/class_cliente.php");



 if (!$_GET["q"]) return;
$tra=new cliente();
$reg=$tra->get_cliente_like(strtolower($_GET["q"]));
for ($i=0;$i<count($reg);$i++)
{
           

	$cid = $reg[$i]["int_cod_cli"];
	$cname = $reg[$i]["var_rsoc_cli"];
	$ruc = $reg[$i]["var_ruc_cli"];

		echo "$cname|$cid|$ruc\n";

}
?>
