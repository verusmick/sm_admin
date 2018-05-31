<script type="text/javascript">
$(document).ready(function(){

//bt_quitar
$("#bt_quitar[class='btn ink-reaction btn-floating-action btn-danger']").click(function(e) {
    
	var element = $(this).val().split('&&');
    var id_producto_vendido = element[0].split('&&');
       
	var element1 = $(this).val().split('&&');
    var cantidad = element[1].split('&&');
     
	var element2 = $(this).val().split('&&');
    var id_producto_venta = element[2].split('&&');
	
	var element3 = $(this).val().split('&&');
    var id_venta = element[3].split('&&');
	   
	$('#id_producto_vendido').val(id_producto_vendido[0]);
	$('#cantidad').val(cantidad[0]);
	$('#id_producto_venta').val(id_producto_venta[0]);
	$('#id_venta').val(id_venta[0]);
	
	$.ajax({
                data:  $('#form_elimina').serialize(),
                url:   $("#url_elimina").val(),
                type:  'post',
                success:  function (response) {
                	$("#div_elimina").html(response);
					window.close();
	           }
	});
});
//bt_quitar
});
</script>

<div id="div_elimina"></div>
<input id="url_elimina" name="url_elimina" value="<?php echo base_url('Venta/Elimina_producto');?>" type="hidden">

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
						<table id="datatablwe" class="table table-striped table-hover">
										<thead>
											<tr>
												<th width="180" class="text-left" style="font-size:14px; text-transform:uppercase; font-weight:bold; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">Producto</th>
												<th width="69" class="text-left" style="font-size:14px; text-transform:uppercase; font-weight:bold">Precio</th>
                                                <th width="91" class="text-left" style="font-size:14px; text-transform:uppercase; font-weight:bold">Cantidad</th>
                                                <th width="91" class="text-left" style="font-size:14px; text-transform:uppercase; font-weight:bold">Total</th>
                                                <th width="91" class="text-left" style="font-size:14px; text-transform:uppercase; font-weight:bold">Quitar</th>
                                                
											</tr>
                                            
										</thead>
                                        
										
                          <tbody>
                                        	
											<?php foreach ($productos as $prod ){?>
                                            <tr class="gradeX" style="font-size:14px; text-transform:uppercase; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">
												
												<td class="text-left" style="font-size:14px"><?php echo $prod -> producto." ".$prod ->concentrado; ?></td>
                                                <td class="text-left" > <?php echo $prod -> precio; ?> </td>
                                                <td class="text-left" > <?php echo $prod -> cantidad; ?> </td>
                                                <td class="text-left" > <?php echo $prod -> total; ?> </td>
                                                <td class="text-left" > <button id="bt_quitar" name="bt_quitar" type="button" class="btn ink-reaction btn-floating-action btn-danger" value="<?php echo $prod -> id_producto_vendido; ?>&&<?php echo $prod -> cantidad; ?>&&<?php echo $prod -> id_producto_venta; ?>&&<?php echo $prod -> id_venta; ?>"><i class="fa fa-close"></i></button> </td>
                                 				
											</tr>
                                            <?php }?>
                                       
						  </tbody>
                                        
                                       
								   </table>
									<form id="form_elimina">
									  <input type="hidden" name="id_producto_vendido" id="id_producto_vendido" value="">
                                      
                                      <input type="hidden" name="id_venta" id="id_venta" value="">
                                      
									  <input type="hidden" name="id_producto_venta" id="id_producto_venta" value="">
									
									  <input type="hidden" name="cantidad" id="cantidad" value="">
									</form>
							   </div> 
					</div>
                </div>
			</div>
		</div>
	</div>
	
</div>