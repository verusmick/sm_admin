<script type="text/javascript">

$(document).ready(function(){
$("#fecha_de_vencimiento").mask("99/9999");

$('#productos').hide();


//calcula precio total
$('#precio_de_ingreso_unitario').blur(function(e) {
    $('#precio_de_ingreso_total').val( $('#unidades_ingresadas').val()*$('#precio_de_ingreso_unitario').val());
});
//calcula precio total

//productos
$('#productos').change(function(e) {
    $('#producto').val( $('#productos option:selected').text() );
	$('#id_producto_laboratorio').val( $(this).val() );
});
//productos

//Busca productos
$('#producto').keyup(function(e) {
   $.ajax({
    	data:  {"producto" : $(this).val(),"id_laboratorio" : $('#id_laboratorio').val()},
        url:   $("#url_buscap").val(),
        type:  'post',
        beforeSend: function () {
        $("#productos").html("Procesando, espere por favor...");
        },
        success:  function (response) {
        $("#productos").html(response);
		//setTimeout(function() { window.location.href = $("#url_lista").val()}, 1500);
        }
	}); 
});
//Busca productos

//BOTON GUARDAR
$("#bt_guardar").click(function(e) {
	//alert($("#form_agrega_producto").serialize());
	
	$.ajax({
    	data:  $("#form_agrega_producto").serialize(),
        url:   $("#url_registrar").val(),
        type:  'post',
        beforeSend: function () {
        $("#div_registrar").html("Procesando, espere por favor...");
        },
        success:  function (response) {
        $("#div_registrar").html(response);
		
		$('#producto').val('');
		$('#no_de_lote').val('');
		$('#fecha_de_vencimiento').val('');
		$('#registro_sanitario').val('');
		$('#unidades_ingresadas').val('');
		$('#precio_de_ingreso_unitario').val('');
		$('#precio_de_ingreso_total').val('');
	
        }
	});
});
//FIN BOTON GUARDAR

//boton_agregar
$('#boton_agregar').click(function(e) {
    var cantidad1 = $('#cantidad_de_productos').val();
	var cantidad2 = $('#cantidad_ingresados').val();
	if (cantidad1 == cantidad2)
	{
		toastr.success('TODOS LOS PRODUCTOS FUERON INGRESADOS.', 'INGRESO');	
		$('#bt_guardar').hide();
	}
});
//boton_agregar

});
</script>


<input name="url_registrar" id="url_registrar" type="hidden" value="<?php echo base_url('Ingreso/Guarda_producto'); ?>" />
<input name="url_buscap" id="url_buscap" type="hidden" value="<?php echo base_url('Ingreso/Busca_producto'); ?>" />
<input name="url_lista" id="url_lista" type="hidden" value="<?php echo base_url('Ingreso/Lista_ingresos'); ?>" />

<div id="base"><!-- BEGIN BASE-->
	<div id="content"><!-- BEGIN CONTENT-->

		<div class="col-lg-12"> <!-- col-lg-12 -->
			<form id="form_ingreso" class="form">
				<div class="card"> <!-- card -->
					<div class="card-head style-primary">
						<header><?php echo $titulo." - ".$datos_ingreso['descripcion']; ?></header>
					</div>
					
                    <div class="card-body"> <!--card-body -->
		
                    	<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="tipo_de_nota" style="font-size:14px; text-transform:uppercase; font-weight:bold">codigo</label>
                                    <input type="number" step="any" class="form-control input-lg" id="" name="" value="<?php echo $datos_ingreso['id_nota_de_ingreso_productos'];?>" readonly>
                                    
								</div>
                                
                                <div class="form-group">
									<label for="razon_social" style="font-size:14px; text-transform:uppercase; font-weight:bold" >Laboratorio</label>
                                   <input class="form-control input-lg" id="descripcion" name="descripcion" value="<?php echo $datos_ingreso['descripcion'];?>" readonly>
								</div>
 
                                <div class="form-group">
									<label for="razon_social" style="font-size:14px; text-transform:uppercase; font-weight:bold" >cantidad de productos a ingresar</label>
                                   <input type="number" step="any" class="form-control input-lg" id="cantidad_de_productos" name="cantidad_de_productos" value="<?php echo $datos_ingreso['cantidad_de_productos'];?>" readonly>
								</div>
                                
                                <div class="form-group">
									<label for="razon_social" style="font-size:14px; text-transform:uppercase; font-weight:bold" >cantidad de productos Ingresados</label>
                                    <input type="number" step="any" class="form-control input-lg" id="cantidad_ingresados" name="cantidad_ingresados" value="<?php echo $datos_ingreso['ingresados'];?>" readonly>
                                  
								</div>
							</div>
                    		
						</div>
						    
                    <div class="modal-footer">
                    
                      <button id="boton_agregar" type="button" class="btn ink-reaction btn-raised btn-primary" data-toggle="modal" data-target="#div_agregar_producto"><i class="md md-system-update-tv"> AGREGAR PRODUCTO</i></button>
                       
                	</div> <!-- fin boton formulario -->  
					</div><!--end .card-body -->
					
            	
                </div><!--end card -->
                            
        	</form>
     	</div>	<!-- fin col-lg-12 -->
        <div id="div_registrar"></div><!-- div_registrar_datos-->
        <div id="div_buscap"></div><!-- div_buscap-->
        
	</div><!-- END CONTENT -->
</div><!-- FIN BEGIN BASE-->

<div class="modal fade" id="div_agregar_producto" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
	<div class="col-lg-12">
		
			<form id="form_agrega_producto" class="form">
				<div class="card"> <!-- card -->
                	<div class="modal-header">
						<button type="button" class="btn ink-reaction btn-icon-toggle btn-primary" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i>  CERRAR</button>
					</div>
                
					<div class="card-head style-primary">
						<header><?php echo $titulo; ?></header>
					</div>
					
                    <div class="card-body"> <!--card-body -->
                    			
                    	<div class="row">
                         	<input type="text" class="form-control input-lg" id="id_laboratorio" name="id_laboratorio" value="<?php echo $datos_ingreso['id_laboratorio'];?>" readonly="readonly">
                            <input type="text" class="form-control input-lg" id="id_producto_laboratorio" name="id_producto_laboratorio" value="" readonly="readonly">
                            
                        	<div class="col-lg-6"><!--columna-->
                            
                            <div class="form-group">
							  <label for="id_producto_laboratorio" style="font-size:14px; text-transform:uppercase; font-weight:bold" >producto</label>
                                <input type="text" class="form-control input-lg" id="producto" name="producto" value="">
							</div>
                            <select id="productos" name="productos" class="form-control input-lg" >
                                 	<option value="=ELEGIR=">=ELEGIR=</option>
                                 </select>
                            
                            <div class="form-group">
							  <label for="no_de_lote" style="font-size:14px; text-transform:uppercase; font-weight:bold" >no de lote</label>
                                <input type="text" class="form-control input-lg" id="no_de_lote" name="no_de_lote" value=""  onblur="javascript:this.value = this.value.toUpperCase()">
                                 <input type="hidden"  class="form-control input-lg" id="id_nota_de_ingreso_productos" name="id_nota_de_ingreso_productos" value="<?php echo $datos_ingreso['id_nota_de_ingreso_productos'];?>" readonly>
							</div>
                            
                             <div class="form-group">
								<label for="fecha_de_vencimiento" style="font-size:14px; text-transform:uppercase; font-weight:bold" >fecha_de_vencimiento</label>
                                <input class="form-control input-lg" id="fecha_de_vencimiento" name="fecha_de_vencimiento" value=""  onblur="javascript:this.value = this.value.toUpperCase()">
							</div>
                            
                            <div class="form-group">
								<label for="registro_sanitario" style="font-size:14px; text-transform:uppercase; font-weight:bold" >registro_sanitario</label>
                                <input type="text" class="form-control input-lg" id="registro_sanitario" name="registro_sanitario" value="<?php echo $datos_ingreso['cantidad_de_productos'];?>"  onblur="javascript:this.value = this.value.toUpperCase()">
							</div>

                            </div><!--fin columna-->
                            
                            <div class="col-lg-6"><!--columna-->
                              
                            	<div class="form-group">
									<label for="unidades_ingresadas" style="font-size:14px; text-transform:uppercase; font-weight:bold" >unidades ingresadas</label>
                                	<input type="number" step="any" class="form-control input-lg" id="unidades_ingresadas" name="unidades_ingresadas" value="" >
								</div>
                            	
                                <div class="form-group">
									<label for="precio_de_ingreso_unitario" style="font-size:14px; text-transform:uppercase; font-weight:bold" >precio_de_ingreso_unitario</label>
                                	<input type="number" step="any" class="form-control input-lg" id="precio_de_ingreso_unitario" name="precio_de_ingreso_unitario" value="" >
								</div>
                            
                            	<div class="form-group">
									<label for="precio_de_ingreso_total" style="font-size:14px; text-transform:uppercase; font-weight:bold" >precio_de_ingreso_total</label>
                                	<input type="number" step="any" class="form-control input-lg" id="precio_de_ingreso_total" name="precio_de_ingreso_total" value=""  readonly>
								</div>
                            
                            </div><!--fin columna--> 
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button id="bt_guardar" type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                            </div>  
                                                   
                        </div>
                    </div>
             	</div>
            </form>
	</div>
</div>