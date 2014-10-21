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
class proveedor
{
	//private $proveedor=array();
	private $proveedor;
	
	public function __construct()
		{
			$this->proveedor=array();
		}
	public function get_proveedor()
	{
		$sql="select 
		p.int_cod_prov,
		p.var_rsoc_prov,
		p.int_nrodoc_prov,
		case when p.int_tipper_prov=1 then 'Persona Natural' else 'Persona Juridica' end int_tipper_prov,
		case when p.int_est_prov=1 then 'Activo' else 'Inactivo' end int_est_prov,
		p.var_dir_prov,
		p.int_cod_pais,
		pa.var_nom_pais,
		p.int_cod_dept,
		d.var_nom_dept,
		p.int_cod_provi,
		pr.var_nom_provi,
		p.var_dist_prov,
		p.var_cel_prov,		
		p.var_telef_prov,		
		p.var_fax_prov 
		from T_proveedor p
		inner join T_pais pa on pa.int_cod_pais=p.int_cod_pais
		inner join T_departamentos d on d.int_cod_dept=p.int_cod_dept
		inner join T_provincias pr on pr.int_cod_provi=p.int_cod_provi		
		order by int_cod_prov desc";	
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->proveedor[]=$reg;
		}
			return $this->proveedor;
	}
	
	
	/*public function get_combo_rol()
	{
		$sql="select * from t_rol ORDER BY int_cod_rol";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->usuario[]=$reg;
		}
			return $this->usuario;
	}
	
	public function get_combo_rol_update($id_rol)
	{
		$sql="select * from t_rol where not int_cod_rol='$id_rol'  ORDER BY int_cod_rol";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->usuario[]=$reg;
		}
			return $this->usuario;
	}
	*/
	
		
	public function add_proveedor($rsocial_prov,$nrodoc_prov,$tip_prov,$est_prov,$dir_prov,$pais_prov,$dep_prov,$provi_prov,$dist_prov,$cel_prov,$tel_prov,$fax_prov,$usu_crea,$fec_crea,$usu_mod,$fec_mod)
	{
		$sql="insert into T_proveedor values 
				(null,
				'$rsocial_prov',
				'$nrodoc_prov',
				'$tip_prov',
				'$est_prov',
				'$dir_prov',
				'$pais_prov',
				'$dep_prov',
				'$provi_prov',
				'$dist_prov',
				'$cel_prov',
				'$tel_prov',
				'$fax_prov',
				'$usu_crea',
				'$fec_crea',
				'$usu_mod',
				'$fec_mod')	
		";
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
		alert('SE INSERTO CORRECTAMENTE');
		cerrar();
		window.location='proveedor.php?load=1';
		</script>";
	}
	public function get_proveedor_por_id($id)
	{
		$sql="select 
		p.int_cod_prov,
		p.var_rsoc_prov,
		p.int_nrodoc_prov,
		p.int_tipper_prov,
		p.int_est_prov,
		p.var_dir_prov,
		p.int_cod_pais,
		pa.var_nom_pais,
		p.int_cod_dept,
		d.var_nom_dept,
		p.int_cod_provi,
		pr.var_nom_provi,
		p.var_dist_prov,
		p.var_cel_prov,		
		p.var_telef_prov,		
		p.var_fax_prov	
		from T_proveedor p
		inner join T_pais pa on pa.int_cod_pais=p.int_cod_pais
		inner join T_departamentos d on d.int_cod_dept=p.int_cod_dept
		inner join T_provincias pr on pr.int_cod_provi=p.int_cod_provi
		where int_cod_prov='$id'";
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->proveedor[]=$reg;
		}
			return $this->proveedor;
	}
	public function edit_proveedor($idd,$rsocial_prov,$nrodoc_prov,$tip_prov,$est_prov,$dir_prov,$pais_prov,$dep_prov,$provi_prov,$dist_prov,$cel_prov,$tel_prov,$fax_prov,$usu_mod)
	{
		//$sql="update proveedor set nombre_proveedor='$nom',texto='$texto' where id=$id";
	
		$sql="update T_proveedor "
			." set "
		
		."
		var_rsoc_prov='$rsocial_prov',
		int_nrodoc_prov='$nrodoc_prov',
		int_tipper_prov='$tip_prov',
		int_est_prov='$est_prov',
		var_dir_prov='$dir_prov',
		int_cod_pais='$pais_prov',
		int_cod_dept='$dep_prov',
		int_cod_provi='$provi_prov',
		var_dist_prov='$dist_prov',
		var_cel_prov='$cel_prov',
		var_telef_prov='$tel_prov',
		var_fax_prov='$fax_prov',
		var_usumod_prov='$usu_mod',
		date_fecmod_prov=now()
		
		"
		
			." where "
			." int_cod_prov=$idd ";
			
			
			
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
		alert('El registro ha sido modificado correctamente');
		window.location='mod_proveedor.php?id=$idd && load=1';
		</script>
		<SCRIPT LANGUAGE=javascript>
  
</SCRIPT> 
		
		";	
		
	}
	public function eliminar_proveedor($id)
	{
		$sql="delete from T_proveedor where int_cod_prov=$id";
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
		
		window.location='eliminar_proveedor.php?eliminado=1';
		</script>";
	}
}
?>