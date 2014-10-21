<script> 
function cerrarse(){ 
window.close() 
} 
</script> 


<?php
@session_start();
 $user=$_SESSION['usuario'];
 $fecha_actual= date("Y-m-d");
require_once("../../conexiones/class_titulos.php");
require_once("../../conexiones/class_editorial.php");
require_once("../../conexiones/class_genero.php");
require_once("../../conexiones/class_pais.php");
require_once("../../conexiones/conexion.php");



?>
  


<?php

$tra=new titulos();

if (isset($_GET["grabar"]) and $_GET["grabar"]=="si")
{
	
    $tra->edit_titulos($_GET['id'],
					$_GET["titulo"],
					$_GET["autor"],
					$_GET["descripcion"],
					$_GET["isbn"],
					$_GET["edicion"],
					$_GET["n_pagina"],
					$_GET["editorial"],
					$_GET["genero"],
					$_GET["pais"],
					$_GET["pre_definido"],
					$_GET["pre_sugerido"],
					$_GET["estado"],
					$_GET["cod_barra"],
					$user);
	exit;
}


  $reg=$tra->get_titulos_por_id($_GET["id"]);
  			$nom_tit=$reg[0]["var_nom_tit"];
			$autor_tit=$reg[0]["var_autor_tit"];			
			$des_tit=$reg[0]["var_des_tit"];
			$isbn_tit=$reg[0]["var_isbn_tit"];
			$edic_tit=$reg[0]["var_edic_tit"];
			$num_pag=$reg[0]["int_numpag_tit"];
			$cod_edit=$reg[0]["int_cod_edit"];
			$nom_edit=$reg[0]["var_nom_edit"];
			$cod_gen=$reg[0]["int_cod_gen"];
			$nom_gen=$reg[0]["var_nom_gen"];
			$cod_pais=$reg[0]["int_cod_pais"];
			$nom_pais=$reg[0]["var_nom_pais"];
			$estados=$reg[0]["int_est_tit"]; 
			$preven_def_tit=$reg[0]["dec_preven_def_tit"];
			$preven_sug_tit=$reg[0]["dec_preven_sug_tit"];
			$cod_barra_tit=$reg[0]["var_cod_bar_tit"]; 
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
<title>Modificación Titulo</title>

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
<form name="login-form" class="login-form" action="mod_titulos.php" method="get">

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
          <td><input name="titulo" type="text" class="input username" style="width: 450px;" id="titulo"  onKeyPress="return tab(event,this)"  value="<?php echo $nom_tit;?>" /> </td>
        </tr>
        <tr>
          <td height="20">Autor: </td>
          <td><input name="autor" type="text" style="width: 300px;" class="input username" id="autor"  onKeyPress="return tab(event,this)"  value="<?php echo $autor_tit;?>" /> </td>
        </tr>
        <tr>
          <td height="20">Descripción: </td>
          <td><input name="descripcion" type="text" style="width: 400px;" class="input username" id="descripcion"  onKeyPress="return tab(event,this)"  value="<?php echo $des_tit;?>" /> </td>
        </tr>
        <tr>
          <td height="20">ISBN: </td>
          <td><input name="isbn" type="text" style="width: 200px;"  class="input username" id="isbn" onKeyPress="return tab(event,this)"  value="<?php echo $isbn_tit;?>" />
          Edición: 
          <input name="edicion" type="text" style="width: 160px;"  class="input username" id="edicion" onkeyUp="return ValNumero(this);"  value="<?php echo $edic_tit;?>" /> </td>
        </tr>
        <tr>
          <td height="20">N° Página: </td>
          <td><input name="n_pagina" type="text" style="width: 160px;"  class="input username" id="n_pagina" onkeyUp="return ValNumero(this);"  value="<?php echo $num_pag;?>" /> 
          Editorial:
          <select class="input username" style="width: 200px;"   name="editorial" id="editorial" onKeyPress="return tab(event,this)">
          <option value="<?php echo $cod_edit;?>" selected><?php echo $nom_edit;?></option>
          <?php		  
			$tra=new editorial();
			$reg=$tra->get_combo_editorial_update($cod_edit);
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
          <option value="<?php echo $cod_gen;?>" selected><?php echo $nom_gen;?></option>
          <?php		  
			$tra=new genero();
			$reg=$tra->get_combo_generos_update($cod_edit);
			for ($i=0;$i<count($reg);$i++)
			{
			?>
			   <option value="<?php echo $reg[$i]["int_cod_gen"];?>"><?php echo $reg[$i]["var_nom_gen"];?></option>
			
			<?php
			}
			?>   
            </select>
            Pais: 
          <select class="input username" style="width: 160px;"   name="pais" id="pais" onChange="from(document.form1.pais.value,'mai','mod_dep.php')">
          <option value="<?php echo $cod_pais;?>" selected><?php echo $nom_pais;?></option>
          <?php	
		  		  
			$tra=new pais();
			$reg=$tra->get_combo_pais_update($cod_pais);
			for ($i=0;$i<count($reg);$i++)
			{
			?>
			   <option value="<?php echo $reg[$i]["int_cod_pais"];?>"><?php echo  $reg[$i]["var_nom_pais"];?></option>
			
			<?php
			}
			?>   
            </select>
          </td>
        </tr>        
        <tr>
          <td height="20">Precio Definido: </td>
          <td><input name="pre_definido" type="text" style="width: 120px;"  class="input username" id="pre_definido" onkeyUp="return decimal(this);"  value="<?php echo $preven_def_tit;?>" />
          Precio Sugerido:
          <input name="pre_sugerido" type="text" style="width: 120px;"  class="input username" id="pre_sugerido" onkeyUp="return decimal(this);"  value="<?php echo $preven_sug_tit;?>" /> </td>
        </tr>
        <tr>
          <td>Estado: </td>
          <td><select class="input username" name="estado" style="width: 155px;"  id="estado" onKeyPress="return tab(event,this)" >
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
          </select>
          Cod.Barra: 
          <input name="cod_barra" type="text" style="width: 160px;"  class="input username" id="cod_barra" onKeyPress="return tab(event,this)"  value="<?php echo $cod_barra_tit;?>" /> </td>
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

