<script type="text/javascript">
$(document).ready(function(){

$("#bt_anula_recibo[class='btn ink-reaction btn-raised btn-sm btn-danger']").click(function(e) {
    
	var element = $(this).val().split('&&');
    var id_recibo_venta = element[0].split('&&');
	
	var element1 = $(this).val().split('&&');
    var monto = element1[1].split('&&');
	
	var element2 = $(this).val().split('&&');
    var id_venta = element2[2].split('&&');
	
	$('#id_recibo_venta').val(id_recibo_venta[0]);
	$('#monto').val(monto[0]);
	$('#venta').val(id_venta[0]);
	
	///////////////
	$.ajax({
    	data:  $("#form_datos").serialize(),
                url:   $("#url_anula").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_anula_recibo").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_anula_recibo").html(response);
						setTimeout(function() { window.location.href = $("#url_lista").val()}, 1500);
                }
	});
	////////////////
	
});	

});
</script>

<input id="url_anula" value="<?php echo base_url('Recibo/Anula_recibo');?>" type="hidden">
<input id="url_lista" name="url_lista" type="hidden" value="<?php echo base_url('Recibo/Lista_venta');?>">

<div class="table-responsive">
    <table id="datatable" class="table table-striped table-hover">
        <thead>
            <tr>
                <th width="180" class="text-left info" style="font-size:14px; text-transform:uppercase; font-weight:bold; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">DATOS GENERALES</th>
                <th width="180" class="text-left info" style="font-size:14px; text-transform:uppercase; font-weight:bold; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"></th>
                <th width="180" class="text-left info" style="font-size:14px; text-transform:uppercase; font-weight:bold; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"></th>
 
            </tr>
            
        </thead>
        <tbody>
            <?php foreach($recibos as $recibo){?>
            <tr class="gradeX" style="font-size:14px; text-transform:uppercase; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">
                
                <td class="text-left" style="font-size:14px">
                    <span style="color: #900; font-weight: bold;"><?php echo "FECHA DE PAGO: "; ?></span>
                    <span style=" font-weight: bold;"><?php echo $recibo -> fecha_de_pago,"<br>"?></span>
                    <span style="color: #900; font-weight: bold;"><?php echo "NO RECIBO: "; ?></span>
                    <span style=" font-weight: bold;"><?php echo $recibo -> recibo_no,"<br>"?></span>
                    <span style="color: #900; font-weight: bold;"><?php echo "MONTO ENTREGADO: "; ?></span>        
                    <span style=" font-weight: bold;"><?php echo $recibo -> monto_depositado,"<br>"?></span>
                    
                    

                </td>
                
                <td class="text-left" style="font-size:14px">
                    
                    <span style="color: #900; font-weight: bold;"><?php echo "ENTREGADO POR: "; ?></span>        
                    <span style=" font-weight: bold;"><?php echo $recibo -> nombres." ".$recibo -> paterno." ".$recibo -> materno,"<br>"?></span>
                    
                    <span style="color: #900; font-weight: bold;"><?php echo "OBSERVACIONES: "; ?></span>        
                    <span style=" font-weight: bold;"><?php echo $recibo -> observaciones,"<br>"?></span>
                    
                    <span style="color: #900; font-weight: bold;"><?php echo "ESTADO: "; ?></span>        
                    <span style=" font-weight: bold;"><?php echo $estado = $recibo -> estado,"<br>"?></span>

                </td>
                
                <td class="text-left" style="font-size:14px">
                <?php 
					if($estado == "ANULADO"){
						$est="disabled";
					}
					else
					{
						$est="";
					}
				?>
                <button id="bt_anula_recibo" class="btn ink-reaction btn-raised btn-sm btn-danger" value="<?php echo $recibo -> id_recibo_venta;?>&&<?php echo $recibo -> monto_depositado;?>&&<?php echo $recibo -> id_venta;?> " <?php echo $est;?>>Anular Recibo</button>
               
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div><!--end .table-responsive -->
<form id="form_datos">
	<input id="id_recibo_venta" name="id_recibo_venta" type="hidden">
 	<input id="monto" name="monto" type="hidden">
    <input id="venta" name="venta" type="hidden">
</form>
<div id="div_anula_recibo"></div>

             
