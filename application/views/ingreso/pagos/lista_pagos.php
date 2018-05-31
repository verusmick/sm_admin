<script>
$(document).ready(function(){
	
///bt_anula
$("#bt_anula[class='btn ink-reaction btn-floating-action btn-danger']").click(function(e) {
	
	$.ajax({
		data:  {'id_pago_de_nota' : $(this).val()},
		url:   $("#url_anula").val(),
		type:  'post',
		beforeSend: function () {
			$("#div_anula").html("Procesando, espere por favor...");
		},
		success:  function (response) {
			$("#div_anula").html(response);
			setTimeout(function() { window.location.href = $("#url_lista").val()}, 1500);
		}
	}); 
	
});	
///FIN bt_anula
});

</script>
<div id="div_anula"></div>
<input id="url_anula" name="url_anula" value="<?php echo base_url('Ingreso/Anular_pago'); ?>"type="HIDDEN">
<input id="url_lista" name="url_lista" value="<?php echo base_url('Ingreso/Nuevo_pago'); ?>"type="HIDDEN">
<div class="card"> <!-- card --> 
<div class="table-responsive">
                <table id="datatablEe" class="table table-striped table-hover ">
                    <thead>
                        <tr style="font-size:15px; text-transform:uppercase; font-weight:bold" class="info" >
                            <th class="text-left" style="font-size:15px; text-transform:uppercase; font-weight:bold">PAGOS</th>
                            <th class="text-left" style="font-size:15px; text-transform:uppercase; font-weight:bold"></th>
                            
                          <th class="text-left" style="font-size:15px; text-transform:uppercase; font-weight:bold">ANULAR PAGO</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pagos as $pago){?>
                        <tr class="gradeX " style="font-size:15px; text-transform:uppercase; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif"  >
                            <td class=" text-left ">
                            <span style="color: #900; font-weight: bold;"><?php echo "PAGO: "; ?></span>
                            <span style=" font-weight: bold;"> <?php echo $pago -> numero_pago,"<br>";?></span>
                            <span style="color: #900; font-weight: bold;"><?php echo "MONTO CANCELADO: "; ?></span>
                            <span style=" font-weight: bold;"><?php echo $pago -> monto_pago,"<br>";?></span>
                            
                            </td>
    						
                            <td class=" text-left ">
                            
                            <span style="color: #900; font-weight: bold;"><?php echo "FECHA DEL PAGO: "; ?></span>        
                            <span style=" font-weight: bold;"><?php echo $pago -> fecha_de_pago,"<br>";?></span>      
                            <span style="color: #900; font-weight: bold;"><?php echo "ESTADO: "; ?></span>		
                            <span style=" font-weight: bold;"><?php if($pago -> estado == 1){echo "REGISTRADO";}else{echo "ANULADO";}?></span> 
                            </td>
                            
                            <td class=" text-left ">
                            
                            <button id="bt_anula" name="bt_anula" value="<?php echo $pago -> id_pago_de_nota;?>" class="btn ink-reaction btn-floating-action btn-danger" data-dismissss="modal"  ><i class="fa fa-close"></i> </button>
  
                            </td>
                        </tr>
                        
                        
                        <?php }?>
                    </tbody>
                </table>
			</div>
</div>