<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venta extends CI_Controller {

//Nueva Venta
public function Nueva_venta()
{
$data['titulo']="NUEVA VENTA";
$data['tipos'] = $this -> Modelo_venta -> Lista_tipo();
$data['lista_clientes'] = $this -> Modelo_cliente -> Lista_clientes();
$data['lista_vendedor'] = $this -> Modelo_venta -> Busca_vendedor();

$this->load->view('plantilla/header',$data);
$this -> load -> view('venta/nuevo');	
$this->load->view($this->session->userdata('tipo_de_usuario'));
}
//Nueva Venta	

//Busca_Cliente
public function Busca_Cliente()
{
	$razon_social= $this -> input ->post('cliente');
	$clientes = $this -> Modelo_venta -> Busca_clientes($razon_social);
	
	if($clientes == false)
	{
		echo " <option value='0'>NO ENCONTRADO</option> ";
	}
	else
	{
		foreach($clientes as $cliente)
		{
			echo " <option value=".$cliente->id_cliente.">".$cliente->tipo." ".$cliente->razon_social."</option> ";
		}
	}
}
//FIN Vendedor

//Busca_deuda_cliente
public function Busca_deuda_cliente()
{
	$id= $this -> input ->post('id_cliente');
	$cliente = $this -> Modelo_cliente -> Id($id);
	
	$credito_otorgado = $cliente -> credito_otorgado;
	$deuda_actual = $cliente -> deuda_actual;
	
	if($credito_otorgado <= $deuda_actual)
	{
		echo "<script type='text/javascript'>
			toastr.error('LA DEUDA DEL CLIENTE ESTA EN SU LIMITE.', 'DEUDA');
			$('#boton_siguiente').hide()
		</script>";	
	}
	else
	{
		echo "<script type='text/javascript'>
			$('#boton_siguiente').show();
		</script>";	
	}
}
//FIN Busca_deuda_cliente

//->Registra_venta
public function Registra_venta()
{
	$id_tipo_de_venta = $this -> input ->post('id_tipo_de_venta');
	$tipo_de_pago = trim($this -> input ->post('tipo_de_pago'));
	$numeros_de_nota = $this -> Modelo_venta -> Busca_tipo_de_nota($id_tipo_de_venta);
	$numero_de_nota = $numeros_de_nota -> numero_de_nota+1;
	
	switch($tipo_de_pago)
	{
		case 1:
				//Calcula Fecha
				$fecha_de_venta =  date('Y-m-d');
				$fecha = $fecha_de_venta;
				$nuevafecha = strtotime ( '+5 day' , strtotime ( $fecha ) ) ;
				$fecha_de_vencimiento_de_credito = date( 'Y-m-j' , $nuevafecha );
				//FIN Calcula Fecha
				$data = array(
					'id_tipo_de_venta' => $this -> input ->post('id_tipo_de_venta'),
					'numero_de_nota' => $numero_de_nota,
					'no_orden_compra' => $this -> input ->post('no_orden_compra'),
					'fecha_de_venta' => $fecha_de_venta,
					'id_cliente' => $this -> input ->post('id_cliente'),
					'vendedor' => $this -> input ->post('vendedor'),
					'tipo_de_pago' => "CREDITO",
					'total_a_pagar' => "0",
					'total_a_pagar_descuento' => "0",
					'fecha_de_vencimiento_de_credito' =>$fecha_de_vencimiento_de_credito,
					'descuento' => "0",
					'saldo' => "0",
					'observaciones' => $this -> input ->post('observaciones'),
					'estado' => "EN PROCESO",
					'id_usuario' => $this -> session -> userdata('id_usuario'),
				);
					$registrar = $this -> Modelo_venta -> Insertar($data);
					if ($registrar == true)
					{
						$data = array('numero_de_nota' => $numero_de_nota);
						$actualizar = $this -> Modelo_venta ->Actualizar_tipo_nota($id_tipo_de_venta,$data);
						echo "<script type='text/javascript'>
							toastr.success('VENTA REGISTRADA.', 'VENTA');
						</script>";		
					}
		break;
	
		case 2:
			//Calcula Fecha
			$fecha_de_venta =  date('Y-m-d');
			$fecha = $fecha_de_venta;
			$nuevafecha = strtotime ( '+5 day' , strtotime ( $fecha ) ) ;
			$fecha_de_vencimiento_de_credito = date( 'Y-m-j' , $nuevafecha );
			//FIN Calcula Fecha
			$data = array(
				'id_tipo_de_venta' => $this -> input ->post('id_tipo_de_venta'),
				'numero_de_nota' => $numero_de_nota,
				'no_orden_compra' => $this -> input ->post('no_orden_compra'),
				'fecha_de_venta' => $fecha_de_venta,
				'id_cliente' => $this -> input ->post('id_cliente'),
				'vendedor' => $this -> input ->post('vendedor'),
				'tipo_de_pago' => "CONTADO",
				'total_a_pagar' => "0",
				'total_a_pagar_descuento' => "0",
				'fecha_de_vencimiento_de_credito' =>$fecha_de_vencimiento_de_credito,
				'descuento' => "0",
				'saldo' => "0",
				'observaciones' => $this -> input ->post('observaciones'),
				'estado' => "EN PROCESO",
				'id_usuario' => $this -> session -> userdata('id_usuario'),
			);
				$registrar = $this -> Modelo_venta -> Insertar($data);
				if ($registrar == true)
				{
					$data = array('numero_de_nota' => $numero_de_nota);
					$actualizar = $this -> Modelo_venta ->Actualizar_tipo_nota($id_tipo_de_venta,$data);
					echo "<script type='text/javascript'>
						toastr.success('VENTA REGISTRADA.', 'VENTA');
					</script>";		
				}
		break;	
	}	
}
//->FIN Registra_venta

//Lista_venta
public function Lista_venta()
{
$data['titulo']="LISTA DE VENTAS";
$data['ventas'] = $this -> Modelo_venta -> Ventas();

$this->load->view('plantilla/header',$data);
$this -> load -> view('venta/lista_ventas');	
$this->load->view($this->session->userdata('tipo_de_usuario'));	
}
//FIN Lista_venta

//Agrega_producto
public function Agrega_producto()
{
	$data['id'] = array( 'id_venta' => base64_decode($this -> input ->get('id_venta')));
	$data['titulo']="AGREGAR PRODUCTO";
	$data['ventas'] = $this -> Modelo_venta -> Ventas();

	$this->load->view('plantilla/header_solo_link',$data);
	$this -> load -> view('venta/agrega_producto');	
}
//FIN Agrega_producto

//Buscar_producto
public function Busca_producto()
{
	$producto = $this -> input ->post('producto');
	$productos = $this -> Modelo_venta -> Buscar_producto($producto);
	if($productos == false)
	{
		echo " <option value='0'>NO ENCONTRADO</option> ";
	}
	else
	{
		foreach($productos as $producto)
		{
			echo " <option value=".$producto->id_producto_venta.">".$producto->producto." ".$producto->concentrado."</option> ";
		}
	}
}
//FIN Buscar_producto

//Busca_producto_precio
public function Busca_producto_precio()
{
	$id_producto_venta = $this -> input ->post('id_producto_venta');
	$busca_producto = $this -> Modelo_venta -> Busca_producto_precio($id_producto_venta);
	foreach($busca_producto as $producto)
	{
		echo "<script type='text/javascript'>
		$('#precio_instituciones').val(".$producto -> precio_instituciones.");
		$('#precio_distribuidora').val(".$producto -> precio_distribuidora.");
		$('#precio_farmacia').val(".$producto -> precio_farmacia.");
		$('#cantidad_a_la_venta').val(".$producto -> cantidad_a_la_venta.");

		
		$('#npi').text(".$producto -> precio_instituciones.");
		$('#npd').text(".$producto -> precio_distribuidora.");
		$('#npf').text(".$producto -> precio_farmacia.");
	
		</script>";	
	}
}
//FIN Busca_producto_precio

//Agrega_producto_nota
public function Agrega_producto_nota()
{
	$id_venta 			= $this -> input ->post('id_venta');
	$id_producto_venta 	= $this -> input ->post('id_producto_venta');
	$nuevo_saldo 		= $this -> input ->post('cantidad_a_la_venta') - $this -> input ->post('cantidad');
	if($this -> input ->post('cantidad') > $this -> input ->post('cantidad_a_la_venta') )
	{
		echo "<script type='text/javascript'>
					toastr.error('PRODUCTO NO AGREGADO.', 'VENTA');
				</script>";	
	}
	else
	{
		
		$data = array(
			'id_venta' => $this -> input ->post('id_venta'),
			'id_producto_venta' => $this -> input ->post('id_producto_venta'),
			'cantidad' => $this -> input ->post('cantidad'),
			'precio' => $this -> input ->post('precio'),
			'total' => $this -> input ->post('total'),
			'estado' => "VENDIDO"
		);
		
		$insertar = $this -> Modelo_venta ->Insertar_producto($data);
		if($insertar == true)
		{
			$data = array('cantidad_a_la_venta' => $nuevo_saldo);
			$actualiza_producto = $this -> Modelo_venta ->Actualizar_producto($id_producto_venta,$data);

			$suma = $this -> Modelo_venta ->Suma_productos($id_venta);
			$total_a_pagar = $suma -> total_nota;
			
			$nota = $this -> Modelo_venta ->Busca_venta_por_id($id_venta);
			$saldo_actual = $nota -> saldo;
			
		
				$saldo =$total_a_pagar - $saldo_actual;
			
			$data = array(
			'total_a_pagar' => $total_a_pagar, 
			'total_a_pagar_descuento' => $total_a_pagar, 
			'saldo' => $saldo,
			'estado' => "PENDIENTE"
			);
			
			$this -> Modelo_venta ->Actualizar_venta($id_venta,$data);

		}
	}
}
//FIN Agrega_producto_nota

//Imprime
public function Imprime()
{
	$id_venta =  base64_decode($this -> input ->get('id_venta'));
	$data['nota'] = $this -> Modelo_venta ->Busca_venta_por_id($id_venta);
    
	//CAlculña la deuda  y actualiza deuda del cliente
	$id_cliente = $data['nota'] -> id_cliente;
	$id = $id_cliente;
	$calcula_deuda = $this -> Modelo_venta -> Calcula_deuda_cliente($id_cliente);
	$deuda = $calcula_deuda -> deuda_total;
	$data = array(
		'deuda_actual' => $deuda
	);
	$this -> Modelo_cliente -> Modifica($id,$data);
	//CAlculña la deuda  y actualiza deuda del cliente
	$data['nota'] = $this -> Modelo_venta ->Busca_venta_por_id($id_venta);
	$data['productos_de_la_nota'] = $this -> Modelo_venta ->Busca_productos_nota($id_venta);
	$this -> load -> view('venta/imprime_nota',$data);
}
//FIN Imprime

//Lista_productos_nota
public function Lista_productos_nota()
{
	$id_venta =  base64_decode($this -> input ->get('id_venta'));
	$data['titulo']="LISTA DE PRODUCTOS";
	$data['productos'] = $this -> Modelo_venta ->Busca_productos_nota($id_venta);
	$this->load->view('plantilla/header_solo_link',$data);
	$this -> load -> view('venta/lista_productos_nota',$data);	
}
//FIN Lista_productos_nota

//Elimina_producto
public function Elimina_producto()
{
	$id_venta = $this -> input ->post('id_venta');
	$id_producto_vendido = $this -> input ->post('id_producto_vendido');
	$id_producto_venta = $this -> input ->post('id_producto_venta');
	$cantidad = $this -> input ->post('cantidad');
	
	//recupera producto
	$busca_producto = $this -> Modelo_ingreso -> Busca_producto_id($id_producto_venta);
	$cantidad_venta_actual=$busca_producto -> cantidad_a_la_venta + $cantidad; 
	//recupera producto
	
	//modifica el saldo del producto
	$data = array(
		'cantidad_a_la_venta' => $cantidad_venta_actual
	);
	$modifica_saldo = $this -> Modelo_ingreso -> Modifica_producto($id_producto_venta, $data); 
	///FIN modifica el saldo del producto
	
	//elimina de la nota
	$data = array(
	'total' => "0",
	'estado' => "ELIMINADO"
	);
	$elimina_de_nota = $this -> Modelo_venta -> Modifica_producto_nota($id_producto_vendido, $data);
	//elimina de la nota 
	
	//actualiza el total de la venta
		$suma = $this -> Modelo_venta ->Suma_productos($id_venta);
		$total_a_pagar = $suma -> total_nota;
		
		$nota = $this -> Modelo_venta ->Busca_venta_por_id($id_venta);
		$saldo_actual = $nota -> saldo;
		
	
			$saldo =$total_a_pagar;
		
		$data = array(
		'total_a_pagar' => $total_a_pagar, 
		'total_a_pagar_descuento' => $total_a_pagar, 
		'saldo' => $saldo,
		'estado' => "PENDIENTE"
		);
		
		$this -> Modelo_venta ->Actualizar_venta($id_venta,$data);
	//
	
}
//Elimina_producto

//Anula_nota
public function Anula_nota()
{
	$id_venta =  base64_decode($this -> input ->get('id_venta'));
	$productos = $this -> Modelo_venta -> Cuenta_si_hay_producto($id_venta);
	
	$cantidad = $productos -> cantidad_de_productos;
	if($cantidad == 0)
	{
	 	$data = array(
			'estado' => 'ANULADO'
	 	);	
		$this -> Modelo_venta ->Actualizar_venta($id_venta,$data);
		echo "<script type='text/javascript'>
		window.close();
		</script>";	
	}
	else
	{
		echo "La nota tiene productos y no se pudo anular";	
	}
	
}
//Anula_nota

/// Arreglar_pendientes
public function Arreglar_pendientes()
{
	$data['ventas'] = $this -> Modelo_venta ->Busca_penidente_saldo();
	$this -> load -> view('arreglar',$data);
	
}
//Arreglar_pendientes

}
