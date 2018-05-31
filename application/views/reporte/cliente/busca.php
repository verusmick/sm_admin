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
	
});
//FIN Clientes

});
</script>

<input name="url_busca_cliente" id="url_busca_cliente" value="<?php echo base_url('Venta/Busca_Cliente'); ?>" type="hidden">
<input name="url_agrega" id="url_agrega" value="<?php echo base_url('Venta/Registra_venta'); ?>" type="hidden">
<input name="url_lista" id="url_lista" value="<?php echo base_url('Venta/Lista_venta'); ?>" type="hidden">


<div id="base"><!-- TABLA-->
	<div id="content"><!-- BEGIN CONTENT-->
    	<div class="card"> <!-- card -->
			<div class="card-head style-primary">
				<header><?php echo $titulo; ?></header>
			</div>
			
            <div class="card-body"> <!--card-body -->
            	<div class="row">
					<form id="form_registra" action="<?php echo base_url('Reporte/Resultado_ventas_cliente'); ?>" method="post">
                    <div class="col-lg-12">
                    
						<div class="col-sm-6"><!-- div_IZQUIERDA-->

                            <div class="form-group">
                            <label for="id_cliente" style="font-size:14px; text-transform:uppercase; font-weight:bold">Cliente</label>
                           	  <input id="id_cliente" name="id_cliente" class="form-control input-lg" onblur="javascript:this.value = this.value.toUpperCase()" type="hidden" readonly>
                                <input id="cliente" name="cliente" class="form-control input-lg" onblur="javascript:this.value = this.value.toUpperCase()"> 
                                <select id="clientes" name="clientes" class="form-control input-lg" size="10" multiple="MULTIPLE"> </select>
							</div>
                            
                            <div class="form-group">
                            <label for="estado" style="font-size:14px; text-transform:uppercase; font-weight:bold">TIPO</label>
                           	
                                <select id="estado" name="estado" class="form-control input-lg" > 
                                <option value="0">=ELEGIR=</option>
                                <option value="PENDIENTE">=PENDIENTE=</option>
                                <option value="CANCELADO">=CANCELADO=</option>

                                </select>
							</div>
                            	
                        </div>	<!-- div_IZQUIERDA-->
				
               
                       
					</div>
                    
                    <div class="modal-footer">
                      <button id="boton_siguiente" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#div_modal_guardar"><i class="fa fa-cogs"> BUSCAR</i></button>   
               </div> 
               </form> 
                </div>
                
                
              
			</div>
		</div>
	</div>
	
</div><!-- FIN TABLA-->


