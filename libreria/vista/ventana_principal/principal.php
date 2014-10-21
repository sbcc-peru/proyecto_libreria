<?php  @session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <title>SISTEMA WEB</title>
        <link rel="stylesheet" href="main.css" type="text/css" />
        <link rel="stylesheet" href="styles.css">
		<link rel="stylesheet" href="museoslab_500_macroman/stylesheet.css" type="text/css" charset="utf-8" />
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="script.js"></script>
        <script type="text/javascript" src="../../paquetes/alertas/lib/alertify.js"></script>
    
		<link rel="stylesheet" href="../../paquetes/alertas/themes/alertify.core.css" />
		<link rel="stylesheet" href="../../paquetes/alertas/themes/alertify.default.css" />
      	<link rel="stylesheet" href="opcion_login/css/style.css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.j"></script> 
    	<script src="opcion_login/js/login.js"></script>
		<script>
	
			function alerta(){
				//un alert
				alertify.alert("<b>Blog Reaccion Estudio</b> probando Alertify", function () {
					//aqui introducimos lo que haremos tras cerrar la alerta.
					//por ejemplo -->  location.href = 'http://www.google.es/';  <-- Redireccionamos a GOOGLE.
				});
			}
			
			function confirmar(){
				//un confirm
				alertify.confirm("<p>Aquí confirmamos algo.<br><br><b>ENTER</b> y <b>ESC</b> corresponden a <b>Aceptar</b> o <b>Cancelar</b></p>", function (e) {
					if (e) {
						alertify.success("Has pulsado '" + alertify.labels.ok + "'");
					} else { alertify.error("Has pulsado '" + alertify.labels.cancel + "'");
					}
				}); 
				return false
			}
			
			function datos(){
				//un prompt
				alertify.prompt("Esto es un <b>prompt</b>, introduce un valor:", function (e, str) { 
					if (e){
						alertify.success("Has pulsado '" + alertify.labels.ok + "'' e introducido: " + str);
					}else{
						alertify.error("Has pulsado '" + alertify.labels.cancel + "'");
					}
				});
				return false;
			}
			
			function notificacion(){
				alertify.log("Esto es una notificación cualquiera."); 
				return false;
			}
			
			function ok(){
				alertify.success("Visita nuestro <a href=\"http://blog.reaccionestudio.com/\" style=\"color:white;\" target=\"_blank\"><b>BLOG.</b></a>"); 
				return false;
			}
			
			function error(){
				alertify.error("Usuario o constraseña incorrecto/a."); 
				return false; 
			}
		
			$(document).ready(function(){
				   
				   
			
							//un alert
							alertify.alert('Bienvenido estimado  <br><br>  SR. <?php echo strtoupper($_SESSION['usuario']); ?> <br><br>', function () {
								//aqui introducimos lo que haremos tras cerrar la alerta.
								//por ejemplo -->  location.href = 'http://www.google.es/';  <-- Redireccionamos a GOOGLE.
							});				   
				});

			</script>        
    </head>
    <body>       
    <div id="bar">
        <div id="container">
            <!-- Login Starts Here -->
            <div align="left" style="float:left;"> 
            <img src="../../css/images/ordecupe_logo.png" width="189" height="60" />
            </div>
            
            <div align="center" style="float:left; padding-left:32%;text-shadow: 5px 5px 5px #aaa; font-size:36px; color:#3b5998;margin-top:20px;">
     SISTEMA INTEGRADO
            </div>
            
            <div  id="loginContainer"><a href="#" id="loginButton"><span>Opciones</span><em></em></a>
              <div style="clear:both"></div>
                <div id="loginBox">                
                    <form id="loginForm" action="../../conexiones/logout.php">
                        <fieldset id="body" style="width:20%; background:#d2e0ea">
                            <fieldset>
                                
                            </fieldset>
                            <fieldset   style="width:180px; color:#FFF;">
                                <input  type="submit" id="" class="cerrar_sesion" value="Cerrar Sesion" /> 
                            </fieldset >
                            <br />

                            
                        </fieldset>
                      <span><a href="#"></a></span>
                    </form>
                </div>
          </div>
            
          </div>
            <!-- Login Ends Here -->
        </div> 
     
            <div style="clear:both"></div>
        </div>
        
        <div id="lateral">
            <h2>MENU</h2>
            <div id='cssmenu'>
                <ul>
                   <li class='active has-sub'><a href='#'><span>Mantenimiento</span></a>
                      <ul>
                         <li><a href="../ventana_usuario/vista_usuario.php"><span>Usuario</span></a></li>
                          <li><a href="../ventana_cliente/vista_cliente.php"><span>Clientes</span></a></li>
                           <li><a href="../ventana_proveedor/vista_proveedor.php"><span>Proveedor</span></a></li>
                         <li><a href="../ventana_titulos/vista_titulos.php"><span>Títulos</span></a></li>
                        <li><a href="../ventana_sucursales/vista_sucursales.php"><span>Sucursal</span></a></li>
						<li><a href="../ventana_editorial/vista_editorial.php"><span>Editorial</span></a></li>
                                              
                      </ul>
                   </li>
                   <li class='active has-sub'><a href='#'><span>Almacén</span></a>
                      <ul>
                         <li class='has-sub'><a href='#'><span>Transacciones</span></a>
                            <ul>
                               <li><a href='../Ventana_almacen/ventana_guia_remision/'><span>- Sucursales</span></a></li>
                            </ul>
                         </li>
                         <li><a href='#'><span> Clasificaciones</span></a></li>
                         <li><a href='../Ventana_almacen/ventana_consulta_hisotorica/vista_guia.php'><span>Consulta historíca</span></a></li>
                      </ul>
                   </li>
                   <li class='active has-sub'><a href='#'><span>Ventas</span></a>
                      <ul>
                         <li><a href='../ventana_ventas/registro_venta/index.php'><span>Registro</span></a></li>
                      </ul>
                   </li>
                   <li class='active has-sub'><a href='#'><span>Compras</span></a>
                      <ul>
                         <li><a href='#'><span>Local</span></a></li>
                         <li><a href='#'><span>Exterior</span></a></li>
                      </ul>
                   </li>
                   <li class='active has-sub'><a href='#'><span>Contabilidad</span></a></li>
                   <li class='active has-sub'><a href='#'><span>Facturación</span></a></li>
                   <li class='active has-sub'><a href='#'><span>Reportes</span></a></li>
                </ul>
            </div>
        </div>
        
        <div id="content">
          <h2>Inicio</h2>
            <a id="toggler"></a>
            <div id="render">
                <i  id="tip" style="color:#2A0055; text-align:center;">
                <div align="center">
				<br>
                <img src="../../css/images/ordecupe_logo_final.png" />
                </div>
                </i>
                
                <iframe id="iframe" width="100%" height="100%" src="" frameborder="0" style="padding:10px; margin-left:5px;"></iframe>
            </div>
        </div>
        
        <div id="footer">
            <p>Copyright statement - Design by: <a href="http://bytesolutions.com/">Byte Solutions</a></p>
        </div>

        <!-- scripts -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
        <script type="text/javascript" src="main.js"></script> 
    </body>
</html>