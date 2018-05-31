<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratorio extends CI_Controller {

//Nuevo
public function Nuevo()
{
	$data['titulo']="Nuevo Laboratorio";
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('laboratorio/nuevo');	
	$this->load->view($this->session->userdata('tipo_de_usuario'));
}
//FIN Nuevo
	
//Busca_laboratorio
public function Busca_laboratorio()
{
	$descripcion = trim($this -> input ->post('descripcion'));
	$buscar = $this -> Modelo_laboratorio -> Busca_lab($descripcion); 
	if ($buscar ==1)
	{
		 echo "<script type='text/javascript'>
    		toastr.error('YA EXISTE.', 'LABORATORIO');			
			$('#boton_siguiente').hide();		
		</script>";
	}
	else
	{
		echo "<script type='text/javascript'>
    		toastr.success('PUEDE REGISTRAR.', 'LABORATORIO');			
			$('#boton_siguiente').show();		
		</script>";
	}
}
//FIN Busca_laboratorio	

//Agrega
public function Agrega()
{
	$data = array(
	'descripcion' => trim($this ->input ->post('descripcion')),
	'fecha_de_registro' => date("Y-m-d"),
	);
	$insertar =	$this -> Modelo_laboratorio -> Insertar($data);
	if($insertar == false)
	{
		echo "<script type='text/javascript'>
    		toastr.error('NO SE REGISTRARON LOS DATOS', 'LABORATORIO');				
		</script>";	
	}
	else
	{
		echo "<script type='text/javascript'>
    		toastr.success('DATOS REGISTRADOS.', 'LABORATORIO');				
		</script>";
	}
}
//FIN Agrega	
	
//Lista
public function Lista()
{
	$data['lista_lab'] = $this -> Modelo_laboratorio -> Lista();
	$data['titulo']="Lista de Laboratorios";
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('laboratorio/lista');	
	$this->load->view($this->session->userdata('tipo_de_usuario'));
}
//FIN Lista

//Modifica_estado
public function Modifica_estado()
{
	$id_laboratorio = $this -> input -> post('id_laboratorio');
	$data = array(
		'estado' => $this -> input -> post('estado')
	);
	$this -> Modelo_laboratorio -> Modifica($id_laboratorio,$data);
	echo "<script type='text/javascript'>
	toastr.warning('DATOS MODIFICADOS.', 'LABORATORIO');
	";
}
//FIN Modifica_estado

//Ver_productos
public function Ver_productos()
{
	$id_laboratorio = $this -> input -> get('id_laboratorio');
	$data['titulo']="Productos del Laboratorio";
	$data['lista_productos'] = $this -> Modelo_laboratorio -> Ver_productos($id_laboratorio); 
	$this -> load->view('plantilla/header',$data);
	$this -> load -> view('laboratorio/productos',$data);
	$this -> load->view($this->session->userdata('tipo_de_usuario'));
}
//FIN Ver_productos

//Agregar_productos
public function Agregar_productos()
{
	$id_laboratorio = base64_decode( $this -> input -> get('id_laboratorio'));
	$laboratorio = base64_decode( $this -> input -> get('labo'));
	
	$data['laboratorio'] = $laboratorio;
	$data['id_laboratorio'] = $id_laboratorio;
	
	$data['titulo']="Agregar Producto a Laboratorio";
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('laboratorio/nuevo_producto');	
	$this->load->view($this->session->userdata('tipo_de_usuario'));	
	
}
//fin Agregar_productos

//Guarda_producto
public function Guarda_producto()
{
	$data = array(
		'id_laboratorio' => $this -> input -> post('id_laboratorio'),
		'producto' => trim($this -> input -> post('producto')),
		'concentrado' => trim($this -> input -> post('concentrado')),
		'presentacion' => trim($this -> input -> post('presentacion')),
		'clasificacion_terapeutica' => trim($this -> input -> post('clasificacion_terapeutica')),
		'precio_distribuidora_referencial' => trim($this -> input -> post('precio_distribuidora_referencial')),
		'precio_farmacia_referencial' => trim($this -> input -> post('precio_farmacia_referencial')),
		'precio_instituciones_referencial' => trim($this -> input -> post('precio_instituciones_referencial')),
		'estado' => "1",
		'fecha_de_registro' => date("Y-m-d")
		);
	$insertar = $this -> Modelo_laboratorio -> Insertar_producto($data);
	if($insertar == true)
	{
		echo "<script type='text/javascript'>
		$('#accion').text('REGISTRADO');
		";
	}
	else
	{
		echo "<script type='text/javascript'>
		$('#accion').text(FALLA);
		";
	}
}
//FIN Guarda_producto

//Busca_prod
public function Busca_prod()
{
	$id_producto_laboratorio = $this -> input ->post('id_producto_laboratorio');
	$busca = $this -> Modelo_laboratorio -> Busca_prod($id_producto_laboratorio);	
	echo "<script type='text/javascript'>
		$('#id_producto_laboratorio').val('".$id_producto_laboratorio."');
		$('#id_laboratorio').val('".$busca -> id_laboratorio."');
		$('#producto').text('".$busca -> producto."');
		$('#concentrado').val('".$busca -> concentrado."');
		$('#presentacion').val('".$busca -> presentacion."');
		$('#clasificacion_terapeutica').text('".$busca -> clasificacion_terapeutica."');
		$('#precio_distribuidora_referencial').val('".$busca -> precio_distribuidora_referencial."');
		$('#precio_farmacia_referencial').val('".$busca -> precio_farmacia_referencial."');
		$('#precio_instituciones_referencial').val('".$busca -> precio_instituciones_referencial."');
		
		if('".$busca -> estado."'==1)
		{ 
			$('#estado:checkbox').attr('checked', true); 
			$('#estado').val('1'); 
			$('#titutlo_estado').text('ACTIVO'); 
		}
		else
		{
			$('#estado:checkbox').attr('checked', false); 
			$('#estado').val('0'); 
			$('#titutlo_estado').text('INACTIVO'); 	
		}
		
	";
}
//FIN Busca_prod

//Modifica_prod
public function Modifica_prod()
{
	$id_producto_laboratorio = $this -> input ->post('id_producto_laboratorio');
	if($this -> input -> post('estado') == "")
	{
	 echo $est=0;
	}
	else
	{
	 echo $est=1;
	}
	$data = array(
		'id_laboratorio' => $this -> input -> post('id_laboratorio'),
		'producto' => trim($this -> input -> post('producto')),
		'concentrado' => trim($this -> input -> post('concentrado')),
		'presentacion' => trim($this -> input -> post('presentacion')),
		'clasificacion_terapeutica' => trim($this -> input -> post('clasificacion_terapeutica')),
		'precio_distribuidora_referencial' => trim($this -> input -> post('precio_distribuidora_referencial')),
		'precio_farmacia_referencial' => trim($this -> input -> post('precio_farmacia_referencial')),
		'precio_instituciones_referencial' => trim($this -> input -> post('precio_instituciones_referencial')),
		'estado' => $est
	);
	$cambios = $this -> Modelo_laboratorio -> Modifica_prod ($id_producto_laboratorio,$data);
	echo "<script type='text/javascript'>
	toastr.info('DATOS MODIFICADOS.', 'PRODUCTO');
	";
}
//FIN Modifica_prod

//Busca_lab_id
public function Busca_lab_id()
{
	$id_laboratorio = $this -> input ->post('id_laboratorio');
	$busca = $this -> Modelo_laboratorio -> Busca_lab_id ($id_laboratorio);
	echo "<script type='text/javascript'>
		$('#descripcion').val('".$busca -> descripcion."');
	";
}
//fin Busca_lab_id


}