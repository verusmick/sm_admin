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
                    
                    <th class="text-center">Fecha de registro</th>
                    <th class="text-center">No recibo</th>
                    <th class="text-center">Monto</th>
                    <th class="text-center">Depositado Por</th>
                    <th class="text-center">Número de Nota</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Fecha de venta</th>
                    
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 0;
                foreach($recibos as $recibo) {
                
                ?>
                <tr>
                    
                    <td class="text-center"><?php echo $recibo -> fecha_de_pago;?></td>
                    <td class="text-center"><?php echo $recibo -> recibo_no;?></td>
                    <td class="text-center"><?php echo $recibo -> monto_depositado;?></td>
                    <td class="text-center"><?php echo $recibo -> nombres." ".$recibo -> paterno." ".$recibo -> materno;?></td>
                    
                    <td class="text-center"><?php echo $recibo -> numero_de_nota;?></td>
                    
                    <td class="text-center"><?php echo $recibo -> tipo." ".$recibo -> razon_social;?></td>
                   
                    <td class="text-center"><?php echo $recibo -> fecha_de_venta;?></td>
                    
                    
                    
                    
                    
                    
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

