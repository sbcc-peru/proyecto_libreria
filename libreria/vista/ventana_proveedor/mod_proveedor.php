<script> 
function cerrarse(){ 
window.close() 
} 
</script> 



<?php
@session_start();
 $user=$_SESSION['usuario'];
 $fecha_actual= date("Y-m-d");
require_once("../../conexiones/class_proveedor.php");
require_once("../../conexiones/class_pais.php");
require_once("../../conexiones/class_departamento.php");
require_once("../../conexiones/class_provincia.php");
require_once("../../conexiones/conexion.php");
?>
  


<?php

$tra=new proveedor();

if (isset($_GET["grabar"]) and $_GET["grabar"]=="si")
{
	
    $tra->edit_proveedor($_GET['id'],
							$_GET["raz_soc"],
							$_GET["nro_doc"],
							$_GET["tip_per"],					
							$_GET["estado"],
							$_GET["direccion"],
							$_GET["pais"],
							$_GET["departamento"],
							$_GET["provincia"],
							$_GET["distrito"],
							$_GET["celular"],				
							$_GET["telefono"],				
							$_GET["fax"],
							$user);
	exit;
}


$reg=$tra->get_proveedor_por_id($_GET["id"]);
		$tip_per=$reg[0]["int_tipper_prov"];
		$estados=$reg[0]["int_est_prov"];
		$rsoc_prov=$reg[0]["var_rsoc_prov"];
		$nrodoc_prov=$reg[0]["int_nrodoc_prov"];
		$cod_pais=$reg[0]["int_cod_pais"];
		$nom_pais=$reg[0]["var_nom_pais"];
		$cod_dept=$reg[0]["int_cod_dept"];
		$nom_dept=$reg[0]["var_nom_dept"];
		$cod_provi=$reg[0]["int_cod_provi"];
		$nom_provi=$reg[0]["var_nom_provi"];
		$dist_prov=$reg[0]["var_dist_prov"];
		$dir_prov=$reg[0]["var_dir_prov"];
		$telef_prov=$reg[0]["var_telef_prov"];
		$cel_prov=$reg[0]["var_cel_prov"];
		$fax_prov=$reg[0]["var_fax_prov"];
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
<title>PROVEEDOR</title>

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
function obtiene_http_request()
{
var req = false;
try
  {
    req = new XMLHttpRequest(); /* p.e. Firefox */
  }
catch(err1)
  {
  try
    {
     req = new ActiveXObject("Msxml2.XMLHTTP");
  /* algunas versiones IE */
    }
  catch(err2)
    {
    try
      {
       req = new ActiveXObject("Microsoft.XMLHTTP");
  /* algunas versiones IE */
      }
      catch(err3)
        {
         req = false;
        }
    }
  }
return req;
}
var miPeticion = obtiene_http_request();



function from(id,ide,url){
		var mi_aleatorio=parseInt(Math.random()*99999999);//para que no guarde la p�gina en el cach�...
		var vinculo=url+"?id="+id+"&rand="+mi_aleatorio;
		//alert(vinculo);
		miPeticion.open("GET",vinculo,true);//ponemos true para que la petici�n sea asincr�nica
		miPeticion.onreadystatechange=miPeticion.onreadystatechange=function(){
               if (miPeticion.readyState==4)
               {
				   //alert(miPeticion.readyState);
                       if (miPeticion.status==200)
                       {
                                //alert(miPeticion.status);
                               //var http=miPeticion.responseXML;
                               var http=miPeticion.responseText;
                               document.getElementById(ide).innerHTML= http;

                       }
               }/*else
               {
			document.getElementById(ide).innerHTML="<img src='ima/loading.gif' title='cargando...' />";

                }*/
       }
       miPeticion.send(null);

}
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
<form name="form1" class="login-form" action="mod_proveedor.php" method="get">

	<!--HEADER-->
    <div class="header">
    <!--TITLE-->
    <h1 align="center">PROVEEDORES</h1>
    
    <!--END TITLE-->
  
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
      <table width="80%" border="1">
      	<tr>
          <td height="20">Razon Social: </td>
          <td><input name="raz_soc" type="text" style="width: 400px;" class="input username" id="raz_soc" onKeyPress="return tab(event,this)"  value="<?php echo $rsoc_prov;?>" /> </td>
           </tr>
        <tr>
          <td height="20">Tipo de Persona: </td>
          <td><select class="input username" style="width: 160px;"   name="tip_per" id="tip_per" onKeyPress="return tab(event,this)" >
            <?php 
					if(trim($tip_per)==1)
					{
						echo "     <option selected='selected' value='1'>Persona Natural</option>
           						 	<option value='2'>Persona Juridica</option> ";
					}
					else 
					{
						echo " <option selected='selected' value='2'>Persona Juridica</option>
            					<option value='1'>Persona Natural</option>";
					}		
			?>   
          </select>
          RUC: 
          <input name="nro_doc" type="text" style="width: 180px;" class="input username" onkeyUp="return ValNumero(this);" value="<?php echo $nrodoc_prov;?>" /></td>
        </tr>
        <tr>
          <td>Pais: </td>
          <td>
          <select class="input username"  name="pais" style="width: 160px;" id="pais" onChange="from(document.form1.pais.value,'mai','mod_dep.php')">
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
          <td>Departamento: </td>
          <td>
          <div id="mai">
          <select class="input username" style="width: 200px;"  name="departamento" id="departamento" onKeyPress="return tab(event,this)">
          <option value="<?php echo $cod_dept;?>" selected><?php echo $nom_dept;?></option>
          <?php	  
			$tra=new departamento();
			$reg=$tra->get_combo_departamentos_update($cod_dept);
			for ($i=0;$i<count($reg);$i++)
			{
			?>
			   <option value="<?php echo $reg[$i]["int_cod_dept"];?>"><?php echo  $reg[$i]["var_nom_dept"];?></option>
			
			<?php
			}
			?>   
            </select></div>
          </td>
           </tr>
        <tr>
          <td>Provincia: </td>
          <td>
          <div id="mei">
          <select class="input username" style="width: 200px;"  name="provincia" id="provincia" onKeyPress="return tab(event,this)">
          <option value="<?php echo $cod_provi;?>" selected><?php echo $nom_provi;?></option>
          <?php			  
			$tra=new provincia();
			$reg=$tra->get_combo_provincias_update($cod_provi);
			for ($i=0;$i<count($reg);$i++)
			{
			?>
			   <option value="<?php echo $reg[$i]["int_cod_provi"];?>"><?php echo  $reg[$i]["var_nom_provi"];?></option>
			
			<?php
			}
			?>   
            </select></div>
          </td>
        </tr>
        <tr>
          <td>Distrito: </td>
          <td><input name="distrito" type="text" style="width: 300px;" class="input username" onKeyPress="return validar(event,this)" value="<?php echo $dist_prov;?>" /></td>
           </tr>
        <tr>
          <td>Direccion: </td>
          <td><input name="direccion" type="text" style="width: 400px;" class="input username" onKeyPress="return tab(event,this)" value="<?php echo $dir_prov;?>" /></td>
           </tr>
        <tr>
          <td>Telefono: </td>
          <td><input name="telefono" type="text" style="width: 150px;" class="input username"onkeyUp="return ValNumero(this);" value="<?php echo $telef_prov;?>" />
          Celular: 
          <input name="celular" type="text" style="width: 150px;" class="input username" onkeyUp="return ValNumero(this);" value="<?php echo $cel_prov;?>" /></td>
          </tr>
        <tr>
          <td>Fax: </td>
          <td><input name="fax" type="text" style="width: 160px;" class="input username" onkeyUp="return ValNumero(this);"  value="<?php echo $fax_prov;?>" />
          Estado:
          <select class="input username" style="width: 155px;" name="estado" id="estado" onKeyPress="return tab(event,this)" >
            <?php 
			
					if($estados==1)
					{
						echo "     <option selected='selected' value='1'>Activo</option>
            <option value='2'>Inactivo</option> ";
					}
					else 
					{
						echo " <option selected='selected' value='1'>Inactivo</option>
            <option value='2'>Activo</option>";
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

