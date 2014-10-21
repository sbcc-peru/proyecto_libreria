<?php
/*Este metodo debe ser cambiado para guardar en las tablas guia detalle, producto detalle*/
require_once("conexion.php");

/*
$codigo_sucursal = $_POST['sucursal'];
$codigo_empresa = 1;
$codigo_cliente = $_POST['clienteID'];
$fecha_hora_actual =Fechas::mifechagmt(time(),-5);


$punto_partida = $_POST['punto_partida'];
$punto_llegada = $_POST['punto_llegada'];
$direccion_envio = $_POST['direccion_compra'];
$distrito_envio = $_POST['distrito_compra'];
$telefono_envio = $_POST['telefono_compra'];
$codigo_vendedor = $_POST['vendedor'];
$codigo_turno = $_POST['turno'];

$descuento_produto = 1.2;
$usuario='yopepepep';
*/
$_cod_emp=$_POST['cod_emp'];
$_cod_suc=$_POST['cod_suc'];
$_cod_cli=$_POST['cod_cli'];
$_fec_pedido=$_POST['fec_pedido'];
$_ped_usu=$_POST['ped_usu'];    
$fecha_hora_actual =Fechas::mifechagmt(time(),-5);
$array = json_decode($_POST['pedido_detalle']);
//creando query del PA insertar pedido cabecera
$query_call_spcab = "CALL `bd_libreria_test`.`proc_insertar_pedi_cab`(".$_cod_suc.",".$_cod_emp.","
	                                                                   .$_cod_cli.",'".$_fec_pedido."','"
	                                                                   .$_ped_usu."',@n_Flag, @c_msg, @cod_generado)";


//Ejecucion del Procedimiento Insertar Cabecera
//mysql_query($query_call_spcab,Conectar::con());
echo $query_call_spcab."\n";

/*$array_flag = mysql_fetch_array(mysql_query("Select @n_Flag",Conectar::con()));
$array_codgen = mysql_fetch_array(mysql_query("Select @cod_generado",Conectar::con()));
$codigo_flag = $array_flag["@n_Flag"];
$codigo_gen = $array_codgen["@cod_generado"]; 
$codigo_msg = "";
*/
$codigo_gen ="000xxx";
$codigo_flag =0;

if ($codigo_flag==0) {
   $var_cadena_detalle="'";
   for($i=0;$i<count($array);$i++){ 
       $var_cod_pedi_det=$i+1;
	   $codigo_libro=$array[$i]->codigo_libro;
       $cantidad_libro = $array[$i]->cantidad_libro;
       $valor_impuesto = $array[$i]->valor_impuesto;
       $valor_descuento = $array[$i]->valor_descuento;
       $porcentaje_impuesto = $array[$i]->porcentaje_impuesto;
       $porcentaje_descuento = $array[$i]->porcentaje_descuento;
       $costo_total_libro = $array[$i]->costo_total_libro;
       //Cadena que une Todos los Campos del Detalle de la Tabla Pedido Detalle
       $var_cadena_detalle=$var_cadena_detalle.'(lpad("'.$var_cod_pedi_det.'",6,"0"),'
       										  .'"'.$codigo_gen.'"'.", ".$_cod_suc.", ".$_cod_emp.", ". 
       	                                       $codigo_libro.", ".$cantidad_libro.", ".$porcentaje_impuesto.", ".$valor_impuesto. ", ".
       	                                       $costo_total_libro. ", ".$porcentaje_descuento.",".$valor_descuento.", ".$costo_total_libro.
       	                                       ',"'.$_ped_usu.'","'.$fecha_hora_actual.'")';

       if ($i==count($array)-1){
          $var_cadena_detalle = $var_cadena_detalle . "'";
       }else{
          $var_cadena_detalle = $var_cadena_detalle . ','; 
       }  
   }
   $query_call_spdet = "CALL `bd_libreria_test`.`proc_insertar_pedi_det`(".$var_cadena_detalle.", @n_Flag, @c_msg)";
   //Ejecucion del Procedimiento Insertar Detalle
 /*
   mysql_query($query_call_spdet,Conectar::con());
   $array_flag = mysql_fetch_array(mysql_query("Select @n_Flag",Conectar::con()));
   $array_msg = mysql_fetch_array(mysql_query("Select @c_msg",Conectar::con()));
   $codigo_msg = $array_msg["@c_msg"];
 */  
} 
//echo $codigo_msg;
echo $query_call_spdet;



?> 

