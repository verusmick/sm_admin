<script type="text/javascript">
$(document).ready(function(){
	
$("#bt_recibo[class='btn ink-reaction btn-raised btn-sm btn-success']").click(function(e) {
    alert( $(this).val() );
	var element = $(this).val().split('&&');
    var id_venta = element[0].split('&&');
	
	var element1 = $(this).val().split('&&');
    var total_a_pagar_descuento = element1[1].split('&&');
	
	$('#id_venta_recibo').val(id_venta[0]);
	$('#total_a_pagar_descuento').val(total_a_pagar_descuento[0]);
	$('#recibo_no').val('');
	$('#monto_depositado').val('');
	
});

//bot_guardar_recibo
$('#bot_guardar_recibo').click(function(e) {
  
  $('button').hide(1000);
  $.ajax({
    	data:  $("#form_datos_recibo").serialize(),
                url:   $("#url_recibo").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_registrar").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_registrar").html(response);
						setTimeout(function() { window.location.href = $("#url_lista").val()}, 1500);
                }
	});  
});
//bot_guardar_recibo

//bt_recibos
$("#bt_recibos[class='btn ink-reaction btn-raised btn-sm btn-info']").click(function(e) {
	$.ajax({
    	data:  {'id_venta' : $(this).val()},
		url:   $("#url_busca_recibo").val(),
		type:  'post',
		beforeSend: function () {
				$("#div_datos_recibos").html("Procesando, espere por favor...");
		},
		success:  function (response) {
				$("#div_datos_recibos").html(response);
				
		}
	}); 
});
//bt_recibos

//bt_factura
$("#bt_factura[class='btn ink-reaction btn-raised btn-sm btn-warning']").click(function(e) {
	$('#id_venta_factura').val( $(this).val() );
});
//bt_factura

//bt_agrega_factura
$('#bt_agrega_factura').click(function(e) {
    	
	$.ajax({
    	data:  $('#form_factura').serialize(),
		url:   $("#url_factura").val(),
		type:  'post',
		beforeSend: function () {
				$("#div_datos_factura").html("Procesando, espere por favor...");
		},
		success:  function (response) {
				$("#div_datos_factura").html(response);
				setTimeout(function() { window.location.href = $("#url_lista").val()}, 1500);
		}
	}); 
});
//bt_agrega_factura

//bt_ver_productos
$("#bt_ver_productos[class='btn btn-block ink-reaction btn-accent-light']").click(function(e) {
	alert();
});
//bt_ver_productos

});
</script>

<input id="url_recibo" name="url_recibo" type="text" value="<?php echo base_url('Recibo/Agrega_recibo');?>">
<input id="url_factura" name="url_factura" type="text" value="<?php echo base_url('Recibo/Agrega_factura');?>">
<input id="url_busca_recibo" name="url_busca_recibo" type="text" value="<?php echo base_url('Recibo/Busca_recibos');?>">
<input id="url_lista" name="url_lista" type="text" value="<?php echo base_url('Recibo/Lista_venta');?>">

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
												<th width="180" class="text-left" style="font-size:14px; text-transform:uppercase; font-weight:bold; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">DATOS GENERALES</th>
                                                
                                                <th width="180" class="text-left" style="font-size:14px; text-transform:uppercase; font-weight:bold; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"></th>
                                                
                                                <th width="180" class="text-left" style="font-size:14px; text-transform:uppercase; font-weight:bold; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"></th>
												
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
												<span style="color: #900; font-weight: bold;"><?php echo "TIPO Y NÚMERO DE NOTA: "; ?></span>
												<span style=" font-weight: bold;"><?php echo $venta -> descripcion."-".$venta -> numero_de_nota,"<br>" ;?></span>
                                                
                                                <span style="color: #900; font-weight: bold;"><?php echo "ORDEN DE COMPRA: "; ?></span>
												<span style=" font-weight: bold;"><?php echo $venta -> no_orden_compra,"<br>" ;?></span>
                                                
                                                <span style="color: #900; font-weight: bold;"><?php echo "FACTURA: "; ?></span>
												<span style=" font-weight: bold;"><?php echo $venta -> no_factura,"<br>" ;?></span>
                                                
												
                                                        
                                                     
												</td>
                                                
                                                <td class="text-left" style="font-size:14px">
                                                	<span style="color: #900; font-weight: bold;"><?php echo "FECHA DE VENTA: "; ?></span>
                                                    <span style=" font-weight: bold;"><?php echo $venta -> fecha_de_venta,"<br>" ; ?></span>	
                                                
                                                    <span style="color: #900; font-weight: bold;"><?php echo "CLIENTE: "; ?></span>
                                                    <span style=" font-weight: bold;"><?php echo $venta -> tipo." ".$venta -> razon_social,"<br>" ; ?></span>
                                                    
                                                    <span style="color: #900; font-weight: bold;"><?php echo "VENDEDOR: "; ?></span>        
       	                                         	<span style=" font-weight: bold;"><?php echo $venta -> nombres." ".$venta -> paterno." ".$venta -> materno,"<br>" ; ?></span>
                                                </td>
                                                
                                                <td class="text-left" style="font-size:14px">
                                                	<span style="color: #900; font-weight: bold;"><?php echo "TOTAL A PAGAR: "; ?></span>        
                                                    <span style=" font-weight: bold;"><?php echo $venta -> total_a_pagar_descuento,"<br>" ; ?></span>
                                                    
                                                    <span style="color: #900; font-weight: bold;"><?php echo "SALDO: "; ?></span>        
                                                    <span style=" font-weight: bold;"><?php echo $venta -> saldo,"<br>" ; ?></span>
                                       
                                                    <span style="color: #900; font-weight: bold;"><?php echo "ESTADO: "; ?></span>
                                                     <span style=" font-weight: bold;">
														<?php echo $estado = $venta -> estado,"<br>" ; 
                                                        if($estado == "ANULADO"){
                                                            $est="disabled";
                                                        }
                                                        else
                                                        {
                                                            if($estado == "CANCELADO")
                                                            {
                                                                $est="disabled";
                                                            }
                                                            else
                                                            {
                                                                $est="";
                                                            }
                                                        }
                                                        ?>
                                                	</span>  
                                                </td>
                                         
                                              
                                                
                                                <td class="text-center" >
                                                	<button id="bt_recibo" class="btn ink-reaction btn-raised btn-sm btn-success" data-toggle="modal" data-target="#div_factura" value="<?php echo $venta -> id_venta;?>&&<?php echo $venta -> total_a_pagar_descuento;?>"  <?php echo $est;?>>Agregar Recibo</button>
                                                </td>
                                                
                                                <td class="text-center" >
                                                	<button id="bt_recibos" class="btn ink-reaction btn-raised btn-sm btn-info" data-toggle="modal" data-target="#div_busca_recibos" value="<?php echo $venta -> id_venta;?>">Ver Recibos</button>
                                                </td>
                                                
                                                <td class="text-center" >
                                                	<button id="bt_factura" data-toggle="modal" data-target="#div_agrega_factura" class="btn ink-reaction btn-raised btn-sm btn-warning" value="<?php echo $venta -> id_venta;?>">Agregar Factura</button>
                                                </td>
                                                
                                                <td class="text-center" >
                                                	<a href="<?php echo base_url('Venta/Imprime')?>?id_venta=<?php echo base64_encode($venta -> id_venta);?>" class="btn btn-block ink-reaction btn-accent-light" target="_blank" <?php echo $est;?>>Ver Productos</a>
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
<div class="modal fade" id="div_factura" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
	<div class="col-lg-12">
     
		<div class="modal-content">
			<div class="modal-header">
            
				<button type="button" class="btn ink-reaction btn-icon-toggle btn-primary" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i>  CERRAR</button>
                <div id="div_registrar"></div><!-- div registra -->
			</div>
            <div id="div_busca"> </div>
			<div class="modal-body">
				<form id="form_datos_recibo" class="form">
                    <div class="card-body"> <!--card-body -->
                    	<div class="row">
							<div class="col-lg-6">
                                <div class="form-group">
                                <label for="recibo_no" style="font-size:14px; text-transform:uppercase; font-weight:bold"> No recibo </label>
                                <input name="recibo_no" id="recibo_no" class="form-control input-lg" type="" value="" />
                                <input name="id_venta_recibo" id="id_venta_recibo" class="form-control input-lg" type="hidden" value="" />
                                <input name="total_a_pagar_descuento" id="total_a_pagar_descuento" class="form-control input-lg" type="hidden" value="" />
                                
							  	</div>
                                
                                <div class="form-group">
                                <label for="monto_depositado" style="font-size:14px; text-transform:uppercase; font-weight:bold"> Monto a ingresar </label>
                                <input name="monto_depositado" id="monto_depositado" class="form-control input-lg" type="number" step="any" value="" />
							  	</div>
                              </div>
                              
                              <div class="col-lg-6">
                                
                                <div class="form-group">
                                <label for="entrega_el_funcionario" style="font-size:14px; text-transform:uppercase; font-weight:bold">Entregado por </label>
                               	<select name="entrega_el_funcionario" id="entrega_el_funcionario" class="form-control input-lg" >
                                	<option>=ELEGIR=</option>
									<?php foreach($lista_funcionario as $funcionario){?>
                                    <option value="<?php echo $funcionario->id_funcionario;?>"> <?php echo $funcionario->nombres." ".$funcionario->paterno." ".$funcionario->materno;?> </option>
                                    <?php }?>
                                </select>
							  	</div>
                                
                                <div class="form-group">
                                <label for="observaciones" style="font-size:14px; text-transform:uppercase; font-weight:bold"> Observaciones </label>
                                <textarea name="observaciones" id="observaciones" class="form-control input-lg" ></textarea>
                               
							  	</div>
                              </div>
                              
						</div>
					</div><!--end .card-body -->
        		</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
				<button id="bot_guardar_recibo" type="button" class="btn btn-primary">GUARDAR DATOS</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END div_mod_lab -->

<!-- div_mod_lab -->
<div class="modal fade" id="div_busca_recibos" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
	<div class="col-lg-12">
     
		<div class="modal-content">
			<div class="modal-header">
            
				<button type="button" class="btn ink-reaction btn-icon-toggle btn-primary" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i>  CERRAR</button>
			</div>
            <div id="div_busca"> </div>
			<div class="modal-body">
				
                    <div class="card-body"> <!--card-body -->
                    	<div id="div_datos_recibos" class="row">
							
                              
                              
                              
						</div>
					</div><!--end .card-body -->
        		
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END div_mod_lab -->

<!-- div_mod_lab -->
<div class="modal fade" id="div_agrega_factura" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
	<div class="col-lg-12">
		
			<form id="form_factura" class="form">
				<div class="card"> <!-- card -->
					<div class="card-head style-primary">
						<header>AGREGAR FACTURA</header>
                        <div id="div_datos_factura"> 5555 </div><!-- div factura  -->
					</div>
					
                    <div class="card-body"> <!--card-body -->
                    			
                    	<div class="row">
							<div class="col-sm-6">
                             	<div class="form-group">
                                	<input class="form-control input-lg" id="id_venta_factura" name="id_venta_factura" type="hidden">
                                    <input  class="form-control input-lg" id="factura" name="factura">
                                    <label for="factura" style="font-size:14px; text-transform:uppercase; font-weight:bold">factura</label>
                                </div>                            
                                
							</div>
						</div>
                        
						 <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button id="bt_agrega_factura" type="button" class="btn btn-primary">GUARDAR FACTURA</button>
                        </div>     
					</div><!--end .card-body -->
					
                </div><!--end card -->
                            
        	</form>
		
	</div>
</div><!-- /.modal -->

<!-- END -->










