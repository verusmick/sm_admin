<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recibo extends CI_Controller {

//->Lista_de_ventas
function Lista_de_ventas()
{
	$data['titulo']=" LISTA DE VENTAS";
			$data['ventas'] = $this -> Modelo_venta -> Ventas();
			$data['funcionario'] = $this -> Modelo_funcionario -> Lista_funcionarios();
			
			
			$this -> load -> view('header',$data);
			$this -> load -> view('recibos_venta/lista_de_ventas.php',$data);
			$this -> load -> view( $this->session->userdata('tipo_de_usuario') );
}
//-> FIN Lista_de_ventas

//->Recupera_nota_venta_por_id_venta				
function Recupera_nota_venta_por_id_venta()
{
	$id_venta = $this -> input ->post('id_venta');
	$datos_de_nota_venta = $this -> Modelo_venta -> Recupera_nota_venta_por_id_venta($id_venta);
	foreach($datos_de_nota_venta as $nota)
	{
	echo"<script type='text/javascript'>
				$('#saldo').val('" .$nota -> saldo. "');
				$('#total_a_pagar').val('" .$nota -> total_a_pagar_descuento. "');	
		</script> ";
	}
}
//->FIN Recupera_nota_venta_por_id_venta

//->Agrega_recibo
function Agrega_recibo()
{
	
	$id_venta = $this -> input ->post('id_venta');
	$monto_depositado = $this -> input ->post('monto_depositado');
	$saldo = $this -> input ->post('saldo');
	$nuevo_saldo = $saldo - $monto_depositado;
	
	
	$data = array(
	'id_venta' 			=> $this -> input ->post('id_venta'),
	'fecha_de_pago'		=> $this -> input ->post('fecha_de_pago'),
	'recibo_no' 		=> $this -> input ->post('recibo_no'),
	'monto_depositado' 	=> $this -> input ->post('monto_depositado'),
	'observaciones' 	=> $this -> input ->post('observaciones'),
	'estado' 			=> "INGRESADO",
	'entrega_el_funcionario' => $this -> input ->post('entrega_el_funcionario')
	);
	
	$inserta = $this -> Modelo_recibo -> Agrega_recibo($data);
	if( $inserta == true)
	{
		if($nuevo_saldo <= 0)
		{
			$data = array(
			'saldo' => $nuevo_saldo,
			'estado' => "CANCELADO"
			);
			$actualiza_saldo = $this -> Modelo_recibo -> Actualiza_saldo($id_venta, $data);
			redirect('Recibo/Lista_de_ventas');
		}
		else
		{
			$data = array(
			'saldo' => $nuevo_saldo
			);
			$actualiza_saldo = $this -> Modelo_recibo -> Actualiza_saldo($id_venta, $data);
			redirect('Recibo/Lista_de_ventas');
		}
	}
}
//-> FIN Agrega_recibo

//->Recupera_recibos
function Recupera_recibos()
{
	$id_venta = $this -> input ->post('id_venta');
	$data['recibos'] = $this -> Modelo_recibo -> Busca_recibos($id_venta);
	$this -> load -> view('recibos_venta/lista_recibos',$data);
}
//-> FIN Recupera_recibos
}