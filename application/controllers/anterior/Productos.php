<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {
//->LISTA
public function Lista()
{
	$tipo_de_usuario = $this -> session -> userdata('tipo_de_usuario');
	$logueado 		 = $this -> session -> userdata('logueado');
	
	if($logueado=="1")
	{
		$data['titulo'] = "LISTA DE PRODUCTOS EN INVENTARIO";
					
		$data['lista'] = $this -> Modelo_productos -> Lista();
		
		$this -> load -> view('header',$data);
		$this -> load -> view('productos/lista',$data);
		$this -> load -> view($this->session->userdata('tipo_de_usuario'));
	}
	else
	{
		redirect('Login/Salir');	
	}
}
//->FIN LISTA
	
//->BUSCA PRODUCTO
public function Busca_producto()
{
	$id_producto_venta = $this -> input -> post('id_producto_venta');
	$datos_producto = $this -> Modelo_productos -> Busca_producto($id_producto_venta);

	echo"<script type='text/javascript'>
				$('#id_producto_venta').val('".$datos_producto -> id_producto_venta."');
				$('#laboratorio').val('".$datos_producto -> descripcion."');
				$('#producto').val('".$datos_producto -> producto." : ".$datos_producto -> concentrado." : ".$datos_producto -> presentacion." : ".$datos_producto -> clasificacion_terapeutica. "');
				$('#no_de_lote').val('".$datos_producto -> no_de_lote."');
				$('#registro_sanitario').val('".$datos_producto -> registro_sanitario."');	
				$('#precio_farmacia').val('".$datos_producto -> precio_farmacia."');	
				$('#precio_distribuidora').val('".$datos_producto -> precio_distribuidora."');	
				$('#precio_instituciones').val('".$datos_producto -> precio_instituciones."');
				$('#fecha_de_vencimiento').val('".$datos_producto -> fecha_de_vencimiento."');					
				</script> ";
}
//->FIN BUSCA PRODUCTO

//->MODIFICAR DATOS
public function Guardar_modificacion()
{
	echo $id_producto_venta = $this -> input -> post('id_producto_venta');
	$data=array(
				'no_de_lote' 			=> $this -> input -> post('no_de_lote'),
				'registro_sanitario' 	=> $this -> input -> post('registro_sanitario'),
				'precio_farmacia' 		=> $this -> input -> post('precio_farmacia'),
				'precio_distribuidora'	=> $this -> input -> post('precio_distribuidora'),
				'precio_instituciones' 	=> $this -> input -> post('precio_instituciones'),
				'fecha_de_vencimiento' 	=> $this -> input -> post('fecha_de_vencimiento')
	);
	$modificar = $this -> Modelo_productos -> Guardar_modificacion($id_producto_venta, $data);
	redirect('Productos/Lista');
}
//->FIN MODIFICAR DATOS

}