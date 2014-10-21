
        <script type="text/javascript">
        function cerrar() {
            var data = window.document.getElementById('val1').value;
            window.opener.document.getElementById('deHijo').innerHTML = "Este texto viene de la página hijo: "+data;        
			
			
            /*this.window.close();*/
			opener.location.reload();
        }
		
        </script>
<input type="hidden" id="val1" value="" disabled="disabled"/> 
       
        
<?php
//******************************************************************
class editorial
{
	//private $titulos=array();
	private $editorial;
	
	public function __construct()
		{
			$this->editorial=array();
		}
	public function get_editorial()
	{
		$sql="
		
			select 
				int_cod_edit,
				var_nom_edit,
				var_desc_edit,
				case when int_est_edit=1 then 'Activo' else 'Inactivo' end int_est_edit
				from T_editoriales
		
		";	
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->editorial[]=$reg;
		}
			return $this->editorial;
	}
	
	public function get_combo_editorial()
	{
		$sql="select * from T_editoriales ORDER BY int_cod_edit";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->editorial[]=$reg;
		}
			return $this->editorial;
	}
	
	public function get_combo_editorial_update($id_editorial)
	{
		$sql="select * from T_editoriales where not int_cod_edit='$id_editorial'  ORDER BY int_cod_edit";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->editorial[]=$reg;
		}
			return $this->editorial;
	}
	
	
		
	public function add_editorial($nom_edit,$desc_edit,$est_edit,$usu_crea,$fec_crea,$usu_mod,$fec_mod)
	{
		$sql="
			insert into T_editoriales values (null,
			'$nom_edit',
			'$desc_edit',
			'$est_edit',
			'$usu_crea',
			'$fec_crea',
			'$usu_mod',
			'$fec_mod')	
					";
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
		alert('SE INSERTO CORRECTAMENTE');
		cerrar();
		window.location='editorial.php?load=1';
		</script>";
	}
	public function get_editorial_por_id($id)
	{
		$sql="select 
		t.int_cod_edit,
		t.var_nom_edit,
		t.var_desc_edit,
		t.int_est_edit
		from T_editoriales t
	 		where t.int_cod_edit='$id'";		
		 
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->editorial[]=$reg;
		}
			return $this->editorial;
	}
	public function edit_editorial($id,$nom_edit,$desc_edit,$est_edit)
	{
		//$sql="update titulos set nombre_titulos='$nom',texto='$texto' where id=$id";
	
		$sql="update T_editoriales "
			." set "
		
		."
		var_nom_edit='$nom_edit',
		var_desc_edit='$desc_edit',
		int_est_edit='$est_edit',
		date_fecmod_edit=now()
		
		"
		
			." where "
			." int_cod_edit=$id ";
			
			
			
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
		alert('El registro ha sido modificado correctamente');
		window.location='mod_editorial.php?id=$id && load=1';
		</script>
		<SCRIPT LANGUAGE=javascript>
  
</SCRIPT> 
		
		";	
		
	}
	public function eliminar_editorial($id)
	{
		$sql="delete from T_editoriales where int_cod_edit=$id";
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
		
		window.location='eliminar_editorial.php?eliminado=1';
		</script>";
	}
}
?>