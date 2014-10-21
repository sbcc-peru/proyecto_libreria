            $(document).ready(function(){
         
                //Iniciando el datepicker
                $( "#datepicker" ).datepicker();
                //Iniciando las validaciones del formulario
				$("#form").validate({
                //Especificando las reglas de validacion
                
                        rules: {
                            sucursal: {
                               required: true
                            },
                            fecha_registro: {
                               required: true
                            },
                            cliente: {
                               required: true
                            },
                            direccion: {
                               required: true
                            },
                            distrito: {
                               required: true
                            },
                            vendedor: {
                               required: true
                            },
                            turno: {
                               required: true
                            },                            
                            punto_partida: {
                               required: true
                            },
                            punto_llegada: {
                               required: true
                            },
                            transportista_nombre: {
                               required: true
                            },
                            transportista_ruc: {
                               required: true,
                                maxlength: 11
                            },
                            transportista_vehiculo: {
                               required: true
                            },
                            transportista_placa: {
                                required: true,
                                maxlength: 6
                            }
                        
                    },
                // Especificandolos mensaje
                    messages: {
                        sucursal: "*",
                        fecha_registro: "*",
                        cliente: "*",
                        direccion: "*",
                        distrito: "*",
                        turno: "*",
                        vendedor: "*",
                        punto_partida: {
                            required: "*"
                        },
                        punto_llegada: {
                            required: "*"
                        },
                        transportista_nombre: "*",                        
                        transportista_ruc: {
                            required: "*",
                            maxlength: "Máximo 11 caracteres"
                        },
                        transportista_vehiculo:{
                            required: "*"
                        },
                        transportista_placa: {
                            required: "*",
                            maxlength: "Máximo 6 catacteres"
                        }
                       
                    },
                    submitHandler: function(form) {
                        //Variables Cabecera Pedido
                    var cod_emp=1;
                    var cod_suc = $("#sucursal").val();
                    var cod_cli = $("#clienteID").val();
                    var fec_pedido=$("#datepicker").datepicker("option", "dateFormat", "yy-mm-dd ").val() + " 12:36:05";
                    var ped_usu='JCASTILLO';
                    //Variables Cabecera Guia
                    var cod_ser='1';
                    var dir_env=$("#direccion_compra").val();
                    var pun_part=$("#punto_partida").val();
                    var pun_lleg=$("#punto_llegada").val();
                    var cod_usu=$("#vendedor").val();
                    var dist_gui=$("#distrito_compra").val();
                    var turn_gui=$("#turno").val();
                    var telef_gui=$("#telefono").val();
                    var tran_nom=$("#transportista_nombre").val();
                    var tran_ruc=$("#transportista_ruc").val();
                    var tran_veh=$("#transportista_vehiculo").val();
                    var tran_pla=$("#transportista_placa").val();
                    var pedido_detalle = "[";
                    
                    for (var i=1;i<document.getElementById('grilla').rows.length-1;i++){ 
                        pedido_detalle = pedido_detalle + 
                            '{"codigo_libro":' 
                            + document.getElementById('grilla').rows[i].cells[0].childNodes[1].value + ", "
                            + '"cantidad_libro":'
                            + document.getElementById('grilla').rows[i].cells[3].childNodes[0].value + ", "
                             + '"valor_impuesto":'
                            + 0 + ", "
                             + '"valor_descuento":'
                            + 0 + ", "
                             + '"porcentaje_impuesto":'
                            + 0 + ", "
                             + '"porcentaje_descuento":'
                            + 0 + ", "
                            + '"costo_total_libro":'
                            + document.getElementById('grilla').rows[i].cells[4].childNodes[0].value + "}"

                            if (i==document.getElementById('grilla').rows.length-2){
                            pedido_detalle = pedido_detalle + "]";
                            }else{
                            pedido_detalle = pedido_detalle + ','; 
                            }       
                    } 
                    if(pedido_detalle=="'"){
                       
                        alert("Registre correctamente los campos as");
                    } else {
                                        //Datos Cabecera Pedido
                        var dataString= 'cod_emp='+cod_emp+
                                        '&cod_suc='+cod_suc+
                                        '&cod_cli='+cod_cli+
                                        '&fec_pedido='+fec_pedido+
                                        '&ped_usu='+ped_usu+
                                        //Datos Cabecera Guia
                                        '&cod_ser='+cod_ser+
                                        '&dir_env='+dir_env+
                                        '&pun_part='+pun_part+
                                        '&pun_lleg='+pun_lleg+
                                        '&cod_usu='+cod_usu+
                                        '&dist_gui='+dist_gui+
                                        '&turn_gui='+turn_gui+
                                        '&telef_gui='+telef_gui+
                                        '&tran_nom='+tran_nom+
                                        '&tran_ruc='+tran_ruc+
                                        '&tran_veh='+tran_veh+
                                        '&tran_pla='+tran_pla+
                                        '&pedido_detalle='+pedido_detalle;
                        $.ajax({
                          type: "POST",
                          url: "insertar_datos.php",
                          data: dataString,
                          cache: false,
                          success: function(result){
                            /*
                            if(result==0){
                               limpiarformulario("#form");
                               alert("Guia registrada correctamente");
                            } else {
                               alert("Error al registrar guia: " + result);
                            } 
                            */
							limpiarformulario("#form");
                            alert(result);   
                          },
                          error: function(result){
                            alert("error");
                          }
                        });
                    }
                    return false;   
                    }
                });
                //Busqueda de titulos segun el codgo de barra proporcionado
                $("#valor_ide").change(function() {
                    
                    $.ajax({
                        type: "GET",
                        url: "titulos_buscar.php",
                        data: "id=" + $("#valor_ide").val(),
                        success: function(datos){
                        
                        var res = jQuery.parseJSON(datos);
                        
                        if(res.nombre===""){
                            alert("Título no registrado, proceda a agregarlo en el menú correspondiente");
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
                        cadena = cadena + "<td><input name='codigo[]' class='input username' type='text' value='"+ $("#valor_ide").val() +"' size='15' OnFocus='this.blur()'/><input name='codigo_titulo[]' id='codigo_titulo[]' type='hidden' value='"+ $("#tituloID").val() +"'/></td>";
                        cadena = cadena + "<td><input name='nombre[]' class='input username' id='nombre[]' type='text' value='"+ $("#valor_uno").val() +"' size='30' OnFocus='this.blur()'/></td>";
                        cadena = cadena + "<td><input name='precio[]' class='input username' type='text' value='"+ $("#valor_dos").val() +"' size='30' OnFocus='this.blur()'/></td>";
                        cadena = cadena + "<td><input name='cantidad[]' class='input username' id='cantidad[]' type='text' value='"+ $("#valor_tres").val() +"' size='30' OnFocus='this.blur()'/></td>";
                        cadena = cadena + "<td><input name='total[]' class='input username' id='total[]' type='text' value='"+ $("#valor_dos").val() * $("#valor_tres").val() +"' size='30' OnFocus='this.blur()'/></td>";
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
                        $("#referencia").val(res.referencia);
                        $("#direccion_compra").focus();
                        
                        },
                        error: function(datos) {
                        alert("Data not founds");
                        }
                    });
                    
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
       $("#"+this.id + " option[value='']").attr("selected",true);
   });
   /* Se encarga de leer todas las etiquetas textarea del formulario */
   $(formulario).find('textarea').each(function(){
      $(this).val('');
   });
}

