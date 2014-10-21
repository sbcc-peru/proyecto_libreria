<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Pacientes</title>

<link rel="stylesheet" href="style.css" />

</head>

<body>
<div id="content">

<h1>GUIA DE REMISION</h1>

<hr />

<?php
	include_once("conexion.php");

	$con = new DB;
	$pacientes = $con->conectar();
	$strConsulta = "select var_nick_usu,var_nom_usu,var_apmat_usu,var_usuadd_usu from t_usuario";
	$pacientes = mysql_query($strConsulta);
	$numfilas = mysql_num_rows($pacientes);
	
	echo '<table cellpadding="0" cellspacing="0" width="100%">';
	echo '<thead><tr><td>No.</td><td>CLAVE</td><td>NOMBRE</td><td>HISTORIAL</td></tr></thead>';
	for ($i=0; $i<$numfilas; $i++)
	{
		$fila = mysql_fetch_array($pacientes);
		$numlista = $i + 1;
		echo '<tr><td>'.$numlista.'</td>';
		echo '<td>'.$fila['var_nick_usu'].'</td>';
        echo '<td>'.$fila['var_nick_usu'].' '.$fila['var_nick_usu'].' '.$fila['var_nick_usu'].'</td>';
		echo '<td><a href="reporte_historial.php?id='.$fila['var_nick_usu'].'">ver</a></td></tr>';
	}
	echo "</table>";
?>			

</div>
</body>
<input type="submit" name="botonPdf2" id="botonPdf2" value=" pdf " onclick="window.location.href='pdf_gluteos.php'"/>
</html>