<script type="text/javascript">
$(document).ready(function(){

//busca_producto
$('#busca_producto').keyup(function(e) {
    $.ajax({
                data:  {'producto' : $(this).val()},
                url:   $("#url_busca_producto").val(),
                type:  'post',
                success:  function (response) {
                	$("#productos").html(response);
	           }
	});
});
//busca_producto


//productos
$("#productos").click(function(e) {
	$('#precio').val('0');
	$('#cantidad').val('0');
	$('#total').val('0');
	$("#id_producto_venta").val( $(this).val()); 
	
	$.ajax({
                data:  {'id_producto_venta' : $('#id_producto_venta').val()},
                url:   $("#url_busca_producto_precio").val(),
                type:  'post',
                success:  function (response) {
                	$("#div_recupera_datos").html(response);
	           }
	});
	
});
//productos

//precio_instituciones
$('#precio_instituciones').click(function(e) {
    $('#precio').val( $(this).val() );
	$('#total').val( $('#precio').val() * $('#cantidad').val() );
});
//precio_instituciones

//precio_instituciones
$('#precio_distribuidora').click(function(e) {
    $('#precio').val( $(this).val() );
	$('#total').val( $('#precio').val() * $('#cantidad').val() );
});
//precio_instituciones

//precio_instituciones
$('#precio_farmacia').click(function(e) {
    $('#precio').val( $(this).val() );
	$('#total').val( $('#precio').val() * $('#cantidad').val() );
});
//precio_instituciones

//precio
$('#precio').change(function(e) {
	$('#total').val( $('#precio').val() * $('#cantidad').val() );
});
//precio

//cantidad
$('#cantidad').keyup(function(e) {
	$('#total').val( $('#precio').val() * $('#cantidad').val() );
});
//cantidad
//cantidad
$('#cantidad').blur(function(e) {
	$('#total').val( $('#precio').val() * $('#cantidad').val() );
});
//cantidad


//bt_guardar
$('#bt_guardar').click (function(e){
	
		$.ajax({
			data:  $("#form_registra").serialize(),
		  	url:   $("#url_agrega").val(),
		  	type:  'post',
		  	beforeSend: function () {
				  $("#div_agrega_datos").html("Procesando, espere por favor...");
		  	},
		  	success:  function (response) {
				  $("#div_agrega_datos").html(response);
				  //$('button').hide();
				  //setTimeout(function() { window.location.href = $("#url_lista").val()}, 1500);
		 	}
		});   
});
//bt_guardar

//cerrar
$('#bt_cerrar').click(function(e) {
    window.close();
});

});
</script>

<input id="url_busca_producto" name="url_busca_producto" value="<?php echo base_url('Venta/Busca_producto');?>" type="hidden">
<input id="url_busca_producto_precio" name="url_busca_producto_precio" value="<?php echo base_url('Venta/Busca_producto_precio');?>" type="hidden">
<input id="url_agrega" name="url_agrega" value="<?php echo base_url('Venta/Agrega_producto_nota');?>" type="hidden">

<div id="div_recupera_datos">sss</div>
<div id="div_agrega_datos">sss</div>

<div id="base"><!-- TABLA-->
	<div id="content"><!-- BEGIN CONTENT-->
    	<div class="card"> <!-- card -->
			<div class="card-head style-primary">
				<header><?php echo $titulo; ?></header>
			</div>
			
            <div class="card-body"> <!--card-body -->
            	<div class="row">
					<div class="col-lg-12">
                    <form id="form_registra">
						<div class="col-sm-6"><!-- div_IZQUIERDA-->
                        	<input id="id_venta" name="id_venta" value="<?php echo $id['id_venta'];?>" type="hidden">
						  <div class="form-group">
                            <label for="id_producto_venta" style="font-size:14px; text-transform:uppercase; font-weight:bold" >producto</label>
                           	<input id="id_producto_venta" name="id_producto_venta" class="form-control input-lg"  type="hidden"> 
                                <input id="busca_producto" name="busca_producto" class="form-control input-lg" type="text"> 
                                  <select name="productos" size="10" multiple="MULTIPLE" class="form-control input-lg" id="productos">
                                  </select> 
						  </div>

                        </div>	<!-- div_IZQUIERDA-->
                        
                        <div class="col-sm-6"><!-- DERECHA-->
                        
							<div class="form-group">
												<label class="col-sm-3 control-label">PRECIO</label>
												<div class="col-sm-9">
													<label class="radio-inline radio-styled">
														<input name="precio_instituciones" type="radio" id="precio_instituciones" value="option1" checked="checked">
														<strong><span id="npi" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; font-size: 14px;">1</span></strong>
													</label>
												  <label class="radio-inline radio-styled">
													  <input type="radio" name="precio_distribuidora" id="precio_distribuidora" value="option2" checked="checked">
													  <strong><span id="npd" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; font-size: 14px;">2</span></strong>
													</label>
												  <label class="radio-inline radio-styled">
													  <input type="radio" name="precio_farmacia" id="precio_farmacia" value="option3" checked="checked">
													  <strong><span id="npf" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; font-size: 14px;">3</span></strong>
													</label>
                                                    
                                                  
												</div><!--end .col -->
                                                <input id="precio" name="precio" class="form-control input-lg" type="number" step="any">
											</div>
                            
                            <div class="form-group">
                            	<label for="cantidad_a_la_venta" style="font-size:14px; text-transform:uppercase; font-weight:bold" >Cantidad Existente</label>
                              	<input id="cantidad_a_la_venta" name="cantidad_a_la_venta" class="form-control input-lg" type="number" step="any" readonly>
							</div>
                            
                            <div class="form-group">
                            	<label for="cantidad" style="font-size:14px; text-transform:uppercase; font-weight:bold" >Cantidad </label>
                                <input id="cantidad" name="cantidad" class="form-control input-lg" type="number" step="any" >  
							</div>
                            
                            <div class="form-group">
                            	<label for="total" style="font-size:14px; text-transform:uppercase; font-weight:bold" >total </label>
                                <input id="total" name="total" class="form-control input-lg" readonly>  
							</div>
                            
                        </div>	<!-- DERECHA-->
                        
                    </form>    
					</div>
                </div>
                
                <div class="modal-footer">
                      <button id="bt_cerrar" name="bt_cerrar" type="button" class="btn ink-reaction btn-raised btn-lg ">CERRAR</button> 
                      <button id="bt_guardar" name="bt_guardar" type="button" class="btn ink-reaction btn-raised btn-lg btn-primary">AGREGAR PRODUCTO</button> 
                      
               </div> <!-- fin bot-->
               <div id="div_registra_nota">ss</div>
			</div>
		</div>
	</div>
	
</div>