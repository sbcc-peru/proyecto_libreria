<?php
//******************************************************************
class genero
{
	//private $titulos=array();
	private $generos;
	
	public function __construct()
		{
			$this->generos=array();
		}
	
	public function get_combo_generos()
	{
		$sql="select * from T_generos ORDER BY int_cod_gen";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->generos[]=$reg;
		}
			return $this->generos;
	}
	
	public function get_combo_generos_update($id_generos)
	{
		$sql="select * from T_generos where not int_cod_gen='$id_generos'  ORDER BY int_cod_gen";
		
		$res=mysql_query($sql,Conectar::con());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->generos[]=$reg;
		}
			return $this->generos;
	}
}
?>