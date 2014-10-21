<?php
require_once("../libreria/conexiones/class_sucursal.php");
$tra=new sucursal();

$reg=$tra->get_sucursal_por_id($_GET["id"]);
		$cod_suc=$reg[0]["int_cod_suc"];
		$cod_suc=$reg[0]["var_nom_suc"];
		$cod_suc=$reg[0]["int_cod_emp"];
		$nom_emp=$reg[0]["var_nom_emp"];
		
?>              

		<td width="10%">Empresa :</td>
          <td width="23%"><input name="empresa" type="text" size="52" class="input username"  value="<?php echo $nom_emp;?>" /></td>
       
        