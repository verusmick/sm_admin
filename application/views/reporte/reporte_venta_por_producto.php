<script type="text/javascript">
$(document).ready(function(){

//
$('#id_prod').change(function(e) {
   $('#id_producto_laboratorio').val( $(this).val() ) ;
   
    $.ajax({
		  data:  {'id_producto_laboratorio' : $('#id_producto_laboratorio').val()},
		  url:   $("#url_busca").val(),
		  type:  'post',
		  beforeSend: function () {
			$("#div_reporte").html("Procesando, espere por favor...");
		  },
		  success:  function (response) {
			$("#div_reporte").html(response);
		  }
	});
});
//	
});
</script>

<input id="url_busca" name="url_busca" value="<?php echo base_url('Reporte/Busca_ventas_por_producto');?>" type="hidden">


<div id="base"><!-- TABLA-->
	<div id="content"><!-- BEGIN CONTENT-->
    	<div class="card"> <!-- card -->
	  		<div class="card-head style-primary">
	    		<header><?php echo $titulo; ?></header>
	  		</div>
        		<div class="card-body"> <!--card-body -->
          			<div class="row">
						<div class="col-lg-12">
							
                            <div class="form-group">
                            <input id="id_producto_laboratorio" name="id_producto_laboratorio" type="hidden" value="">
                                <label for="" style="font-size:14px; text-transform:uppercase; font-weight:bold" >Elije el tipo de reporte</label>
                                <select id="id_prod" name="id_prod" class="form-control input-lg input-lg" >
                                	<option value="" selected="selected"> SELECCIONAR </option>
                                   	<?php foreach($productos as $producto){?>
                                    <option value="<?php echo $producto->id_producto_laboratorio;?>"> <?php echo $producto->producto." ".$producto->concentrado." ".$producto->presentacion." ".$producto->clasificacion_terapeutica; ?></option>
                                    <?php }?>
                                </select>
							</div> 
                                
						</div>
                      
                        <div id="div_reporte" class="col-lg-12">div_reporte</div>
                	</div>
				</div>
		</div>
	</div>
</div>