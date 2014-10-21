<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>jQuery - agregar y eliminar filas en una tabla</title>
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
	</head>
	<body>
		<form  id="form">
			Condiciones: <input name="condiciones" type="text" style="width:230px" id="condiciones">
			Trans: <input name="trans" type="text" style="width:230px" id="trans">
			<input type="submit" name="submit" value="Submit" />
        </form>         
        <script>
  			$(function() {
        		$('#form').validate({
        			rules :{
            			condiciones : {
                		required : true, //para validar campo vacio
                		email: true
            			}
        			},
        			messages: {
						condiciones : {
                		required : "Registre los campos", //para validar campo vacio
                		email: "email"
            			}
        			},
        			submitHandler: function(form) {
            		form.submit();
        			}        				
    			}); 
  			});
  		</script>
    </body>
</html>