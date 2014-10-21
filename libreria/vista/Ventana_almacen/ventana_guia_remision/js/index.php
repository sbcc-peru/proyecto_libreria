<?php
require_once("../../../conexiones/class_sucursal.php");
?>
  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>jQuery - agregar y eliminar filas en una tabla</title>
        <script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script language="javascript" type="text/javascript" src="jquery.validate.1.5.2.js"></script>
        <script language="javascript" type="text/javascript" src="funciones.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link href="../../../paquetes/css ventanas/style_ventana.css" rel="stylesheet" type="text/css" />
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
          <style type="text/css">
    .label {width:100px;text-align:right;float:left;padding-right:10px;font-weight:bold;}
    #register-form label.error, .output {color:#FB3A3A;font-weight:bold;}
  </style>

    </head>
<script>
    function tabular(e,obj) {
        tecla=(document.all) ? e.keyCode : e.which;
        if(tecla!=13) return;
        frm=obj.form;
        for(i=0;i<frm.elements.length;i++) 
            if(frm.elements[i]==obj) { 
            if (i==frm.elements.length-1) i=-1;
            break; 
            }
        frm.elements[i+1].focus();
        return false;
    };
	
	
function validar(e) { // 1

    tecla = (document.all) ? e.keyCode : e.which; // 2

    if (tecla==8) return true; // 3

    patron =/[A-Za-z\s]/; // 4

    te = String.fromCharCode(tecla); // 5

    return patron.test(te); // 6

} 

function formulario(f) {
	if (f.sucursal.value   == '-Seleccione-') { alert ('El campo Sucursal no fue seleccionado, ingrese un dato porfavor!!');  
	f.sucursal.focus(); return false; }  
	if (f.fecha.value   == '') { alert ('El campo Fecha esta vacío, ingrese un dato porfavor!!');  
	f.fecha.focus(); return false; }  
	if (f.cliente.value   == '') { alert ('El campo Cliente esta vacío, ingrese un dato porfavor!!');  
	f.cliente.focus(); return false; }
	if (f.ruc.value   == '') { alert ('El campo RUC esta vacío, ingrese un dato porfavor!!');  
	f.ruc.focus(); return false; } 
	if (f.direccion.value   == '') { alert ('El campo Direccion esta vacío, ingrese un dato porfavor!!');  
	f.direccion.focus(); return false; } 
	if (f.distrito.value   == '') { alert ('El campo Distrito esta vacío, ingrese un dato porfavor!!');  
	f.distrito.focus(); return false; }	
	if (f.telefono.value   == '') { alert ('El campo Telefono esta vacío, ingrese un dato porfavor!!');  
	f.telefono.focus(); return false; }
	if (f.referencia.value   == '') { alert ('El campo Referencia esta vacío, ingrese un dato porfavor!!');  
	f.referencia.focus(); return false; }
	if (f.turno.value   == '-Seleccione-') { alert ('El campo Turno no fue seleccionado, ingrese un dato porfavor!!');  
	f.turno.focus(); return false; }  
	if (f.vendedor.value   == '-Seleccione-') { alert ('El campo Vendedor no fue seleccionado, ingrese un dato porfavor!!');  
	f.vendedor.focus(); return false; }  
	if (f.transportista_nombre.value   == '') { alert ('El campo Nombre del transportista esta vacío, ingrese un dato porfavor!!');  
	f.transportista_nombre.focus(); return false; }
	if (f.transportista_ruc.value   == '') { alert ('El campo Ruc del transpor esta vacío, ingrese un dato porfavor!!');  
	f.transportista_ruc.focus(); return false; }
	if (f.transportista_vehiculo.value   == '') { alert ('El campo vehiculo del Transportista esta vacío, ingrese un dato porfavor!!');  
	f.transportista_vehiculo.focus(); return false; }
	if (f.transportista_placa.value   == '') { alert ('El campo placa del Transportista esta vacío, ingrese un dato porfavor!!');  
	f.transportista_placa.focus(); return false; }
	
 return true; } 

</script> 
    
    <body>	
        <div id="wrapper" style="zoom:90%">
            <form  id="form" class="login-form">
    
            <h1 align="center">Guía Remisíon</h1>
            <div class="content">
            
            <div  style="width: 1095px; margin-left: 10px; border-radius: 10px; border: 2px solid #B1B1B1;">
            <table>
                <tr>
                    <td>
                        Sucursal procedencia    : 
                        <select  name="sucursal" id="sucursal"  style="width:350px" class="input username" onChange="from(document.form1.sucursal.value,'midiv','prueba.php')">
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
                        </select>
                        Fecha:
                        <input name ="fecha_registro" type="text" id="datepicker" class="input username" style="width:150px" />
                        Condición:
                        <input name="condiciones" class="input username" type="text" style="width:230px" id="condiciones" value="Transacción"  OnFocus="this.blur()"></input>
                    </td>

                </tr>
                <tr>
                    <td>Cliente:
                    <input name="cliente" class="input username" style="width:668px" type="text" id="cliente"  onkeypress="return tabular(event,this)"/>
                    <input type="hidden" id="clienteID" name="clienteID"></input>
                    R.U.C:
                    <input name="ruc" class="input username" style="width:200px" type="text" id="ruc" onkeypress="" /></td>
                </tr>
                <tr>
                    <td>Dirección:
                    <input name="direccion" class="input username" style="width:645px" type="text" id="direccion" />
                    Distrito:
                    <input name="distrito" class="input username" style="width:227px" type="text" id="distrito" ></input></td>                                         
                </tr>
                <tr>
                    <td>Teléfono:
                    <input name="telefono" class="input username" style="width:150px" type="text"  id="telefono" />
                    Referencia domiciliaria:
                    <input name="referencia" class="input username" style="width:627px" type="text" id="referencia" ></input></td>                      
                </tr> 
                <tr>
                    <td>Dirección alternativa:
                    <input name="direccion_compra" class="input username" style="width:330px" type="text" id="direccion_compra"/>
                    Distrito de compra:
                    <input name="distrito_compra" class="input username" style="width:150px"  type="text" id="distrito_compra" ></input>
                    Tlf. de compra:
                    <input name="telefono_compra" class="input username" style="width:103px" type="text" id="telefono_compra" ></input></td>  
                </tr>
                <tr>    
                    <td>
                    Turno:
                    <select  name="turno" id="turno"  style="width:350px" class="input username">
                        <option>-Seleccione-</option>
                             <option value="1">Mañana</option>
							 <option value="2">Tarde</option>
							 <option value="3">Noche</option>
                              </select>
                    Vendedor:
                    <select  name="vendedor" id="vendedor"  style="width:350px" class="input username">
                        <option>-Seleccione-</option>
                            <?php
                                 $tra=new sucursal();
                                 $reg=$tra->get_combo_usuario();
                                 for ($i=0;$i<count($reg);$i++)
                                 {
                             ?>
                             <option value="<?php echo $reg[$i]["int_cod_usu"];?>"><?php echo $reg[$i]["nombre"];?></option>
                            <?php
                                 }
                            ?>
                        </select>
                    </td> 
                </tr>
                <tr>
                    <td>                    
                    Punto de partida:
                    <input name="punto_partida" class="input username" style="width:118px" type="text" id="punto_partida" ></input>
                    Punto de llegada:
                    <input name="punto_llegada" class="input username" style="width:117px" type="text" id="punto_llegada" ></input></td>
                </tr>                                                     
            </table>
            </div>
            <br />
            <h2 align="center">Datos del transportista</h2>
            <div  style="width: 1095px; margin-left: 10px; border-radius: 10px; border: 2px solid #B1B1B1;">

                <table>
                    <tr>
                        <td>
                            Nombre:<input name="transportista_nombre" class="input username" style="width:260px" type="text" id="transportista_nombre"/>
                            R.U.C:<input name="transportista_ruc" class="input username" style="width:150px" type="text" id="transportista_ruc"/>
                            Tipo Vehiculo:<input name="transportista_vehiculo" class="input username" style="width:130px" type="text" id="transportista_vehiculo"/>
                            Placa:<input name="transportista_placa" class="input username" style="width:130px" type="text" id="transportista_placa"/>
                        </td>
                    </tr>
                </table>
            </div>
            
             <br />
             <h2 align="center">Registro de productos</h2>
            <div id="frm_usu" style="width: 1080px; margin-left: 10px; border-radius: 10px;border: 2px solid #B1B1B1;">
                <table border="0" align="center">

                    <tbody>
                        <tr>
                            <td>Código</td>
                            <td><input name="valor_ide" class="input username" style="width:100px" type="text" id="valor_ide" size="10" onkeypress="return tabular(event,this)"/></td>
       
                            <td>Descripción</td>
                            <td><input name="valor_uno" class="input username"style="width:382px" type="text" id="valor_uno" size="50" class="required"/></td>
                   
                            <td>Precio</td>
                            <td><input name="valor_dos" class="input username" style="width:100px" type="text" id="valor_dos" size="10" class="required"/>
                                <input type="hidden" id="tituloID" name="tituloID"></input>
                            </td>
                                
                            <td>Cantidad</td>
                            <td><input name="valor_tres" class="input username" style="width:100px" type="text" id="valor_tres" size="10" onkeypress="return tabular(event,this)"/></td>
                        </tr>
                       
                    </tbody>
                    <tfoot>
                        <tr>
                            
                        </tr>
                    </tfoot>
                </table>
            </div>
            	
			<div align="center" style="height:250px;overflow:scroll;">
            <table id="grilla" class="lista" border="1" align="center">
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
                    	<td colspan="3"><strong>Cantidad:</strong> <span id="span_cantidad">0</span> productos.</td>
                        <td colspan="2"><strong>Acción:</strong> <input id="submit" name="Submit" class="button" value="Enviar"></td>
                    </tr>
                </tfoot>
            </table>
            </div>
            </div>
</form> 

        
    
        </div>

     
    </body>
</html>