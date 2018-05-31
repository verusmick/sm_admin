<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

//->Nuevo
public function Nuevo()
{
	$data['titulo']="NUEVA VENTA";
	$data['vendedores'] = $this -> Modelo_venta -> Vendedores();
	$data['tipo_de_nota'] = $this -> Modelo_venta -> Tipo_de_nota();
	
	$this -> load -> view('header',$data);
	$this -> load -> view('cliente/nuevo',$data);
	$this -> load -> view( $this->session->userdata('tipo_de_usuario') );
}
//->Nuevo

//Registrar
public function Registra()
{
	$data = array(
					'registrado_por'	=> $this->session->userdata('id_usuario'),
					'tipo' 				=> trim( $this -> input -> post('tipo')),
					'razon_social' 		=> trim( $this -> input -> post('razon_social') ),
					'celular' 			=> trim( $this -> input -> post('celular') ),
					'credito_otorgado' 	=> trim( $this -> input -> post('credito_otorgado') ),
					'deuda_actual' 		=> trim( $this -> input -> post('deuda_actual') ),
		 );
	$this -> Modelo_cliente -> Registra($data);
}
//FIN Registrar

//->Lista
public function Lista()
{
	$data['titulo']="Lista Clientes";
	$data['clientes'] = $this -> Modelo_cliente -> Lista();
	
	$this -> load -> view('header',$data);
	$this -> load -> view('cliente/lista',$data);
	$this -> load -> view( $this->session->userdata('tipo_de_usuario') );
}
//->FIN Lista

//Busca
public function Busca()
{
	$id_cliente = $this -> input -> post('id_cliente');
	$busca = $this -> Modelo_cliente -> Busca( $id_cliente );

	echo"<script type='text/javascript'>
		$('#id_cliente').val('".$busca -> id_cliente."');
		$('#tipo').val('".$busca -> tipo."');
		$('#razon_social').val('".$busca -> razon_social."');
		$('#celular').val('".$busca -> celular."');
		$('#credito_otorgado').val('".$busca -> credito_otorgado."');
		$('#deuda_actual').val('".$busca -> deuda_actual."');
		
	</script>";
}
//FIN Busca

//Modifica
public function Modifica()
{
	echo $id_cliente = $this -> input -> post('id_cliente');
	$data = array(
		'tipo' => trim($this -> input -> post('tipo')),
		'razon_social' => trim( $this -> input -> post('razon_social') ),
		'celular' => trim( $this -> input -> post('celular') ),
		'credito_otorgado' => trim( $this -> input -> post('credito_otorgado') ),
		'deuda_actual' => trim( $this -> input -> post('deuda_actual') ),

		 );
	$modifica = $this -> Modelo_cliente -> Modifica( $id_cliente,$data );	
}
//FIN Modifica

}

