<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>

<title>GUIA</title>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />

<script type="text/javascript">
$().ready(function() {
	$("#course").autocomplete("autoCompleteMain.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	
	$("#course").result(function(event, data, formatted) {
		$("#id_cliente").val(data[1]);
		$("#desc").val(data[2]);
	
	});
});



$(document).ready(function () {
 
         var inputs = $(':input').keypress(function (e) {
             if (e.which == 13) {
                 e.preventDefault();
                 var nextInput = inputs.get(inputs.index(this) + 1);
                 if (nextInput) {
                     nextInput.focus();
                 }
             }
         });
 
              });
			  
			  

function Abrir_ventana (pagina) {
var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=508, height=365, top=85, left=140";
window.open(pagina,"",opciones);
}
function detectar_tecla(){
    with (event){
        if (keyCode==8 ){
			
			document.getElementById("id_cliente").value="";
            event.keyCode = 0;
            event.cancelBubble = true;
            
            return false;
        
        }
    }
}
function validar_cliente()
{
var id_cliente=document.getElementById("id_cliente").value ;
if(id_cliente=="")
{
	document.getElementById("desc").disabled=true;	
var r = confirm("CLIENTE NO EXISTE, DESEA AGREGAR UNO NUEVO!");
if (r == true) {
   Abrir_ventana('popup.html');
	
} else {
	document.getElementById("id_cliente").value="";
	document.getElementById("course").value="";
   
	document.getElementById("desc").disabled=false;
	document.getElementById("course").style.background = "#ff0000";
}	
}
else
{
document.getElementById("course").style.background = "#FFF";
}
}
</script>






<div id="content" >
	<form name="form_s" autocomplete="off">
		<p>
			Numero del Cliente <label>:</label>
            
			<input name="id_cliente" type="text" id="id_cliente" size="2"  readonly />
            <input type="text" name="course" id="course" onKeyDown =" detectar_tecla (event)" />
            <input type="text" name="desc" id="desc" onFocus="validar_cliente()" />
            <input type="text" name="desc2" id="desc2" />
            <select name="select" id="select">
              <option value="1">1</option>
              <option value="2">2</option>
            </select>
	      <label for="select"></label>
		</p>
		<input type="submit" value="Submit" />
	</form>
</div>

