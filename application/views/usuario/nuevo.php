<script type="text/javascript">
$(document).ready(function(){
//agregar
$("button[class='btn ink-reaction btn-floating-action btn-lg btn-success']").click(function(e) {
  
	$("#id_funcionario").val( $(this).val());
	var parametros ={
		"id_funcionario" : ($(this).val())
	};
	$.ajax({
                data:  parametros,
                url:   $("#url_busca_funcionario").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_agregar_usuario").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_agregar_usuario").html(response);
	           }
	});
});
//FIN agregar

//boton_agregar_usuario
$("#boton_agregar_usuario").click(function(e) {
	$(this).hide(2000);
	 $.ajax({
                data:  $("#form_agregar_usuario").serialize(),
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

<input name="url_busca_funcionario" id="url_busca_funcionario" value="<?php echo base_url('Usuario/Busca_funcionario'); ?>" type="hidden">
<input name="url_agrega" id="url_agrega" value="<?php echo base_url('Usuario/Agrega'); ?>" type="hidden">


<div id="base"><!-- TABLA-->
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
                                                <th class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Agregar</th>
                                             
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
                                                	<button type="button" class="btn ink-reaction btn-floating-action btn-lg btn-success" data-toggle="modal" data-target="#div_mod_agrega_usuario" value="<?php echo $lista -> id_funcionario; ?>" ><i class="fa fa-user-plus"></i></button> 
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
    
    <div id="div_guarda_usuario">sss</div><!-- div_guarda_usuario-->
</div>
	
</div><!-- FIN TABLA-->

<div id="div_agregar_usuario"></div><!-- div_agregar_usuario-->


<!-- MODIFICA_DATOS -->
<div class="modal fade" id="div_mod_agrega_usuario" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
	<div class="col-lg-12">
		
			<form id="form_agregar_usuario" class="form">
				<div class="card"> <!-- card -->
					<div class="card-head style-primary">
						<header><?php echo $titulo; ?></header>
					</div>
					
                    <div class="card-body"> <!--card-body -->
                    			
                    	<div class="row">
							<div class="col-sm-6">
								 
                                <div class="form-group">
                                	<input name="id_funcionario" id="id_funcionario" type="hidden" value="">
                                    
									<input type="text" class="form-control input-lg input-lg" id="funcionario" name="funcionario" onblur="javascript:this.value = this.value.toUpperCase()" readonly>
									<label for="nombres" style="font-size:14px; text-transform:uppercase; font-weight:bold" >NOMBRES</label>
								</div>                              
                                
							</div>
					
                    		<div class="col-sm-6">
								<div class="form-group">
                                    <select name="tipo_de_usuario" id="tipo_de_usuario" class="form-control input-lg">
                                    	<option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                        <option value="ALMACENES">ALMACENES</option>
                                        <option value="COBRANZAS">COBRANZAS</option>
                                    </select>
                                    <label for="tipo_de_usuario" style="font-size:14px; text-transform:uppercase; font-weight:bold">tipo de usuario</label>
								</div>
                                
                                <div class="form-group">
								  <input type="text" max="8" class="form-control input-lg" id="usuario" name="usuario">
								  <label for="usuario" style="font-size:14px; text-transform:uppercase; font-weight:bold">usuario</label>
								</div>
                                
                                <div class="form-group">
								  <input type="text" max="8" class="form-control input-lg" id="clave" name="clave">
									<label for="clave" style="font-size:14px; text-transform:uppercase; font-weight:bold">clave</label>
								</div>
                                                           
						  </div>
						</div>
						 <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button id="boton_agregar_usuario" type="button" class="btn btn-primary">Agregar Usuario</button>
                        </div>     
					</div><!--end .card-body -->
					
                </div><!--end card -->
                            
        	</form>
		
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- FIN MODIFICA_DATOS -->