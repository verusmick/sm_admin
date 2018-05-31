<script type="text/javascript">

$(document).ready(function(){
function cargar(){
    $.ajax({
		data:  {"id_nota_de_ingreso_productos" : $('#id_nota_de_ingreso_productos').val()},
        url:   $("#url_buscar_productos").val(),
        type:  'post',

        success:  function (response) 
		{
        	$("#div_productos").html(response);
			//setTimeout(function() { window.location.href = $("#url_lista").val()}, 1500);
        }
	});
}
 setInterval(cargar, 2000);
});
</script>


<input name="id_nota_de_ingreso_productos" id="id_nota_de_ingreso_productos" type="hidden" value="<?php echo $nota_ingreso -> id_nota_de_ingreso_productos; ?>" class="form-control input-lg" />
<input name="url_buscar_productos" id="url_buscar_productos" type="hidden" value="<?php echo base_url('Ingreso/Busca_productos_nota'); ?>" />
<div id="base"><!-- BEGIN BASE-->
	<div id="content"><!-- BEGIN CONTENT-->

		<div class="col-lg-12"> <!-- col-lg-12 -->
			<form id="form_ingreso" class="form">
				<div class="card"> <!-- card -->
					<div class="card-head style-primary">
						<header><?php echo $titulo." - "."CODIGO -".$nota_ingreso -> id_nota_de_ingreso_productos; ?></header>
                        
					</div>
					
                    <div class="card-body"> <!--card-body -->
		
                    	<div class="row">
							<div class="col-sm-6">
								
                                <div class="form-group">
									<label for="razon_social" style="font-size:14px; text-transform:uppercase; font-weight:bold" >laboratorio</label>
                                   <input class="form-control input-lg" id="descripcion" name="descripcion" value="<?php echo $nota_ingreso -> descripcion;?>" readonly>
								</div>
                                
                                <div class="form-group">
									<label for="razon_social" style="font-size:14px; text-transform:uppercase; font-weight:bold" >tipo</label>
                                   <input class="form-control input-lg" id="descripcion" name="descripcion" value="<?php echo $nota_ingreso -> tipo_de_nota;?>" readonly>
								</div>
                                 
                                 <div class="form-group">
									<label for="razon_social" style="font-size:14px; text-transform:uppercase; font-weight:bold" >numero de documento</label>
                                   <input class="form-control input-lg" id="descripcion" name="descripcion" value="<?php echo $nota_ingreso -> numero_de_nota;?>" readonly>
								 </div>

							</div>
                            
                            <div class="col-sm-6">
								                                 
                                 <div class="form-group">
									<label for="razon_social" style="font-size:14px; text-transform:uppercase; font-weight:bold" >fecha de la nota</label>
                                   <input class="form-control input-lg" id="descripcion" name="descripcion" value="<?php echo $nota_ingreso -> fecha_de_la_nota;?>" readonly>
								 </div>
                                 
                                 <div class="form-group">
									<label for="razon_social" style="font-size:14px; text-transform:uppercase; font-weight:bold" >cantidad de productos</label>
                                   <input class="form-control input-lg" id="descripcion" name="descripcion" value="<?php echo $nota_ingreso -> cantidad_de_productos;?>" readonly>
								 </div>
                                 
                                 <div class="form-group">
									<label for="razon_social" style="font-size:14px; text-transform:uppercase; font-weight:bold" >total a pagar</label>
                                   <input class="form-control input-lg" id="descripcion" name="descripcion" value="<?php echo $nota_ingreso -> total_a_pagar;?>" readonly>
								 </div>

							</div>
                    		
						</div>

					</div><!--end .card-body -->
					
            	
                </div><!--end card -->
                            
        	</form>

		<div id="div_productos"> Cargando productos, espere porfavor....... </div>         
           
     	</div>	<!-- fin col-lg-12 -->
        
       

        
	</div><!-- END CONTENT -->
</div><!-- FIN BEGIN BASE-->
