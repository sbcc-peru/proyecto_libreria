
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
class titulos
{
	//private $titulos=array();
	private $titulos;
	
	public function __construct()
		{
			$this->titulos=array();
		}
	public function get_titulos()
	{
		$sql="select 
				t.int_cod_tit,
				t.var_nom_tit,
				t.var_autor_tit,
				t.var_des_tit,
				t.var_isbn_tit,
				t.var_edic_tit,
				t.int_numpag_tit,
				t.int_cod_edit,
				e.var_nom_edit,
				t.int_cod_gen,
				g.var_nom_gen,
				t.int_cod_pais,
				p.var_nom_pais,		
				t.dec_preven_def_tit,
				t.dec_preven_sug_tit,
				case when t.int_est_tit=1 then 'Activo' else 'Inactivo' end int_est_tit,
				t.var_cod_bar_tit
				from T_titulos t
				inner join T_editoriales e on e.int_cod_edit=t.int_cod_edit
				inner join T_generos g on g.int_cod_gen=t.int_cod_gen
				inner join T_pais p on p.int_cod_pais=t.int_cod_pais
				order by int_cod_tit desc
		
		";	
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->titulos[]=$reg;
		}
			return $this->titulos;
	}
		
	public function add_titulos($nom_tit,$autor_tit,$des_tit,$isbn_tit,$edic_tit,$numpag_tit,$edit_tit,$gen_tit,$pais_tit,$preven_def_tit,$preven_sug_tit,$est_tit,$cod_bar_tit,$usu_crea,$fec_crea,$usu_mod,$fec_mod)
	{
		$sql="
			insert into T_titulos values (null,
			'$nom_tit',
			'$autor_tit',
			'$des_tit',			
			'$isbn_tit',
			'$edic_tit',
			'$numpag_tit',
			'$edit_tit',
			'$gen_tit',
			'$pais_tit',
			'$preven_def_tit',
			'$preven_sug_tit',
			'$est_tit',
			'$cod_bar_tit',
			'$usu_crea',
			'$fec_crea',
			'$usu_mod',
			'$fec_mod')	
					";
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
		alert('SE INSERTO CORRECTAMENTE');
		cerrar();
		window.location='titulos.php?load=1';
		</script>";
	}
	public function get_titulos_por_id($id)
	{
		$sql="select 
				t.int_cod_tit,
				t.var_nom_tit,
				t.var_autor_tit,
				t.var_des_tit,
				t.var_isbn_tit,
				t.var_edic_tit,
				t.int_numpag_tit,
				t.int_cod_edit,
				e.var_nom_edit,
				t.int_cod_gen,
				g.var_nom_gen,
				t.int_cod_pais,
				p.var_nom_pais,		
				t.dec_preven_def_tit,
				t.dec_preven_sug_tit,
				t.int_est_tit,
				t.var_cod_bar_tit
				from T_titulos t
				inner join T_editoriales e on e.int_cod_edit=t.int_cod_edit
				inner join T_generos g on g.int_cod_gen=t.int_cod_gen
				inner join T_pais p on p.int_cod_pais=t.int_cod_pais
  				where t.int_cod_tit='$id'";		
		 
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->titulos[]=$reg;
		}
			return $this->titulos;
	}
	public function edit_titulos($id,$nom_tit,$autor_tit,$des_tit,$isbn_tit,$edic_tit,$numpag_tit,$edit_tit,$gen_tit,$pais_tit,$preven_def_tit,$preven_sug_tit,$est_tit,$cod_bar_tit,$usu_mod)
	{
		//$sql="update titulos set nombre_titulos='$nom',texto='$texto' where id=$id";
	
		$sql="update T_titulos "
			." set "
		
		."
		var_nom_tit='$nom_tit',
		var_autor_tit='$autor_tit',
		var_des_tit='$des_tit',
		var_isbn_tit='$isbn_tit',	
		var_edic_tit='$edic_tit',	
		int_numpag_tit='$numpag_tit',
		int_cod_edit='$edit_tit',
		int_cod_gen='$gen_tit',
		int_cod_pais='$pais_tit',
		dec_preven_def_tit='$preven_def_tit',
		dec_preven_sug_tit='$preven_sug_tit',
		int_est_tit='$est_tit',
		var_cod_bar_tit='$cod_bar_tit',	
		var_usumod_tit='$usu_mod',
		date_fecmod_tit=now()
		
		"
		
			." where "
			." int_cod_tit=$id ";
			
			
			
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
		alert('El registro ha sido modificado correctamente');
		window.location='mod_titulos.php?id=$id && load=1';
		</script>
		<SCRIPT LANGUAGE=javascript>
  
</SCRIPT> 
		
		";	
		
	}
	public function eliminar_titulos($id)
	{
		$sql="delete from T_titulos where int_cod_tit=$id";
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
		
		window.location='eliminar_titulos.php?eliminado=1';
		</script>";
	}
}
?>