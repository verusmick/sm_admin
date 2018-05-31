<script type="text/javascript">
$(document).ready(function(){
//modificar
$("#bot_modificar[class='btn ink-reaction btn-floating-action btn-info']").click(function(e) {
    
	var parametros ={
		"id_producto_laboratorio" : ($(this).val())
	};
	$.ajax({
                data:  parametros,
                url:   $("#url_busca_prod").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_modificar_prod").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_modificar_prod").html(response);
						/* setTimeout(function() {
       						window.location.href = $("#url_lista").val()
      						}, 1500); */	
                }
	}); 
});
//FIN modifica

//boton_guarda_ambios
$("#boton_guarda_ambios").click(function(e) {
	$.ajax({
                data:  $("#form_modifica_prod").serialize(),
                url:   $("#url_modifica_prod").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_guarda_ambios").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_guarda_ambios").html(response);
						 setTimeout(function() {
       						window.location.href = $("#url_lista").val()
      						}, 1500);	
                }
	});
});
//FIN boton_guarda_ambios

});
</script>

<input name="url_busca_prod" id="url_busca_prod" type="hidden" value="<?php echo base_url('Laboratorio/Busca_prod'); ?>">
<input name="url_modifica_prod" id="url_modifica_prod" type="hidden" value="<?php echo base_url('Laboratorio/Modifica_prod'); ?>">
<input name="url_lista" id="url_lista" type="hidden" value="<?php echo base_url('Laboratorio/Lista'); ?>">

<div id="base"><!-- TABLA-->

	<div id="content"><!-- BEGIN CONTENT-->
    	<div class="card"> <!-- card -->
			<div class="card-head style-primary">
				<header><?php echo $titulo; ?></header>
                <div id="div_modificar_prod"></div><!-- div_modificar_prod-->
			</div>
			
            <div class="card-body"> <!--card-body -->
            	<div class="row">
					<div class="col-lg-12">
								<div class="table-responsive">
									<table id="datatable" class="table table-striped table-hover">
										<thead>
											<tr>
												<th width="180" class="text-center" style="font-size:12px; text-transform:uppercase; font-weight:bold">Producto</th>
												<th width="69" class="text-center" style="font-size:12px; text-transform:uppercase; font-weight:bold">Concentrado</th>
                                                <th width="91" class="text-center" style="font-size:12px; text-transform:uppercase; font-weight:bold">Presentacion</th>
                                                <th width="85" class="text-center" style="font-size:12px; text-transform:uppercase; font-weight:bold">Clasificacion Terapeurica</th>
                                                <th width="85" class="text-center" style="font-size:12px; text-transform:uppercase; font-weight:bold">distribuidora</th>
                                                <th width="85" class="text-center" style="font-size:12px; text-transform:uppercase; font-weight:bold">farmacia</th>
                                                <th width="85" class="text-center" style="font-size:12px; text-transform:uppercase; font-weight:bold">instituciones</th>
                                                <th width="85" class="text-center" style="font-size:12px; text-transform:uppercase; font-weight:bold">estado</th>
                                                <th width="85" class="text-center" style="font-size:12px; text-transform:uppercase; font-weight:bold">modificar</th>
											</tr>
                                            
										</thead>
										<tbody>
                                        	<?php foreach($lista_productos as $lista){?>
											<tr class="gradeX">
												
												<td class="text-center" style="font-size:13px"><?php echo $lista -> producto;?></td>
                                                <td class="text-center" style="font-size:13px"><?php echo $lista -> concentrado;?></td>
                                                <td class="text-center" style="font-size:13px"><?php echo $lista -> presentacion;?></td>
                                                <td class="text-center" style="font-size:13px"><?php echo $lista -> clasificacion_terapeutica;?></td>
                                                <td class="text-center" style="font-size:13px"><?php echo $lista -> precio_distribuidora_referencial;?></td>
                                                <td class="text-center" style="font-size:13px"><?php echo $lista -> precio_farmacia_referencial;?></td>
                                                <td class="text-center" style="font-size:13px"><?php echo $lista -> precio_instituciones_referencial;?></td>
                                                <td class="text-center" style="font-size:13px"> 
												<?php 
													if ($lista -> estado == 1)
													{
												       echo "<button type='button' class='btn btn-block ink-reaction btn-flat btn-success'>Activo</button>";
													}
													else
													{
														echo "<button type='button' class='btn btn-block ink-reaction btn-flat btn-danger'>Inactivo</button>";
													}
												?>
                                                </td>
                                                <td class="text-center" style="font-size:13px">
												<button id="bot_modificar" type="button" class="btn ink-reaction btn-floating-action btn-info" data-toggle="modal" data-target="#div_modal_modifica" value="<?php echo $lista -> id_producto_laboratorio;?>" ><i class="fa fa-pencil"></i></button> 
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

<!-- BEGIN SIMPLE MODAL MARKUP -->
<div class="modal fade" id="div_modal_modifica" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
	<div class="col-lg-12">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="btn ink-reaction btn-icon-toggle btn-primary" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i>  CERRAR</button>
			</div>
		
                <form id="form_modifica_prod" class="form">
				<div class="card"> <!-- card -->
					<div class="card-head style-primary">
						<header><?php echo $titulo; ?> </header>
                        <header id="accion"> </header>
                        
					</div>
                
					<div class="card-body"> <!--card-body -->
                    	<div class="row">
                        	<div class="col-sm-6">
                        		<div class="form-group">
                                	<input name="id_producto_laboratorio" id="id_producto_laboratorio" type="hidden" />
                                	<select name="id_laboratorio" id="id_laboratorio" class="form-control input-lg" >
                                     <?php 
									 $lista_lab = $this -> Modelo_laboratorio -> Lista();
									 foreach ($lista_lab as $labora){
									 ?>
                                     
                                     <option value="<?php echo $labora -> id_laboratorio;  ?>"><?php echo $labora -> descripcion; ?></option>
                                     <?php }?>
                                    </select>
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
                                
                                <div class="">
                                <label class="checkbox-inline checkbox-styled checkbox-success">
								 <input id="estado" name="estado" type="checkbox" value="3" checked=""><span id="titutlo_estado"></span>
								</label>
                                </div>
                            
                            </div>
						</div>
					</div><!--end .card-body -->

                </div><!--end card -->
                  <div id="div_guarda_ambios"></div>          
        		</form>
                
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button id="boton_guarda_ambios" type="button" class="btn btn-primary">Guardar Cambios</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END SIMPLE MODAL MARKUP -->



