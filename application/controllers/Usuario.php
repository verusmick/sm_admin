<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

public function Nuevo()
{
	$data['titulo']="Agregar Usuario";
	$data['lista_funcionario'] = $this -> Modelo_funcionario -> Lista_funcionarios();
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('usuario/nuevo');	
	$this->load->view($this->session->userdata('tipo_de_usuario'));
}

public function Lista()
{
	$data['titulo']="Nuevo Funcionario";
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('funcionario/nuevo');	
	$this->load->view($this->session->userdata('tipo_de_usuario'));
}

//Lista_usuarios
public function Lista_usuarios()
{
	$data['lista_usuario'] = $this -> Modelo_usuario -> Lista_usuario();
	$data['titulo']="Lista de Usuarios";
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('usuario/lista');	
	$this->load->view($this->session->userdata('tipo_de_usuario'));
}
//FIN Lista_usuarios

//Busca_funcionario
public function Busca_funcionario()
{
	$id_funcionario = $this -> input ->post('id_funcionario');
	$buscar = $this -> Modelo_funcionario -> Busca_id($id_funcionario);	
	$funcionario = $buscar -> nombres." ".$buscar -> paterno." ".$buscar -> materno;
	echo "<script type='text/javascript'>
    		toastr.success('DATOS DEL FUNCIONARIO RECUPERADOS.', 'FUNCIONARIO');			
			$('#funcionario').val( '".$funcionario."');	
			$('#usuario').val( '".$buscar -> ci."');	
			$('#clave').val( '".$buscar -> ci."');		
		</script>";
}
//FIN Busca_funcionario

//Agrega
public function Agrega()
{
	echo $this ->input ->post('id_funcionario');
	$data = array(
	'tipo_de_usuario' => trim($this ->input ->post('tipo_de_usuario')),
	'usuario' => trim($this ->input ->post('usuario')),
	'clave' => trim($this ->input ->post('clave')),
	'funcionario' => trim($this ->input ->post('id_funcionario')),
	'estado' => "1"
	);
	$insertar =	$this -> Modelo_usuario -> Insertar($data);
	if($insertar == false)
	{
		echo "<script type='text/javascript'>
    		toastr.error('NO SE REGISTRARON LOS DATOS', 'USUARIO');				
		</script>";	
	}
	else
	{
		echo "<script type='text/javascript'>
    		toastr.success('DATOS REGISTRADOS.', 'USUARIO');				
		</script>";
	}
}
//FIN Agrega

//Modifica_estado
public function Modifica_estado()
{
	$id_usuario = $this -> input -> post('id_usuario');
	$data = array(
		'estado' => $this -> input -> post('activo')
	);
	$this -> Modelo_usuario -> Modifica($id_usuario,$data);
	echo "<script type='text/javascript'>
	toastr.warning('DATOS MODIFICADOS.', 'FUNCIONARIO');
	";
}
//FIN Modifica_estado

}