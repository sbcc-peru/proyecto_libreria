<?php
//******************************************************************
class pais
{
	private $pais;
	//private $titulos=array();
	public function get_combo_pais()
	{
		$sql="select int_cod_pais, var_nom_pais from T_pais ORDER BY int_cod_pais";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->pais[]=$reg;
		}
			return $this->pais;
	}
	
	public function get_combo_pais_update($id_pais)
	{
		$sql="select int_cod_pais, var_nom_pais from T_pais ORDER BY int_cod_pais";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->pais[]=$reg;
		}
			return $this->pais;
	}
}
?>