<meta http-equiv="refresh" content="1800">
<?php 
foreach($ventas as $venta)
{
	echo "Numero de nota ".$venta ->numero_de_nota." monto= ".$venta ->total_a_pagar_descuento." SALDO= ".$venta ->saldo." Estado = ".$venta ->estado,"<br>";
	
	$id_venta = $venta -> id_venta;
	
	$total_a_pagar_descuento = $venta ->total_a_pagar_descuento;
	
	$recibos = $this -> Modelo_arregla -> Lista_recibos($id_venta);
	
	echo "Monto depositado= ".$recibos -> suma."<br>";
	
	echo $saldo_nuevo = $total_a_pagar_descuento - $recibos -> suma."<br>"."<Hr>";
	
	$data = array ('saldo' => $saldo_nuevo);
	
	$actualiza = $this -> Modelo_arregla -> Actualizar($id_venta, $data);	
}
?>
