
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
class usuario
{
	//private $usuario=array();
	private $usuario;
	
	public function __construct()
		{
			$this->usuario=array();
		}

   public function get_combo_usuario()
	{
		$sql="select int_cod_usu, CONCAT(var_nom_usu , ' ' , var_appat_usu, ' ',var_apmat_usu) as nombre from T_usuario";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->usuario[]=$reg;
		}
			return $this->usuario;
	}

	public function get_usuario()
	{
		$sql="select 
			var_nick_usu,
			int_cod_usu,
			int_cod_rol,
			var_nom_usu,
			var_appat_usu,
			var_apmat_usu,
			case when int_est_usu=1 then 'Activo' else 'Inactivo' end int_est_usu,
			var_cla_usu,
			var_usuadd_usu,
			date_fecadd_usu,
			var_usumod_usu,
			date_fecmod_usu from T_usuario
			order by int_cod_usu desc
		";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->usuario[]=$reg;
		}
			return $this->usuario;
	}
	
	
	public function get_combo_rol()
	{
		$sql="select * from T_rol ORDER BY int_cod_rol";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->usuario[]=$reg;
		}
			return $this->usuario;
	}
	
	public function get_combo_rol_update($id_rol)
	{
		$sql="select * from T_rol where not int_cod_rol='$id_rol'  ORDER BY int_cod_rol";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->usuario[]=$reg;
		}
			return $this->usuario;
	}
	
		
	public function add_usuario($nombres_usu,$appat_usu,$apmat_usu,$nick_usu,$clave_usu,$rol_usu,$estado_usu,$usu_crea,$fec_crea,$usu_mod,$fec_mod)
	{
		$sql="insert into T_usuario values 
				(null,
				'$nombres_usu',
				'$appat_usu',
				'$apmat_usu',
				'$nick_usu',
				'$clave_usu',
				'$rol_usu',
				'$estado_usu',
				'$usu_crea',
				'$fec_crea',
				'$usu_mod',
				'$fec_mod')	
		";
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
		alert('SE INSERTO CORRECTAMENTE');
		cerrar();
		window.location='usuario.php?load=1';
		</script>";
	}
	public function get_usuario_por_id($id)
	{
		$sql="select
		 u.int_cod_usu,
		 u.var_nick_usu,
		 u.int_cod_rol,
		 r.var_nom_rol,
		 u.var_nom_usu,
		 u.var_appat_usu,
		 u.var_apmat_usu,
		 u.int_est_usu,
		 u.var_cla_usu from T_usuario u
		 inner join T_rol r on r.int_cod_rol=u.int_cod_rol 
		 where u.int_cod_usu='$id'
		 ";
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->usuario[]=$reg;
		}
			return $this->usuario;
	}
	public function edit_usuario($id,$nombres_usu,$appat_usu,$apmat_usu,$nick_usu,$clave_usu,$rol_usu,$estado_usu,$usu_mod)
	{
		//$sql="update usuario set nombre_persona='$nom',texto='$texto' where id=$id";
	
		$sql="update T_usuario "
			." set "
		
		."
		var_nom_usu='$nombres_usu',
		var_appat_usu='$appat_usu',
		var_apmat_usu='$apmat_usu',
		var_nick_usu='$nick_usu',
		var_cla_usu='$clave_usu',
		int_cod_rol='$rol_usu',
		int_est_usu='$estado_usu',
		var_usumod_usu='$usu_mod',
		date_fecmod_usu=now()		
		"
		
			." where "
			." int_cod_usu=$id ";
			
			
			
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
		alert('El registro ha sido modificado correctamente');
		window.location='mod_usuario.php?id=$id && load=1';
		</script>
		<SCRIPT LANGUAGE=javascript>
  
</SCRIPT> 
		
		";	
		
	}
	public function eliminar_usuario($id)
	{
		$sql="delete from T_usuario where int_cod_usu=$id";
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
		
		window.location='eliminar_usuario.php?eliminado=1';
		</script>";
	}
}
?>