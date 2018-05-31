<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratorio_producto extends CI_Controller {

	public function Nuevo()
	{
		$id_laboratorio = $this ->input ->get('id_laboratorio');
		$descripcion = $this ->input ->get('descripcion');
		$this->session->set_flashdata('id_laboratorio',$id_laboratorio);
		$this->session->set_flashdata('descripcion',$descripcion);
		$this->session->flashdata('id_laboratorio');
		$this->session->flashdata('descripcion');
		if(isset($id_laboratorio))
		{
		  redirect('Laboratorio_producto/Nuevo_producto');	
		}
		else
		{
		redirect('Verifica');	
		}
	}
	
	public function Nuevo_producto()
	{
		$tipo_de_usuario = $this -> session -> userdata('tipo_de_usuario');
		$logueado 		 = $this -> session -> userdata('logueado');
		
		if($logueado=="1")
		{
			$data['titulo']="NUEVO PRODUCTO DEL LABORATORIO";
			$this ->  load  ->view('header',$data);
			$this ->  load  ->view('laboratorio/producto/nuevo');
			$this ->  load  ->view($tipo_de_usuario=$this->session->userdata('tipo_de_usuario'));
		}
		else
		{
			redirect('Login/Salir');	
		}
	}
	//->VERIFICA
	public function Verifica()
	{
			$id_laboratorio = trim($this -> input -> post('id_laboratorio'));
			$producto = trim($this -> input -> post('producto'));
			$concentrado = trim($this -> input -> post('concentrado'));
			$presentacion = trim($this -> input -> post('presentacion'));
			$clasificacion_terapeutica = trim($this -> input -> post('clasificacion_terapeutica'));
			
			$verifica=	$this	->	Modelo_laboratorio_producto -> Verificar($id_laboratorio, $producto, $concentrado, $presentacion, $clasificacion_terapeutica);
			if($verifica==0)
			{
				echo"<div id='alert_succes' class='alert alert-callout alert-success' role='alert'>
					<strong>Puede registrar.
					</div>
				";	
				echo"<script type='text/javascript'>
					$('#registrar').removeAttr('disabled');
				</script> ";
			}
			else
			{
				echo"<div id='alert_succes' class='alert alert-callout alert-danger' role='alert'>
					<strong>El registro ya existe.
					</div>
				";
				echo"<script type='text/javascript'>
				$('#registrar').attr('disabled', 'disabled');
				
				</script> ";
			}
	}
	//->FIN VERIFICA 
	
	//->INSERTA 
	public function Insertar()
	{
		$tipo_de_usuario = $this -> session -> userdata('tipo_de_usuario');
		$logueado 		 = $this -> session -> userdata('logueado');
		if($logueado=="1")
		{
			$data = array(
			'id_laboratorio'    => $this -> input -> post (trim('id_laboratorio')),
			'producto'    		=> $this -> input -> post (trim('producto')),
			'concentrado'    	=> $this -> input -> post (trim('concentrado')),
			'presentacion'    	=> $this -> input -> post (trim('presentacion')),
			'clasificacion_terapeutica'    => $this -> input -> post (trim('clasificacion_terapeutica')),
			'precio_distribuidora_referencial'    => $this -> input -> post (trim('precio_distribuidora_referencial')),
			'precio_farmacia_referencial'    => $this -> input -> post (trim('precio_farmacia_referencial')),
			'precio_instituciones_referencial'    => $this -> input -> post (trim('precio_instituciones_referencial')),
			
			'fecha_de_registro'	 => date("Y-m-d")
			);
			$Insertar =	$this -> Modelo_laboratorio_producto -> Insertar($data);
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
			$data['titulo'] = "LISTA DE PRODUCTOS";
			$id_laboratorio = $this -> input ->get('id_laboratorio');
			
			$data['lista'] = $this -> Modelo_laboratorio_producto -> Lista($id_laboratorio);
			
			$this -> load -> view('header',$data);
			$this -> load -> view('laboratorio/producto/lista',$data);
			$this ->  load  ->view($tipo_de_usuario=$this->session->userdata('tipo_de_usuario'));
		}
		else
		{
			redirect('Login/Salir');	
		}
	}
	//->FIN LISTA
	
	//->MODIFICA
	public function Buscar()
	{
		$tipo_de_usuario = $this -> session -> userdata('tipo_de_usuario');
		$logueado 		 = $this -> session -> userdata('logueado');
		
		if($logueado=="1")
		{
			$data['titulo'] = "PRODUCTO PARA MODIFICAR";
			$id_producto_laboratorio = $this -> input ->get('id_producto_laboratorio');
			
			$data['lista_laboratorio'] = $this -> Modelo_laboratorio -> Lista_laboratorio();
			$data['producto'] = $this -> Modelo_laboratorio_producto -> Busca_por_id($id_producto_laboratorio);
			
			$this -> load -> view('header',$data);
			$this -> load -> view('laboratorio/producto/modificar',$data);
			$this ->  load  ->view($tipo_de_usuario=$this->session->userdata('tipo_de_usuario'));
		}
		else
		{
			redirect('Login/Salir');	
		}
	}
	
	public function Modificar()
	{
		$id_producto_laboratorio = $this -> input -> post('id_producto_laboratorio');
		$data=array(
		'id_laboratorio' 					=> trim($this -> input -> post('id_laboratorio')),
		'producto' 							=> trim($this -> input -> post('producto')), 
		'concentrado' 						=> trim($this -> input -> post('concentrado')), 
		'presentacion' 						=> trim($this -> input -> post('presentacion')), 
		'clasificacion_terapeutica' 		=> trim($this -> input -> post('clasificacion_terapeutica')), 
		'precio_distribuidora_referencial' 	=> trim($this -> input -> post('precio_distribuidora_referencial')), 
		'precio_farmacia_referencial' 		=> trim($this -> input -> post('precio_farmacia_referencial')), 
		'precio_instituciones_referencial' 	=> trim($this -> input -> post('precio_instituciones_referencial'))
		);
		$modifica= $this -> Modelo_laboratorio_producto -> Modifica($id_producto_laboratorio, $data);
		 redirect('Laboratorio/Lista');
	}
	//->MODIFICA
}