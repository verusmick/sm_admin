<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionario extends CI_Controller {

	public function Nuevo()
	{
		$tipo_de_usuario = $this -> session -> userdata('tipo_de_usuario');
		$logueado 		 = $this -> session -> userdata('logueado');
		
		if($logueado=="1")
		{
			$data['titulo']="NUEVO FUNCIONARIO";
			$this ->  load  ->view('header',$data);
			$this ->  load  ->view('funcionario/nuevo');
			$this ->  load  ->view($tipo_de_usuario=$this->session->userdata('tipo_de_usuario'));
		}
		else
		{
			redirect('Login/Salir');	
		}
	}
	
	//->VERIFICA FUNCIONARIO
	public function Verifica()
	{
			$nombres = $this -> input -> post('nombres');
			$paterno = $this -> input -> post('paterno');
			$materno = $this -> input -> post('materno');
			$ci = $this -> input -> post('ci');
			
			$verifica_funcionario=	$this	->	Modelo_funcionario -> Buscar_funcionario($nombres, $paterno, $materno, $ci);
			if($verifica_funcionario==0)
			{
				echo"<div id='alert_succes' class='alert alert-callout alert-success' role='alert'>
					<strong>Puede registrar el usuario.
					</div>
				";	
				echo"<script type='text/javascript'>
					$('#registrar').removeAttr('disabled');
				</script> ";
			}
			else
			{
				echo"<div id='alert_succes' class='alert alert-callout alert-danger' role='alert'>
					<strong>El usuario existe.
					</div>
				";
				echo"<script type='text/javascript'>
				$('#registrar').attr('disabled', 'disabled');
				
				</script> ";
			}
	}
	//->FIN VERIFICA FUNCIONARIO
	
	//->INSERTA 
	public function Insertar()
	{
		$tipo_de_usuario = $this -> session -> userdata('tipo_de_usuario');
		$logueado 		 = $this -> session -> userdata('logueado');
		if($logueado=="1")
		{
			$data = array(
			'nombres'    => $this -> input -> post('nombres'),
			'paterno'	 => $this -> input -> post('paterno'),
			'materno' 	 => $this -> input -> post('materno'),
			'ci' 	 	 => $this -> input -> post('ci'),
			'direccion'  => $this -> input -> post('direccion'),
			'telefonos'  => $this -> input -> post('telefonos'),
			'celular' 	 => $this -> input -> post('celular'),
			'cargo' 	 => $this -> input -> post('cargo')
			);
			$Insertar_usuario =	$this -> Modelo_funcionario -> Insertar($data);
			redirect('Funcionario/Lista');
		}
		else
		{
			redirect('Login/Salir');
		}	
	}
	//->FIN INSERTA
	
	//->LISTA
	public function Lista()
	{
		$tipo_de_usuario = $this -> session -> userdata('tipo_de_usuario');
		$logueado 		 = $this -> session -> userdata('logueado');
		
		if($logueado=="1")
		{
			$data['titulo'] = "LISTA FUNCIONARIO";
			$data['lista_funcionario'] = $this -> Modelo_funcionario -> Lista_funcionarios();
			
			$this -> load -> view('header',$data);
			$this -> load -> view('funcionario/lista',$data);
			$this ->  load  ->view($tipo_de_usuario=$this->session->userdata('tipo_de_usuario'));
		}
		else
		{
			redirect('Login/Salir');	
		}
	}
	//->FIN LISTA
	
	//->BUSCAR POR ID
	public function Buscar_por_id()
	{
		$id_funcionario = $this -> input -> post('id_funcionario');
		$recupera_funcionario = $this -> Modelo_funcionario -> Busca_por_id($id_funcionario);
		if($recupera_funcionario == false)
		{
		}
		else
		{
		echo"<script type='text/javascript'>
			$('#nombres').val('".$recupera_funcionario -> nombres."');
			$('#paterno').val('".$recupera_funcionario -> paterno."');
			$('#materno').val('".$recupera_funcionario -> materno."');
			$('#ci_recuperado').val('".$recupera_funcionario -> ci."');
			$('#direccion').val('".$recupera_funcionario -> direccion."');
			$('#telefonos').val('".$recupera_funcionario -> telefonos."');
			$('#celular').val('".$recupera_funcionario -> celular."');
			$('#cargo').val('".$recupera_funcionario -> cargo."');
			$('#id_funcionario_recuperado').val('".$recupera_funcionario -> id_funcionario."');
			
		</script>
		";
		}
	}
	//->FIN BUSCAR POR ID
	
	//->MODIFICAR
	public function Modificar()
	{
		$tipo_de_usuario = $this -> session -> userdata('tipo_de_usuario');
		$logueado 		 = $this -> session -> userdata('logueado');
		if($logueado=="1")
		{
			$id_funcionario = $this -> input -> post('id_funcionario_recuperado');
			
			$data = array(
			'nombres'    => $this -> input -> post('nombres'),
			'paterno'	 => $this -> input -> post('paterno'),
			'materno' 	 => $this -> input -> post('materno'),
			'ci' 	 	 => $this -> input -> post('ci'),
			'direccion'  => $this -> input -> post('direccion'),
			'telefonos'  => $this -> input -> post('telefonos'),
			'celular' 	 => $this -> input -> post('celular'),
			'cargo' 	 => $this -> input -> post('cargo')
			);
			$Modificar = $this -> Modelo_funcionario -> Modifica($id_funcionario, $data);
			redirect('Funcionario/Lista');
		}
		else
		{
			redirect('Login/Salir');
		}
	}
	//->MODIFICAR
	
	
}