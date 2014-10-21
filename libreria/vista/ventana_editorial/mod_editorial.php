<script> 
function cerrarse(){ 
window.close() 
} 
</script> 


  <script type="text/javascript" src="../../paquetes/js/validar.js"></script>

<?php
@session_start();
 $user=$_SESSION['usuario'];
 $fecha_actual= date("Y-m-d");
require_once("../../conexiones/class_editorial.php");



?>
  


<?php

$tra=new editorial();

if (isset($_GET["grabar"]) and $_GET["grabar"]=="si")
{
	
    $tra->edit_editorial($_GET['id'],$_GET["nom_edit"],$_GET["desc_edit"],$_GET["est_edit"],$user);
	exit;
}


  $reg=$tra->get_editorial_por_id($_GET["id"]);
			$nom_edit=$reg[0]["var_nom_edit"];
			$desc_edit=$reg[0]["var_desc_edit"];
			$est_edit=$reg[0]["int_est_edit"];
		
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
<title>Modificación Editorial</title>

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
<form name="login-form" class="login-form" action="mod_editorial.php" method="get">

	<!--HEADER-->
    <div class="header">
    <!--TITLE-->
    <h1 align="center">Editorial</h1>
    
    <!--END TITLE-->
  
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
      <table width="80%" border="1">
        <tr>
          <td height="20">Nombre </td>
          <td><input name="nom_edit" type="text" class="input username" id="$nom_edit" type="text" style="width: 200px;" onKeyPress="return tab(event,this)"  value="<?php echo $nom_edit;?>" /> </td>
        </tr>
        <tr>
          <td height="20">Descripción: </td>
          <td><input name="desc_edit" type="text" class="input username" id="$desc_edit" style="width: 400px;" onKeyPress="return tab(event,this)"  value="<?php echo $desc_edit;?>" /> </td>
        </tr>
        <tr>
          <td>Estado: </td>
          <td><select class="input username" name="est_edit" style="width: 160px;" id="estado" onKeyPress="return tab(event,this)" >
            <?php 
				
					if($est_edit==1)
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

