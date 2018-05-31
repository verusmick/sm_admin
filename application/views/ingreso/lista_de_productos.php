<div class="card"> <!-- card --> 
            <div class="table-responsive">
                <table id="datatablEe" class="table table-striped table-hover ">
                    <thead>
                        <tr style="font-size:15px; text-transform:uppercase; font-weight:bold" class="info" >
                            <th class="text-left" style="font-size:15px; text-transform:uppercase; font-weight:bold">PRODUCTOS DE LA NOTA DE INGRESO</th>
                            
                          <th class="text-center" style="font-size:15px; text-transform:uppercase; font-weight:bold">REVISAR</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($productos as $prod){?>
                        <tr class="gradeX " style="font-size:15px; text-transform:uppercase; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif"  >
                            <td class=" text-left ">
                            <span style="color: #900; font-weight: bold;"><?php echo "PRODUCTO: "; ?></span>
                            <span style=" font-weight: bold;"><?php echo $prod ->producto." : ".$prod ->concentrado." : ".$prod ->presentacion." : ".$prod ->clasificacion_terapeutica ,"<br>";?></span>
                            <span style="color: #900; font-weight: bold;"><?php echo "PRECIO DE INGRESO UNITARIO: "; ?></span>
                            <span style=" font-weight: bold;"><?php  echo $prod ->precio_de_ingreso_unitario,"<br>"; ?></span>
                            <span style="color: #900; font-weight: bold;"><?php echo "CANTIDAD: "; ?></span>        
                            <span style=" font-weight: bold;"><?php echo $prod ->unidades_ingresadas,"<br>"; ?></span>      
                            <span style="color: #900; font-weight: bold;"><?php echo "TOTAL: "; ?></span>		
                            <span style=" font-weight: bold;"><?php echo $prod ->precio_de_ingreso_total;?></span> 
                            </td>
    						
                            <td class=" text-left ">
                            <?php if($prod ->estado == "REVISION"){?>
                            <a href="<?php echo base_url('Ingreso/Revisa_producto'); ?>?id_producto_venta=<?php echo base64_encode($prod ->id_producto_venta); ?>&&pf=<?php echo base64_encode($prod -> precio_farmacia_referencial) ;?>&&pi=<?php echo base64_encode($prod -> precio_instituciones_referencial) ;?>&&pd=<?php echo base64_encode($prod -> precio_distribuidora_referencial) ;?>" class="btn ink-reaction btn-floating-action btn-success" target="_blank" ><i class="fa fa-pencil"></i> </a>
                            <?php }?>
                            </td>
                        </tr>
                        
                        
                        <?php }?>
                    </tbody>
                </table>
			</div>
           </div>