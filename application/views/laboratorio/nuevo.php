<script type="text/javascript">
$(document).ready(function(){

$("#boton_siguiente").hide();

//url_busca_laboratorio
$("#descripcion").blur(function(e) {
	var parametros ={
		"descripcion" : ($(this).val())
	};
	$.ajax({
                data:  parametros,
                url:   $("#url_busca_laboratorio").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_busca_lab").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_busca_lab").html(response);
	           }
	});
});
//url_busca_laboratorio

//boton_agregar
$("#boton_guardar").click(function(e) {
	$(this).hide(2000);
	 $.ajax({
                data:  $("#form_lab").serialize(),
                url:   $("#url_agrega").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_guarda_usuario").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_guarda_usuario").html(response);
						setTimeout(function() {
       						window.location.href = $("#url_lista").val()
      						}, 1500);
	           }
	}); 
});
//boton_agregar_usuario	
});
</script>

<input name="url_busca_laboratorio" id="url_busca_laboratorio" value="<?php echo base_url('Laboratorio/Busca_laboratorio'); ?>" type="hidden">
<input name="url_agrega" id="url_agrega" value="<?php echo base_url('Laboratorio/Agrega'); ?>" type="hidden">
<input name="url_lista" id="url_lista" value="<?php echo base_url('Laboratorio/Lista'); ?>" type="hidden">

<div id="base"><!-- BEGIN BASE-->
	<div id="content"><!-- BEGIN CONTENT-->

		<div class="col-lg-12"> <!-- col-lg-12 -->
			<form id="form_lab" class="form">
				<div class="card"> <!-- card -->
					<div class="card-head style-primary">
						<header><?php echo $titulo; ?></header>
                        <div id="div_busca_lab"></div>
					</div>
					
                    <div class="card-body"> <!--card-body -->
                    	<div class="row">
								<div class="form-group">
                                    <textarea name="descripcion" class="form-control input-lg" id="descripcion" onblur="javascript:this.value = this.value.toUpperCase()"></textarea>
									<label for="descripcion" style="font-size:14px; text-transform:uppercase; font-weight:bold"> descripcion </label>
							  	</div>
						</div>
					</div><!--end .card-body -->
					
                    <div class="modal-footer">
                      <button id="boton_siguiente" type="button" class="btn btn-primary" data-toggle="modal" data-target="#div_modal_guardar"><i class="fa fa-cogs"> SIGUIENTE</i></button>
                       
                	</div> <!-- fin boton formulario -->
            	
                </div><!--end card -->
                            
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
				<button id="boton_guardar" type="button" class="btn btn-success"><i class="md md-save"> GUARDAR</i></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END SIMPLE MODAL MARKUP -->