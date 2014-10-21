<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>

<?php
require_once("../../../conexiones/class_sucursal.php");
?>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Ventas</title>
  <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/personalizar.css">
 
<script type="text/javascript" src="busquedas/js/jquery-1.4.2.js"></script>


<script type='text/javascript' src="busquedas/js/jquery.autocomplete.js"></script>

<script type='text/javascript' src="busquedas/js/funciones.js"></script>
<link rel="stylesheet" type="text/css" href="busquedas/js/jquery.autocomplete.css" />

   <script src="../../paquetes/js/tab2.js"></script>
   <script src="../../paquetes/js/validar.js"></script>
     <script type="text/javascript" >
$().ready(function() {
	$("#cliente").autocomplete("busquedas/autoCompleteMain.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	
	$("#cliente").result(function(event, data, formatted) {
		$("#id_cliente").val(data[1]);
		$("#ruc").val(data[2]);
		$("#direccion").val(data[3]);
		$("#distrito").val(data[4]);
		$("#telf").val(data[5]);
		
	});
});





      </script>
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Registro de productos</h1>
      <form name="form_s" method="post" action="index.html" id="ventas">
        
    <fieldset class="cabecera">
  <legend>PEDIDO</legend>
  <table  border="0">
      <tr>
        <td>Cliente:</td>
        <td><input type="hidden" name="id_cliente" id="id_cliente" />
        <input type="text" name="cliente" id="cliente" /></td>
        <td>RUC:</td>
        <td><input type="text" name="ruc" id="ruc" onFocus="no_cliente()"/></td>
      </tr>
      <tr>
        <td>Fecha Emision:</td>
        <td><label for="fec_emision"></label>
        <input type="text" name="fec_emision" id="fec_emision"></td>
        <td>Direcion: </td>
        <td><input type="text" name="direccion" id="direccion" /></td>
        <td>Distrito:</td>
        	<td><input type="text" name="distrito" id="distrito" /></td>
      </tr>
      <tr>
        <td>Telf:</td>
        <td><input type="text" name="telf" id="telf" /></td>
       <td> Referencia domiciliaria:</td>
        <td><input type="text" name="ref_do" id="ref_do" /></td>
        <td>Sucursal:</td>
          <td><select  name="sucursal" id="sucursal"   class="combo">
                            <option>-Seleccione-</option>
                            <?php
			                     $tra=new sucursal();
			                     $reg=$tra->get_combo_sucursal();
			                     for ($i=0;$i<count($reg);$i++)
			                     {
			                 ?>
			                 <option value="<?php echo $reg[$i]["int_cod_suc"];?>"><?php echo $reg[$i]["var_nom_suc"];?></option>
                            <?php
			                     }
                            ?>
                        </select></td>
          </tr>
          <tr>
            <td>Dirección de compra</td>
            <td><input name="direccion_compra" type="text" id="direccion_compra" placeholder="Registre dirección de compra"/></td>
            <td>Distrito de compra</td>
            <td><input name="distrito_compra" type="text" id="distrito_compra" placeholder="Registre distrito de compra"/></td>
            <td>Telefono de compra</td>
            <td><input name="telefono_compra" type="text" id="telefono_compra" placeholder="Registre telefono de compra"/></td>
      </tr>
      <tr>
        <td>Centro de trabajo</td>
        <td><input name="centro_trabajo" type="text" id="centro_trabajo" placeholder="Registre centro trabajo"/></td>
        <td>Turno</td>
        <td><input name="turno" type="text" id="turno" placeholder="Registre turno"/></td>
        <td>Vendedor</td>
        <td><input name="vendedor" type="text" id="vendedor" placeholder="Registre vendedor"/></td>
      </tr>
      <tr>
        <td>Número de pedido</td>
        <td><input name="numero_pedido" type="text" id="codigo_pedido"/></td>
        <td>Condiciones</td>
        <td><input name="condiciones" type="text" id="condiciones" value="Transacción">
          </input></td>
        <td>Punto de partida</td>
        <td><input name="punto_partida" type="text" id="punto_partida" placeholder="Registre punto de partida"><td>
          </input></td>
      </tr>
      <tr>
        <td>Punto de llegada: </td>
        <td ><input name="punto_llegada" type="text" id="punto_llegada" placeholder="Registre punto de llegada"></td>
      </tr>
  
  </table>

    </fieldset>
    <fieldset>
    <h2 style="width:100%;" class="detalle" align="left">Detalle Pedido</h2>
 
      <table width="97%" border="0" align="center" class="tabla_detalle">
        <tbody>
          <tr>
            <td>Código</td>
            <td><input name="valor_ide" type="text" id="valor_ide" size="10" onkeypress="return tabular(event,this)"/></td>
            <td>Descripción</td>
            <td><input name="valor_uno" type="text" id="valor_uno" size="50" class="required" OnFocus="this.blur()"/>
              <input type="hidden" id="tituloID" name="tituloID">
              </input></td>
            <td>Precio</td>
            <td><input name="valor_dos" type="text" id="valor_dos" size="10" class="required" OnFocus="this.blur()"/></td>
            <td>Cantidad</td>
            <td><input name="valor_tres" type="text" id="valor_tres" size="10" onkeypress="return tabular(event,this)"/></td>
          </tr>
        </tbody>
        <tfoot>
          <tr></tr>
        </tfoot>
      </table>
    </fieldset>
    <table id="grilla" class="lista" align="center">
              <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>

 
                </tbody>
                <tfoot>
                	<tr>
                    	<td colspan="3"><strong>Cantidad:</strong> <span id="span_cantidad">1</span> productos.</td>
                        <td colspan="2"><strong>Acción:</strong> <input id="submit" type="submit" name="Submit" value="Enviar"></td>
                    </tr>
                </tfoot>
            </table>
    <div  align="center">
    <input type="button" class="guardar" value="GUARDAR" onClick="form_s.submit()">
    </div>
      </form>
    </div>
  </section>

  <div id='ventana-flotante'>

   <a class='cerrar' href='javascript:void(0);' onclick='document.getElementById(&apos;ventana-flotante&apos;).className = &apos;oculto&apos;'>x</a>

   <div id='contenedor'>

       <div class='contenido'>

Aquí va el mensaje.

       </div>

   </div>

</div>

<style>
</body>
</html>
