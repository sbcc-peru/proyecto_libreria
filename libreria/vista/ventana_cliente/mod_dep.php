<?php
require_once("../../conexiones/class_cliente.php");

	?>

          <select  name="departamento" style="width: 200px;"id="departamento" class="input username" onchange="from(document.form1.departamento.value,'mei','cliente_prov.php')">
          <option value="0">Seleccione</option>
	<?php
			$tra=new cliente();
			$reg=$tra->get_combo_departamentos($_GET['id']);
			for ($i=0;$i<count($reg);$i++)
			{
			?>
			   <option value="<?php echo $reg[$i]["int_cod_dept"];?>"><?php echo $reg[$i]["var_nom_dept"];?></option>
			
			
			<?php
			}
		  ?>
            </select>
          