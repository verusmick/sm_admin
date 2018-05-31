<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

//Nuevo
public function Nuevo()
{
	$data['titulo']="Agregar Cliente";
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('cliente/nuevo');	
	$this->load->view($this->session->userdata('tipo_de_usuario'));
}

//Lista
public function Lista()
{
	$data['titulo']="Lista Clientes";
	$data['lista_clientes'] = $this -> Modelo_cliente -> Lista_clientes();
	
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('cliente/lista');	
	$this->load->view($this->session->userdata('tipo_de_usuario'));
}

//Registrar
public function Registrar()
{
	$registrado_por 	= $this -> session -> userdata('id_usuario');
	$tipo 				= $this -> input -> post('tipo');
	$razon_social 		= $this -> input -> post('razon_social');
	$celular 			= $this -> input -> post('celular');
	$credito_otorgado 	= $this -> input -> post('credito_otorgado');
	$deuda_actual 		= $this -> input -> post('deuda_actual');
	
	$data =  array(
	
		'registrado_por' => $registrado_por,
		'tipo' => $tipo,
		'razon_social' => $razon_social,
		'celular' => $celular,
		'credito_otorgado' => $credito_otorgado,
		'deuda_actual' => $deuda_actual,
		 
	);
	$insertar = $this -> Modelo_cliente -> Insertar($data);
	if ($insertar == true)
	{
		 echo "<script type='text/javascript'>
    		toastr.success('REGISTRADO.', 'CLIENTE');			
			$('#boton_siguiente').hide();		
		</script>";
	
	}
}

//Buscar_por_id
public function Buscar_por_id()
{
$id = $this -> input -> post('id_cliente');	
$busca_id = $this -> Modelo_cliente -> Id($id);
echo "<script type='text/javascript'>			
			$('#tipo').val( '".$busca_id -> tipo."');
			$('#razon_social').val( '".$busca_id -> razon_social."');
			$('#celular').val( '".$busca_id -> celular."');
			$('#credito_otorgado').val( '".$busca_id -> credito_otorgado."');
			$('#deuda_actual').val( '".$busca_id -> deuda_actual."');	
					
		</script>";
}

//Modifica
public function Modifica()
{
 	$id 				= $this -> input -> post('id_cliente');
	$tipo 				= $this -> input -> post('tipo');
	$razon_social 		= $this -> input -> post('razon_social');
	$celular 			= $this -> input -> post('celular');
	$credito_otorgado 	= $this -> input -> post('credito_otorgado');
	$deuda_actual 		= $this -> input -> post('deuda_actual');
	
	$data =  array(
		'tipo' => $tipo,
		'razon_social' => $razon_social,
		'celular' => $celular,
		'credito_otorgado' => $credito_otorgado,
		'deuda_actual' => $deuda_actual, 
	);
	
	$modificar = $this -> Modelo_cliente -> Modifica($id, $data);
	echo "<script type='text/javascript'>
    		toastr.success('DATOS MODIFICADOS.', 'CLIENTE');					
		</script>";
}

/* //Lista_usuarios
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
 */
}