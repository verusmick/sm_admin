<script type="text/javascript">

$(document).ready(function(){
$("#fecha_de_vencimiento").mask("99/9999");


//BOTON GUARDAR
$("#bt_guardar_producto").click(function(e) {
	//alert($("#form_producto").serialize());
	
	$.ajax({
    	data:  $("#form_producto").serialize(),
        url:   $("#url_modificar").val(),
        type:  'post',
        beforeSend: function () {
        $("#div_modificar").html("Procesando, espere por favor...");
        },
        success:  function (response) {
        $("#div_modificar").html(response);
	
        }
	});
});
//FIN BOTON GUARDAR

});
</script>

<div id="base"><!-- BEGIN BASE-->
	<div id="content"><!-- BEGIN CONTENT-->

		<div class="col-lg-12"> <!-- col-lg-12 -->
			<form id="form_producto" class="form">
            <div id="div_modificar"></div>
            	<input name="id_producto_venta" id="id_producto_venta" value="<?php echo $prod ->id_producto_venta; ?>" type="hidden">
                <input name="url_modificar" id="url_modificar" type="hidden" value="<?php echo base_url('Ingreso/Modifica_datos_producto'); ?>" />
				<div class="card"> <!-- card -->
					<div class="card-head style-primary">
						<header><?php echo $titulo; ?></header>
					</div>
					
                    <div class="card-body"> <!--card-body -->
		
                    	<div class="row">
							<div class="col-sm-6"><!--columna izq -->
								
                                <div class="form-group">
									<label for="producto" style="font-size:14px; text-transform:uppercase; font-weight:bold">producto</label>
                                    <input type="text" class="form-control input-lg" id="" name="" value="<?php echo $prod ->producto." : ".$prod ->concentrado." : ".$prod ->presentacion." : ".$prod ->clasificacion_terapeutica; ?>" readonly>
								</div>
                                
                                <div class="form-group">
									<label for="no_de_lote" style="font-size:14px; text-transform:uppercase; font-weight:bold">LOTE</label>
                                    <input type="text" class="form-control input-lg" id="no_de_lote" name="no_de_lote" value="<?php echo $prod ->no_de_lote; ?>" >
								</div>
                                
                                <div class="form-group">
									<label for="registro_sanitario" style="font-size:14px; text-transform:uppercase; font-weight:bold">registro sanitario</label>
                                    <input type="text" class="form-control input-lg" id="registro_sanitario" name="registro_sanitario" value="<?php echo $prod ->registro_sanitario; ?>" >
								</div>
                                
                                <div class="form-group">
									<label for="fecha_de_vencimiento" style="font-size:14px; text-transform:uppercase; font-weight:bold">fecha_de_vencimiento</label>
                                    <input type="text" class="form-control input-lg" id="fecha_de_vencimiento" name="fecha_de_vencimiento" value="<?php echo $prod ->fecha_de_vencimiento; ?>" >
								</div>
                                
                                <div class="form-group">
									<label for="unidades_ingresadas" style="font-size:14px; text-transform:uppercase; font-weight:bold">unidades ingresadas</label>
                                    <input type="text" class="form-control input-lg" id="unidades_ingresadas" name="unidades_ingresadas" value="<?php echo $prod ->unidades_ingresadas; ?>" readonly >
								</div>
                                
                                <div class="form-group">
									<label for="precio_de_ingreso_unitario" style="font-size:14px; text-transform:uppercase; font-weight:bold">precio ingreso unitario</label>
                                    <input type="text" class="form-control input-lg" id="precio_de_ingreso_unitario" name="precio_de_ingreso_unitario" value="<?php echo $prod ->precio_de_ingreso_unitario; ?>" readonly >
								</div>
                                
                                <div class="form-group">
									<label for="precio_de_ingreso_total" style="font-size:14px; text-transform:uppercase; font-weight:bold">precio de ingreso total</label>
                                    <input type="text" class="form-control input-lg" id="precio_de_ingreso_total" name="precio_de_ingreso_total" value="<?php echo $prod ->precio_de_ingreso_total; ?>" readonly>
								</div>
                                
                          <div class="form-group">
							<label for="observaciones_ingreso" style="font-size:14px; text-transform:uppercase; font-weight:bold">observaciones_ingreso</label>
                              <textarea type="text" class="form-control input-lg" id="observaciones_ingreso" name="observaciones_ingreso" > <?php echo $prod ->observaciones_ingreso; ?> </textarea>
							</div>
                                
                                <div class="form-group">
									<label for="fecha_de_registro" style="font-size:14px; text-transform:uppercase; font-weight:bold">fecha_de_registro</label>
                                    <input type="date" class="form-control input-lg" id="fecha_de_registro" name="fecha_de_registro" value="<?php echo $prod ->fecha_de_registro; ?>" readonly >
								</div>
         
							</div><!--fin columna izq -->
                            
                           	<div class="col-sm-6"><!--columna derecha -->
                            
                            <div class="form-group">
                                <label for="fecha_de_revision" style="font-size:14px; text-transform:uppercase; font-weight:bold">fecha_de_revision</label>
                                <input type="date" class="form-control input-lg" id="fecha_de_revision" name="fecha_de_revision" value="<?php echo $prod ->fecha_de_revision; ?>" readonly >
							</div>
                            <div class="form-group">
                                <label for="unidades_optimas" style="font-size:14px; text-transform:uppercase; font-weight:bold">unidades_optimas</label>
                                <input type="number" step="any" class="form-control input-lg" id="unidades_optimas" name="unidades_optimas" value="<?php echo $prod ->unidades_optimas; ?>" readonly>
							</div>
                            <div class="form-group">
                                <label for="unidades_defectuosas" style="font-size:14px; text-transform:uppercase; font-weight:bold">unidades_defectuosas</label>
                                <input type="number" step="any" class="form-control input-lg" id="unidades_defectuosas" name="unidades_defectuosas" value="<?php echo $prod ->unidades_defectuosas; ?>" readonly >
							</div>
                            <div class="form-group">
                                <label for="cantidad_a_la_venta" style="font-size:14px; text-transform:uppercase; font-weight:bold">cantidad_a_la_venta</label>
                                <input type="number" step="any" class="form-control input-lg" id="cantidad_a_la_venta" name="cantidad_a_la_venta" value="<?php echo $prod ->cantidad_a_la_venta; ?>" readonly>
							</div>
                            <div class="form-group">
                                <label for="precio_instituciones" style="font-size:14px; text-transform:uppercase; font-weight:bold">precio_instituciones</label>
                                <input type="number" step="any" class="form-control input-lg" id="precio_instituciones" name="precio_instituciones" value="<?php echo $prod ->precio_instituciones; ?>" >
							</div>
                            <div class="form-group">
                                <label for="precio_distribuidora" style="font-size:14px; text-transform:uppercase; font-weight:bold">precio_distribuidora</label>
                                <input type="number" step="any" class="form-control input-lg" id="unidades_defectuosas" name="precio_distribuidora" value="<?php echo $prod ->precio_distribuidora; ?>" >
							</div>
                            <div class="form-group">
                                <label for="precio_farmacia" style="font-size:14px; text-transform:uppercase; font-weight:bold">precio_farmacia</label>
                                <input type="number" step="any" class="form-control input-lg" id="precio_farmacia" name="precio_farmacia" value="<?php echo $prod ->precio_farmacia; ?>" >
							</div>
                          
                            </div><!--FIN columna derecha -->
						</div>
						    
                    <div class="modal-footer">
                    
                      <button id="bt_guardar_producto" name="bt_guardar_producto" type="button" class="btn ink-reaction btn-raised btn-primary" ><i class="md md-system-update-tv"> GUARDAR CAMBIOS</i></button>
                       
                	</div> <!-- fin boton formulario -->  
					</div><!--end .card-body -->
					
            	
                </div><!--end card -->
                            
        	</form>
     	</div>	<!-- fin col-lg-12 -->
        
	</div><!-- END CONTENT -->
</div><!-- FIN BEGIN BASE-->

