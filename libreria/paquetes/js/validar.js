// JavaScript Document


   function Solo_Numerico(variable){
        Numer=parseInt(variable);
        if (isNaN(Numer)){
            return "";
        }
        return Numer;
    }
    function ValNumero(Control){
        Control.value=Solo_Numerico(Control.value);
    }
	
	
	
	
	  function  efecto(){
                             $('#fotocargando').hide();
                             $('#cargar_contenido').fadeIn(1500);
        }
	
 

