  <script type="text/javascript">
        function cargar() {
            var data = window.document.getElementById('val1').value;
            window.opener.document.getElementById('deHijo').innerHTML = "Este texto viene de la página hijo: "+data;        
			
			
            this.window.close();
			opener.location.reload();
        }
		
        </script>
<style>
.eliminar {
	-moz-box-shadow:inset 0px 1px 0px 0px #54a3f7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #54a3f7;
	box-shadow:inset 0px 1px 0px 0px #54a3f7;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #007dc1), color-stop(1, #0061a7));
	background:-moz-linear-gradient(top, #007dc1 5%, #0061a7 100%);
	background:-webkit-linear-gradient(top, #007dc1 5%, #0061a7 100%);
	background:-o-linear-gradient(top, #007dc1 5%, #0061a7 100%);
	background:-ms-linear-gradient(top, #007dc1 5%, #0061a7 100%);
	background:linear-gradient(to bottom, #007dc1 5%, #0061a7 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#007dc1', endColorstr='#0061a7',GradientType=0);
	background-color:#007dc1;
	-moz-border-radius:15px;
	-webkit-border-radius:15px;
	border-radius:15px;
	border:1px solid #124d77;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Trebuchet MS;
	font-size:17px;
	padding:15px 42px;
	text-decoration:none;
	text-shadow:0px 1px 0px #154682;
}
.eliminar:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #0061a7), color-stop(1, #007dc1));
	background:-moz-linear-gradient(top, #0061a7 5%, #007dc1 100%);
	background:-webkit-linear-gradient(top, #0061a7 5%, #007dc1 100%);
	background:-o-linear-gradient(top, #0061a7 5%, #007dc1 100%);
	background:-ms-linear-gradient(top, #0061a7 5%, #007dc1 100%);
	background:linear-gradient(to bottom, #0061a7 5%, #007dc1 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#0061a7', endColorstr='#007dc1',GradientType=0);
	background-color:#0061a7;
}
.eliminar:active {
	position:relative;
	top:1px;
}

.bordes {
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffffff), color-stop(1, #f6f6f6));
	background:-moz-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
	background:-webkit-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
	background:-o-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
	background:-ms-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
	background:linear-gradient(to bottom, #ffffff 5%, #f6f6f6 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#f6f6f6',GradientType=0);
	background-color:#ffffff;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #dcdcdc;
	display:inline-block;
	cursor:pointer;
	color:#666666;
	font-family:arial;
	font-size:15px;
	font-weight:bold;
	padding:15px 51px;
	text-decoration:none;
	text-shadow:0px 1px 0px #ffffff;
}

</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Eliminar Ediorial</title>
</head>
<script language="Javascript"> 
function confirmar(){ 
confirmar=confirm("¿ESTAS SEGURO QUE QUIERES ELIMINAR ESTA EDITORIAL?"); 
if (confirmar) 
// si pulsamos en aceptar
window.location.assign("eliminar_editorial.php?dato=<?php echo $_GET['id']; ?>")
else 
// si pulsamos en cancelar
alert('Has dicho que no'); 
} 
</script>
<body <?php if(isset($_GET['eliminado'])){echo "onload='cargar()'";} ?> >
<?php 

if (isset($_GET['dato']))
{
//echo "entro";
require_once("../../conexiones/class_editorial.php");
require_once("../../conexiones/conexion.php");
//print_r($_GET);
$tra=new editorial();
$tra->eliminar_editorial($_GET["dato"]);
}

?>
</p>
<p>&nbsp;</p>
<p>&nbsp; </p>
<h1 align="center" style="margin-top: -60px;">ELIMINAR EDITORIAL</h1>

<div  align="center" >
<fieldset  class="bordes">
 
 <a class="eliminar" href="javascript:confirmar()">ELIMINAR</a>
 <input type="hidden" id="val1" value="" disabled="disabled"/> 
</fieldset>
</div>

</body>
</html>