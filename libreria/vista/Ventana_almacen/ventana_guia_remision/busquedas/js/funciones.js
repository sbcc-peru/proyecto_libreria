       

            $(document).ready(function(){
         /*       fn_dar_eliminar();
				fn_cantidad();
                $("#frm_usu").validate();
                */


                $("#valor_ide").change(function() {
                    
                    $.ajax({
                        type: "GET",
                        url: "buscar_detalle.php",
                        data: "id=" + $("#valor_ide").val(),
                        success: function(datos){
                        
                        var res = jQuery.parseJSON(datos);
                        
                        if(res.nombre===""){alert("Título no registrado, proceda a agregarlo en el menú correspondiente");
                        }else{
                        $("#valor_uno").val(res.nombre);

                        $("#tituloID").val(res.codigo);

                        $("#valor_dos").val(res.precio);
                        
                        $("#valor_cuatro").val(res.precio);
                     
                        $("#valor_tres").focus();
                        
                        fn_dar_eliminar();
                        fn_cantidad(); 
                        }
                        
                        },
                        error: function(datos) {
                        alert("Data not found");
                        }
                    });
                });

                $("#valor_tres").change(function() {
                        cadena = "<tr>";
                        cadena = cadena + "<td><input name='codigo[]' type='text' value='"+ $("#valor_ide").val() +"' size='15' OnFocus='this.blur()'/><input name='codigo_titulo[]' id='codigo_titulo[]' type='hidden' value='"+ $("#tituloID").val() +"'/></td>";
                        cadena = cadena + "<td><input name='nombre[]' id='nombre[]' type='text' value='"+ $("#valor_uno").val() +"' size='30' OnFocus='this.blur()'/></td>";
                        cadena = cadena + "<td><input name='precio[]' type='text' value='"+ $("#valor_dos").val() +"' size='30' OnFocus='this.blur()'/></td>";
                        cadena = cadena + "<td><input name='cantidad[]' id='cantidad[]' type='text' value='"+ $("#valor_tres").val() +"' size='30' OnFocus='this.blur()'/></td>";
                        cadena = cadena + "<td><input name='total[]' id='total[]' type='text' value='"+ $("#valor_dos").val() * $("#valor_tres").val() +"' size='30' OnFocus='this.blur()'/></td>";
                        cadena = cadena + "<td><a class='elimina'><img src='delete.png' /></a></td>";
                        $("#grilla tbody").append(cadena);
                        $('#frm_usu input[type="text"]').val('');
                        $("#valor_ide").focus();
                        fn_dar_eliminar();
                        fn_cantidad(); 
 
                });

                $("#cliente").autocomplete({
                    source:'autocompletar_clientes.php',
                    minLength:1,
                    focus: function( event, ui ) {
                        $( "#cliente" ).val(ui.item.label);
                        return false;
                    },
                    select: function( event, ui ) {
                        $( "#cliente" ).val( ui.item.label );
                        $("#clienteID").val(ui.item.id);
                        
                    return false;
                    }
                });

                $("#cliente").focusout(function() {
                   
                    
                    $.ajax({
                        type: "GET",
                        url: "clientes_buscar.php",
                        data: "id=" + $("#cliente").val(),
                        success: function(datos){

                       
                        var res = jQuery.parseJSON(datos);
                     
                        $("#ruc").val(res.ruc);
                        $("#id").val(res.id);
                        $("#direccion").val(res.direccion);
                     
                        $("#distrito").val(res.distrito);
                        $("#telefono").val(res.telefono);
                        $("#referencia").focus();
                        
                        },
                        error: function(datos) {
                        alert("Data not found");
                        }
                    });
                    
                });

                $("#submit").click(function(){
                    //document.getElementById('grilla').rows[i].cells[j].childNodes[0].value
                    
                    var pedido_detalle = "'";
                     
                    for (var i=1;i<document.getElementById('grilla').rows.length-1;i++){ 

                        pedido_detalle = pedido_detalle + 
                            "(LPAD(" + i + ", 6, 0), " + '"000101"' + ", 1, 1, " 
                            + document.getElementById('grilla').rows[i].cells[0].childNodes[1].value + ", "
                            + document.getElementById('grilla').rows[i].cells[3].childNodes[0].value + ", "
                            + "0.18, 140.58, "+
                            + document.getElementById('grilla').rows[i].cells[4].childNodes[0].value + ", "
                            + "0.18, 140.58, 1500, " + '"pruebas"' + ", now())";

                            if (i==document.getElementById('grilla').rows.length-2){
                            pedido_detalle = pedido_detalle + "'";
                        }else{
                            pedido_detalle = pedido_detalle + ','; 
                        }

                                              
                    } 
                    
                    if(pedido_detalle=="'"){

                        alert("Registre correctamente los campos");
                        
                    }else{

                        alert(pedido_detalle);

                        var dataString= 'pedido_detalle=' + pedido_detalle;

                        
                        $.ajax({
                        type: "POST",
                        url: "insertar_datos.php",
                        data: dataString,
                        cache: false,
                        success: function(result){
                        
                            if(result==0){
                                limpiarformulario("#form");
                                alert("Guia registrada correctamente");
                            
                            }else{
                                alert("Error al registrar guia: " + result);
                            }    
                        
                        },
                        error: function(result){
                            alert("error");
                        }
                        });
                    }
                    return false;
                    
                });
                
                });
				
				
				
			
			function fn_cantidad(){
				cantidad = $("#grilla tbody").find("tr").length;
				$("#span_cantidad").html(cantidad);
			};

			   function fn_dar_eliminar(){
                $("a.elimina").click(function(){
                    id = $(this).parents("tr").find("td").eq(0).html();
                    
                  
                        $(this).parents("tr").fadeOut("normal", function(){
                            $(this).remove();
                            fn_cantidad(); 
                         
                            /*
                                aqui puedes enviar un conjunto de datos por ajax
                                $.post("eliminar.php", {ide_usu: id})
                            */
                        })
                    
                });

            };
            function limpiarformulario(formulario){
   /* Se encarga de leer todas las etiquetas input del formulario*/
     $(formulario).find('input').each(function() {
      switch(this.type) {
         case 'password':
         case 'text':
         case 'hidden':
              $(this).val('');
              break;
         case 'checkbox':
         case 'radio':
              this.checked = false;
      }
   });
 
   /* Se encarga de leer todas las etiquetas select del formulario */
   $(formulario).find('select').each(function() {
       $("#"+this.id + " option[value=0]").attr("selected",true);
   });
   /* Se encarga de leer todas las etiquetas textarea del formulario */
   $(formulario).find('textarea').each(function(){
      $(this).val('');
   });
}

