<!doctype html>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/bootstrap.css?1422792965') ?> " />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/materialadmin.css?1425466319') ?> " />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/font-awesome.min.css?1422529194') ?> " />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/material-design-iconic-font.min.css?1421434286') ?> " />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/libs/toastr/toastr.css?1425466569') ?> " />
      	<link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/libs/nestable/nestable.css?1423393667') ?>" />
        
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989') ?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990') ?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990') ?>" />
        
        <script src="<?php echo base_url('publico/plantilla/assets/js/libs/jquery/jquery-1.11.2.min.js') ?> "></script>
		<script src="<?php echo base_url('publico/plantilla/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js') ?> "></script>
        
<script type="text/javascript">
$(document).ready(function(){
	
$('#unidades_defectuosas').blur(function(e) {
    $('#cantidad_a_la_venta').val( $('#unidades_optimas').val() - $('#unidades_defectuosas').val());
});

$('#bt_guardar').click(function(e) {
    $.ajax({
		data:	$('#form_producto').serialize(),
        url:   	$("#url_modifica_producto").val(),
        type:  'post',
        beforeSend: function () 
		{
        	$("#div_modifica").html("Procesando, espere por favor...");
        },
        success:  function (response) 
		{
        	$("#div_modifica").html(response);
			window.close();
        }
	});
	
});

});	
</script>
<meta charset="utf-8">
<title>REVISA EL PRODUCTO</title>
</head>

<body>
<div id="div_modifica"> </div>
<div id="base"><!-- BEGIN BASE-->
	<div id="content"><!-- BEGIN CONTENT-->
 <input name="url_modifica_producto" id="url_modifica_producto" value="<?php echo base_url('Ingreso/Modifca_producto'); ?>" type="hidden">
		<div class="col-lg-12"> <!-- col-lg-12 -->
			<form id="form_producto" class="form">
				<div class="card"> <!-- card -->
					<div class="card-head style-primary">
						<header>INGRESO DE REVISION DE PRODUCTO</header>
					</div>
					
                    <div class="card-body"> <!--card-body -->
		
                    	<div class="row">
							<div class="col-sm-6">
								
                                <div class="form-group">
                                <input name="id_producto_venta" id="id_producto_venta" value="<?php echo $datos['id_producto_venta'];?>" type="hidden">
                               
                                
									<label for="unidades_optimas" style="font-size:14px; text-transform:uppercase; font-weight:bold" >UNIDADES OPTIMAS</label>
                                  	<input class="form-control input-lg" id="unidades_optimas" name="unidades_optimas" type="number" value="" >
								</div>
                                
                                <div class="form-group">
									<label for="unidades_defectuosas" style="font-size:14px; text-transform:uppercase; font-weight:bold" >UNIDADES DEFECTUOSAS</label>
                                  	<input class="form-control input-lg" id="unidades_defectuosas" name="unidades_defectuosas" type="number" value="" >
								</div>
                                
                                <div class="form-group">
									<label for="cantidad_a_la_venta" style="font-size:14px; text-transform:uppercase; font-weight:bold" >CANTIDAD PARA LA VENTA</label>
                                  	<input class="form-control input-lg" id="cantidad_a_la_venta" name="cantidad_a_la_venta" type="number" value="" readonly >
								</div>

							</div>
                            
                            <div class="col-sm-6">
								
                                <div class="form-group">
									<label for="precio_instituciones" style="font-size:14px; text-transform:uppercase; font-weight:bold" >PRECIO INSTITUCIONES</label>
                                  	<input class="form-control input-lg" id="precio_instituciones" name="precio_instituciones" type="number" step="any" value="<?php echo $datos['pi'];?>" >
								</div>  
                                
                                <div class="form-group">
									<label for="precio_distribuidora" style="font-size:14px; text-transform:uppercase; font-weight:bold" >PRECIO DISTRIBUIDORA</label>
                                  	<input class="form-control input-lg" id="precio_distribuidora" name="precio_distribuidora" type="number" value="<?php echo $datos['pd'];?>" >
								</div>  
                                
                                <div class="form-group">
									<label for="precio_farmacia" style="font-size:14px; text-transform:uppercase; font-weight:bold" >PRECIO FARMACIA</label>
                                  	<input class="form-control input-lg" id="precio_farmacia" name="precio_farmacia" type="number" value="<?php echo $datos['pf'];?>" >
								</div>                              
                                 

							</div>
                            
                            <div class="modal-footer">
                      <button id="bt_guardar" type="button" class="btn btn-primary"><i class="fa fa-cogs"> GUARDAR REVISION</i></button>
                       
                	</div> <!-- fin boton formulario -->
                    		
						</div>

					</div><!--end .card-body -->
            	
                </div><!--end card -->
                            
        	</form>
            
           
     	</div>	<!-- fin col-lg-12 -->
              
	</div><!-- END CONTENT -->
</div>
</body>
</html>