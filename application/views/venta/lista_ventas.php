<script type="text/javascript">
$(document).ready(function(){


});
</script>


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
												<th width="180" class="text-left" style="font-size:14px; text-transform:uppercase; font-weight:bold; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">DATOS GENERALES</th>
												<th width="69" class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Numero</th>
                                                
                                                <th width="91" class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold">Fecha de VEnta</th>
                                                <th width="85" class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold"></th>
                                                <th width="85" class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold"></th>
                                                <th width="85" class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold"></th>
                                                <th width="85" class="text-center" style="font-size:14px; text-transform:uppercase; font-weight:bold"></th>
											</tr>
                                            
										</thead>
										<tbody>
                                        	<?php foreach ($ventas as $venta ){?>
											<tr class="gradeX" style="font-size:14px; text-transform:uppercase; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">
												
												<td class="text-left" style="font-size:14px">
												<span style="color: #900; font-weight: bold;"><?php echo "TIPO DE NOTA: "; ?></span>
												<span style=" font-weight: bold;"><?php echo $venta -> descripcion,"<br>" ;?></span>
												<span style="color: #900; font-weight: bold;"><?php echo "CLIENTE: "; ?></span>
												<span style=" font-weight: bold;"><?php echo $venta -> tipo." ".$venta -> razon_social,"<br>" ; ?></span>
                                                <span style="color: #900; font-weight: bold;"><?php echo "TOTAL A PAGAR: "; ?></span>        
                                                <span style=" font-weight: bold;"><?php echo $venta -> total_a_pagar_descuento,"<br>" ; ?></span>
                                                
                                                <span style="color: #900; font-weight: bold;"><?php echo "VENDEDOR: "; ?></span>        
                                                <span style=" font-weight: bold;"><?php echo $venta -> nombres." ".$venta -> paterno." ".$venta -> materno,"<br>" ; ?></span>
                                                
                                                <span style="color: #900; font-weight: bold;"><?php echo "ESTADO: "; ?></span>        
                                                <span style=" font-weight: bold;">
												<?php echo $estado = $venta -> estado,"<br>" ; 
												if($estado == "ANULADO"){
													echo $est="disabled";
												}
												else
												{
													if($estado == "CANCELADO")
													{
														echo $est="disabled";
													}
													else
													{
														echo $est="";
													}
												}
												?></span>        
												</td>
                                                <td class="text-center" ><?php echo $venta -> numero_de_nota;?> </td>
                                         
                                                <td class="text-center" > <?php echo $venta -> fecha_de_venta;?> </td>
                                                
                                                <td class="text-center" >
                                                
                                                <a href="<?php echo base_url('Venta/Agrega_producto')?>?id_venta=<?php echo base64_encode($venta -> id_venta);?>" class="btn ink-reaction btn-raised btn-sm btn-primary" target="_blank" <?php echo $est;?>>Agregar Producto</a>
                                                </td>
                                                
                                                <td class="text-center" >
                                                <a href="<?php echo base_url('Venta/Lista_productos_nota')?>?id_venta=<?php echo base64_encode($venta -> id_venta);?>" class="btn ink-reaction btn-raised btn-sm btn-primary" target="_blank" <?php echo $est;?>>Ver Productos</a>
                                                </td>
                                                
                                                <td class="text-center" >
                                                <a href="<?php echo base_url('Venta/Anula_nota')?>?id_venta=<?php echo base64_encode($venta -> id_venta);?>" class="btn ink-reaction btn-raised btn-sm btn-primary" target="_blank" <?php echo $est;?>>Anular Nota</a>
                                                </td>
                                                
                                                <td class="text-center" >
                                                <a href="<?php echo base_url('Venta/Imprime')?>?id_venta=<?php echo base64_encode($venta -> id_venta);?>" class="btn ink-reaction btn-raised btn-sm btn-primary" target="_blank" >Imprimir</a>
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






