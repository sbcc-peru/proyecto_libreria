<script> 
function cerrarse(){ 
window.close() 
} 
</script> 



<?php
@session_start();
 $user=$_SESSION['usuario'];
 $fecha_actual= date("Y-m-d");
require_once("../../conexiones/class_sucursal.php");
require_once("../../conexiones/class_empresa.php");
require_once("../../conexiones/conexion.php");
?>
  


<?php

$tra=new sucursal();

if (isset($_GET["grabar"]) and $_GET["grabar"]=="si")
{
	
	$tra->edit_sucursal($_GET['id'],
	$_GET["cod_emp"],
	$_GET["var_nom_suc"],
	$_GET["descripcion"],
	$_GET["estado"],
	$_GET["dir"],
	$_GET["telf"],
	$user);
	exit;
}


$reg=$tra->get_sucursal_por_id($_GET["id"]);
		$cod_emp=$reg[0]["int_cod_emp"];
		$nom_emp=$reg[0]["var_nom_emp"];
		$nom_suc=$reg[0]["var_nom_suc"];
		$desc=$reg[0]["var_des_suc"];
		$estados=$reg[0]["int_est_suc"];
		$dir_suc=$reg[0]["var_dir_suc"];
		$telf=$reg[0]["var_telf_suc"];
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
<title>Modificación Sucursales</title>

<!--STYLESHEETS-->
<link href="../../paquetes/css ventanas/style_ventana.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
 <script type="text/javascript" src="js/validar.js"></script>
 <script type="text/javascript" src="../../paquetes/js/validar.js"></script>
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
<form name="login-form" class="login-form" action="mod_sucursales.php" method="get">

	<!--HEADER-->
    <div class="header">
    <!--TITLE-->
    <h1 align="center">SUCURSAL</h1>
    
    <!--END TITLE-->
  
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
      <table width="80%" border="1">
        <tr>
          <td>Empresa: </td>
          <td><select class="input username" style="width: 300px;"  name="cod_emp" id="cod_emp" onKeyPress="return tab(event,this)">
          <option value="<?php echo $cod_emp;?>"><?php echo $nom_emp;?></option>
          <?php		
		   
			$tra=new sucursal();
			$reg=$tra->get_combo_sucursal_update($reg[0]["int_cod_emp"]);
			for ($i=0;$i<count($reg);$i++)
			{
			?>
			   <option value="<?php echo $reg[$i]["int_cod_emp"];?>"><?php echo $reg[$i]["var_nom_emp"];?></option>
			
			<?php
			}
			?>
            </select></td>
        </tr>
        <tr>
          <td>Sucursal: </td>
          <td><input name="var_nom_suc" type="text" style="width: 250px;" class="input username" onKeyPress="return tab(event,this)" value="<?php echo $nom_suc;?>" /></td>
        </tr>
        <tr>
          <td>Descripción: </td>
          <td><input name="descripcion" type="text" style="width: 420px;" class="input username" id="nombres_usu" onKeyPress="return tab(event,this)" value="<?php echo $desc;?>" /></td>
        </tr> <tr>
          <td>Estado: </td>
          <td><select class="input username" style="width: 160px;"  name="estado" id="estado" onKeyPress="return tab(event,this)" >
            <?php 
			
					if($estados==1)
					{
						echo "     <option selected='selected' value='1'>Activo</option>
           						   <option value='2'>Inactivo</option> ";
					}
					else 
					{
						echo " 	<option selected='selected' value='2'>Inactivo</option>
            					<option value='1'>Activo</option>";
					}		
			?>     
          </select></td>
        </tr>
    
       
		  <tr><td>Direccion</td><td><input name="dir" type="text" style="width: 380px;" class="input username" id="dir" onKeyPress="return tab(event,this)" value="<?php echo $dir_suc;?>" /></td></tr>
			
        <tr>
          <td>Telefono :</td>
          <td><input name="telf" type="text" style="width: 160px;" class="input username" onkeyUp="return ValNumero(this);" value="<?php echo $telf;?>" /></td>
        </tr>
        <tr>
        	<td>&nbsp;</td>
          <td>&nbsp;</td>
       	</tr>
        <tr>
        	<td>&nbsp;</td>
          <td>&nbsp;</td>
       	</tr>
        <tr>
        	<td>&nbsp;</td>
          <td>&nbsp;</td>          
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

