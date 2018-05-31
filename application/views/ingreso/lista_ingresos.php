<script type="text/javascript">
$(document).ready(function(){
   

});
</script>

<div id="base"><!-- BEGIN BASE-->
	<div id="content"><!-- BEGIN CONTENT-->
    	<div class="card"> <!-- card -->
			<div class="card-head style-primary">
				<header><?php echo $titulo; ?></header>
			</div>
			
            <div class="card-body"> <!--card-body -->
            	<div class="row">
					<div class="col-lg-12">
								<div class="table-responsive">
									<table id="datatable" class="table table-striped table-hover">
										<thead>
											<tr style="font-size:15px; text-transform:uppercase; font-weight:bold">
												<th class="text-left" style="font-size:15px; text-transform:uppercase; font-weight:bold">Datos de la Nota de Ingreso</th>
												
                                              <th class="text-center" style="font-size:15px; text-transform:uppercase; font-weight:bold">Lista de Revision</th>
                                                
                                                <th class="text-center" style="font-size:15px; text-transform:uppercase; font-weight:bold">Modificar</th>
                                                <th class="text-center" style="font-size:15px; text-transform:uppercase; font-weight:bold">Ingresar Productos</th>
                                                <th class="text-center" style="font-size:15px; text-transform:uppercase; font-weight:bold">Revisar Productos</th>
											</tr>
										</thead>
										<tbody>
                                        	<?php foreach($ingresos as $ingreso){?>
											<tr class="gradeX" style="font-size:15px; text-transform:uppercase; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif" >
												<td class="text-left">
                                                <span style="color: #900; font-weight: bold;"><?php echo "LABORATORIO: "; ?></span>
												<span style=" font-weight: bold;"><?php echo $ingreso -> descripcion,"<br>" ;?></span>
												<span style="color: #900; font-weight: bold;"><?php echo "CANTIDAD DE PRODUCTOS: "; ?></span>
												<span style=" font-weight: bold;"><?php echo $ingreso -> cantidad_de_productos,"<br>" ; ?></span>
                                                <span style="color: #900; font-weight: bold;"><?php echo "NUMERO DE NOTA: "; ?></span>        
                                                <span style=" font-weight: bold;"><?php echo $ingreso -> numero_de_nota,"<br>" ; ?></span>      
												<span style="color: #900; font-weight: bold;"><?php echo "ESTADO: "; ?></span>		
												<span style=" font-weight: bold;"><?php echo $ingreso -> estado,"<br>" ; ?></span> 

                                                </td>

																									
                                                <td class="text-center">
                                                	<a href="<?php echo base_url('Ingreso/Imprime_revision'); ?>?id_nota_de_ingreso_productos=<?php echo base64_encode($ingreso -> id_nota_de_ingreso_productos); ?>" class="btn ink-reaction btn-floating-action  btn-info" target="_blank" ><i class="fa fa-print"></i></a>
                                                </td>
                                                <td class="text-center">
                                                	<?php if($ingreso -> estado == "PENDIENTE"){?>
                                                    <a href="<?php echo base_url('Ingreso/Modifica_ingreso'); ?>?id_nota_de_ingreso_productos=<?php echo base64_encode($ingreso -> id_nota_de_ingreso_productos); ?>" type="button" class="btn ink-reaction btn-floating-action btn-info" ><i class="fa fa-pencil"></i></a>
                                                    <?php }?>
                                                </td>
                                                <td class="text-center">
                                                	<?php if($ingreso -> estado == "PENDIENTE"){?>
                                                    <a href="<?php echo base_url('Ingreso/Agrega_producto'); ?>?id_nota_de_ingreso_productos=<?php echo $ingreso -> id_nota_de_ingreso_productos; ?>&cantidad_de_productos=<?php echo $ingreso -> cantidad_de_productos ;?>&descripcion=<?php echo $ingreso -> descripcion ;?>&id_laboratorio=<?php echo $ingreso -> id_laboratorio ;?>" class="btn ink-reaction btn-floating-action btn-warning" ><i class="fa fa-plus"></i> </a>
                                                    <?php }?>
                                                </td>
                                                <td class="text-center">
                                                	<?php if($ingreso -> estado == "INGRESADOS"){?>
                                                    <a href="<?php echo base_url('Ingreso/Revisar_nota'); ?>?id_nota_de_ingreso_productos=<?php echo base64_encode($ingreso -> id_nota_de_ingreso_productos); ?>" class="btn ink-reaction btn-floating-action btn-success" ><i class="fa fa-pencil"></i> </a>
                                                    <?php }?>
                                                </td>
											</tr>
                                            <?php }?>
										</tbody>
									</table>
								</div><!--end .table-responsive -->
							</div>
                </div>
			</div>
	</div>
</div>
	
</div>