<script type="text/javascript">
$(document).ready(function(){
//activar
$("button[class='btn ink-reaction btn-floating-action btn-danger']").click(function(e) {
    
	var parametros ={
		"id_laboratorio" : ($(this).val()),
		"estado" : "1"
	};
	$.ajax({
                data:  parametros,
                url:   $("#url_activo").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_modificar_lab").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_modificar_lab").html(response);
						setTimeout(function() {
       						window.location.href = $("#url_lista").val()
      						}, 1500);	
                }
	}); 
});
//FIN activar

//inactivar
$("button[class='btn ink-reaction btn-floating-action btn-success']").click(function(e) {
   
	var parametros ={
		"id_laboratorio" : ($(this).val()),
		"estado" : "0"
	};
	$.ajax({
                data:  parametros,
                url:   $("#url_activo").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_modificar_lab").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_modificar_lab").html(response);
						setTimeout(function() {
       						window.location.href = $("#url_lista").val()
      						}, 1500);	
                }
	}); 
});
//FIN inactivar

//ver_productos
$("button[class='btn ink-reaction btn-floating-action btn-warning']").click(function(e) {
	//alert($(this).val());
	 var parametros ={
		"id_laboratorio" : ($(this).val())
	};
	 $.ajax({
                data:  parametros,
                url:   $("#url_ver_productos").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_productos_lab").html("Cargando los productos...");
                },
                success:  function (response) {
                        $("#div_productos_lab").html(response);	
                }
	});  
});
//FIN ver_productos

//bot_modifica
$("#bot_modifica[class='btn ink-reaction btn-floating-action btn-info']").click(function(e) {
   
	$("#id_laboratorio").val( $(this).val() );
	var parametros ={
		"id_laboratorio" : ($(this).val())
	};
	 $.ajax({
                data:  parametros,
                url:   $("#url_busca_lab_id").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_busca").html("Cargando los productos...");
                },
                success:  function (response) {
                        $("#div_busca").html(response);	
                }
	});
});
//finbot_modifica

});
</script>

<input name="url_activo" id="url_activo" type="hidden" value="<?php echo base_url('Laboratorio/Modifica_estado'); ?>">
<input name="url_lista" id="url_lista" type="hidden" value="<?php echo base_url('Laboratorio/Lista'); ?>">
<input name="url_ver_productos" id="url_ver_productos" type="hidden" value="<?php echo base_url('Laboratorio/Ver_productos'); ?>">
<input name="url_busca_lab_id" id="url_busca_lab_id" type="hidden" value="<?php echo base_url('Laboratorio/Busca_lab_id'); ?>">

<div id="base"><!-- TABLA-->

	<div id="content"><!-- BEGIN CONTENT-->
    	<div class="card"> <!-- card -->
			<div class="card-head style-primary">
				<header><?php echo $titulo; ?></header>
                <div id="div_modificar_lab"></div><!-- div_modificar_usuario-->
                
			</div>
			
            <div class="card-body"> <!--card-body -->
            	<div class="row">
					<div class="col-lg-12">
								<div class="table-responsive">
									<table id="datatable" class="table table-striped table-hover">
										<thead>
											<tr>
												<th width="180" class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Descripcion</th>
												<th width="69" class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Estado</th>
                                                <th width="91" class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Agregar Productos</th>
                                                <th width="91" class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Modificar</th>
                                                <th width="85" class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Ver Productos</th>
											</tr>
                                            
										</thead>
										<tbody>
                                        	<?php foreach($lista_lab as $lista){?>
											<tr class="gradeX">
												
												<td class="text-center" style="font-size:14px"><?php echo $lista -> descripcion;?> </td>
                                                <td class="text-center" >
                                                	<?php if ($lista -> estado == 1){ $valor_class ="success"; $valor_b="0"; $class_i="check";} else {$valor_class ="danger"; $valor_b="1"; $class_i="close";} ?>
                                                	<button type="button" class="btn ink-reaction btn-floating-action btn-<?php echo $valor_class;?>" data-toggle="modal" data-target="#div_mod_agrega_usuario" value="<?php echo $lista -> id_laboratorio; ?>" ><i class="fa fa-<?php echo $class_i; ?>"></i></button> 
                                                </td>
                                                
                                                <td class="text-center" >
                                                	<a href="<?php echo base_url('Laboratorio/Agregar_productos')?>?id_laboratorio=<?php echo base64_encode($lista -> id_laboratorio); ?>&&labo=<?php echo base64_encode($lista -> descripcion);?>" class="btn ink-reaction btn-floating-action btn-info"><i class="fa fa-plus"></i></a> 
                                                </td>
                                                
                                                <td class="text-center" >
                                                	<button id="bot_modifica" type="button" data-toggle="modal" data-target="#div_mod_lab" class="btn ink-reaction btn-floating-action btn-info" value=" <?php echo $lista -> id_laboratorio; ?>"><i class="fa fa-pencil"></i></button> 
                                                </td>
                                                
                                                <td class="text-center" >
                                                	<a href="<?php echo base_url('Laboratorio/Ver_productos')?>?id_laboratorio=<?php echo $lista -> id_laboratorio; ?>" class="btn ink-reaction btn-floating-action btn-warning" ><i class="fa fa-eye"></i> </a> 
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

<!-- div_mod_lab -->
<div class="modal fade" id="div_mod_lab" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
	<div class="col-lg-12">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="btn ink-reaction btn-icon-toggle btn-primary" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i>  CERRAR</button>
			</div>
            <div id="div_busca"> </div>
			<div class="modal-body">
				<form id="form_mod_lab" class="form">
                    <div class="card-body"> <!--card-body -->
                    	<div class="row">
								<div class="form-group">
                                <input name="id_laboratorio" id="id_laboratorio" type="hidden" value="" />
                                    <textarea name="descripcion" class="form-control input-lg" id="descripcion" onblur="javascript:this.value = this.value.toUpperCase()"></textarea>
									<label for="descripcion" style="font-size:14px; text-transform:uppercase; font-weight:bold"> descripcion </label>
							  	</div>
						</div>
					</div><!--end .card-body -->
        		</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button id="bot_guardar_camb_lab" type="button" class="btn btn-primary">Guardar Cambios</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END div_mod_lab -->






