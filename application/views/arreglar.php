<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<table width="100%" border="1">
  <tr>
    <td>ID</td>
    <td>NUMERO</td>
    <td>TOTAL</td>
    <td>SALDO</td>
    <td>SUMA RECIBOS</td>
    <td>CALCULO SALDO</td>
     <td>diferencias</td>
    <td>ESTADO</td>
  </tr>
  <?php foreach($ventas as $venta){ ?>
  <tr>
    
    <td><?php echo $id_venta = $venta -> id_venta; ?></td>
    <td><?php echo $venta -> numero_de_nota; ?></td>
    <td><?php echo $venta -> total_a_pagar_descuento; ?></td>
    <td><?php echo $venta -> saldo; ?></td>
    <td><?php 
		$recibos= $this -> Modelo_venta ->Sumatoria_de_recibos($id_venta); 
		echo $suma_recibos = $recibos -> suma_recibos;
	?>
    </td>
    <td><?php echo $saldo = $venta -> total_a_pagar_descuento - $recibos -> suma_recibos ; ?></td>
    
    <td>  
  <?php $data = array(
		'saldo' => $saldo
		);
		if($venta -> saldo == $saldo)
		{
			echo "igual";	
		}
		else
		{
			echo "no es igual";
		}
		//$this -> Modelo_venta -> Actualizar_saldos($id_venta,$data);  ?></td>
    
    <td><?php echo $venta -> estado; ?></td>
  </tr>

  <?php }?>
</table>
</body>
</html>
