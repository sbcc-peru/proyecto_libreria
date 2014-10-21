$(document).ready(function(){
    /*
     * VARIABLES GLOBALES
    */
    //status de panel lateral: 1 ON (default), 0 OFF
    var status = 1;
    //selectores
    var iframe = $("#iframe");
    var tip = $("#tip");
    var title = $("#content h2");
    var toggler = $("#toggler");
    var lateral = $("#lateral");
    var content = $("#content");
    var lateralWidth = lateral.width() + "px";
    //dimensiones disponibles para elementos del panel
    var windowHeight = 0;
    var renderHeight = 0;
    var togglerHeight = 0;
    
    
    /*
     * AL CARGAR EL DOCUMENTO
    */
    calculateDimensions();
    applyDimensions();
    
    
    /*
     * AL CAMBIAR DE TAMAÑO LA VENTANA DEL NAVEGADOR
    */
    $(window).resize(function(){
        calculateDimensions();
        applyDimensions();
    });
    
    
    /*
     * AL HACER CLICK EN TOGGLER (PANEL LATERAL)
    */
    toggler.click(clickToggler);
    
    
    /*
     * AL SELECCIONAR UNO DE LOS ITEMS DEL LISTADO LATERAL
    */   
    $("#lateral a").click(loadItem);


    /*
     * FUNCIONES DE CONTROL DE ELEMENTOS DE INTERFAZ
    */
    // calculo de dimensiones disponibles
    function calculateDimensions(){
        windowHeight = document.documentElement.clientHeight; //alto disponible en ventana del explorador
        renderHeight = (windowHeight - 51 - 40 - 31)  +"px";
        togglerHeight = (windowHeight - 51 - 40 - 31)  +"px";
        /* ¿De donde salen esos valores a restar? Pues de:
         * 51: #top: 40px de height, 10px de padding-top, y 1px de border-bottom
         * 40: #content h2: 40px de height
         * 31: #footer: 30px de height y 1px de border-top
        */
    }
    // aplicado de dimensiones disponibles
    function applyDimensions(){        
        content.css("height", renderHeight);
        toggler.css("height", togglerHeight);
    }
    // control de elemento lateral (toggler)
    function clickToggler(){        
        //ocultamos panel si esta mostrandose
        if(status ==1){
            lateral.hide();
            content.css("margin-left","0px");
            toggler.addClass("off");
            
            status = 0;
        }
        //mostramos panel si esta oculto
        else{
            lateral.show();
            content.css("margin-left", lateralWidth);
            toggler.removeClass("off");
            
            status = 1;
        }
    }
    //control de items a cargar en listado lateral
    function loadItem(e){
        //mostramos iframe y ocultamos consejo (tip)
        iframe.css("display", "block");
        tip.css("display", "none");
        //cargamos en iframe el nuevo sitio seleccionado
        iframe.attr("src", $(e.currentTarget).attr("href"));
        //cancelamos el comportamiento normal, que nos llevaria a la web seleccionada, solo queremos cargarle en el iframe
        title.html("Visualizando &raquo; <i>" + $(e.currentTarget).text() + "</i>");
        return false;
    }
});