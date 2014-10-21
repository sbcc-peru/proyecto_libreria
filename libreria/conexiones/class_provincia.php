<?php
//******************************************************************
class provincia
{
	private $provincia;
	public function __construct()
		{
			$this->provincia=array();
		}
	public function get_combo_provincias($int_cod_dept)
	{
		$sql="select int_cod_provi, var_nom_provi from T_provincias  where int_cod_dept=".$int_cod_dept;
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->provincia[]=$reg;
		}
			return $this->provincia;
	}
	
	public function get_combo_provincias_update($id_provincias)
	{
		$sql="select * from T_provincias where not int_cod_provi='$id_provincias'  ORDER BY int_cod_provi";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->provincia[]=$reg;
		}
			return $this->provincia;
	}
}
?>