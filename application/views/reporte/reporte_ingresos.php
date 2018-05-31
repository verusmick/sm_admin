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
                  <th colspan="7" class="text-center">Reporte de Ingresos </th>
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
                    <th class="text-center">Numero de Nota</th>
                    <th class="text-center">Tipo</th>
                    <th class="text-center">Cantidad de Productos</th>
                    <th class="text-center">Fecha de Nota</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">Cancelado</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 0;
                foreach($ingresos as $ingreso) {
                
                ?>
                <tr>
                    <td class="text-center"><?php echo $no=$no+1; ?></td>
                    <td class="text-center"><?php echo $ingreso -> descripcion;?></td>
                    <td class="text-center"><?php echo $ingreso -> numero_de_nota;?></td>
                    <td class="text-center"><?php echo $ingreso -> tipo_de_nota;?></td>
                    <td class="text-center"><?php echo $ingreso -> cantidad_de_productos;?></td>
                    
                    <td class="text-center"><?php echo $ingreso -> fecha_de_la_nota;?></td>
                    <td class="text-center"><?php echo $ingreso -> total_a_pagar;?></td>
                    <td class="text-center"><?php echo $ingreso -> pagado;?></td>
                    
                    
                    
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

