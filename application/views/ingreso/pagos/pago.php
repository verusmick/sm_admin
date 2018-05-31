<script type="text/javascript">

$(document).ready(function(){

//BOTON GUARDAR
$("#boton_guardar").click(function(e) {
	$.ajax({
    	data:  $("#form_ingreso").serialize(),
                url:   $("#url_registrar").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_registrar_datos").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_registrar_datos").html(response);
						//setTimeout(function() { window.location.href = $("#url_lista").val()}, 1500);
                }
	});
});
//FIN BOTON GUARDAR

//recorre array
$("#bt_agregar_pago[class='btn ink-reaction btn-raised btn-success']").click(function(e) {
    //alert($(this).val());
		var element = $(this).val().split('&&');
        var id = element[0].split('&&');
        //alert('Fecha formateada: '+id[2]+'/'+id[1]+'/'+id[0]);
	   
	   var element1 = $(this).val().split('&&');
       var pagar = element[1].split('&&');
      // alert('Fecha formateada: '+pagar[2]+'/'+pagar[1]+'/'+pagar[0]);
	 
	   var element2 = $(this).val().split('&&');
       var pagado = element[2].split('&&');
       //('Fecha formateada:'+pagado[2]+'/'+pagado[1]+'/'+pagado[0]);
	
	
	$('#id_nota_de_ingreso_productos').val(id[0]);
	$('#pagar').val(pagar[0]);
	$('#pagado').val(pagado[0]);

});
//recorre array

//calcula nuevo saldo
$('#monto_pago').blur(function(e) {
	var pagado = $('#pagado').val();
	var pagar = $('#pagar').val();
	var sum= pagado + pagar;
    $('#saldo').val( sum );
});
//FIN calcula nuevo saldo

//bt_agrega_pago
$('#bt_agrega_pago').click(function(e) {
	$.ajax({
    	data:  $("#form_agregar").serialize(),
                url:   $("#url_registrar").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_guarda_pago").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_guarda_pago").html(response);
						setTimeout(function() { window.location.href = $("#url_lista").val()}, 1500);
                }
	});
});
//FIN bt_agrega_pago

//bt_ver_pago
$("#bt_ver_pago[class='btn ink-reaction btn-raised btn-warning']").click(function(e) {
   $.ajax({
    	data:  {'id_nota_de_ingreso_productos' : $(this).val()},
		url:   $("#url_boletas").val(),
		type:  'post',
		beforeSend: function () {
				$("#div_busca_boletas").html("Procesando, espere por favor...");
		},
		success:  function (response) {
				$("#div_busca_boletas").html(response);
		}
	}); 
});
//FIN bt_ver_pago
});
</script>


<input name="url_registrar" id="url_registrar" type="hidden" value="<?php echo base_url('Ingreso/Registrar_pago'); ?>" />
<input name="url_boletas" id="url_boletas" type="hidden" value="<?php echo base_url('Ingreso/Busca_boletas'); ?>" />
<input name="url_lista" id="url_lista" type="hidden" value="<?php echo base_url('Ingreso/Nuevo_pago'); ?>" />


<div id="base"><!-- BEGIN BASE-->
	<div id="content"><!-- BEGIN CONTENT-->

		<div class="col-lg-12"> <!-- col-lg-12 -->
				<div class="card"> <!-- card -->
					<div class="card-head style-primary">
						<header><?php echo $titulo; ?></header>
					</div>
					
                    <div class="card-body"> <!--card-body -->
                    	<div class="row">
							
						<div class="table-responsive">
                <table id="datatable" class="table table-striped table-hover ">
                    <thead>
                        <tr style="font-size:15px; text-transform:uppercase; font-weight:bold" class="info" >
                            <th class="text-left" style="font-size:15px; text-transform:uppercase; font-weight:bold">NOTAS DE INGRESO</th>
                            <th class="text-left" style="font-size:15px; text-transform:uppercase; font-weight:bold"></th>
                                                        
                          <th class="text-left" style="font-size:15px; text-transform:uppercase; font-weight:bold">INGRESAR PAGO</th>
                          <th class="text-left" style="font-size:15px; text-transform:uppercase; font-weight:bold">VER PAGOS</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($notas as $nota){?>
                        <tr class="gradeX " style="font-size:15px; text-transform:uppercase; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif"  >
                            <td class=" text-left ">
                            <span style="color: #900; font-weight: bold;"><?php echo "LABORATORIO: "; ?></span>
                            <span style=" font-weight: bold;"> <?php echo $nota -> descripcion ,"<br>";?></span>
                            <span style="color: #900; font-weight: bold;"><?php echo "TIPO DE NOTA: "; ?></span>		
                            <span style=" font-weight: bold;"><?php echo $nota -> tipo_de_nota,"<br>";?></span> 
                            <span style="color: #900; font-weight: bold;"><?php echo "NUMERO DE LA NOTA: "; ?></span>        
                            <span style=" font-weight: bold;"><?php echo $nota -> numero_de_nota,"<br>";?></span>  
                            </td>
                            
                            <td class=" text-left ">
                            <span style="color: #900; font-weight: bold;"><?php echo "CANTIDAD DE PRODUCTOS: "; ?></span>
                            <span style=" font-weight: bold;"><?php echo $nota -> cantidad_de_productos,"<br>";?></span>
                            <span style="color: #900; font-weight: bold;"><?php echo "TOTAL A CANCELAR: "; ?></span>
                            <span style=" font-weight: bold;"><?php echo $nota -> total_a_pagar,"<br>";?></span>
                            <span style="color: #900; font-weight: bold;"><?php echo "PAGADO: "; ?></span>
                            <span style=" font-weight: bold;"><?php echo $nota -> pagado;?></span>
                            </td>
				
                            <td class=" text-left ">
                            <?php if ($nota -> pagado < $nota -> total_a_pagar){?>
                            <button id="bt_agregar_pago"  class="btn ink-reaction btn-raised btn-success" data-toggle="modal" data-target="#div_agrega_pago" value="<?php echo $nota -> id_nota_de_ingreso_productos;?> && <?php echo $nota -> total_a_pagar;?> && <?php echo $nota -> pagado;?>"><i class="fa fa-plus"> AGREGAR PAGO</i> </button>
<?php }?>
                            </td>
                            
                            <td class=" text-left ">
                            
                            <button id="bt_ver_pago"  class="btn ink-reaction btn-raised btn-warning" data-toggle="modal" data-target="#div_modal_pagos" value="<?php echo $nota -> id_nota_de_ingreso_productos;?> "><i class="fa fa-eye"> VER PAGOS</i> </button>
                            </td>
                        </tr>
                        
                        
                        <?php }?>
                    </tbody>
                </table>
			</div>
                    		
						</div>
						      
					</div><!--end .card-body -->
                </div><!--end card -->
                
     	</div>	<!-- fin col-lg-12 -->
				
	</div><!-- END CONTENT -->
</div><!-- FIN BEGIN BASE-->

<div class="modal fade" id="div_agrega_pago" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
	<div class="col-lg-12">
		<div id="div_guarda_pago"></div>
			<form id="form_agregar" class="form">
				<div class="card"> <!-- card -->
					<div class="card-head style-primary">
						<header><?php echo $titulo; ?></header>
					</div>
					
                    <div class="card-body"> <!--card-body -->
                    			
                    	<div class="row">
							
                    		<div class="col-sm-6">
								<div class="form-group">
                                <input id="id_nota_de_ingreso_productos" name="id_nota_de_ingreso_productos" value="0" type="hidden">
                                <input id="pagar" name="pagar"   value="" type="hidden" readonly>
                                <input id="pagado" name="pagado" value="" type="hidden" readonly>
                                
                                
                                
                                <label for="numero_pago" style="font-size:14px; text-transform:uppercase; font-weight:bold">numero de pago(boleta comprobante,etc)</label>
                                    <input type="text"  class="form-control input-lg" id="numero_pago" name="numero_pago">
								</div>
                                <div class="form-group">
                                  	<label for="monto_pago" style="font-size:14px; text-transform:uppercase; font-weight:bold">Monto del pago</label>
                                    <input type="number" step="any"  class="form-control input-lg" id="monto_pago" name="monto_pago">
								</div>
                                                            
						  </div>
						</div>
						 <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
                            <button id="bt_agrega_pago" type="button" class="btn btn-primary">GUARDAR PAGO</button>
                        </div>     
					</div><!--end .card-body -->
					
                </div><!--end card -->
                            
        	</form>
		
	</div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="div_modal_pagos" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
	<div class="col-lg-12">
		<div class="card"> <!-- card -->
        	<div class="modal-header">
				<button type="button" class="btn ink-reaction btn-icon-toggle btn-primary" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i>  CERRAR</button>
			</div>
				<div class="card-head style-primary">
					<header>PAGOS DE NOTA DE INGRESO</header>
				</div>
					
               <div class="card-body"> <!--card-body -->
               		<div class="row">
                		<div id="div_busca_boletas">Procesando.....</div>
                	</div>
				</div>
        </div>
    </div>
</div>