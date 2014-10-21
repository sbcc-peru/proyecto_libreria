<script> 
function cerrarse(){ 
window.close() 
} 
</script> 



<?php
@session_start();
 $user=$_SESSION['usuario'];
 $fecha_actual= date("Y-m-d");
require_once("../../conexiones/class_cliente.php");
require_once("../../conexiones/class_pais.php");
require_once("../../conexiones/class_departamento.php");
require_once("../../conexiones/class_provincia.php");
require_once("../../conexiones/conexion.php");
?>
  


<?php

$tra=new cliente();

if (isset($_GET["grabar"]) and $_GET["grabar"]=="si")
{
	
	$tra->edit_cliente(
				 $_GET['id'],
				 $_GET["rsoc"],
				 $_GET["estado"],
				 $_GET["tip_per"],
				 $_GET["ruc"],
				 $_GET["dir"],
				 $_GET["pais"],
				 $_GET["departamento"],
				 $_GET["provincia"],
				 $_GET["dist"],
				 $_GET["tel"],
				 $_GET["fax"],
				 $_GET["dni"],
				 $_GET["cor"],
				 $user);
	exit;
}


$reg=$tra->get_cliente_por_id($_GET["id"]);
	$rsoc_cli=$reg[0]["var_rsoc_cli"];
	$cod_provi=$reg[0]["int_cod_provi"];
		  	$nom_provi=$reg[0]["var_nom_provi"];	
			$cod_dept=$reg[0]["int_cod_dept"];
			$dept_dept=$reg[0]["var_nom_dept"];	
	

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
<title>Modificacion Cliente</title>

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
<form name="form1" class="login-form" action="mod_cliente.php" method="get">

	<!--HEADER-->
    <div class="header">
    <!--TITLE-->
    <h1 align="center">CLIENTE</h1>
    
    <!--END TITLE-->
  
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	 
       <table width="70%" border="1">
        <tr>
          <td height="20">Tipo de Persona: </td>
          <td><select class="input username"  name="tip_per"  style="width: 160px;" id="tip_per" onKeyPress="return tab(event,this)">
                 <?php 
			
			echo $estad=$reg[0]["int_tipper_cli"];	

			
			
					if($estad==1)
					{
						echo "     <option selected='selected' value='1'>NATURAL</option>
            <option value='2'>JURIDICO</option> ";
					}
					else 
					{
						echo " <option selected='selected' value='2'>JURIDICO</option>
						<option  value='1'>NATURAL</option>";
					}		
			?>
              </select></td>
              </tr>
        <tr>
        <td>Razon Social: </td>
          <td><input name="rsoc" type="text" style="width: 400px;" class="input username" id="rsoc" onKeyPress="return tab(event,this)" value="<?php echo $rsoc_cli; ?>" /></td>   
          </tr>
        <tr>
          <td>Estado: </td>
          <td><select class="input username" style="width: 155px;"  name="estado" id="estado" onKeyPress="return tab(event,this)" >
            <?php 
			
			$ruc_cli=$reg[0]["var_ruc_cli"];
			$cod_pais=$reg[0]["int_cod_pais"];
			$nom_pais=$reg[0]["var_nom_pais"];
			$dist_cli=$reg[0]["var_dist_cli"];
			$dir_cli=$reg[0]["var_dir_cli"];
			$dni_cli=$reg[0]["var_dni_cli"];
			$telf_cli=$reg[0]["var_telf_cli"];
			$fax_cli=$reg[0]["var_fax_cli"];
			$cor_cli=$reg[0]["var_cor_cli"];
			echo $estados=$reg[0]["int_est_cli"];	

			
			
					if($estados==1)
					{
						echo "     <option selected='selected' value='1'>Activo</option>
            <option value='2'>Inactivo</option> ";
					}
					else 
					{
						echo " <option selected='selected' value='2'>Inactivo</option>
            					<option value='1	'>Activo</option>";
					}		
			?>
           
            
          </select>
          RUC:<input name="ruc" type="text" class="input username" style="width: 180px;" id="ruc" onkeyUp="return ValNumero(this);"  value="<?php echo $ruc_cli;	?>" /></td>
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
          <select class="input username"  name="departamento" style="width: 200px;" id="departamento" onKeyPress="return tab(event,this)">
          <option value="<?php echo $cod_dept;?>" selected><?php echo $dept_dept;?></option>
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
          <select class="input username"  name="provincia" style="width: 200px;" id="provincia" onKeyPress="return tab(event,this)">
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
           <td><input name="dist" type="text" class="input username" style="width: 300px;" id="dist" onKeyPress="return validar(event)" value="<?php echo $dist_cli; ?>" /></td>
           </tr>
        <tr>
		<td>Direccion: </td>
		 <td><input name="dir" type="text" class="input username" style="width: 400px;" id="dir" onKeyPress="return tab(event,this)" value="<?php echo $dir_cli;	 ?>" /></td>
         </tr>
		<tr>
		  <td>DNI: </td>
		   <td><input name="dni" type="text" class="input username" style="width: 150px;" id="dni" onkeyUp="return ValNumero(this);"  value="<?php echo $dni_cli;	 ?>" /></td>
           </tr>
        <tr>
		<td>Telefono: </td>
		 <td><input name="tel" type="text" class="input username" style="width: 150px;" id="tel" onkeyUp="return ValNumero(this);"  value="<?php echo $telf_cli;	 ?>" />
         FAX:<input name="fax" type="text" class="input username" style="width: 160px;" id="fax" onkeyUp="return ValNumero(this);" value="<?php echo $fax_cli;	 ?>" /></td>
		</tr>
		<tr>
		<td>Correo: </td>
          <td><input name="cor" type="text" class="input username" style="width: 400px;" id="cor" onKeyPress="return tab(event,this)" value="<?php echo $cor_cli;	 ?>" /></td>
          
        </tr>
      </table>
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer" >
 
    <!--LOGIN BUTTON--><input type="submit" name="submit" value="GUARDAR" class="button" /><!--END LOGIN BUTTON-->
    <!--REGISTER BUTTON--><input type="button" name="submit" value="CANCELAR" class="register"onClick="cerrarse()" /><!--END REGISTER BUTTON-->
       <input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
    <input type="hidden" name="grabar" value="si" />
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

