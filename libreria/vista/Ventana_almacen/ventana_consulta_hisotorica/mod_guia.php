<script> 
function cerrarse(){ 
window.close() 
} 
</script> 


  <script type="text/javascript" src="../../../paquetes/js/validar.js"></script>

<?php
@session_start();
 $user=$_SESSION['usuario'];
 $fecha_actual= date("Y-m-d");
require_once("../../../conexiones/class_pedidos.php");



?>
  


<?php

$tra=new pedidos();

if (isset($_GET["grabar"]) and $_GET["grabar"]=="si")
{
	
    $tra->edit_pedidos($_GET['id'],$_GET["sucursal"],$_GET["empresa"],$_GET["cliente"],$_GET["estado"],$_GET["fec_ped"],$user);
	exit;
}


  $reg=$tra->get_pedidos_por_id($_GET["id"]);
				$cod_suc=$reg[0]["int_cod_suc"];
				$nom_suc=$reg[0]["var_nom_suc"];
				$cod_emp=$reg[0]["int_cod_emp"];
				$nom_emp=$reg[0]["var_nom_emp"];
				$cod_cli=$reg[0]["int_cod_cli"];
				$rsoc_cli=$reg[0]["var_rsoc_cli"];
				$fec_ped=$reg[0]["date_fecped_pedi_cab"];
				$estados=$reg[0]["int_est_pedi_cab"];
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<!--------------------
LOGIN FORM
by: Amit Jakhu
www.amitjakhu.com
--------------------->

<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<?php
header('Content-Type: text/html; charset=UTF-8'); 
?>
<title>Modificación Pedidos</title>

<!--STYLESHEETS-->
<link href="../../../paquetes/css ventanas/style_ventana.css" rel="stylesheet" type="text/css" />

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
<form name="login-form" class="login-form" action="mod_pedidos.php" method="get">

	<!--HEADER-->
    <div class="header">
    <!--TITLE-->
    <h1 align="center">PEDIDOS</h1>
    
    <!--END TITLE-->
  
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
      <table width="80%" border="1">
      <tr>
          <td>Sucursal: </td>
          <td>
          <select class="input username"  name="sucursal" id="sucursal" onKeyPress="return tab(event,this)">
          <option value="<?php echo $cod_suc;?>" selected><?php echo $nom_suc;?></option>
          <?php		  
			$tra=new pedidos();
			$reg=$tra->get_combo_sucursal_update($cod_suc);
			for ($i=0;$i<count($reg);$i++)
			{
			?>
			   <option value="<?php echo $reg[$i]["int_cod_suc"];?>"><?php echo $reg[$i]["var_nom_suc"];?></option>
			
			<?php
			}
			?>   
            </select>
          </td>
        </tr>
        <tr>
          <td>Empresa: </td>
          <td>
          <select class="input username"  name="empresa" id="empresa" onKeyPress="return tab(event,this)">
          <option value="<?php echo $cod_emp;?>" selected><?php echo $nom_emp;?></option>
          <?php		  
			$tra=new pedidos();
			$reg=$tra->get_combo_empresa_update($cod_emp);
			for ($i=0;$i<count($reg);$i++)
			{
			?>
			   <option value="<?php echo $reg[$i]["int_cod_emp"];?>"><?php echo $reg[$i]["var_nom_emp"];?></option>
			
			<?php
			}
			?>   
            </select>
          </td>
        </tr>
        <tr>
          <td>Cliente: </td>
          <td>
          <select class="input username"  name="cliente" id="cliente" onKeyPress="return tab(event,this)">
          <option value="<?php echo $cod_cli;?>" selected><?php echo $rsoc_cli;?></option>
          <?php		  
			$tra=new pedidos();
			$reg=$tra->get_combo_cliente_update($cod_cli);
			for ($i=0;$i<count($reg);$i++)
			{
			?>
			   <option value="<?php echo $reg[$i]["int_cod_cli"];?>"><?php echo $reg[$i]["var_rsoc_cli"];?></option>
			
			<?php
			}
			?>   
            </select>
          </td>
        </tr>
        <tr>
          <td>Estado: </td>
          <td><select class="input username"   name="estado" id="estado" onKeyPress="return tab(event,this)" >
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
        <tr>
          <td height="20">Fecha Ped.: </td>
          <td><input name="fec_ped" type="text" class="input username" id="fec_ped"  style="font-size:18px;color:#2A0000;"  placeholder="Ingrese fecha de pedido" onKeyPress="return tab(event,this)"  value="<?php echo $fec_ped;?>" /> </td>
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

