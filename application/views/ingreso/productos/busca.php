<script type="text/javascript">

$(document).ready(function(){
	
//id_laboratorio
$('#id_laboratorio').change(function(e) {
    $.ajax({
		data:  {"id_laboratorio" : $(this).val()},
        url:   $("#url_buscar_productos").val(),
        type:  'post',
		
		beforeSend: function () {
        $("#div_registrar").html("Procesando, espere por favor...");
        },

        success:  function (response) 
		{
        	$("#productos_lab").html(response);
        }
	});
});
// FIN id_laboratorio
});
</script>

<input name="url_buscar_productos" id="url_buscar_productos" type="hidden" value="<?php echo base_url('Ingreso/Busca_productos_lab'); ?>" />
<div id="base"><!-- BEGIN BASE-->
	<div id="content"><!-- BEGIN CONTENT-->

		<div class="col-lg-12"> <!-- col-lg-12 -->
			<form id="form_lab" class="form">
				<div class="card"> <!-- card -->
					<div class="card-head style-primary">
						<header><?php echo $titulo; ?></header>
                        
					</div>
					
                    <div class="card-body"> <!--card-body -->
		
                    	<div class="row">
							<div class="col-sm-6">
								
                                <div class="form-group">
									<label for="id_laboratorio" style="font-size:14px; text-transform:uppercase; font-weight:bold" >ELEGIR EL laboratorio</label>
                                   <select name="id_laboratorio" id="id_laboratorio" class="form-control input-lg">
                                   	<option>=ELEGIR=</option>
                                    <?php foreach($lista_lab as $lab){?>
                                    <option value="<?php echo $lab -> id_laboratorio; ?>"><?php echo $lab ->descripcion; ?></option>
                                    <?php }?>
                                   </select>
								</div>
                             
                             </div>
                            
						</div>

					</div><!--end .card-body -->
					
            	
                </div><!--end card -->
                   <div id="productos_lab"></div>         
        	</form>
            
     	</div>	<!-- fin col-lg-12 -->
         
	</div><!-- END CONTENT -->
    
   
    
</div><!-- FIN BEGIN BASE-->


