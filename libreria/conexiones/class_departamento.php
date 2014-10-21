<?php
//******************************************************************
class departamento
{
	private $departamento;

	public function __construct()
		{
			$this->departamento=array();
		}
	public function get_combo_departamentos($int_cod_pais)
	{
		$sql="select int_cod_dept, var_nom_dept from T_departamentos  where int_cod_pais=".$int_cod_pais;
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->departamento[]=$reg;
		}
			return $this->departamento;
	}
	
	public function get_combo_departamentos_update($id_departamentos)
	{
		$sql="select * from T_departamentos where not int_cod_dept='$id_departamentos'  ORDER BY int_cod_dept";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->departamento[]=$reg;
		}
			return $this->departamento;
	}
}
?>