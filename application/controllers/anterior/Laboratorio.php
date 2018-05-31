<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratorio extends CI_Controller {

	public function Nuevo()
	{
		$tipo_de_usuario = $this -> session -> userdata('tipo_de_usuario');
		$logueado 		 = $this -> session -> userdata('logueado');
		
		if($logueado=="1")
		{
			$data['titulo']="NUEVO LABORATORIO";
			$this ->  load  ->view('header',$data);
			$this ->  load  ->view('laboratorio/nuevo');
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
			$descripcion = trim($this -> input -> post('descripcion'));
			$verifica_laboratorio=	$this	->	Modelo_laboratorio -> Buscar_descripcion($descripcion);
			if($verifica_laboratorio==0)
			{
				echo"<div id='alert_succes' class='alert alert-callout alert-success' role='alert'>
					<strong>Puede registrar el Laboratorio.
					</div>
				";	
				echo"<script type='text/javascript'>
					$('#registrar').removeAttr('disabled');
				</script> ";
			}
			else
			{
				echo"<div id='alert_succes' class='alert alert-callout alert-danger' role='alert'>
					<strong>El Laboratorio ya existe.
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
			'descripcion'    => $this -> input -> post (trim('descripcion')),
			'fecha_de_registro'	 => date("Y-m-d")
			);
			$Insertar_laboratorio =	$this -> Modelo_laboratorio -> Insertar($data);
			redirect('Laboratorio/Lista');
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
			$data['titulo'] = "LISTA LABORATORIOS";
			$data['lista_laboratorio'] = $this -> Modelo_laboratorio -> Lista_laboratorio();
			
			$this -> load -> view('header',$data);
			$this -> load -> view('laboratorio/lista',$data);
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
		$id_laboratorio = $this -> input -> post('id_laboratorio');
		$recupera_laboratorio = $this -> Modelo_laboratorio -> Busca_por_id($id_laboratorio);
		if ($recupera_laboratorio==false)
		{
		}
		else
		{
		echo"<script type='text/javascript'>
			$('#descripcion_recupera').val('".$recupera_laboratorio -> descripcion."');
			$('#id_laboratorio_recuperado').val('".$recupera_laboratorio -> id_laboratorio."');
			
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
			$id_laboratorio = $this -> input -> post('id_laboratorio_recuperado');
			
			$data = array(
			'descripcion'    => $this -> input -> post(trim('descripcion_recupera')),
			);
			$Modificar = $this -> Modelo_laboratorio -> Modifica($id_laboratorio, $data);
			redirect('Laboratorio/Lista');
		}
		else
		{
			redirect('Login/Salir');
		}
	}
	//->MODIFICAR
	
	//->INHABILITAR
	public function Act_inact()
	{
		$estado=$this ->input ->get('estado');
		$id_laboratorio=$this ->input ->get('id_laboratorio');
		$cambia_estado = $this -> Modelo_laboratorio -> Estado($id_laboratorio,$estado);
		redirect('Laboratorio/Lista');
	}
	//->INHABILITAR
}