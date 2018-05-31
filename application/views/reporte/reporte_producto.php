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

			
			<a class="btn ink-reaction btn-primary-bright" href="#" onClick ="$('#inventario').tableExport({type:'excel',escape:'false'});"> <i class="fa fa-file-excel-o"> EXPORTAR A EXCEL </i>  </a>								
			
          <table class="table table-hover" id="inventario">
            <thead>
                <tr>
                  <th colspan="7" class="text-center">Inventario Sanamedic </th>
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
                    <th class="text-center">Precio Farmacia</th>
                    <th class="text-center">Precio Distribuidora</th>
                    <th class="text-center">Precio Instituciones</th>
                    <th class="text-center">Disponible</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 0;
                foreach($productos as $producto) {
                if( ($producto -> cantidad_a_la_venta) > 0)
                {	
                ?>
                <tr>
                    <td class="text-center"><?php echo $no=$no+1; ?></td>
                    <td class="text-center"><?php echo $producto -> descripcion;?></td>
                    <td class="text-center"><?php echo $producto -> producto." : ".$producto -> concentrado." : ".$producto -> presentacion." : ".$producto -> clasificacion_terapeutica;?></td>
                    <td class="text-center"><?php echo $producto -> no_de_lote;?></td>
                    <td class="text-center"><?php echo $producto -> registro_sanitario;?></td>
                    <td class="text-center"><?php echo $producto -> fecha_de_vencimiento;?></td>
                    <td class="text-center"><?php echo $producto -> precio_farmacia;?></td>
                    <td class="text-center"><?php echo $producto -> precio_distribuidora;?></td>
                    <td class="text-center"><?php echo $producto -> precio_instituciones;?></td>
                    <td class="text-center"><?php echo $producto -> cantidad_a_la_venta;?></td>
                    
                    
                </tr>
                <?php 
                }
                }?>
            </tbody>
        </table>
      </div>
      	
                        <div id="div_reporte" class="col-lg-12">div_reporte</div>
                	</div>
                        
                        <div id="div_reporte" class="col-lg-12">div_reporte</div>
                	</div>
				</div>
		</div>
	</div>
</div>



