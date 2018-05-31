<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recibo extends CI_Controller {
//Lista_venta
public function Lista_venta()
{
$data['titulo']="LISTA DE VENTAS";
$data['ventas'] = $this -> Modelo_venta -> Ventas();
$data['lista_funcionario'] = $this -> Modelo_funcionario -> Lista_funcionarios();

$this->load->view('plantilla/header',$data);
$this -> load -> view('recibo/lista_ventas');	
$this->load->view($this->session->userdata('tipo_de_usuario'));	
}
//FIN Lista_venta

//Agrega_recibo
public function Agrega_recibo()
{
	$id_venta = $this -> input -> post('id_venta_recibo');
	$total_a_pagar_descuento = $this -> input -> post('total_a_pagar_descuento');
	$recibo_no = $this -> input -> post('recibo_no');
	$monto_depositado = $this -> input -> post('monto_depositado');
	$estado = "INGRESADO";
	$observaciones = $this -> input -> post('observaciones');
	$entrega_el_funcionario = $this -> input -> post('entrega_el_funcionario');
	
	//calcula saldo
	$suma = $this -> Modelo_recibo ->Suma_recibos($id_venta);
	$sumas_de_recibos = $suma -> suma_recibos;
	$saldo_final = $total_a_pagar_descuento - ($monto_depositado + $sumas_de_recibos);
	//calcula saldo
	
	 //calcula el estado de la nota
	if($saldo_final<=0)
	{
		$estado_nota="CANCELADO";
		
		$recupera_cliente = $this -> Modelo_recibo -> Recupera_id_cliente($id_venta);
		$id_cliente = $recupera_cliente ->id_cliente;
		$id = $id_cliente;
		
		$suma_las_ventas = $this -> Modelo_recibo -> Suma_ventas($id_cliente);
		$deuda_actual = $suma_las_ventas ->deuda_actual - $total_a_pagar_descuento;
		
		$data= array(
			'deuda_actual' => $deuda_actual
		);
		$this -> Modelo_cliente ->Modifica($id,$data); 
	}
	 else
	{
		$estado_nota="PENDIENTE";	
	}
	//calcula el estado de la nota
	
	$data = array(
		'id_venta' => $id_venta,
		'fecha_de_pago' =>date("Y-m-d"),
		'recibo_no' => $recibo_no,
		'monto_depositado' => $monto_depositado,
		'estado' => $estado ,
		'observaciones' => $observaciones,
		'entrega_el_funcionario' => $entrega_el_funcionario,
	);
	$insertar = $this -> Modelo_recibo ->Insertar_recibo($data);
	if($insertar == true)
	{
		 $data = array(
			'estado' => $estado_nota,
			'saldo'	=> $saldo_final
		);
		$actualizar = $this -> Modelo_venta -> Actualizar_venta($id_venta,$data); 
		echo "<script type='text/javascript'>
					toastr.success('RECIBO REGISTRADO.', 'RECIBO');
				</script>";	
	}
	
}
//Agrega_recibo

//Busca_recibos
public function Busca_recibos()
{
	$data['titulo']="LISTA DE RECIBOS";
	$id_venta = $this -> input -> post('id_venta');
	$data['recibos'] = $this -> Modelo_recibo -> Busca_recibo_por_id_venta($id_venta);
	
	$this -> load -> view('recibo/lista_recibos',$data);	
}
//Busca_recibos

//Anula_recibo
public function Anula_recibo()
{
	$id_recibo_venta = $this -> input -> post('id_recibo_venta');
	$id_venta = $this -> input -> post('venta');
	$monto = $this -> input -> post('monto');
	
	$suma_actual = $this -> Modelo_recibo ->Suma_recibos($id_venta);
	$suma_recuperada = $suma_actual->suma_recibos;
	$nuevo_saldo = $suma_recuperada - $monto;
	
	$total_de_la_nota = $this -> Modelo_venta -> Busca_venta_por_id($id_venta);
	$monto_total = $total_de_la_nota -> total_a_pagar_descuento;
	
	if($monto_total >= $nuevo_saldo)
	{
		echo $estado_nota="PENDIENTE";
	}
	else
	{
		echo $estado_nota="CANCELADO";	
	}
	
	$data = array('estado' => 'ANULADO');
	$anula_recibo = $this -> Modelo_recibo -> Actualiza_recibo($data, $id_recibo_venta);
	 
	$data = array('estado' => $estado_nota, 'saldo' => $nuevo_saldo);
	$actualiza_venta = $this -> Modelo_venta -> Actualizar_venta($id_venta,$data);
	echo "<script type='text/javascript'>
					toastr.error('RECIBO ANULAD0.', 'RECIBO');
				</script>";	
}
//Anula_recibo

//Agrega_factura
public function Agrega_factura()
{
	$id_venta = $this -> input -> post('id_venta_factura');	
	$data = array('no_factura' => $this -> input -> post('factura'));
	$actualiza_venta = $this -> Modelo_venta -> Actualizar_venta($id_venta,$data); 
}
//Agrega_factura


}