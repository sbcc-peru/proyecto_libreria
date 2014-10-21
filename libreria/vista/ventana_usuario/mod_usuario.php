<script> 
function cerrarse(){ 
window.close() 
} 
</script> 



<?php
@session_start();
 $user=$_SESSION['usuario'];
 $fecha_actual= date("Y-m-d");
require_once("../../conexiones/class_usuario.php");
require_once("../../conexiones/class_rol.php");
require_once("../../conexiones/conexion.php");
?>
  


<?php

$tra=new usuario();

if (isset($_GET["grabar"]) and $_GET["grabar"]=="si")
{
	
	$tra->edit_usuario
					($_GET['id'],
					$_GET["nombres_usu"],
					$_GET["ap_pat"],
					$_GET["ap_mat"],
					$_GET["nick_usu"],
					$_GET["clave_usu"],
					$_GET["rol"],
					$_GET["estado"],
					$user);
	exit;
}


$reg=$tra->get_usuario_por_id($_GET["id"]);
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
</script>

</head>
<body <?php if (isset($_GET['load'])){ echo "onload='cerrar();'";  } ?>   >

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon_"></div>
    <div class="pass-icon_"></div>
    <!--END SLIDE-IN ICONS-->
    <br />
    <br />

<!--LOGIN FORM-->
<form name="login-form" class="login-form" action="mod_usuario.php" method="get">

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
          <td><input name="nick_usu" type="text" class="input username" id="nick_usu" style="width: 200px;" onKeyPress="return tab(event,this)"  value="<?php echo $reg[0]["var_nick_usu"];?>" /> </td>
           </tr>
        <tr>
          <td>Clave Usuario: </td>
          <td><input name="clave_usu" type="password" class="input username" style="width: 200px;" onKeyPress="return tab(event,this)" value="<?php echo $reg[0]["var_cla_usu"];?>" /></td>
        </tr>
        <tr>
          <td>Seleccione Rol: </td>
          <td>
          <select class="input username"  name="rol" id="rol" style="width: 160px;" onKeyPress="return tab(event,this)">
          <option value="<?php echo $reg[0]["int_cod_rol"];?>" selected><?php echo $reg[0]["var_nom_rol"];?></option>
          <?php
		  
			$nombre_usuario=$reg[0]["var_nom_usu"];	
			$apellido_usuario=$reg[0]["var_appat_usu"];	
			$materno_usuario=$reg[0]["var_apmat_usu"];		  
			$dato_combo=$reg[0]["int_cod_rol"];	
			$estados=$reg[0]["int_est_usu"];
				  
			$tra=new rol();
			$reg=$tra->get_combo_rol_update($dato_combo);
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
          <td><input name="nombres_usu" type="text" class="input username" id="nombres_usu" onKeyPress="return tab(event,this)" value="<?php echo $nombre_usuario;?>" /></td>
        </tr>
        <tr>
          <td>Apellido Paterno: </td>
          <td><input name="ap_pat" type="text" class="input username" style="width: 200px;" onKeyPress="return tab(event,this)" value="<?php echo $apellido_usuario;?>" /></td>
           </tr>
        <tr>
          <td>Apellido Materno :</td>
          <td><input name="ap_mat" type="text" class="input username" style="width: 200px;" onKeyPress="return tab(event,this)" value="<?php echo $materno_usuario;?>" /></td>
        </tr>
        <tr>
          <td>Estado: </td>
          <td><select class="input username"   name="estado" style="width: 155px;" id="estado" onKeyPress="return tab(event,this)" >
            <?php 
					if($estados==1)
					{
						echo "     <option selected='selected' value='1'>Activo</option>
           							 <option value='2'>Inactivo</option> ";
					}
					else 
					{
						echo " <option selected='selected' value='2'>Inactivo</option>
            					<option value='1'>Activo</option>";
					}		
			?>      
          </select></td>
        </tr>
      </table>
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer" >
    <input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
    <input type="hidden" name="grabar" value="si" />
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

