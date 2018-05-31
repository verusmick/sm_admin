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
                  <th colspan="7" class="text-center">Reporte de notas con factura </th>
                </tr>
                <tr>
                  <th colspan="7" class="text-center">Fecha de emision: <?php echo date("d/m/Y") ?></th>
                </tr>
                <tr>
                  <th colspan="7" class="text-center">Hora de Emision: <?php echo date("H:i:s") ?></th>
                </tr>
                <tr>
                    
                    <th class="text-center">NOTA</th>
                    <th class="text-center">FACTURA</th>
                    <th class="text-center">ORDEN DE COMPRA</th>
                    <th class="text-center">CLIENTE</th>
                    <th class="text-center">TOTAL A PAGAR</th>
                    
                    <th class="text-center">VENDEDOR</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 0;
                foreach($facturas as $factura) {
                
                ?>
                <tr>
                    
                    <td class="text-center"><?php echo $factura -> numero_de_nota;?></td>
                    <td class="text-center"><?php echo $factura -> no_factura;?></td>
                    <td class="text-center"><?php echo $factura -> no_orden_compra;?></td>
                    <td class="text-center"><?php echo $factura -> tipo." ".$factura -> razon_social;?></td>
                    <td class="text-center"><?php echo $factura -> total_a_pagar_descuento;?></td>
                   
                    <td class="text-center"><?php echo $factura -> nombres." ".$factura -> paterno." ".$factura -> materno;?></td>
   
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

