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
		<a class="btn ink-reaction btn-primary-bright" href="#" onClick ="$('#datatables').tableExport({type:'excel',escape:'false'});"> <i class="fa fa-file-excel-o"> EXPORTAR A EXCEL </i>  </a>								
			
          <table class="table table-hover" id="datatables">
            <thead>
                <tr>
                  <th colspan="7" class="text-center">Reporte de notas de Cliente </th>
                </tr>
                <tr>
                  <th colspan="7" class="text-center">Fecha de emision: <?php echo date("d/m/Y") ?></th>
                </tr>
                <tr>
                  <th colspan="7" class="text-center">Hora de Emision: <?php echo date("H:i:s") ; $sumatoria =0;?></th>
                </tr>
                <tr>
                    
                    <th class="text-center">NOTA</th>
                    <th class="text-center">FACTURA</th>
                    <th class="text-center">ORDEN DE COMPRA</th>
                    <th class="text-center">CLIENTE</th>
                    <th class="text-center">TOTAL A PAGAR</th>
                    <th class="text-center">RECIBOS</th>
                    <th class="text-center">SALDO</th>
                    <th class="text-center">VENDEDOR</th>
                    <th class="text-center">FECHA DE VENTA</th>
                    <th class="text-center">ESTADO</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                
                foreach($ventas as $venta) {
                
                ?>
                
                <tr>
                    
                    <td class="text-center"><?php echo $venta -> numero_de_nota;?></td>
                    <td class="text-center"><?php echo $venta -> no_factura;?></td>
                    <td class="text-center"><?php echo $venta -> no_orden_compra;?></td>
                    <td class="text-center"><?php echo $venta -> tipo." ".$venta -> razon_social;?></td>
                    <td class="text-center"><?php echo str_replace("." , "," ,$venta -> total_a_pagar_descuento);?></td>

                    <td class="text-center"><?php 
					$id_venta = $venta -> id_venta;
					$recibos = $this -> Modelo_recibo -> Busca_recibo_por_id_venta($id_venta);
					if ($recibos == false)
					{
						echo "-";
					}
					else
					{
						foreach ($recibos as $recibo){
							echo "no_recibo: ", $recibo -> recibo_no,"<br>";
							echo "monto: ", $recibo -> monto_depositado,"<br>";
							
							
						}
					}
					
					?></td>
                    
                    <td class="text-center"><?php echo str_replace("." , "," ,$venta -> saldo);?></td>
                   
                    <td class="text-center"><?php echo $venta -> nombres." ".$venta -> paterno." ".$venta -> materno;?></td>
                    <td class="text-center"><?php echo $venta -> fecha_de_venta;?></td>
                    <td class="text-center"><?php echo $venta -> estado;?></td>
   					<?php 
					
					$sumatoria = $sumatoria + $venta -> total_a_pagar_descuento;?>
                </tr>
                <?php 
            
                }?>
                
                <tr>
                  <td class="text-center">&nbsp;</td>
                  <td class="text-center">&nbsp;</td>
                  <td class="text-center">&nbsp;</td>
                  <td class="text-center">TOTAL</td>
                  <td class="text-center"><?php echo $sumatoria;?></td>
                  <td class="text-center">&nbsp;</td>
                  <td class="text-center">&nbsp;</td>
                  <td class="text-center">&nbsp;</td>
                  <td class="text-center">&nbsp;</td>
                </tr>
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

