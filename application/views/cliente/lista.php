<script type="text/javascript">
$(document).ready(function(){
	
	$("#boton_modifica[class='btn ink-reaction btn-floating-action btn-lg btn-info']").click(function(e) { 
	   $("#id_cliente").val( ($(this).val()) );
	   	///
		var parametros ={
			'id_cliente' : $(this).val()
		};
	   	$.ajax({
                data:  parametros,
                url:   $("#url_buscar_id").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_buscar_cliente").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_buscar_cliente").html(response);
                }
		});
		/// 
    });
	
	//boton_guardar_cambios
	$("#boton_guardar_cambios").click(function(e) {
        //
		$(this).hide();
		$.ajax({
                data:  $("#form_modifica_cliente").serialize(),
                url:   $("#url_modifica").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_buscar_cliente").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_buscar_cliente").html(response);
						setTimeout(function() {
       						window.location.href = $("#url_lista").val()
      					}, 1500);
                }
		});
		//
    });
	//

});
</script>

<input name="url_buscar_id" id="url_buscar_id" type="hidden" value="<?php echo base_url('Cliente/Buscar_por_id'); ?>">
<input name="url_modifica" id="url_modifica" type="hidden" value="<?php echo base_url('Cliente/Modifica'); ?>">
<input name="url_lista" id="url_lista" type="hidden" value="<?php echo base_url('Cliente/Lista'); ?>" />


<div id="base"><!-- BEGIN BASE-->
	<div id="content"><!-- BEGIN CONTENT-->
    	<div class="card"> <!-- card -->
			<div class="card-head style-primary">
				<header><?php echo $titulo; ?></header>
			</div>
			
             <div id="div_buscar_cliente">  </div>
            
            <div class="card-body"> <!--card-body -->
            	<div class="row">
					<div class="col-lg-12">
								<div class="table-responsive">
									<table id="datatable" class="table table-striped table-hover">
										<thead>
											<tr>
												<th class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Tipo</th>
												<th class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Razon Social</th>
												<th class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Celular</th>
												<th class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Credito Otorgado</th>
												<th class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Deuda Actual</th>
                                                <th class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Modificar</th>
                                              
											</tr>
										</thead>
										<tbody>
                                        	<?php foreach($lista_clientes as $cliente){?>
											<tr class="gradeX">
												<td class="text-center"><?php echo $cliente -> tipo ;?></td>
												<td class="text-center"><?php echo $cliente -> razon_social;?></td>
												<td class="text-center"><?php echo $cliente -> celular;?></td>
												<td class="text-center"><?php echo $cliente -> credito_otorgado;?></td>
												<td class="text-center"><?php echo $cliente -> deuda_actual;?></td>
                                                <td class="text-center">
                                                	<button id="boton_modifica" type="button" class="btn ink-reaction btn-floating-action btn-lg btn-info" data-toggle="modal" data-target="#div_modifica_datos" value="<?php echo $cliente -> id_cliente;?>" ><i class="fa fa-pencil"></i></button>
                                                </td>
                                               
											</tr>
                                            <?php }?>
										</tbody>
									</table>
								</div><!--end .table-responsive -->
							</div>
                </div>
			</div>
	</div>
</div>
	<div id="div_modifica"></div><!-- div_modifica-->
   
</div>

<!-- MODIFICA_DATOS -->
<div class="modal fade" id="div_modifica_datos" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
	<div class="col-lg-12">
		
			<form id="form_modifica_cliente" class="form">
				<div class="card"> <!-- card -->
					<div class="card-head style-primary">
						<header><?php echo "MODIFICAR CLIENTE"; ?></header>
                    </div>
					
                    <div class="card-body"> <!--card-body -->
                    			                        
                        <div class="row">
							<div class="col-sm-6">
								<div class="form-group">
                                	<input id="id_cliente" name="id_cliente" type="hidden" readonly="readonly" value="" />
									<input type="text" class="form-control input-lg" id="tipo" name="tipo" onblur="javascript:this.value = this.value.toUpperCase()">  
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
                        
						 <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button id="boton_guardar_cambios" type="button" class="btn btn-primary">Guardar Cambios</button>
			</div>     
					</div><!--end .card-body -->
					
                </div><!--end card -->
                            
        	</form>
		
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- FIN MODIFICA_DATOS -->