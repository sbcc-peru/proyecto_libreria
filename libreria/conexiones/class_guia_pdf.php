
       
        
<?php
require("conexion.php");
//******************************************************************
class guia_cabecera
{
	//private $titulos=array();
	private $guia_cabecera;
	
	public function __construct()
		{
			$this->guia_cabecera=array();
		}

	public function get_guia_por_id($id)
	{
		$sql="select 
			  g.var_cod_guia_cab,
				s.var_cod_ser,
				g.int_cod_suc,
				z.var_nom_suc,
				g.int_cod_emp,
				e.var_nom_emp,
				g.var_dir_env_guia_cab,
				g.int_cod_cli,
				c.var_rsoc_cli,
				c.var_ruc_cli,
				c.var_dir_cli,	
				c.var_dist_cli,
        		c.var_telf_cli,
				c.var_refdom_cli,
				g.var_dir_env_guia_cab,
				g.var_dist_guia_cab,
				g.var_telf_guia_cab,
				g.var_cod_pedi_cab,
				g.int_cod_mov,
				m.var_desc_mov,							
				g.var_pun_part_guia_cab,
				g.var_pun_lleg_guia_cab,
				case  when g.int_est_guia_cab=1 then 'Activo' else 'Inactivo' end int_est_guia_cab,
				g.int_cod_usu,
				u.var_nom_usu,					
				g.var_dist_guia_cab,				
				g.int_turn_guia_cab,
				g.var_telf_guia_cab,
				g.var_tran_nom_guia_cab,
				g.var_tran_ruc_guia_cab,
				g.var_tran_veh_guia_cab,
				g.var_tran_plac_guia_cab,
				g.date_fecenv_guia_cab
				from T_guia_cabecera g
				inner join T_serie s on s.var_cod_ser=g.var_cod_ser			
				inner join T_sucursal z on z.int_cod_suc=g.int_cod_suc
				inner join T_empresa e on e.int_cod_emp=g.int_cod_emp
				inner join T_cliente c on c.int_cod_cli=g.int_cod_cli
				inner join T_pedido_cabecera p on p.var_cod_pedi_cab=g.var_cod_pedi_cab
				inner join T_tipo_movimiento m on m.int_cod_mov=g.int_cod_mov
				inner join T_usuario u on u.int_cod_usu=g.int_cod_usu
				where g.var_cod_guia_cab='$id'";		
		 
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->guia_cabecera[]=$reg;
		}
			return $this->guia_cabecera;
	}
	
	
	
	
	
	public function get_guia_detalle_por_id($id)
	{
		$sql="select d.var_cod_guia_det, d.int_cod_tit,t.var_nom_tit,d.int_cant_guia_det,d.dec_vtotal_guia_det  from T_guia_detalle d
INNER JOIN T_titulos t on  t.int_cod_tit=d.int_cod_tit where d.var_cod_guia_cab='$id'";		
		 
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->guia_cabecera[]=$reg;
		}
			return $this->guia_cabecera;
	}
	
	
	
}

?>