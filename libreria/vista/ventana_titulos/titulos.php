
<script> 
function cerrarse(){ 
window.close() 
} 
</script> 
<?php
require_once("../../conexiones/class_titulos.php");
require_once("../../conexiones/class_editorial.php");
require_once("../../conexiones/class_genero.php");
require_once("../../conexiones/class_pais.php");
require_once("../../conexiones/conexion.php");
?>
  




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<?php
header('Content-Type: text/html; charset=UTF-8'); 
?>
<head>

<!--------------------
LOGIN FORM
by: Amit Jakhu
www.amitjakhu.com
--------------------->

<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Títulos</title>

<!--STYLESHEETS-->
<link href="../../paquetes/css ventanas/style_ventana.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<script type="text/javascript" src="../../paquetes/js/validar.js"></script>
 <script type="text/javascript" src="js/validar.js"></script>
  
<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
});

function validar(e) { // 1

    tecla = (document.all) ? e.keyCode : e.which; // 2

    if (tecla==8) return true; // 3

    patron =/[A-Za-z\s]/; // 4

    te = String.fromCharCode(tecla); // 5

    return patron.test(te); // 6

} 

function formulario(f) {
	if (f.titulo.value   == '') { alert ('El campo Título esta vacío, ingrese un dato porfavor!!');  
	f.titulo.focus(); return false; }  
	if (f.autor.value   == '') { alert ('El campo Autor esta vacío, ingrese un dato porfavor!!');  
	f.autor.focus(); return false; }  
	if (f.editorial.value   == '--Seleccione--') { alert ('El campo Editorial esta vacío, ingrese un dato porfavor!!');  
	f.editorial.focus(); return false; }
	if (f.genero.value   == '--Seleccione--') { alert ('El campo Género esta vacío, ingrese un dato porfavor!!');  
	f.genero.focus(); return false; } 
	if (f.pais.value   == '--Seleccione--') { alert ('El campo País esta vacío, ingrese un dato porfavor!!');  
	f.pais.focus(); return false; } 
	if (f.estado.value   == '--Seleccione--') { alert ('El campo Estado esta vacío, ingrese un dato porfavor!!');  
	f.estado.focus(); return false; } 
	
 return true; } 
 
</script>

</head>
<body <?php if (isset($_GET['load'])){ echo "onload='cerrar();'"; } ?>>   

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon_"></div>
    <div class="pass-icon_"></div>
    <!--END SLIDE-IN ICONS-->
    <br />
    <br />

<!--LOGIN FORM-->
<form name="login-form" class="login-form" action="ingresar_titulos.php" method="post" onSubmit="return formulario(this)">

	<!--HEADER-->
    <div class="header">
    <!--TITLE-->
    <h1 align="center">TÍTULOS</h1>	
    
    <!--END TITLE-->
  
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
      <table width="80%" border="1">
        <tr>
          <td height="20">Título: </td>
          <td><input name="titulo" type="text" style="width: 450px;" class="input username" onKeyPress="return tab(event,this)" /></td>	
        </tr>
        <tr>
          <td height="20">Autor: </td>
          <td><input name="autor" type="text" style="width: 300px;" class="input username" onKeyPress="return tab(event,this)" /></td>	
        </tr>
        <tr>
          <td height="20">Descripción: </td>
          <td><input name="descripcion" type="text" style="width: 400px;" class="input username" onKeyPress="return tab(event,this)" /></td>	
        </tr>
        <tr>
          <td height="20">ISBN: </td>
          <td><input name="isbn" type="text" style="width: 200px;" class="input username" onKeyPress="return tab(event,this)" />
          Edición: 
          <input name="edicion" type="text" style="width: 160px;" class="input username" onkeyUp="return ValNumero(this);" /></td>	
        </tr>
        <tr>
          <td height="20">N° Página: </td>
          <td><input name="n_pagina" type="text" style="width: 160px;" class="input username" onkeyUp="return ValNumero(this);" />	
          Editorial: 
          <select  name="editorial" id="editorial" style="width: 200px;" class="input username" onKeyPress="return tab(event,this)">
          <option>--Seleccione--</option>
          <?php
			$tra=new editorial();
			$reg=$tra->get_combo_editorial();
			for ($i=0;$i<count($reg);$i++)
			{
			?>
			   <option value="<?php echo $reg[$i]["int_cod_edit"];?>"><?php echo $reg[$i]["var_nom_edit"];?></option>			
			
			<?php
			}
		  ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Género: </td>
          <td>
          <select class="input username" style="width: 200px;"  name="genero" id="genero" onKeyPress="return tab(event,this)">
          <option>--Seleccione--</option>
          <?php
			$tra=new genero();
			$reg=$tra->get_combo_generos();
			for ($i=0;$i<count($reg);$i++)
			{
			?>
			   <option value="<?php echo $reg[$i]["int_cod_gen"];?>"><?php echo $reg[$i]["var_nom_gen"];?></option>
			
			
			<?php
			}
		  ?>
            </select>
            País: 
          <select  name="pais" id="pais" style="width: 160px;" class="input username" onKeyPress="return tab(event,this)">
          <option>--Seleccione--</option>
          <?php
			$tra=new pais();
			$reg=$tra->get_combo_pais();
			for ($i=0;$i<count($reg);$i++)
			{
			?>
			   <option value="<?php echo $reg[$i]["int_cod_pais"];?>"><?php echo $reg[$i]["var_nom_pais"];?></option>
			
			
			<?php
			}
		  ?>
            </select>
          </td>	
        </tr>
        <tr>
          <td height="20">Precio Definido: </td>
          <td><input name="pre_definido" type="text" style="width: 120px;" class="input username" onkeyUp="return decimal(this);" />
          Precio Sugerido: 
          <input name="pre_sugerido" type="text" style="width: 120px;" class="input username" onkeyUp="return decimal(this);" /></td>	
        </tr>
        <tr>
          <td>Estado: </td>
          <td><select class="input username" style="width: 155px;" name="estado" id="estado" onKeyPress="return tab(event,this)">
          	<option>--Seleccione--</option>
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>            
          </select>
          Cod.Barra: 
          <input name="cod_barra" type="text" style="width: 160px;" class="input username" onKeyPress="return tab(event,this)" /></td>	
        </tr>
      </table>
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer" >
    <!--LOGIN BUTTON--><input type="submit" name="submit" value="GUARDAR" class="button" /><!--END LOGIN BUTTON-->
    <!--REGISTER BUTTON--><input type="button" name="submit" value="CANCELAR" class="register"onClick="cerrarse()" /><!--END REGISTER BUTTON-->
    <input type="hidden" id="val1" value="" disabled="disabled"/> 
    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->

<!--GRADIENT--><!--END GRADIENT-->

</body>
</html>

