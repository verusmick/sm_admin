<script type="text/javascript">
$(document).ready(function(){

///bt_busca
$('#bt_busca').click(function(e) {
	$.ajax({
		  data:  {'dato' : $('#dato').val()},
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

///bt_busca

//id_tipo_de_venta
$('#id_tipo_de_venta').change(function(e) {
   $.ajax({
		  data:  {'id_tipo_de_venta' : $('#id_tipo_de_venta').val()},
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
//id_tipo_de_venta
	
});
</script>

<input id="url_busca" name="url_busca" value="<?php echo base_url('Reporte/Productos_por_tipo_de_nota');?>" type="text">
<div id="base"><!-- TABLA-->
	<div id="content"><!-- BEGIN CONTENT-->
    	<div class="card"> <!-- card -->
	  		<div class="card-head style-primary">
	    		<header><?php echo $titulo; ?></header>
	  		</div>
        		<div class="card-body"> <!--card-body -->
          			<div class="row">
						<div class="col-lg-6">
							
                            <div class="form-group">
                                <label for="dato" style="font-size:14px; text-transform:uppercase; font-weight:bold" >Elije el tipo de reporte</label>
                                <select id="id_tipo_de_venta" name="id_tipo_de_venta" class="form-control input-lg input-lg">
                                	<option value="" selected="selected"> SELECCIONAR </option>
                                    <option value="1"> VENTA</option>
                                    <option value="2"> REPOSICION</option>
                                    <option value="3"> CONSIGNACION</option>
                                </select>
							</div> 
                                
						</div>
                      
                        <div id="div_reporte" class="col-lg-12">div_reporte</div>
                	</div>
				</div>
		</div>
	</div>
</div>