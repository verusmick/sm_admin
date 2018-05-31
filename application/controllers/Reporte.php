<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller {

//Producto
public function Producto()
{
	$data['titulo']="Reporte de Productos";
	$data['productos'] = $this -> Modelo_reporte -> Busca_productos();	
	
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('reporte/reporte_producto',$data);
	$this->load->view($this->session->userdata('tipo_de_usuario'));
}
//Producto

//Busca_productos
public function Busca_productos()
{
	$dato = $this -> input -> post('dato');
	
	$data['productos'] = $this -> Modelo_reporte -> Busca_productos($dato);	
	$this -> load -> view('reporte/reporte_producto',$data);	

}
//Busca_productos

//Tipo_nota
public function Tipo_nota()
{
	$data['titulo']="Reporte por tipo de nota";
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('reporte/tipo_nota',$data);
	$this->load->view($this->session->userdata('tipo_de_usuario'));
}
//Tipo_nota

//Productos_por_tipo_de_nota
public function Productos_por_tipo_de_nota()
{
	$id_tipo_de_venta = $this -> input -> post('id_tipo_de_venta');
	$data['productos'] = $this -> Modelo_reporte -> Productos_por_tipo_de_nota($id_tipo_de_venta);	
	$this -> load -> view('reporte/reporte_por_tipo_de_nota',$data); 

}
//Productos_por_tipo_de_nota

//Ingresos
public function Ingresos()
{
	$data['titulo']="Reporte de ingresos";
	$data['ingresos'] = $this -> Modelo_reporte -> Ingresos();	
	
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('reporte/reporte_ingresos',$data);
	$this->load->view($this->session->userdata('tipo_de_usuario')); 
}
//Ingresos

//Ingresos_de_productos
public function Ingresos_de_productos()
{
	$data['titulo']="Reporte de ingresos de productos";
	$data['ingresos'] = $this -> Modelo_reporte -> Ingresos_de_productos();	
	
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('reporte/reporte_ingresos_productos',$data);
	$this->load->view($this->session->userdata('tipo_de_usuario')); 
}
//Ingresos_de_productos

//Ventas_por_producto
public function Ventas_por_producto()
{
	$data['titulo']="Reporte de ventas por Producto";
	$data['productos'] = $this -> Modelo_reporte -> Lista_de_productos();	
	
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('reporte/reporte_venta_por_producto',$data);
	$this->load->view($this->session->userdata('tipo_de_usuario')); 
}
//Ventas_por_producto

//Busca_ventas_por_producto
public function Busca_ventas_por_producto()
{
	$id_producto_laboratorio = $this -> input -> post('id_producto_laboratorio');
	$data['productos'] = $this -> Modelo_reporte -> Ventas_por_producto($id_producto_laboratorio); 
	$this -> load -> view('reporte/reporte_venta_por_producto_resultado',$data);
}
//Busca_ventas_por_producto

//Ventas_por_laboratorio
public function Ventas_por_laboratorio()
{
	$data['titulo']="Reporte de ventas por Laboratorio";
	$data['laboratorios'] = $this -> Modelo_laboratorio -> Lista();	
	
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('reporte/por_laboratorio/laboratorio',$data);
	$this->load->view($this->session->userdata('tipo_de_usuario')); 
}
//Ventas_por_laboratorio

//Busca_ventas_por_laboratorio
public function Busca_ventas_por_laboratorio()
{
	$id_laboratorio = $this -> input -> post('id_laboratorio');
	$data['productos'] = $this -> Modelo_reporte -> Ventas_por_laboratorio($id_laboratorio); 
	$this -> load -> view('reporte/por_laboratorio/resultado',$data);
}
//Busca_ventas_por_laboratorio

//Reporte_recibos
public function Reporte_recibos()
{
$data['titulo']="LISTA DE RECIBOS";
$data['recibos'] = $this -> Modelo_reporte -> Lista_recibos();

$this->load->view('plantilla/header',$data);
$this -> load -> view('reporte/recibo/recibos');	
$this->load->view($this->session->userdata('tipo_de_usuario'));	
}
//Reporte_recibos

//Cliente_cupo
public function Cliente_cupo()
{
$data['titulo']="LISTA DE CLIENTES Y CUPOS";
$data['clientes'] = $this -> Modelo_reporte -> Cliente_cupo();

$this->load->view('plantilla/header',$data);
$this -> load -> view('reporte/cliente/cupo');	
$this->load->view($this->session->userdata('tipo_de_usuario'));	
}
//Cliente_cupo

//Lista_precios
public function Lista_precios()
{
$data['titulo']="LISTA DE PRECIOS";
$data['recibos'] = $this -> Modelo_reporte -> Lista_precios();

$this->load->view('plantilla/header',$data);
$this -> load -> view('reporte/precio/precio');	
$this->load->view($this->session->userdata('tipo_de_usuario'));	
}
//Lista_precios

//Nota_con_factura()
public function Nota_con_factura()
{
$data['titulo']="NOTAS CON FACTURA";
$data['facturas'] = $this -> Modelo_reporte -> Nota_con_factura();

$this->load->view('plantilla/header',$data);
$this -> load -> view('reporte/factura/factura');	
$this->load->view($this->session->userdata('tipo_de_usuario'));	
}
//Nota_con_factura()

//por_vendedor
public function por_vendedor()
{
$data['titulo']="Reporte de Ventas";
$data['funcionarios'] = $this -> Modelo_funcionario -> Lista_funcionarios();


$this->load->view('plantilla/header',$data);
$this -> load -> view('reporte/por_vendedor/vendedor');	
$this->load->view($this->session->userdata('tipo_de_usuario'));	
}
//por_vendedor

//Ventas_vendedor
public function Ventas_vendedor()
{
	$id_funcionario = $this -> input -> post('id_funcionario');
	$fecha1 = $this -> input -> post('fecha1');
	$fecha2 = $this -> input -> post('fecha2');
$data['titulo']="Reporte de Ventas";
$data['ventas'] = $this -> Modelo_reporte -> Ventas_vendedor($id_funcionario,$fecha1,$fecha2);

$this->load->view('plantilla/header',$data);
$this -> load -> view('reporte/por_vendedor/resultado');	
$this->load->view($this->session->userdata('tipo_de_usuario'));	
}
//Ventas_vendedor

//Ventas_a_cliente
public function Ventas_a_cliente()
{
$data['titulo']="Reporte de Ventas a Cliente";
$this->load->view('plantilla/header',$data);
$this -> load -> view('reporte/cliente/busca');	
$this->load->view($this->session->userdata('tipo_de_usuario'));	
}
//Ventas_a_cliente

//Resultado_ventas_cliente
public function Resultado_ventas_cliente()
{
	$id_cliente = $this -> input -> post('id_cliente');
	$estado = $this -> input -> post('estado');
	$data['ventas'] = $this -> Modelo_reporte -> Ventas_al_cliente($id_cliente,$estado);
	
	$data['titulo']="Reporte de Ventas a Cliente";
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('reporte/cliente/resultado');	
	$this->load->view($this->session->userdata('tipo_de_usuario'));
	
}
//Resultado_ventas_cliente

	
}