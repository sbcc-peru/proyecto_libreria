<?php
require_once("../../conexiones/class_provincia.php");
require_once("../../conexiones/conexion.php");
	?>

          <select  name="provincia" style="width: 200px;" id="provincia" class="input username">
          <option>--Seleccione--</option>
	<?php
			$tra=new provincia();
			$reg=$tra->get_combo_provincias($_GET['id']);
			for ($i=0;$i<count($reg);$i++)
			{
			?>
			   <option value="<?php echo $reg[$i]["int_cod_provi"];?>"><?php echo $reg[$i]["var_nom_provi"];?></option>
			
			
			<?php
			}
		  ?>
            </select>
          </td>