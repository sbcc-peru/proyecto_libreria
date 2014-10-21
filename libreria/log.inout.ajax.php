
<?php
 @session_start();
	
	
  
$_SESSION['usuario'] = $_POST['login_username'];
include("conexiones/conexion.php");
	

	
	
	if ( !isset($_SESSION['username']) && !isset($_SESSION['userid']) ){
		if ( @$idcnx = @mysql_connect("$servidor","$user_conexion","$clave") ){
			
			if ( @mysql_select_db("$bd_server_libreria",$idcnx) ){
				
				$sql = 'select var_nick_usu,
				int_cod_usu,
				int_cod_rol,
				var_nom_usu,
				var_appat_usu,
				var_apmat_usu,
				int_est_usu,
				var_cla_usu,
				var_usuadd_usu,
				date_fecadd_usu,
				var_usumod_usu,
				date_fecmod_usu from T_usuario
				WHERE var_nick_usu="' . $_POST['login_username']. '" and  var_cla_usu="'.$_POST['login_userpass'] . '" LIMIT 1';
				if ( @$res = @mysql_query($sql) ){
					if ( @mysql_num_rows($res) == 1 ){
						
						$user = @mysql_fetch_array($res);
						
						$_SESSION['usuario']	= $user['var_nick_usu'];
						$_SESSION['nombre']	= $user['var_nom_usu'];
						$_SESSION['paterno']	= $user['var_appat_usu'];
						$_SESSION['materno']	= $user['var_apmat_usu'];
						$_SESSION['cod_usu_login']	= $user['int_cod_usu'];
						
					
						
						echo 1;
						
					}
					else
						echo 0;
				}
				else
					echo 0;
				
				
			}
			
			mysql_close($idcnx);
		}
		else
			echo 0;
	}
	else{
		echo 0;
	}
?>