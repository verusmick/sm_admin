<script type="text/javascript">
$(document).ready(function(){

$('#id_funcionario').change(function(e) {
    $('#id_fun').val( $(this).val() );
});

});
</script>
<div id="base"><!-- TABLA-->
	<div id="content"><!-- BEGIN CONTENT-->
    	<div class="card"> <!-- card -->
			<div class="card-head style-primary">
				<header><?php echo $titulo; ?></header>
			</div>
			
            <div class="card-body"> <!--card-body -->
             		<form action="<?php echo base_url('Reporte/Ventas_vendedor')?>" method="post">       			
                    	<div class="row">
							<div class="col-sm-6">
								 
                                <div class="form-group">
                                	
                                    <label for="nombres" style="font-size:14px; text-transform:uppercase; font-weight:bold" >FUNCIONARIO</label>
                                    <input type="text" class="form-control input-lg" id="id_fun" name="id_fun" value="2">
                                    <select id="id_funcionario" name="id_funcionario"  class="form-control input-lg">
                                    	<option value="">=ELEGIR=</option>
                                        <?php foreach($funcionarios as $funcionario){?>
                                        <option value="<?php echo $funcionario -> id_funcionario; ?>"><?php echo $funcionario -> nombres." ".$funcionario -> paterno." ".$funcionario -> materno;?></option>
                                        <?php }?>
                                    </select>
									
								</div>                              
                                
							</div>
					
                    		<div class="col-sm-6">
							                                
                                <div class="form-group">
								  <label for="fecha1" style="font-size:14px; text-transform:uppercase; font-weight:bold">Fecha Inicial</label>
                                  <input type="date" class="form-control input-lg" id="fecha1" name="fecha1">
								  
								</div>
                                
                               <div class="form-group">
								  <label for="fecha1" style="font-size:14px; text-transform:uppercase; font-weight:bold">Fecha Final</label>
                                  <input type="date" class="form-control input-lg" id="fecha2" name="fecha2">
								  
								</div>
                                                           
						  </div>
						</div>
						 <div class="modal-footer">
                            
                            <button id="boton_agregar_usuario" type="submit" class="btn btn-primary">Buscar</button>
                        </div>
               		</form>     
				</div>
	</div>
    
    <div id="div_guarda_usuario">sss</div><!-- div_guarda_usuario-->
</div>
	
</div><!-- FIN TABLA-->

