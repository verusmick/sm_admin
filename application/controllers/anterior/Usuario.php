<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function Nuevo()
	{
		$tipo_de_usuario = $this -> session -> userdata('tipo_de_usuario');
		$logueado 		 = $this -> session -> userdata('logueado');
		
		if($logueado=="1")
		{
			$data['titulo']="NUEVO USUARIO";
			$data['lista_funcionario'] = $this -> Modelo_funcionario -> Lista_funcionarios();
			
			$this -> load -> view('header',$data);
			$this -> load -> view('usuario/nuevo',$data);
			$this -> load -> view( $this->session->userdata('tipo_de_usuario') );
		}
		else
		{
			redirect('Login/Salir');	
		}
	}
//-> AGREGA
	public function Agrega()
	{
		$id_funcionario = base64_decode($this -> input -> get('id_funcionario'));
		$data['funcionario'] = $this -> Modelo_usuario -> Buscar_funcionario($id_funcionario);
		
		$data['titulo']="NUEVO USUARIO";
		$this -> load -> view('header',$data);
		$this -> load -> view('usuario/agrega',$data);
		$this -> load -> view( $this->session->userdata('tipo_de_usuario') );
	}
//-> FIN AGREGA	
//-> VERIFICA
	public function Verifica()
	{
		$id_funcionario = $this -> input -> post('funcionario');
		$tipo_de_usuario = $this -> input -> post('tipo_de_usuario');
		
		$verifica_usuario=	$this	->	Modelo_usuario -> Verifica_usuario($id_funcionario, $tipo_de_usuario);
			if($verifica_usuario==0)
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
//-> FIN VERIFICA	

//->INSERTA 
	public function Insertar()
	{
		$tipo_de_usuario = $this -> session -> userdata('tipo_de_usuario');
		$logueado 		 = $this -> session -> userdata('logueado');
		if($logueado=="1")
		{
			$data = array(
			'tipo_de_usuario'    => $this -> input -> post('tipo_de_usuario'),
			'usuario'	 => $this -> input -> post('usuario'),
			'contraseña' 	 => $this -> input -> post('contraseña'),
			'funcionario' 	 	 => $this -> input -> post('funcionario')
			);
			$Insertar_usuario =	$this -> Modelo_usuario -> Insertar($data);
			redirect('Usuario/Nuevo');
		}
		else
		{
			redirect('Login/Salir');
		}	
	}
	//->FIN INSERTA
	
	//->RECURPERA USUARIOS POR FUNCIONARIO
	public function Ver()
	{
		$id_funcionario = base64_decode($this -> input -> get('id_funcionario'));
		$data['usuarios'] = $this -> Modelo_usuario -> Verifica_usuarios($id_funcionario);
		if($data['usuarios']==false)
		{
			echo"<script type='text/javascript'>
					alert(No tiene usuarios.);
				</script> ";
			redirect('Usuario/Nuevo');
		}
		else
		{
		}
		$data['titulo']="USUARIOS DEL FUNCIONARIO";
		$this -> load -> view('header',$data);
		$this -> load -> view('usuario/funcionario_usuario',$data);
		$this -> load -> view( $this->session->userdata('tipo_de_usuario') );
	}
	//->FIN RECURPERA USUARIOS POR FUNCIONARIO
	
	//->INHABILITAR
	public function Act_inact()
	{
		$estado=$this ->input ->get('estado');
		$id_usuario=$this ->input ->get('id_usuario');
		$cambia_estado = $this -> Modelo_usuario -> Estado($id_usuario,$estado);
		redirect('Usuario/Nuevo');
	}
	//->INHABILITAR
}