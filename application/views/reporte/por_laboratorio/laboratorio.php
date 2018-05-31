<script type="text/javascript">
$(document).ready(function(){

//
$('#id_prod').change(function(e) {
   $('#id_laboratorio').val( $(this).val() ) ;
   
    $.ajax({
		  data:  {'id_laboratorio' : $('#id_laboratorio').val()},
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

<input id="url_busca" name="url_busca" value="<?php echo base_url('Reporte/Busca_ventas_por_laboratorio');?>" type="hidden">


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
                            <input id="id_laboratorio" name="id_laboratorio" type="hidden" value="">
                                <label for="" style="font-size:14px; text-transform:uppercase; font-weight:bold" >Elije el laboratorio</label>
                                <select id="id_prod" name="id_prod" class="form-control input-lg input-lg" >
                                	<option value="" selected="selected"> SELECCIONAR </option>
                                   	<?php foreach($laboratorios as $laboratorio){?>
                                    <option value="<?php echo $laboratorio->id_laboratorio;?>"> <?php echo $laboratorio->descripcion; ?></option>
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