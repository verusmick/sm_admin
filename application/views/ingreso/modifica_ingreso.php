<script type="text/javascript">

$(document).ready(function(){

//BOTON GUARDAR
$("#boton_guardar").click(function(e) {
	$.ajax({
    	data:  $("#form_ingreso").serialize(),
                url:   $("#url_modificar").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_registrar_datos").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_registrar_datos").html(response);
						setTimeout(function() { window.location.href = $("#url_lista").val()}, 1500);
                }
	});
});
//FIN BOTON GUARDAR



});
</script>


<input name="url_modificar" id="url_modificar" type="hidden" value="<?php echo base_url('Ingreso/Modificar_datos_ingreso'); ?>" />
<input name="url_lista" id="url_lista" type="hidden" value="<?php echo base_url('Ingreso/Lista_ingresos'); ?>" />

<div id="base"><!-- BEGIN BASE-->
	<div id="content"><!-- BEGIN CONTENT-->

		<div class="col-lg-12"> <!-- col-lg-12 -->
			<form id="form_ingreso" class="form">
				<div class="card"> <!-- card -->
					<div class="card-head style-primary">
						<header><?php echo $titulo; ?></header>
					</div>
					
                    <div class="card-body"> <!--card-body -->
		
                    	<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
                                <input name="id_nota_de_ingreso_productos" id="id_nota_de_ingreso_productos" type="hidden" value="<?php echo $nota_ingreso -> id_nota_de_ingreso_productos; ?>" />
									<label for="tipo_de_nota" style="font-size:14px; text-transform:uppercase; font-weight:bold">Tipo DE NOTA</label>
                                    <select id="tipo_de_nota" name="tipo_de_nota" class="form-control input-lg">
                                      <option value=""  <?php if (!(strcmp("", "NOTA DE REMISION"))) {echo "selected=\"selected\"";} ?>>=ELEGIR=</option>
                                      <option value="NOTA DE REMISION" <?php if (!(strcmp("NOTA DE REMISION", $nota_ingreso->tipo_de_nota))) {echo "selected=\"selected\"";} ?>>NOTA DE REMISION</option>
                                      <option value="FACTURA" <?php if (!(strcmp("FACTURA", $nota_ingreso->tipo_de_nota))) {echo "selected=\"selected\"";} ?>>FACTURA</option>
                                      <option value="RECIBO" <?php if (!(strcmp("RECIBO", $nota_ingreso->tipo_de_nota))) {echo "selected=\"selected\"";} ?>>RECIBO</option>
                                      <option value="OTRO" <?php if (!(strcmp("OTRO", $nota_ingreso->tipo_de_nota))) {echo "selected=\"selected\"";} ?>>OTRO</option>
                                        
                                    </select>
								</div>
 
                                <div class="form-group">
									<select id="id_laboratorio" name="id_laboratorio" class="form-control input-lg input-lg">
                                    	<option value="=ELEGIR=">=ELEGIR=</option>
                                        	<?php foreach( $laboratorios as $laboratorio)
											{?>
                                         		<option value="<?php echo $laboratorio -> id_laboratorio; ?>" <?php if (!(strcmp($laboratorio -> id_laboratorio, $nota_ingreso->id_laboratorio))) {echo "selected=\"selected\"";} ?>> <?php echo $laboratorio -> descripcion; ?></option>
                                        	<?php }?>
                                    </select>
                                   
									<label for="razon_social" style="font-size:14px; text-transform:uppercase; font-weight:bold" >Laboratorio</label>
								</div>
    
                                <div class="form-group">
									<input type="number" step="any" class="form-control input-lg" id="numero_de_nota" name="numero_de_nota" value="<?php echo $nota_ingreso -> numero_de_nota; ?>">
									<label for="numero_de_nota" style="font-size:14px; text-transform:uppercase; font-weight:bold" >NUMERO DE NOTA</label>
								</div>
                               
							</div>
					
                    		<div class="col-sm-6">
                            
                            	<div class="form-group">
									<input type="number" class="form-control input-lg" id="cantidad_de_productos" name="cantidad_de_productos" value="<?php echo $nota_ingreso -> cantidad_de_productos; ?>">
									<label for="cantidad_de_productos" style="font-size:14px; text-transform:uppercase; font-weight:bold" >CANTIDAD DE PRODUCTOS A INGRESAR</label>
								</div>
                                
                                <div class="form-group">
								  <input type="date" class="form-control input-lg" id="fecha_de_la_nota" name="fecha_de_la_nota" value="<?php echo $nota_ingreso -> fecha_de_la_nota; ?>" >
									<label for="fecha_de_la_nota" style="font-size:14px; text-transform:uppercase; font-weight:bold">fecha de la nota</label>
								</div>
                                
                                <div class="form-group">
								  <input type="number" step="any" class="form-control input-lg" id="total_a_pagar" name="total_a_pagar" value="<?php echo $nota_ingreso -> total_a_pagar; ?>" >
									<label for="total_a_pagar" style="font-size:14px; text-transform:uppercase; font-weight:bold">total a pagar</label>
								</div>
 
						  </div>
						</div>
						      
					</div><!--end .card-body -->
					
                    <div class="modal-footer">
                      <button id="boton_siguiente" type="button" class="btn btn-primary" data-toggle="modal" data-target="#div_modal_guardar"><i class="fa fa-cogs"> SIGUIENTE</i></button>
                       
                	</div> <!-- fin boton formulario -->
            	
                </div><!--end card -->
                            
        	</form>
     	</div>	<!-- fin col-lg-12 -->
        <div id="div_registrar_datos"></div><!-- div_registrar_datos-->
        
<!-- BEGIN SIMPLE MODAL MARKUP -->
<div class="modal fade" id="div_modal_guardar" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        <div class="modal-content">
        	<div class="card"> <!-- card -->
				 <button type="button" class="btn ink-reaction btn-icon-toggle btn-primary" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i>  CERRAR</button>
                <div class="card-head style-primary">
					<header><?php echo $titulo; ?></header>
				</div>
               
             </div>
			<div class="modal-body">
				<p>VAS A GUARDAR LA INFORMACION?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="md md-save"> CANCELAR</i></button>
				<button id="boton_guardar" type="button" class="btn btn-success" data-dismiss="modal"><i class="md md-save"> GUARDAR</i></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END SIMPLE MODAL MARKUP -->

        				
	</div><!-- END CONTENT -->
</div><!-- FIN BEGIN BASE-->