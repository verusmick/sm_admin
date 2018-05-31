<script type="text/javascript">
$(document).ready(function(){
$("#boton_siguiente").hide();

$("#producto").keyup(function(e) {
    if($(this).val().length > 4)
	{
		$("#boton_siguiente").show();		
	}
	else
	{
		$("#boton_siguiente").hide();
	}
});

//boton_agregar
$("#boton_guardar_prod").click(function(e) {
	$(this).hide(100);
	 $.ajax({
                data:  $("#form_prod_lab").serialize(),
                url:   $("#url_guarda_producto").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_guarda_prod_lab").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_guarda_prod_lab").html(response);
						if( $("#accion").text() == 'REGISTRADO' )
						{
							toastr.success('DATOS REGISTRADOS.', 'PRODUCTO');
							setTimeout(function() {
       						window.location.href = $("#url_lista").val()
      						}, 1500);	
						}		
	           }
	});
});
//boton_agregar_usuario	
});
</script>

<input name="url_guarda_producto" id="url_guarda_producto" value="<?php echo base_url('Laboratorio/Guarda_producto'); ?>" type="hidden">
<input name="url_lista" id="url_lista" value="<?php echo base_url('Laboratorio/Lista'); ?>" type="hidden">

<div id="base"><!-- BEGIN BASE-->
	<div id="content"><!-- BEGIN CONTENT-->
		<div class="col-lg-12"> <!-- col-lg-12 -->
			<form id="form_prod_lab" class="form">
				<div class="card"> <!-- card -->
					<div class="card-head style-primary">
						<header><?php echo $titulo; ?> </header>
                        <header id="accion"> </header>
                        
					</div>
                    
					<div class="card-body"> <!--card-body -->
                    	<div class="row">
                        	<div class="col-sm-6">
                        		<div class="form-group">
                                	<input name="id_laboratorio" id="id_laboratorio" type="hidden" value="<?php echo $id_laboratorio; ?>" />
                                    <textarea name="descripcion" rows="1" class="form-control input-lg" id="descripcion" onblur="javascript:this.value = this.value.toUpperCase()" readonly="readonly" ><?php echo $laboratorio; ?></textarea>
									<label for="descripcion" style="font-size:14px; text-transform:uppercase; font-weight:bold"> Laboratorio </label>
								</div>
                                <div class="form-group">
                                    <textarea name="producto" class="form-control input-lg" id="producto" onblur="javascript:this.value = this.value.toUpperCase()"></textarea>
									<label for="producto" style="font-size:14px; text-transform:uppercase; font-weight:bold"> Producto </label>
								</div>
                                <div class="form-group">
                                    <input name="concentrado" id="concentrado" class="form-control input-lg" type="text" onblur="javascript:this.value = this.value.toUpperCase()" />
                                    <label for="concentrado" style="font-size:14px; text-transform:uppercase; font-weight:bold"> Concentrado </label>
								</div>
                                <div class="form-group">
                                    <input name="presentacion" id="presentacion" class="form-control input-lg" type="text" onblur="javascript:this.value = this.value.toUpperCase()" />
                                    <label for="presentacion" style="font-size:14px; text-transform:uppercase; font-weight:bold"> Presentacion </label>
								</div>
                                <div class="form-group">
                                    <textarea name="clasificacion_terapeutica" class="form-control input-lg" id="clasificacion_terapeutica" onblur="javascript:this.value = this.value.toUpperCase()"></textarea>
									<label for="clasificacion_terapeutica" style="font-size:14px; text-transform:uppercase; font-weight:bold"> Clasificacion Terapeutica </label>
								</div>
                        	</div>
                            
                            <div class="col-sm-6">
                            	<div class="form-group">
                                    <input name="precio_distribuidora_referencial" id="precio_distribuidora_referencial" class="form-control input-lg" type="number" step="any" onblur="javascript:this.value = this.value.toUpperCase()" />
                                    <label for="precio_distribuidora_referencial" style="font-size:14px; text-transform:uppercase; font-weight:bold"> Precio distribuidora referencial </label>
								</div>
                                <div class="form-group">
                                    <input name="precio_farmacia_referencial" id="precio_farmacia_referencial" class="form-control input-lg" type="number" step="any" onblur="javascript:this.value = this.value.toUpperCase()" />
                                    <label for="precio_farmacia_referencial" style="font-size:14px; text-transform:uppercase; font-weight:bold"> Precio farmacia referencial </label>
								</div>
                                <div class="form-group">
                                    <input name="precio_instituciones_referencial" id="precio_instituciones_referencial" class="form-control input-lg" type="number" step="any" onblur="javascript:this.value = this.value.toUpperCase()" />
                                    <label for="precio_instituciones_referencial" style="font-size:14px; text-transform:uppercase; font-weight:bold"> Precio instituciones referencial </label>
								</div>
                            
                            </div>
						</div>
					</div><!--end .card-body -->
              
                    <div class="modal-footer">
                      <button id="boton_siguiente" type="button" class="btn btn-primary" data-toggle="modal" data-target="#div_modal_guardar"><i class="fa fa-cogs"> SIGUIENTE</i></button>
                       
                	</div> <!-- fin boton formulario -->
            	
                </div><!--end card -->
                  <div id="div_guarda_prod_lab"></div>          
        	</form>
     	</div>	<!-- fin col-lg-12 -->
        
	</div><!-- END CONTENT -->

</div><!-- FIN BEGIN BASE-->


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
				<button id="boton_guardar_prod" type="button" class="btn btn-success"><i class="md md-save"> GUARDAR</i></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END SIMPLE MODAL MARKUP -->