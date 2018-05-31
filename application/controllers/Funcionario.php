<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionario extends CI_Controller {

public function Nuevo()
{
	$data['titulo']="Nuevo Funcionario";
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('funcionario/nuevo');	
	$this->load->view($this->session->userdata('tipo_de_usuario'));
}

//Busca_ci
public function Busca_ci()
{
	echo $ci = $this -> input -> post('ci');
	$buscar = $this -> Modelo_funcionario -> Buscar_funcionario($ci);	
	if ($buscar == false)
	{
		echo "<script type='text/javascript'>
    		toastr.success('PUEDE REGISTRAR AL FUNCIONARIO.', 'FUNCIONARIO');
			$('#boton_siguiente').show();
			$('#nombres').val('');
			$('#paterno').val('');
			$('#materno').val('');
			$('#direccion').val('');
			$('#telefonos').val('');
			$('#celular').val('');
			$('#cargo').val('VENDEDOR');
		</script>";
	}
	else
	{
		echo "<script type='text/javascript'>
    		toastr.error('EL FUNCIONARIO YA EXISTE.', 'FUNCIONARIO');
			$('#boton_siguiente').hide();			
			$('#nombres').val( '".$buscar -> nombres."' );
			$('#paterno').val( '".$buscar -> paterno."' );
			$('#materno').val( '".$buscar -> materno."' );
			$('#direccion').val( '".$buscar -> direccion."' );
			$('#telefonos').val( '".$buscar -> telefonos."' );
			$('#celular').val( '".$buscar -> celular."' );
			$('#cargo').val( '".$buscar -> cargo."' );
		</script>";
	}
}
//FIN Busca_ci

//Registra
public function Registra()
{
	$data = array(
	'nombres' => trim($this ->input ->post('nombres')),
	'paterno' => trim($this ->input ->post('paterno')),
	'materno' => trim($this ->input ->post('materno')),
	'ci' => trim($this ->input ->post('ci')),
	'direccion' => trim($this ->input ->post('direccion')),
	'telefonos' => trim($this ->input ->post('telefonos')),
	'celular' => trim($this ->input ->post('celular')),
	'cargo' => trim($this ->input ->post('cargo')),
	'activo' => "1",
	);
	
	$Insertar_usuario =	$this -> Modelo_funcionario -> Insertar($data);
	
}
//FIN Registra

//Lista
public function Lista()
{
	$data['titulo']="Lista Funcionarios";
	
	$data['lista_funcionario'] = $this -> Modelo_funcionario -> Lista_funcionarios();
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('funcionario/lista');	
	$this->load->view($this->session->userdata('tipo_de_usuario'));
}
//FIN Lista

//Modifica_estado
public function Modifica_estado()
{
	$id_funcionario = $this -> input ->post('id_funcionario');	
	$data = array(
		'activo' => $this -> input ->post('activo')
	);
	$this -> Modelo_funcionario -> Modifica($id_funcionario,$data);
	echo "<script type='text/javascript'>
	toastr.warning('DATOS MODIFICADOS.', 'FUNCIONARIO');
	";
}
//FIN Modifica_estado

//Modifica_funcionario
public function Modifica_funcionario()
{
	$id_funcionario = $this -> input ->post('id_funcionario');
	
	$data = array(
	'nombres' => trim($this ->input ->post('nombres')),
	'paterno' => trim($this ->input ->post('paterno')),
	'materno' => trim($this ->input ->post('materno')),
	'ci' => trim($this ->input ->post('ci')),
	'direccion' => trim($this ->input ->post('direccion')),
	'telefonos' => trim($this ->input ->post('telefonos')),
	'celular' => trim($this ->input ->post('celular')),
	'cargo' => trim($this ->input ->post('cargo'))
	);
	$this -> Modelo_funcionario -> Modifica($id_funcionario,$data);
	echo "<script type='text/javascript'>
	toastr.warning('DATOS MODIFICADOS.', 'FUNCIONARIO');
	";
}
//FIN Modifica_funcionario

//Busca_funcionario
public function Busca_funcionario()
{
	$id_funcionario = $this -> input ->post('id_funcionario');
	$buscar = $this -> Modelo_funcionario -> Busca_id($id_funcionario);	
	echo "<script type='text/javascript'>
    		toastr.success('DATOS DEL FUNCIONARIO RECUPERADOS.', 'FUNCIONARIO');			
			$('#id_funcionario').val( '".$buscar -> id_funcionario."' );
			$('#ci').val( '".$buscar -> ci."' );
			$('#nombres').val( '".$buscar -> nombres."' );
			$('#paterno').val( '".$buscar -> paterno."' );
			$('#materno').val( '".$buscar -> materno."' );
			$('#direccion').val( '".$buscar -> direccion."' );
			$('#telefonos').val( '".$buscar -> telefonos."' );
			$('#celular').val( '".$buscar -> celular."' );
			$('#cargo').val( '".$buscar -> cargo."' );
			
		</script>";
}
//FIN Busca_funcionario
}