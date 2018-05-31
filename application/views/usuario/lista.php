<script type="text/javascript">
$(document).ready(function(){
//activar
$("button[class='btn ink-reaction btn-floating-action btn-lg btn-danger']").click(function(e) {
    
	var parametros ={
		"id_usuario" : ($(this).val()),
		"activo" : "1"
	};
	$.ajax({
                data:  parametros,
                url:   $("#url_activo").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_modificar_usuario").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_modificar_usuario").html(response);
						setTimeout(function() {
       						window.location.href = $("#url_lista").val()
      						}, 1500);	
                }
	}); 
});
//FIN activar

//inactivar
$("button[class='btn ink-reaction btn-floating-action btn-lg btn-success']").click(function(e) {
   
	var parametros ={
		"id_usuario" : ($(this).val()),
		"activo" : "0"
	};
	$.ajax({
                data:  parametros,
                url:   $("#url_activo").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_modificar_usuario").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_modificar_usuario").html(response);
						setTimeout(function() {
       						window.location.href = $("#url_lista").val()
      						}, 1500);	
                }
	}); 
});
//FIN inactivar
});
</script>

<input name="url_activo" id="url_activo" type="hidden" value="<?php echo base_url('Usuario/Modifica_estado'); ?>">
<input name="url_lista" id="url_lista" type="hidden" value="<?php echo base_url('Usuario/Lista_usuarios'); ?>">

<div id="base"><!-- TABLA-->

	<div id="content"><!-- BEGIN CONTENT-->
    	<div class="card"> <!-- card -->
			<div class="card-head style-primary">
				<header><?php echo $titulo; ?></header>
                <div id="div_modificar_usuario">4444</div><!-- div_modificar_usuario-->
			</div>
			
            <div class="card-body"> <!--card-body -->
            	<div class="row">
					<div class="col-lg-12">
								<div class="table-responsive">
									<table id="datatable" class="table table-striped table-hover">
										<thead>
											<tr>
												<th class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Funcionario</th>
												<th class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Cargo</th>
												<th class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Tipo de usuario</th>
												<th class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Usuario</th>
												<th class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Clave</th>
                                                <th class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Activo</th>
                                             
											</tr>
										</thead>
										<tbody>
                                        	<?php foreach($lista_usuario as $lista){?>
											<tr class="gradeX">
												<td class="text-center"><?php echo $lista -> nombres." ".$lista -> paterno." ".$lista -> materno ;?></td>
												<td class="text-center"><?php echo $lista -> cargo;?></td>
												<td class="text-center"><?php echo $lista -> tipo_de_usuario;?></td>
												<td class="text-center"><?php echo $lista -> usuario;?></td>
												<td class="text-center"><?php echo $lista -> clave;?></td>
                                                <td class="text-center">
                                                	<?php if ($lista -> estado == 1){ $valor_class ="success"; $valor_b="0"; $class_i="check";} else {$valor_class ="danger"; $valor_b="1"; $class_i="close";} ?>
                                                	<button type="button" class="btn ink-reaction btn-floating-action btn-lg btn-<?php echo $valor_class; ?>" data-toggle="modal" data-target="#div_mod_agrega_usuario" value="<?php echo $lista -> id_usuario; ?>" ><i class="fa fa-<?php echo $class_i; ?>"></i></button> 
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
</div><!-- FIN TABLA-->



