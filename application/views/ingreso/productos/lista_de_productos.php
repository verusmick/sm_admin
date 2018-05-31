<script>
$(document).ready(function() {
   	$('#datatable').DataTable( {
		"language": {
            "url": "<?php echo base_url('publico/datatables/spanish.json'); ?> "
        },
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"ordering": false
	});
} );
</script>

<div class="card"> <!-- card --> 
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-hover ">
                    <thead>
                        <tr style="font-size:15px; text-transform:uppercase; font-weight:bold" class="info" >
                            <th class="text-left" style="font-size:15px; text-transform:uppercase; font-weight:bold">PRODUCTOS DEL LABORATORIO</th>
                            
                          <th class="text-center" style="font-size:15px; text-transform:uppercase; font-weight:bold">MODIFICAR</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($productos as $prod){?>
                        <tr class="gradeX " style="font-size:15px; text-transform:uppercase; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif"  >
                            <td class=" text-left ">
                            <span style="color: #900; font-weight: bold;"><?php echo "PRODUCTO: "; ?></span>
                            <span style=" font-weight: bold;"><?php echo $prod ->producto." : ".$prod ->concentrado." : ".$prod ->presentacion." : ".$prod ->clasificacion_terapeutica ,"<br>";?></span>
                            
                            <span style="color: #900; font-weight: bold;"><?php echo "LOTE: "; ?></span>
                            <span style=" font-weight: bold;"><?php  echo $prod ->no_de_lote,"<br>"; ?></span>
                            <span style="color: #900; font-weight: bold;"><?php echo "REGISTRO SANITARIO: "; ?></span>
                            <span style=" font-weight: bold;"><?php  echo $prod ->registro_sanitario,"<br>"; ?></span>
                            <span style="color: #900; font-weight: bold;"><?php echo "FECHA DE VENCIMIENTO: "; ?></span>
                            <span style=" font-weight: bold;"><?php  echo $prod ->fecha_de_vencimiento,"<br>"; ?></span>
                            <span style="color: #900; font-weight: bold;"><?php echo "CANTIDAD EN INVENTARIO: "; ?></span>        
                            <span style=" font-weight: bold; font-size:16px; color:#03C"><?php echo $prod ->cantidad_a_la_venta,"<br>"; ?></span>      
                            <span style="color: #900; font-weight: bold;"><?php echo "PRECIO INSTITUCIONES: "; ?></span>		
                            <span style=" font-weight: bold;"><?php echo $prod ->precio_instituciones,"<br>";?></span> 
                            <span style="color: #900; font-weight: bold;"><?php echo "PRECIO DISTRIBUIDORA: "; ?></span>		
                            <span style=" font-weight: bold;"><?php echo $prod ->precio_distribuidora,"<br>";?></span> 
                            <span style="color: #900; font-weight: bold;"><?php echo "PRECIO FRAMACIA: "; ?></span>		
                            <span style=" font-weight: bold;"><?php echo $prod ->precio_farmacia,"<br>";?></span> 
                            </td>
    						
                            <td class=" text-left ">
                            <a href="<?php echo base_url('Ingreso/Recupera_producto'); ?>?id_producto_venta=<?php echo base64_encode($prod ->id_producto_venta); ?>" class="btn ink-reaction btn-floating-action btn-success" ><i class="fa fa-pencil"></i> </a>
                            
                          </td>
                        </tr>
                        
                        
                        <?php }?>
                    </tbody>
                </table>
			</div>
           </div>