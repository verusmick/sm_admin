<div class="col-lg-12">
	<div class="table-responsive">
		<a class="btn ink-reaction btn-primary-bright" href="#" onClick ="$('#inventario').tableExport({type:'excel',escape:'false'});"> <i class="fa fa-file-excel-o"> EXPORTAR A EXCEL </i>  </a>								
			
          <table class="table table-hover" id="inventario">
            <thead>
                <tr>
                  <th colspan="7" class="text-center">Reporte de productos por tipo de nota de venta </th>
                </tr>
                <tr>
                  <th colspan="7" class="text-center">Fecha de emision: <?php echo date("d/m/Y") ?></th>
                </tr>
                <tr>
                  <th colspan="7" class="text-center">Hora de Emision: <?php echo date("H:i:s") ?></th>
                </tr>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Laboratorio</th>
                    <th class="text-center">Producto</th>
                    <th class="text-center">Lote</th>
                    <th class="text-center">Reg. Sanitario</th>
                    <th class="text-center">Vencimiento</th>
                    <th class="text-center">Precio</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">Nota</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Tipo</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 0;
                foreach($productos as $producto) {
                
                ?>
                <tr>
                    <td class="text-center"><?php echo $no=$no+1; ?></td>
                    <td class="text-center"><?php echo $producto -> laboratorio;?></td>
                    <td class="text-center"><?php echo $producto -> producto." : ".$producto -> concentrado." : ".$producto -> presentacion." : ".$producto -> clasificacion_terapeutica;?></td>
                    <td class="text-center"><?php echo $producto -> no_de_lote;?></td>
                    <td class="text-center"><?php echo $producto -> registro_sanitario;?></td>
                    <td class="text-center"><?php echo $producto -> fecha_de_vencimiento;?></td>
                    <td class="text-center"><?php echo $producto -> precio;?></td>
                    <td class="text-center"><?php echo $producto -> cantidad;?></td>
                    <td class="text-center"><?php echo $producto -> total;?></td>
                    <td class="text-center"><?php echo $producto -> numero_de_nota;?></td>
                    <td class="text-center"><?php echo $producto -> tipo." ".$producto -> razon_social;?></td>
                    <td class="text-center"><?php echo $producto -> tipo_nota;?></td>
                    
                    
                </tr>
                <?php 
            
                }?>
            </tbody>
        </table>
      </div>
</div>