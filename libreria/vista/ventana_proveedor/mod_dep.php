<?php
require_once("../../conexiones/class_proveedor.php");

	?>

          <select  name="departamento" style="width: 200px;" id="departamento" class="input username" onchange="from(document.form1.departamento.value,'mei','proveedor_prov.php')">
          <option>--Seleccione--</option>
	<?php
			$tra=new proveedor();
			$reg=$tra->get_combo_departamentos($_GET['id']);
			for ($i=0;$i<count($reg);$i++)
			{
			?>
			   <option value="<?php echo $reg[$i]["int_cod_dept"];?>"><?php echo $reg[$i]["var_nom_dept"];?></option>
			
			
			<?php
			}
		  ?>
            </select>
          