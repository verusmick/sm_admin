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
                    
                    <th class="text-center">CLIENTE</th>
                    <th class="text-center">CREDIT OTORGADO</th>
                    <th class="text-center">DEUDA ACTUAL</th>
                    <th class="text-center">ESTADO</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 0;
                foreach($clientes as $cliente) {
                
                ?>
                <tr>
                    <td class="text-center"><?php echo $cliente -> tipo." ".$cliente -> razon_social;?></td>
                    
                    <td class="text-center"><?php echo $credito_otorgado = $cliente -> credito_otorgado;?></td>
                    
                    <td class="text-center"><?php echo $deuda_actual = $cliente -> deuda_actual;?></td>
                    <td class="text-center"><?php 
					
						if($credito_otorgado<= $deuda_actual)
						{
							echo "<button type='button' class='btn btn-block ink-reaction btn-flat btn-danger'>CREDITO SOBRE PASADO</button>";
						}
						else
						{
							echo "<button type='button' class='btn btn-block ink-reaction btn-flat btn-success'>CREDITO ACTIVO</button>";
						}
					
					?></td>
                   
                   
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

