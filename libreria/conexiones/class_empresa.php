<?php
class empresa
{
	//private $usuario=array();
	private $empresa;
	
	public function __construct()
		{
			$this->empresa=array();
		}
	
	public function get_combo_empresa()
	{
		$sql="select int_cod_emp,var_nom_emp from T_empresa
 ORDER BY int_cod_emp";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->empresa[]=$reg;
		}
			return $this->empresa;
	}
}
?>