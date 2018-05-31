<script type="text/javascript">
$(document).ready(function(){
   /*  toastr.error('Are you the 6 fingered man?', "eviosss") */
//siguiente

//BOTON GUARDAR
$("#boton_guardar").click(function(e) {
	$.ajax({
                data:  $("#form_funcionario").serialize(),
                url:   $("#url_regsitra").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_busca_ci").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_busca_ci").html(response);
						window.location.href = $("#url_lista").val();
                }
});
//FIN BOTON GUARDAR

});
//FIN siguiente

//Busca CI
$("#ci").blur(function(e) {
   
    var parametros = {
		"ci" : $("#ci").val()
	};

	$.ajax({
                data:  parametros,
                url:   $("#url_busca_ci").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_busca_ci").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_busca_ci").html(response);
                }
	});
});
//FIN Busca CI

});
</script>


<input name="url_busca_ci" id="url_busca_ci" type="hidden" value="<?php echo base_url('Funcionario/Busca_ci'); ?>" />
<input name="url_regsitra" id="url_regsitra" type="hidden" value="<?php echo base_url('Funcionario/Registra'); ?>" />
<input name="url_lista" id="url_lista" type="hidden" value="<?php echo base_url('Funcionario/Lista'); ?>" />

<div id="base"><!-- BEGIN BASE-->
	<div id="content"><!-- BEGIN CONTENT-->

		<div class="col-lg-12"> <!-- col-lg-12 -->
			<form id="form_funcionario" class="form">
				<div class="card"> <!-- card -->
					<div class="card-head style-primary">
						<header><?php echo $titulo; ?></header>
					</div>
					
                    <div class="card-body"> <!--card-body -->
                    			
                    	<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="number" class="form-control input-lg" id="ci" name="ci">
									<label for="ci" style="font-size:14px; text-transform:uppercase; font-weight:bold">CEdula de identidad</label>
								</div>
  
                                <div class="form-group">
									<input type="text" class="form-control input-lg input-lg" id="nombres" name="nombres" onblur="javascript:this.value = this.value.toUpperCase()">
									<label for="nombres" style="font-size:14px; text-transform:uppercase; font-weight:bold" >NOMBRES</label>
								</div>
                                
                                <div class="form-group">
									<input type="text" class="form-control input-lg" id="paterno" name="paterno" onblur="javascript:this.value = this.value.toUpperCase()">
									<label for="paterno" style="font-size:14px; text-transform:uppercase; font-weight:bold" >paterno</label>
								</div>
                                
                                <div class="form-group">
									<input type="text" class="form-control input-lg" id="materno" name="materno" onblur="javascript:this.value = this.value.toUpperCase()">
									<label for="materno" style="font-size:14px; text-transform:uppercase; font-weight:bold" >materno</label>
								</div>
                                
                                
							</div>
					
                    		<div class="col-sm-6">
								<div class="form-group">
                                    <textarea name="direccion" class="form-control input-lg" id="direccion" onblur="javascript:this.value = this.value.toUpperCase()"></textarea>
									<label for="direccion" style="font-size:14px; text-transform:uppercase; font-weight:bold">direccion</label>
								</div>
                                
                                <div class="form-group">
								  <input type="number" class="form-control input-lg" id="telefonos" name="telefonos">
								  <label for="telefonos" style="font-size:14px; text-transform:uppercase; font-weight:bold">TELEFONOS</label>
								</div>
                                
                                <div class="form-group">
								  <input type="number" class="form-control input-lg" id="celular" name="celular">
									<label for="ci" style="font-size:14px; text-transform:uppercase; font-weight:bold">celular</label>
								</div>
                                
                                <div class="form-group">
                                    <textarea name="cargo" class="form-control input-lg" id="cargo" placeholder="" onblur="javascript:this.value = this.value.toUpperCase()">VENDEDOR</textarea>
									<label for="cargo" style="font-size:14px; text-transform:uppercase; font-weight:bold">cargo</label>
                                    <em class="text-caption">* EN EL CASO DE VENDEDORES PONER VENDEDOR</em>
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
        <div id="div_busca_ci">assss</div><!-- div_busca_ci-->
        
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

        				
	</div><!-- END CONTENT -->
</div><!-- FIN BEGIN BASE-->