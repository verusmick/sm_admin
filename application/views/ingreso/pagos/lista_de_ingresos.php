<div class="card"> <!-- card --> 
            <div class="table-responsive">
                <table id="datatablEe" class="table table-striped table-hover ">
                    <thead>
                        <tr style="font-size:15px; text-transform:uppercase; font-weight:bold" class="info" >
                            <th class="text-left" style="font-size:15px; text-transform:uppercase; font-weight:bold">NOTAS DE INGRESO</th>
                            
                          <th class="text-center" style="font-size:15px; text-transform:uppercase; font-weight:bold">INGRESAR PAGO</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($notas as $nota){?>
                        <tr class="gradeX " style="font-size:15px; text-transform:uppercase; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif"  >
                            <td class=" text-left ">
                            <span style="color: #900; font-weight: bold;"><?php echo "PRODUCTO: "; ?></span>
                            <span style=" font-weight: bold;"> </span>
                            <span style="color: #900; font-weight: bold;"><?php echo "PRECIO DE INGRESO UNITARIO: "; ?></span>
                            <span style=" font-weight: bold;"></span>
                            <span style="color: #900; font-weight: bold;"><?php echo "CANTIDAD: "; ?></span>        
                            <span style=" font-weight: bold;"></span>      
                            <span style="color: #900; font-weight: bold;"><?php echo "TOTAL: "; ?></span>		
                            <span style=" font-weight: bold;"></span> 
                            </td>
    						
                            <td class=" text-left ">
                            
                            <a href="<?php echo base_url('Ingreso/Revisa_producto'); ?>" class="btn ink-reaction btn-floating-action btn-success" target="_blank" ><i class="fa fa-pencil"></i> </a>
                            
                            </td>
                        </tr>
                        
                        
                        <?php }?>
                    </tbody>
                </table>
			</div>
           </div>