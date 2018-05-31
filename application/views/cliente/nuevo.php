<script>
$(function(){
  var currencies = [
    { value: 'FARMACIA', data: 'AFN' },
    { value: 'CLINICA', data: 'ALL' },
    { value: 'HOSPITAL', data: 'DZD' },
	{ value: 'PERSONAL', data: 'DZD' },
	{ value: 'CAJA', data: 'DZD' },
	{ value: 'ARZOBISPADO', data: 'DZD' },
	{ value: 'CENTRO', data: 'DZD' },
	{ value: 'CONSULTORIO', data: 'DZD' },


  ];
  
  // setup autocomplete function pulling from currencies[] array
  $('#tipo').autocomplete({
    lookup: currencies
  });
  

});  
</script>

<script type="text/javascript">

$(document).ready(function(){

$("#boton_siguiente").hide();
  
//
$("#razon_social").blur(function(e) {
    if($("#tipo").val().length>4)
	{
		$("#boton_siguiente").show(600);
	}
	else
	{
		$("#boton_siguiente").hide();
	}
	

});
//

//BOTON GUARDAR
$("#boton_guardar").click(function(e) {
	$.ajax({
                data:  $("#form_cliente").serialize(),
                url:   $("#url_registrar").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_registrar_cliente").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_registrar_cliente").html(response);
						setTimeout(function() {
       						window.location.href = $("#url_lista").val()
      						}, 1500);
						$("#boton_siguiente").hide();
                }
	});
});
//FIN BOTON GUARDAR



});
</script>


<input name="url_registrar" id="url_registrar" type="hidden" value="<?php echo base_url('Cliente/Registrar'); ?>" />
<input name="url_lista" id="url_lista" type="hidden" value="<?php echo base_url('Cliente/Lista'); ?>" />

<div id="base"><!-- BEGIN BASE-->
	<div id="content"><!-- BEGIN CONTENT-->

		<div class="col-lg-12"> <!-- col-lg-12 -->
			<form id="form_cliente" class="form">
				<div class="card"> <!-- card -->
					<div class="card-head style-primary">
						<header><?php echo $titulo; ?></header>
					</div>
					
                    <div class="card-body"> <!--card-body -->
		
                    	<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control input-lg" id="tipo" name="tipo">  
                                  		<div id="outputbox" class="">
                                  			<p id="outputcontent" class=""></p>
 										</div>
									<label for="tipo" style="font-size:14px; text-transform:uppercase; font-weight:bold">Tipo</label>
								</div>
  
                                <div class="form-group">
									<input type="text" class="form-control input-lg input-lg" id="razon_social" name="razon_social" onblur="javascript:this.value = this.value.toUpperCase()">
									<label for="razon_social" style="font-size:14px; text-transform:uppercase; font-weight:bold" >RAZON SOCIAL</label>
								</div>
                                
                                <div class="form-group">
									<input type="number" class="form-control input-lg" id="celular" name="celular" onblur="javascript:this.value = this.value.toUpperCase()">
									<label for="celular" style="font-size:14px; text-transform:uppercase; font-weight:bold" >CELULAR</label>
								</div>
                                
                                
							</div>
					
                    		<div class="col-sm-6">
								
                                 <div class="form-group">
									<input type="number" step="any" class="form-control input-lg" id="credito_otorgado" name="credito_otorgado" onblur="javascript:this.value = this.value.toUpperCase()" value="0">
									<label for="credito_otorgado" style="font-size:14px; text-transform:uppercase; font-weight:bold" >credito otorgado</label>
								</div>
                                
                                <div class="form-group">
								  <input type="number" step="any" class="form-control input-lg" id="deuda_actual" name="deuda_actual" value="0">
									<label for="deuda_actual" style="font-size:14px; text-transform:uppercase; font-weight:bold">deuda actual</label>
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
        <div id="div_registrar_cliente">assss</div><!-- div_busca_ci-->
        
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