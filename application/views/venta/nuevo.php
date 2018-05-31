<script type="text/javascript">
$(document).ready(function(){
//cliente
$('#cliente').keyup(function(e) {
	$.ajax({
                data:  {'cliente' : $(this).val()},
                url:   $("#url_busca_cliente").val(),
                type:  'post',
                success:  function (response) {
                	$("#clientes").html(response);
	           }
	});
});
//FIN cliente

//Clientes
$("#clientes").click(function(e) {
	$('#cliente').val( $('#clientes option:selected').text());
	$('#id_cliente').val( $(this).val() );
	
	//verifica si no tiene deudas
	$.ajax({
                data:  {'id_cliente' : $('#id_cliente').val()},
                url:   $("#url_busca_deuda").val(),
                type:  'post',
                success:  function (response) {
                	$("#div_deudas").html(response);
	           }
	});
	
	//
	
});
//FIN Clientes

//boton_guardar
$('#boton_guardar').click(function(e) {
	$.ajax({
		  data:  $("#form_registra").serialize(),
		  url:   $("#url_agrega").val(),
		  type:  'post',
		  beforeSend: function () {
				  $("#div_registra_nota").html("Procesando, espere por favor...");
		  },
		  success:  function (response) {
				  $("#div_registra_nota").html(response);
				  $('button').hide();
				  setTimeout(function() { window.location.href = $("#url_lista").val()}, 1500);
		 }
	});   
});
//FIN boton_guardar
});
</script>

<input name="url_busca_cliente" id="url_busca_cliente" value="<?php echo base_url('Venta/Busca_Cliente'); ?>" type="hidden">
<input name="url_busca_deuda" id="url_busca_deuda" value="<?php echo base_url('Venta/Busca_deuda_cliente'); ?>" type="hidden">
<input name="url_agrega" id="url_agrega" value="<?php echo base_url('Venta/Registra_venta'); ?>" type="hidden">
<input name="url_lista" id="url_lista" value="<?php echo base_url('Venta/Lista_venta'); ?>" type="hidden">

<form id="form_registra">
<div id="base"><!-- TABLA-->
	<div id="content"><!-- BEGIN CONTENT-->
    	<div class="card"> <!-- card -->
			<div class="card-head style-primary">
				<header><?php echo $titulo; ?></header>
			</div>
			
            <div class="card-body"> <!--card-body -->
            	<div class="row">
					<div class="col-lg-12">
                    
						<div class="col-sm-6"><!-- div_IZQUIERDA-->
                        
							<div class="form-group">
                            <label for="id_tipo_de_venta" style="font-size:14px; text-transform:uppercase; font-weight:bold" >tipo de venta</label>
                                <select name="id_tipo_de_venta" id="id_tipo_de_venta" class="form-control input-lg">
                                <option>=ELEGIR=</option>
                                    <?php foreach ($tipos as $tipo){?>
                                    <option value="<?php echo $tipo ->id_tipo_de_venta;?>"><?php echo $tipo ->descripcion;?></option>
                                    
                                    <?php }?>
                                </select>
							</div>
                            
                            <div class="form-group">
                            <label for="no_orden_compra" style="font-size:14px; text-transform:uppercase; font-weight:bold">no_orden_compra</label>
                            	<input id="no_orden_compra" name="no_orden_compra" class="form-control input-lg" onblur="javascript:this.value = this.value.toUpperCase()" type="text"> 
							</div>
                            
                            <div class="form-group">
                            <label for="id_cliente" style="font-size:14px; text-transform:uppercase; font-weight:bold">Cliente</label>
                           	  
                                <input id="cliente" name="cliente" class="form-control input-lg" onblur="javascript:this.value = this.value.toUpperCase()"> 
                                <select id="clientes" name="clientes" class="form-control input-lg" size="10" multiple="MULTIPLE"> </select>
							</div>
                            
                            <div class="form-group">
                            <label for="vendedor" style="font-size:14px; text-transform:uppercase; font-weight:bold">vendedor</label>
                           	
                                <select id="vendedor" name="vendedor" class="form-control input-lg" > 
                                <option value="0">=ELEGIR=</option>
								<?php foreach ($lista_vendedor as $vendedor){?>
                                	
                                    <option value="<?php echo $vendedor -> id_funcionario;?>"> <?php echo $vendedor -> nombres." ".$vendedor -> paterno." ".$vendedor -> materno ;?> </option>
                                <?php }?>
                                </select>
							</div>
                            	
                        </div>	<!-- div_IZQUIERDA-->
                        
                        <div class="col-sm-6"><!-- DERECHA-->
                        
							<div class="form-group">
                            <label for="tipo_de_pago" style="font-size:14px; text-transform:uppercase; font-weight:bold" >tipo_de_pago</label>
                                <select name="tipo_de_pago" id="tipo_de_pago" class="form-control input-lg">
                                    <option selected="selected">=ELEGIR=</option>
                                    <option value="1">CREDITO</option>
                                    <option value="2">CONTADO</option>
                                </select>
							</div>
                            
                            <div class="form-group">
                            <label for="observaciones" style="font-size:14px; text-transform:uppercase; font-weight:bold" >tipo_de_pago</label>
                               <textarea id="observaciones" name="observaciones" class="form-control input-lg" onblur="javascript:this.value = this.value.toUpperCase()"> NINGUNA</textarea>
							</div>
                            
                            
                        </div>	<!-- DERECHA-->
                       
					</div>
                </div>
                
                <div class="modal-footer">
                      <button id="boton_siguiente" type="button" class="btn btn-primary" data-toggle="modal" data-target="#div_modal_guardar"><i class="fa fa-cogs"> SIGUIENTE</i></button>   
               </div> <!-- fin boton formulario -->
               <div id="div_registra_nota"></div>
               <div id="div_deudas"></div>
               
               <input id="id_cliente" name="id_cliente" class="form-control input-lg" value="444s"  type="hidden">
               
			</div>
		</div>
	</div>
	
</div><!-- FIN TABLA-->



<!-- div_modal_guardar -->
<div class="modal fade" id="div_modal_guardar" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        <div class="modal-content">
        	<div class="card"> <!-- card -->
				 <button type="button" class="btn ink-reaction btn-icon-toggle btn-primary" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i>  CERRAR</button>
                <div class="card-head style-primary">
					<header><?php echo $titulo; ?></header>
				</div>
               
             </div>
			<div class="modal-body">
				<p>VAS A GUARDAR LA INFORMACION?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="md md-save"> CANCELAR</i></button>
				<button id="boton_guardar" type="button" class="btn btn-success" data-dismiss="modal"><i class="md md-save"> GUARDAR</i></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- fin div_modal_guardar -->
</form> 