<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ingreso extends CI_Controller {

public function Nuevo()
{
	$data['titulo']="Agregar Ingreso de Productos";
	$data['laboratorios'] = $this -> Modelo_laboratorio -> Lista();
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('ingreso/nuevo');	
	$this->load->view($this->session->userdata('tipo_de_usuario'));
}

//Registrar
public function Registrar()
{
	$data = array(
		'funcionario_que_registra' => $this -> session -> userdata('id_usuario'),
		'id_laboratorio' => $this -> input -> post('id_laboratorio'),
		'cantidad_de_productos' => trim($this -> input -> post('cantidad_de_productos')),
		'numero_de_nota' => trim($this -> input -> post('numero_de_nota')),
		'tipo_de_nota' => trim($this -> input -> post('tipo_de_nota')),
		'fecha_de_la_nota' => trim($this -> input -> post('fecha_de_la_nota')),
		'total_a_pagar' => trim($this -> input -> post('total_a_pagar')),
		'pagado' => '0',
		'estado' => 'PENDIENTE',
		'fecha_de_registro' => date('Y-m-d')
	);
	$insertar = $this -> Modelo_ingreso -> Insertar($data);
}
//Registrar

//Lista_ingresos
public function Lista_ingresos()
{
	$data['titulo']="Lista de Ingreso de Productos";
	$data['ingresos'] = $this -> Modelo_ingreso -> Lista_ingresos();
	
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('ingreso/lista_ingresos');	
	$this->load->view($this->session->userdata('tipo_de_usuario'));
}
//FIN Lista_ingresos

//Agrega_producto
public function Agrega_producto()
{
	$data['titulo']="Ingreso de Productos";
	$id_nota_de_ingreso_productos = $this -> input ->get('id_nota_de_ingreso_productos');
	$this -> Modelo_ingreso -> Cuenta_ingresos($id_nota_de_ingreso_productos);
	$data['datos_ingreso'] = array(
		'id_nota_de_ingreso_productos' => $this -> input ->get('id_nota_de_ingreso_productos'),
		'id_laboratorio' => $this -> input ->get('id_laboratorio'),
		'cantidad_de_productos' => $this -> input ->get('cantidad_de_productos'),
		'descripcion' => $this -> input ->get('descripcion'),
		'ingresados' => $this -> Modelo_ingreso -> Cuenta_ingresos($id_nota_de_ingreso_productos)
	);
	
	
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('ingreso/ingreso_productos');	
	$this->load->view($this->session->userdata('tipo_de_usuario'));
}
//Agrega_producto

//Guarda_producto
public function Guarda_producto()
{
	$data = array(
		'id_nota_de_ingreso_productos' => $this -> input ->post('id_nota_de_ingreso_productos'),
		'id_producto_laboratorio' => $this -> input ->post('id_producto_laboratorio'),
		'registrado_por' => $this -> session -> userdata('id_usuario'),
		'no_de_lote' => trim($this -> input ->post('no_de_lote')),
		'registro_sanitario' => trim($this -> input ->post('registro_sanitario')),
		'fecha_de_vencimiento' => trim($this -> input ->post('fecha_de_vencimiento')),
		'unidades_ingresadas' => trim($this -> input ->post('unidades_ingresadas')),
		'precio_de_ingreso_unitario' => trim($this -> input ->post('precio_de_ingreso_unitario')),
		'precio_de_ingreso_total' => trim($this -> input ->post('precio_de_ingreso_total')),
		'observaciones_ingreso' => trim($this -> input ->post('observaciones_ingreso')),
		'fecha_de_registro' => date("Y-m-d"),
		'estado' => "REVISION",	
	);
	$guarda = $this -> Modelo_ingreso -> Ingresa_producto($data);
	if($guarda == true)
	{
		$id_nota_de_ingreso_productos = $this -> input ->post('id_nota_de_ingreso_productos');
		$verifica = $this -> Modelo_ingreso -> Busca_nota_ingreso($id_nota_de_ingreso_productos);
		
		$cantidad1= $verifica -> cantidad_de_productos;
		
		$ingresos = $this -> Modelo_ingreso -> Cuenta_ingresos($id_nota_de_ingreso_productos);
		if( $cantidad1 == $ingresos)
		{
			echo "<script type='text/javascript'>
			toastr.success('PRODUCTO INGRESADO.', 'INGRESO');
			toastr.warning('TODOS LOS PRODUCTOS FUERON INGRESADOS.', 'NOTA DE INGRESO');
			$('#cantidad_ingresados').val(".$ingresos.");		
			</script>";	
			$data=array ('estado' => "INGRESADOS");
			$modifica = $this -> Modelo_ingreso -> Modifica_nota_ingreso($id_nota_de_ingreso_productos,$data);
		}
		else
		{
			echo "<script type='text/javascript'>
			toastr.success('PRODUCTO INGRESADO.', 'INGRESO');
			$('#cantidad_ingresados').val(".$ingresos.");		
			</script>";
		}
	}
}
//Guarda_producto

//Busca_producto
public function Busca_producto()
{
	$producto = $this -> input ->post('producto');
	$id_laboratorio = $this -> input ->post('id_laboratorio');
	
	$busqueda = $this -> Modelo_ingreso -> Busca_producto($producto, $id_laboratorio);
	if ($busqueda == false)
	{
		echo "<script type='text/javascript'>
    	$('#productos').hide();		
		</script>";	
	}
	else
	{
		echo "<script type='text/javascript'>
    	$('#productos').show();		
		</script>";
		
		echo "<option>=ELEGIR=</option>";
		foreach($busqueda as $prod)
		{
			echo"
				
				<option value=".$prod->id_producto_laboratorio."> ".$prod->producto." ".$prod->concentrado." ".$prod->presentacion." </option>
			";
		}
	}
}
//Busca_producto

//Imprime_revision
public function Imprime_revision()
{
	$id_nota_de_ingreso_productos = base64_decode($this -> input ->get('id_nota_de_ingreso_productos'));
	
	$data['nota_ingreso'] = $this -> Modelo_ingreso -> Busca_nota_ingreso($id_nota_de_ingreso_productos);
	$data['productos_nota_ingreso'] = $this -> Modelo_ingreso ->Busca_productos_nota($id_nota_de_ingreso_productos);
	
 	$this -> load -> view('ingreso/imprime_revision',$data);
}
//fin Imprime_revision

//Modifica_ingreso
public function Modifica_ingreso()
{
	$id_nota_de_ingreso_productos = base64_decode($this -> input ->get('id_nota_de_ingreso_productos'));

	$data['nota_ingreso'] = $this -> Modelo_ingreso -> Busca_nota_ingreso($id_nota_de_ingreso_productos);
	$data['laboratorios'] = $this -> Modelo_laboratorio -> Lista();
 	
	$data['titulo']="Modifica Ingreso de Productos";
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('ingreso/modifica_ingreso',$data); 
	$this->load->view($this->session->userdata('tipo_de_usuario'));
}
//Modifica_ingreso

//Modificar_datos_ingreso
public function Modificar_datos_ingreso()
{
	$id_nota_de_ingreso_productos = $this -> input -> post('id_nota_de_ingreso_productos');
	$data = array(
		'id_laboratorio' => $this -> input -> post('id_laboratorio'),
		'cantidad_de_productos' => trim($this -> input -> post('cantidad_de_productos')),
		'numero_de_nota' => trim($this -> input -> post('numero_de_nota')),
		'tipo_de_nota' => trim($this -> input -> post('tipo_de_nota')),
		'fecha_de_la_nota' => trim($this -> input -> post('fecha_de_la_nota')),
		'total_a_pagar' => trim($this -> input -> post('total_a_pagar'))
	);
	$modificar = $this -> Modelo_ingreso -> Modificar_datos_ingreso($data, $id_nota_de_ingreso_productos);
}
//Modificar_datos_ingreso

//Revisar_nota
public function Revisar_nota()
{
	$id_nota_de_ingreso_productos = base64_decode($this -> input ->get('id_nota_de_ingreso_productos'));
	$data['nota_ingreso'] = $this -> Modelo_ingreso -> Busca_nota_ingreso($id_nota_de_ingreso_productos);
	$data['productos'] = $this -> Modelo_ingreso -> Busca_productos_nota($id_nota_de_ingreso_productos);
	
	$data['titulo']="REVISION DE PRODUCTOS";
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('ingreso/revisar',$data); 
	$this->load->view($this->session->userdata('tipo_de_usuario'));
}
//FIN Revisar_nota

//Busca_productos_nota
public function Busca_productos_nota()
{
	$id_nota_de_ingreso_productos = $this -> input ->post('id_nota_de_ingreso_productos');
	$data['productos'] = $this -> Modelo_ingreso -> Busca_productos_nota($id_nota_de_ingreso_productos);
	$this -> load -> view('ingreso/lista_de_productos',$data);
}
//FINBusca_productos_notas

//Revisa_producto
public function Revisa_producto()
{
	$id_producto_venta = base64_decode($this -> input ->get('id_producto_venta'));
	$data['datos'] = array(
	'pi' => base64_decode($this -> input ->get('pi')),
	'pd' => base64_decode($this -> input ->get('pd')),
	'pf' => base64_decode($this -> input ->get('pf')),
	'id_producto_venta' => $id_producto_venta
	);
	$this -> load -> view('ingreso/revisa_producto',$data);
}
//Revisa_producto

//Modifca_producto
public function Modifca_producto()
{
	 $id_producto_venta = $this -> input ->post('id_producto_venta');
	$data = array (
		'fecha_de_revision' => date("Y-m-d"),
		'unidades_optimas' => $this -> input ->post('unidades_optimas'),
		'unidades_defectuosas' => $this -> input ->post('unidades_defectuosas'),
		'cantidad_a_la_venta' => $this -> input ->post('cantidad_a_la_venta'),
		'precio_instituciones' => $this -> input ->post('precio_instituciones'),
		'precio_distribuidora' => $this -> input ->post('precio_distribuidora'),
		'precio_farmacia' => $this -> input ->post('precio_farmacia'),
		'estado' => "EN INVENTARIO",
		'revisado_por' => $this -> session -> userdata('id_usuario')
	);
	
	$modifica = $this -> Modelo_ingreso -> Modifica_producto($id_producto_venta, $data);
}
//FIN Modifca_producto


//Lista_productos
public function Lista_productos()
{
	$data['titulo']="LISTA DE PRODUCTOS";
	$data['lista_lab'] = $this -> Modelo_laboratorio -> Lista();
	
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('ingreso/productos/busca',$data); 
	$this->load->view($this->session->userdata('tipo_de_usuario'));	
}
//FIN Lista_productos

//Busca_productos_lab
public function Busca_productos_lab()
{
	$id_laboratorio = $this -> input ->post('id_laboratorio');
	$data['productos'] = $this -> Modelo_ingreso -> Busca_productos_lab($id_laboratorio);
	$this -> load -> view('ingreso/productos/lista_de_productos',$data); 
}
//FIN Busca_productos_lab

//Recupera_producto
public function Recupera_producto()
{
	$id_producto_venta = base64_decode($this -> input ->get('id_producto_venta'));
	$data['titulo']="MODIFICA PRODUCTO";
	$data['prod'] = $this -> Modelo_ingreso -> Busca_producto_id($id_producto_venta);
	
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('ingreso/productos/modifica_producto'); 
	$this->load->view($this->session->userdata('tipo_de_usuario'));	
}
//fin Recupera_producto

//Modifica_datos_producto
public function Modifica_datos_producto()
{
	echo $id_producto_venta = $this -> input ->post('id_producto_venta');
	$data = array (
		'no_de_lote' => $this -> input ->post('no_de_lote'),
		'precio_instituciones' => $this -> input ->post('precio_instituciones'),
		'registro_sanitario' => $this -> input ->post('registro_sanitario'),
		'fecha_de_vencimiento' => $this -> input ->post('fecha_de_vencimiento'),
		'observaciones_ingreso' => $this -> input ->post('observaciones_ingreso'),
		'precio_instituciones' => $this -> input ->post('precio_instituciones'),
		'precio_distribuidora' => $this -> input ->post('precio_distribuidora'),
		'precio_farmacia' => $this -> input ->post('precio_farmacia'),
	);
	$modifica = $this -> Modelo_ingreso -> Modifica_producto($id_producto_venta, $data);	
}

//FIN Modifica_datos_producto

//Nuevo_pago
public function Nuevo_pago()
{
	$data['titulo']="PAGO DE NOTAS DE INGRESO";
	$data['notas'] = $this -> Modelo_ingreso -> Lista_ingresos();
	
	$this->load->view('plantilla/header',$data);
	$this -> load -> view('ingreso/pagos/pago',$data); 
	$this->load->view($this->session->userdata('tipo_de_usuario'));	
}
//Nuevo_pago

//Registrar_pago
public function Registrar_pago()
{
	$id_nota_de_ingreso_productos = $this -> input ->post('id_nota_de_ingreso_productos');
	$numero_pago = trim($this -> input ->post('numero_pago'));
	$pagar = round($this -> input ->post('pagar'));
	$pagado1 = $this -> input ->post('pagado');
	$monto_pago = $this -> input ->post('monto_pago');
	$pagado = $pagado1 + $monto_pago;
	
	
	$data = array(
		'id_nota_de_ingreso_productos' => $id_nota_de_ingreso_productos ,
		'id_funcionario' => $this -> session -> userdata('id_usuario'),
		'numero_pago' => $numero_pago,
		'monto_pago' => $monto_pago,
		'fecha_de_pago' => date('Y-m-d'),
		'estado' => "1"
	);
	$insertar = $this -> Modelo_ingreso -> Agrega_pago($data);
	if($insertar == true)
	{
		$data = array(
			'pagado' => $pagado,
		);	
		$modifica = $this -> Modelo_ingreso -> Modificar_datos_ingreso($data, $id_nota_de_ingreso_productos);
		echo "<script type='text/javascript'>
			toastr.success('PAGO REALIZADO.', 'PAGO INGRESOS');
					
			</script>";	
	}
	
}
//FIN Registrar_pago

//Busca_boletas
public function Busca_boletas()
{
	$id_nota_de_ingreso_productos = $this -> input ->post('id_nota_de_ingreso_productos');
	$data['pagos'] = $this -> Modelo_ingreso -> Busca_boletas($id_nota_de_ingreso_productos);
	$this -> load -> view('ingreso/pagos/lista_pagos',$data); 
}
//FIN Busca_boletas

//Anular_pago
public function Anular_pago()
{
	$id_pago_de_nota = $this -> input ->post('id_pago_de_nota');
	
	$data =array(
		'estado' => 0,
		'monto_pago' =>0
	);
	$modifica = $this -> Modelo_ingreso -> Modifica_pago($id_pago_de_nota, $data);
	
	$nota = $this -> Modelo_ingreso -> Busca_pago_id($id_pago_de_nota);
	$id_nota_de_ingreso_productos = $nota -> id_nota_de_ingreso_productos;
	
	$suma= $this -> Modelo_ingreso -> Suma_pagos($id_nota_de_ingreso_productos);
	$sum = $suma -> suma_pagos;
	$data = array('pagado' => $sum);
	$this -> Modelo_ingreso ->Modificar_datos_ingreso($data, $id_nota_de_ingreso_productos);
	echo "<script type='text/javascript'>
			toastr.success('PAGO ANULADO.', 'PAGO INGRESOS');
					
			</script>";	
	
}
//Anular_pago



}