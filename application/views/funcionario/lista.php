<script type="text/javascript">
$(document).ready(function(){
   /*  toastr.error('Are you the 6 fingered man?', "eviosss") */
//inactivar
$("button[class='btn ink-reaction btn-floating-action btn-lg btn-success']").click(function(e) {
    //alert ($(this).val());
	var parametros ={
		"id_funcionario" : ($(this).val()),
		"activo" : "0"
	};
	$.ajax({
                data:  parametros,
                url:   $("#url_activo").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_modifica").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_modifica").html(response);
						 setTimeout(function() {
       						window.location.href = $("#url_lista").val()
      						}, 1500);
						
                }
	});
});
//FIN inactivar

//activar
$("button[class='btn ink-reaction btn-floating-action btn-lg btn-danger']").click(function(e) {
    //alert ($(this).val());
	var parametros ={
		"id_funcionario" : ($(this).val()),
		"activo" : "1"
	};
	$.ajax({
                data:  parametros,
                url:   $("#url_activo").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_modifica").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_modifica").html(response);
						setTimeout(function() {
       						window.location.href = $("#url_lista").val()
      						}, 1500);	
                }
	});
});
//FIN activar

//mODIFICAR
$("button[class='btn ink-reaction btn-floating-action btn-lg btn-info']").click(function(e) {
    var parametros ={
		"id_funcionario" : ($(this).val())
	};
	$.ajax({
                data:  parametros,
                url:   $("#url_busca").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_modifica").html("Procesando, espere por favor...");
						
                },
                success:  function (response) {
                        $("#div_modifica").html(response);
						 
                }
	});
});
//FIN mODIFICAR

//BOTON GUARDAR
$("#boton_guardar_cambios").click(function(e) {
	$(this).hide();
	$.ajax({
                data:  $("#form_modifica_funcionario").serialize(),
                url:   $("#url_modifica_datos").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_modifica").html("Procesando, espere por favor...");
						
                },
                success:  function (response) {
                        $("#div_modifica").html(response);
						setTimeout(function() {
       						window.location.href = $("#url_lista").val()
      						}, 1500);
                }
	});
});
//FIN BOTON GUARDAR

});
</script>

<input name="url_activo" id="url_activo" type="hidden" value="<?php echo base_url('Funcionario/Modifica_estado'); ?>">
<input name="url_busca" id="url_busca" type="hidden" value="<?php echo base_url('Funcionario/Busca_funcionario'); ?>">
<input name="url_modifica_datos" id="url_modifica_datos" type="hidden" value="<?php echo base_url('Funcionario/Modifica_funcionario'); ?>">
<input name="url_lista" id="url_lista" type="" value="<?php echo base_url('Funcionario/Lista'); ?>">


<div id="base"><!-- BEGIN BASE-->
	<div id="content"><!-- BEGIN CONTENT-->
    	<div class="card"> <!-- card -->
			<div class="card-head style-primary">
				<header><?php echo $titulo; ?></header>
			</div>
			
            <div class="card-body"> <!--card-body -->
            	<div class="row">
					<div class="col-lg-12">
								<div class="table-responsive">
									<table id="datatable" class="table table-striped table-hover">
										<thead>
											<tr>
												<th class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Funcionario</th>
												<th class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">CI</th>
												<th class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Telefonos</th>
												<th class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Direccion</th>
												<th class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Cargo</th>
                                                <th class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Modificar</th>
                                                <th class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Activo</th>
											</tr>
										</thead>
										<tbody>
                                        	<?php foreach($lista_funcionario as $lista){?>
											<tr class="gradeX">
												<td class="text-center"><?php echo $lista -> nombres." ".$lista -> paterno." ".$lista -> materno ;?></td>
												<td class="text-center"><?php echo $lista -> ci;?></td>
												<td class="text-center"><?php echo $lista -> telefonos;?></td>
												<td class="text-center"><?php echo $lista -> direccion;?></td>
												<td class="text-center"><?php echo $lista -> cargo;?></td>
                                                <td class="text-center">
                                                	<button type="button" class="btn ink-reaction btn-floating-action btn-lg btn-info" data-toggle="modal" data-target="#div_modifica_datos" value="<?php echo $lista -> id_funcionario; ?>" ><i class="fa fa-pencil"></i></button>
                                                </td>
                                                <td class="text-center">
                                                <?php if($lista -> activo ==1){$class_b="success"; $class_i="check";} else{ $class_b="danger"; $class_i="close"; } ?>
													<button type="button" class="btn ink-reaction btn-floating-action btn-lg btn-<?php echo $class_b; ?>" value="<?php echo $lista -> id_funcionario; ?>"><i class="fa fa-<?php echo $class_i; ?>"></i></button>
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
		
			<form id="form_modifica_funcionario" class="form">
				<div class="card"> <!-- card -->
					<div class="card-head style-primary">
						<header><?php echo $titulo; ?></header>
					</div>
					
                    <div class="card-body"> <!--card-body -->
                    			
                    	<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
                                	<input class="form-control input-lg" id="id_funcionario" name="id_funcionario" type="hidden">
                                
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