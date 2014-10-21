<?php

//$servidor="localhost";
//$user_conexion='root';
//$clave='';

$servidor="192.168.1.200";
$user_conexion='grupo2';
$clave='123456';
$bd_server_libreria='bd_libreria_test';

class Conectar 
{
	public static function con()
	{
		$conexion=mysql_connect("192.168.1.200","grupo2","123456");
		//$conexion=mysql_connect("localhost","root","");
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db("bd_libreria_test");
		return $conexion;
	}
}
?>