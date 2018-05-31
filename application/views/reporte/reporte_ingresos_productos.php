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
                  <th colspan="7" class="text-center">Reporte de Ingresos DE pRODUCTOS </th>
                </tr>
                <tr>
                  <th colspan="7" class="text-center">Fecha de emision: <?php echo date("d/m/Y") ?></th>
                </tr>
                <tr>
                  <th colspan="7" class="text-center">Hora de Emision: <?php echo date("H:i:s") ?></th>
                </tr>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Fecha de registro</th>
                    <th class="text-center">Laboratorio</th>
                    <th class="text-center">Producto</th>
                    <th class="text-center">Lote</th>
                    <th class="text-center">Registro Santario</th>
                    <th class="text-center">Fecha de Vencimiento</th>
                    <th class="text-center">Unidades</th>
                    <th class="text-center">Precio unitario</th>
                    <th class="text-center">Precio Total</th>
                    <th class="text-center">Saldo Actual</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 0;
                foreach($ingresos as $ingreso) {
                
                ?>
                <tr>
                    <td class="text-center"><?php echo $no=$no+1; ?></td>
                    
                    <td class="text-center"><?php echo $ingreso -> fecha_de_registro;?></td>
                    <td class="text-center"><?php echo $ingreso -> descripcion;?></td>
                    <td class="text-center"><?php echo $ingreso -> producto." ".$ingreso -> concentrado." ".$ingreso -> presentacion." ".$ingreso -> clasificacion_terapeutica;?></td>
                    <td class="text-center"><?php echo $ingreso -> no_de_lote;?></td>
                    <td class="text-center"><?php echo $ingreso -> registro_sanitario;?></td>
                    
                    <td class="text-center"><?php echo $ingreso -> fecha_de_vencimiento;?></td>
                    <td class="text-center"><?php echo $ingreso -> unidades_ingresadas;?></td>
                    <td class="text-center"><?php echo $ingreso -> precio_de_ingreso_unitario;?></td>
                    <td class="text-center"><?php echo $ingreso -> precio_de_ingreso_total;?></td>
                    <td class="text-center"><?php echo $ingreso -> cantidad_a_la_venta;?></td>
                    
                    
                    
                    
                    
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

