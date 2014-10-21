<script> 
function cerrarse(){ 
window.close() 
} 
</script> 
<?php
require_once("../../conexiones/class_usuario.php");
require_once("../../conexiones/class_rol.php");
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
<title>USUARIO</title>

<!--STYLESHEETS-->
<link href="../../paquetes/css ventanas/style_ventana.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
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
	if (f.nick_usu.value   == '') { alert ('El campo Nick Usuario esta vacío, ingrese un dato porfavor!!');  
	f.nick_usu.focus(); return false; }  
	if (f.clave_usu.value   == '') { alert ('El campo Clave esta vacío, ingrese un dato porfavor!!');  
	f.clave_usu.focus(); return false; }  
	if (f.rol.value   == '--Seleccione--') { alert ('El campo Seleccione Rol esta vacío, ingrese un dato porfavor!!');  
	f.rol.focus(); return false; }
	if (f.nombres_usu.value   == '') { alert ('El campo Nombres completos esta vacío, ingrese un dato porfavor!!');  
	f.nombres_usu.focus(); return false; } 
	if (f.ap_pat.value   == '') { alert ('El campo Apellido Paterno esta vacío, ingrese un dato porfavor!!');  
	f.ap_pat.focus(); return false; } 
	if (f.ap_mat.value   == '') { alert ('El campo Apellido Materno esta vacío, ingrese un dato porfavor!!');  
	f.ap_mat.focus(); return false; } 
	if (f.estado.value   == '--Seleccione--') { alert ('El campo Estado esta vacío, ingrese un dato porfavor!!');  
	f.estado.focus(); return false; } 
 return true; } 
 
 

</script>

</head>
<body <?php if (isset($_GET['load'])){ echo "onload='cerrar();'";  } ?> >

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon_"></div>
    <div class="pass-icon_"></div>
    <!--END SLIDE-IN ICONS-->
    <br />
    <br />

<!--LOGIN FORM-->
<form name="f" class="login-form" action="ingresar_usuario.php" method="post" onSubmit="return formulario(this)">

	<!--HEADER-->
    <div class="header">
    <!--TITLE-->
    <h1 align="center">USUARIOS</h1>
    
    <!--END TITLE-->
  
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
      <table width="100%" border="1">
        <tr>
          <td height="20">Nick deUsuario: </td>
          <td><input name="nick_usu" type="text" class="input username" id="nick_usu"  style="width: 200px;" onKeyPress="return tab(event,this)" /></td>
           </tr>
        <tr>
          <td>Clave Usuario: </td>
          <td><input name="clave_usu" type="password" class="input username" style="width: 200px;"  onKeyPress="return tab(event,this)" /></td>
        </tr>
        <tr>
          <td>Seleccione Rol: </td>
          <td>
          <select class="input username" style="width: 160px;"  name="rol" id="rol" onKeyPress="return tab(event,this)">
          		   <option>--Seleccione--</option>
          		<?php
					$tra=new rol();
					$reg=$tra->get_combo_rol();
					for ($i=0;$i<count($reg);$i++)
					{
				?>
				   <option value="<?php echo $reg[$i]["int_cod_rol"];?>"><?php echo $reg[$i]["var_nom_rol"];?></option>
				
				
				<?php
					}
				?>
         
            </select>
          </td>
           </tr>
        <tr>
          <td>Nombres Completos: </td>
          <td><input name="nombres_usu" type="text" class="input username" id="nombres_usu"  onKeyPress="return validar(event)" /></td>
        </tr>
        <tr>
          <td>Apellido Paterno: </td>
          <td><input name="ap_pat" type="text" class="input username" style="width: 200px;" onKeyPress="return validar(event)" /></td>
          </tr>
        <tr>
          <td>Apellido Materno :</td>
          <td><input name="ap_mat" type="text" class="input username" style="width: 200px;"  onKeyPress="return validar(event)" /></td>
        </tr>
        <tr>
          <td>Estado: </td>
          <td><select class="input username"  name="estado" style="width: 155px;" id="estado" onKeyPress="return tab(event,this)">
            <option>--Seleccione--</option>
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>   
          </select></td>
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

