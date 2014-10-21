<!DOCTYPE HTML>
<html dir="ltr" lang="en-US">
	<head>
    
    
    <script type="text/javascript" src="jquery.js"></script>
	 <script type="text/javascript" src="paquetes/alertas/lib/alertify.js"></script>
    
		<link rel="stylesheet" href="paquetes/alertas/themes/alertify.core.css" />
		<link rel="stylesheet" href="paquetes/alertas/themes/alertify.default.css" />
		<script type="text/javascript" src="functions.ajax.js"></script>	
<script>
function tab(ev,obj) {
var keyCode = document.layers ? ev.which : document.all ? event.keyCode : document.getElementById ? ev.keyCode : 0;
if (keyCode !=13) return;
frm = obj.form;
for(i = 0; i < frm.elements.length; i++) 
if (frm.elements[i] == obj) { 
if (i == frm.elements.length-1) i =-1;
break 
}
frm.elements[i+1].focus();
return false;
}
function decimal(evt) {
var keyPressed = (evt.which) ? evt.which : event.keyCode
return !((keyPressed !=13) && (keyPressed != 46) && (keyPressed < 48 || keyPressed > 57));



}
function error(){
				alertify.error("Usuario no Autorizado!!!"); 
				return false; 
			}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style.css" rel="stylesheet" type="text/css" />



   
        
      


<style type="text/css">
body,td,th {
	font-family: Helvetica, Arial, Verdana;
	color: #000000;
}
body {
	background-image: url(images/bod.jpg);
	background-color: #402E20;
}
</style>

    
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>SISTEMA</title>

	<!--- CSS --->
	<link rel="stylesheet" href="css/style2.css" type="text/css" />


	<!--- Javascript libraries (jQuery and Selectivizr) used for the custom checkbox --->

	<!--[if (gte IE 6)&(lte IE 8)]>
		<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="selectivizr.js"></script>
		<noscript><link rel="stylesheet" href="fallback.css" /></noscript>
	<![endif]-->

	</head>

	<body <?php  if(isset($_GET['validar'])){ echo "onload='error()'";} ?>>
	
  
 
     </div>
	<div id="container">
      <div> <h1 style="font-size:30px ; text-align:center ; color:#666;  border-radius:9px; " ><img src="css/images/ordecupe_logo_final.png" width="427" height="262"></h1> 
      </div>
      <p>  </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
   
      
      
       <div id="dvrightpanel">
     
   
     
     
     
     <span class="loginBlock"><span class="inner">
      <?php
if ( isset($_SESSION['username']) && isset($_SESSION['userid']) && $_SESSION['username'] != '' && $_SESSION['userid'] != '0' ){
	echo '<div class="session_on">
		Ya iniciaste sesi&oacute;n &#124; Ahora has un <a href="javascript:void(0);" id="sessionKiller">logout</a>.<span class="timer" id="timer"  style="margin-left: 10px;"></span>
	</div>';
}
else{
	echo "<form method='post' action=''>
	<table cellpadding='0' cellspacing='0' border='0'>
			<tr>
		<div class='login'> LOGIN DE ACCESO</div>
				<div class='username-text'>Usuario	:</div>
				<div class='password-text'>Clave:</div>
				<div class='username-field'>
					
					<input type='text' name='login_username' id='login_username' onKeyPress='return tab(event,this)' />
				</div>
			
				<div class='password-field'>
					<input type='password' name='login_userpass' id='login_userpass' />
				</div>
				<input type='checkbox' name='remember-me' id='remember-me' /><label for='remember-me'>No accedo <a style='color:#FFF'  href='conexiones/logout.php'>Aqui</a>  </label>
				<div class='forgot-usr-pwd'></div>
			
				<td colspan='2' align='right'><span class='timer' id='timer'></span><input  type='submit' name='submit' value='GO' id='login_userbttn' /></td>
				
			</tr>
		</table>	
		<div  id='alertBoxes' align='center' style='text-align:center ; color:#FFF;background:#2D9EBC ; border-radius:9px; font-size:20px ; ' >
		<p>&nbsp;</p>
		<p>&nbsp;</p>
       <h2></h2>
     </div>
	</form>
	  
	";
	
	

	
}
			?>
       
			
            
		</div>
    
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
		<div id="footer">
			© Derechos reservados por Byte Peru S.A.C.<a href="http://azmind.com/2012/01/15/create-a-clean-web-2-0-login-form-part-2-html-css/"></a>
		</div>
        
        
          </div>
    <!-- body div ends here-->
  </div>

  <!--main div container ends here-->
</div>
        
        
	</body>
</html>

<div class="forgot-usr-pwd"></div>
			
		</div>