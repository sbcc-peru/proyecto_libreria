<?php

//$host="localhost";
//$username="root"; 
//$password="";
$host="192.168.1.200";
$username="grupo2"; 
$password="123456"; 
$db_name="bd_libreria_test"; 

	$con = mysql_connect($host,$username,$password)   or die(mysql_error());
	mysql_select_db($db_name, $con)  or die(mysql_error());

$q = strtolower($_GET["q"]);
if (!$q) return;


 
$sql = "

select int_cod_cli, var_rsoc_cli,var_ruc_cli,var_dir_cli,var_dist_cli,var_telf_cli from T_cliente where var_rsoc_cli  like '%$q%' "; 
 
$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
	$cid = $rs['int_cod_cli'];
	$cname = $rs['var_rsoc_cli'];
	$ruc = $rs['var_ruc_cli'];
	$direccion = $rs['var_dir_cli'];
	$distrito = $rs['var_dist_cli'];
	$telef = $rs['var_telf_cli'];
		echo "$cname|$cid|$ruc|$direccion|$distrito|$telef\n";

}
?>