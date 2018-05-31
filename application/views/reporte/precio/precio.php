<div id="base"><!-- TABLA-->
	<div id="content"><!-- BEGIN CONTENT-->
    	<div class="card"> <!-- card -->
	  		<div class="card-head style-primary">
	    		<header><?php echo $titulo; ?></header>
	  		</div>
        		<div class="card-body"> <!--card-body -->
          			<div class="row">
						<div class="col-lg-12">
	<div class="table-responsive">
		<a class="btn ink-reaction btn-primary-bright" href="#" onClick ="$('#datatable').tableExport({type:'excel',escape:'false'});"> <i class="fa fa-file-excel-o"> EXPORTAR A EXCEL </i>  </a>								
			
          <table class="table table-hover" id="datatable">
            <thead>
                <tr>
                  <th colspan="7" class="text-center">Reporte de Recibos </th>
                </tr>
                <tr>
                  <th colspan="7" class="text-center">Fecha de emision: <?php echo date("d/m/Y") ?></th>
                </tr>
                <tr>
                  <th colspan="7" class="text-center">Hora de Emision: <?php echo date("H:i:s") ?></th>
                </tr>
                <tr>
                    
                    <th class="text-center">LABORATORIO</th>
                    <th class="text-center">PRODUCTO</th>
                    <th class="text-center">LOTE</th>
                    <th class="text-center">REGISTRO SANITARIO</th>
                    <th class="text-center">FECHA DE VENCIMIENTO</th>
                    <th class="text-center">P. INSTITUCIONES</th>
                    <th class="text-center">P. DISTRIBUIDORA</th>
                    <th class="text-center">P. FARMACIA</th>
 
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 0;
                foreach($recibos as $recibo) {
                
                ?>
                <tr>
                    
                    <td class="text-center"><?php echo $recibo -> descripcion;?></td>
                    <td class="text-center"><?php echo $recibo -> producto." ".$recibo -> concentrado." ".$recibo -> presentacion." ".$recibo -> clasificacion_terapeutica;?></td>
                    
                                        
                    <td class="text-center"><?php echo $recibo -> no_de_lote;?></td>
                    
                    <td class="text-center"><?php echo $recibo -> registro_sanitario;?></td>
                   
                    <td class="text-center"><?php echo $recibo -> fecha_de_vencimiento;?></td>
                    <td class="text-center"><?php echo $recibo -> precio_instituciones;?></td>
                    <td class="text-center"><?php echo $recibo -> precio_distribuidora;?></td>
                    <td class="text-center"><?php echo $recibo -> precio_farmacia;?></td>
   
                </tr>
                <?php 
            
                }?>
            </tbody>
        </table>
      </div>
</div>
                        
                        <div id="div_reporte" class="col-lg-12"></div>
                	</div>
				</div>
		</div>
	</div>
</div>

