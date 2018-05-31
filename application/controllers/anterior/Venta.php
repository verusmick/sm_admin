<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venta extends CI_Controller {

	//->Nueva Venta
	public function Nueva()
	{
		$tipo_de_usuario = $this -> session -> userdata('tipo_de_usuario');
		$logueado 		 = $this -> session -> userdata('logueado');
		
		if( $logueado=="1")
		{
			$data['titulo']="NUEVA VENTA";
			$data['vendedores'] = $this -> Modelo_venta -> Vendedores();
			$data['tipo_de_nota'] = $this -> Modelo_venta -> Tipo_de_nota();
			
			$this -> load -> view('header',$data);
			$this -> load -> view('venta/nuevo',$data);
			$this -> load -> view( $this->session->userdata('tipo_de_usuario') );
		}
		else
		{
			redirect('Login/Salir');
		}
	}
	//->Fin Nueva Venta
	
	//->Busca Cliente
	public function Busca_cliente()
	{
		$cliente = $this -> input ->post('cliente');
		$busca_cliente = $this -> Modelo_venta -> Busca_cliente($cliente);
		
		echo "<select name='id_cliente' id='id_cliente' class='form-control' size='20' > ";
			foreach($busca_cliente as $cliente)
			{
				echo "<option value='".$cliente->id_cliente."'> ".$cliente->tipo." ".$cliente->razon_social." </option>";
			}
		echo "</select>";
	}
	//->Fin Busca Cliente 
	
	//->Busca_datos_cliente
	public function Busca_datos_cliente()
	{
		$id_cliente = $this -> input ->post('id_cliente');
		$busca_datos_cliente = $this -> Modelo_venta -> Busca_datos_cliente($id_cliente);
		echo"<script type='text/javascript'>
				$('#deuda_actual').val('".$busca_datos_cliente -> deuda_actual ."');
				$('#credito_otorgado').val('".$busca_datos_cliente -> credito_otorgado ."');
									
		</script> ";

	}
	//->Fin Busca_datos_cliente 
	
	//->Insertar_nota_de_venta
	public function Insertar_nota_de_venta()
	{
		 echo $insertar_nota = $this -> input ->post('insertar_nota');
		 if(isset($insertar_nota))
		 {
			 	$id_tipo_de_venta = $this -> input ->post('id_tipo_de_venta');
		
				 $calcula_numero_de_nota = $this -> Modelo_venta -> Busca_tipo_de_nota($id_tipo_de_venta);
				 
				 $numero_de_nota = $calcula_numero_de_nota -> numero_de_nota +1;
				 $no_orden_compra = $this -> input ->post('no_orden_compra');
				 $fecha_de_venta  = $this -> input ->post('fecha_de_venta');
				 $id_cliente =  $this -> input ->post('id_cliente');
				 $vendedor =  $this -> input ->post('vendedor');
				 $tipo_de_pago =  $this -> input ->post('tipo_de_pago');
				
				if ($tipo_de_pago == "CREDITO")
				{
					$fecha = $fecha_de_venta;
					$nuevafecha = strtotime ( '+5 day' , strtotime ( $fecha ) ) ;
					$fecha_de_vencimiento_de_credito = date( 'Y-m-j' , $nuevafecha );
				}
				else
				{
					$fecha_de_vencimiento_de_credito = $fecha_de_venta;	
				}
				 $fecha_de_vencimiento_de_credito;
				 $observaciones = $this -> input ->post('observaciones');
				 
				$data=array(
							 'id_tipo_de_venta' => $id_tipo_de_venta,
							 'numero_de_nota' 	=> $numero_de_nota,
							 'no_orden_compra' 	=> $no_orden_compra,
							 'fecha_de_venta' 	=> $fecha_de_venta,
							 'fecha_de_vencimiento_de_credito' 	=> $fecha_de_vencimiento_de_credito, 
							 'id_cliente' 		=> $id_cliente,
							 'vendedor' 		=> $vendedor,
							 'tipo_de_pago' 	=> $tipo_de_pago,
							 'observaciones'	=> $observaciones,
							 'id_usuario'		=> $this->session->userdata('id_usuario'),
							 'estado'			=> "EN PROCESO"	
				);
				$insertar = $this -> Modelo_venta -> Insertar($data,$id_tipo_de_venta,$numero_de_nota);
				if($insertar == true)
				{
				$actualizar = $this -> Modelo_venta -> Actualizar_tipo_nota($id_tipo_de_venta,$numero_de_nota);

				$data['datos_de_nota_venta'] = $this -> Modelo_venta -> Recupera_nota_venta($id_tipo_de_venta,$numero_de_nota);
				$data['productos'] = $this -> Modelo_productos -> Lista();
				$data['titulo']="PRODUCTOS PARA NOTA DE VENTA";			
				
				$this -> load -> view('header',$data);
				$this -> load -> view('venta/agrega_producto',$data);
				$this -> load -> view( $this->session->userdata('tipo_de_usuario') );
				
				}
				else
				{
					
					redirect('Venta/Nueva');
				}
		}
		else
		{
			redirect('Venta/Nueva');
		}
	}
	//-> fin Insertar_nota_de_venta
	
	//->Busca_datos_producto
	public function Busca_datos_producto()
	{
		$id_producto_venta = $this -> input ->post('id_producto_venta');
		$busca_datos_producto = $this -> Modelo_productos -> Busca_producto($id_producto_venta);
		echo"<script type='text/javascript'>
				$('#recuperado_producto').val('" .$busca_datos_producto -> producto." : ".$busca_datos_producto -> concentrado." : ".$busca_datos_producto -> presentacion. "');
				$('#disponible').val('" .$busca_datos_producto -> cantidad_a_la_venta. "');
				$('#precio_instituciones').val('" .$busca_datos_producto -> precio_instituciones. "');
				$('#precio_distribuidora').val('" .$busca_datos_producto -> precio_distribuidora. "');
				$('#precio_farmacia').val('" .$busca_datos_producto -> precio_farmacia. "');
				
				$('#texto_precio_instituciones').text('" .$busca_datos_producto -> precio_instituciones. "');
				$('#texto_precio_distribuidora').text('" .$busca_datos_producto -> precio_distribuidora. "');
				$('#texto_precio_farmacia').text('" .$busca_datos_producto -> precio_farmacia. "');
									
		</script> ";

	}
	//->Fin Busca_datos_producto 
	
	//->Agrega_producto
	public function Agrega_producto()
	{
		$id_venta			= $this -> input ->post('id_venta');
		$id_producto_venta	= $this -> input ->post('id_producto_venta');
		$disponible 		= $this -> input ->post('disponible');
		$cantidad 			= $this -> input ->post('cantidad');
		$precio 			= $this -> input ->post('precio');
		$total 				= $this -> input ->post('total');
		
		$data=array(
					'id_venta'			=> $id_venta,
					'id_producto_venta'	=> $id_producto_venta,
					'cantidad'			=> $cantidad,
					'precio' 			=> $precio,
					'total' 			=> $total,
					'estado' 			=> "VENDIDO"
		);
		
		$cantidad_a_la_venta = $disponible - $cantidad;
		$agregar_producto = $this -> Modelo_venta -> Agregar_producto($data);
		
		if($agregar_producto == true)
		{
			$data=array( 'cantidad_a_la_venta' => $cantidad_a_la_venta);
			$agregar_producto = $this -> Modelo_productos -> Guardar_modificacion($id_producto_venta,$data);
			echo"<script type='text/javascript'>
			toastr.success('Producto agregado a la nota de venta', 'PRODUCTO AGREGADO');
			</script> "; 
		}
		else
		{
			echo"<script type='text/javascript'>
			toastr.error('El producto no fue agregado', 'ERROR AL AGREGAR EL PRODUCTO');
			</script> "; 
		}
	}
//->Fin Agrega_producto
	
//->Busca_productos
function Busca_productos()
{
	$id_venta = $this -> input ->post('id_venta');
	$data['productos_de_la_nota'] = $this -> Modelo_venta -> Busca_productos_nota($id_venta);
	$data['suma_total'] = $this -> Modelo_venta -> Suma_productos_nota($id_venta);
	$this -> load -> view('venta/lista_de_productos_nota',$data);
}
//-> Fin Busca_productos

//-> Elimina_producto
function Elimina_producto()
{
	
	$id_producto_vendido = $this -> input ->post('id_producto_vendido');
	$datos_del_producto = $this -> Modelo_venta -> Datos_de_producto_venta($id_producto_vendido);
	foreach($datos_del_producto as $dato_prod)
	{
		$id_producto_vendido 	= $dato_prod -> id_producto_vendido;
		$id_venta				= $dato_prod -> id_venta;
		$cantidad 				= $dato_prod -> cantidad;
		$estado 				= $dato_prod -> estado;
		$cantidad_a_la_venta 	= $dato_prod -> cantidad_a_la_venta;
		$id_producto_venta 		= $dato_prod -> id_producto_venta;
		
		$id_cliente				= $dato_prod -> id_cliente;
	}
	
	$cantidad_a_la_venta_nuevo = $cantidad + $cantidad_a_la_venta;
	$data =array(
				'cantidad_a_la_venta' => $cantidad_a_la_venta_nuevo
	);
	 //-> Cambia el estado del producto vendido
	$quitar_de_nota = $this -> Modelo_venta -> Quita_de_nota($id_producto_vendido);
	//-> FIN Cambia el estado del producto vendido
	
	//-> Cambia el saldo del producto
	$nuevo_saldo_producto = $this -> Modelo_venta -> Cambia_saldo($id_producto_venta,$data);
	//-> FIN Cambia el saldo del producto 
	
	//->Modifica el monto de la nota
	$suma_total = $this -> Modelo_venta -> Suma_productos_nota($id_venta);
	foreach($suma_total as $suma)
	{
		$total_bs = $suma -> suma_total;	
	}
	$data = array (
	'total_a_pagar' 			=> $total_bs,
	'total_a_pagar_descuento' 	=> $total_bs,
	'saldo'						=> $total_bs
	);
	//-> Cambia el estado de la nota
	$termina_nota = $this -> Modelo_venta -> Termina_nota($id_venta,$data);
	//-> 
	
	//-> cambia la deuda del cliente
	$Suma_deudas = $this -> Modelo_venta -> Suma_deudas($id_cliente);
	$deuda = $Suma_deudas -> suma_deuda;
	$data = array(
		'deuda_actual'	=>	$deuda
	);
	$Suma_deudas = $this -> Modelo_venta -> Actualiza_deuda_cliente($id_cliente,$data); 
	//-> FIn cambia la deuda del cliente
	
	
}
//-> FIN Elimina_producto	

//-> Imprimir_nota
function Termina_nota()
{
	$id_venta = $this -> input ->post('id_venta');
	$deuda_actual = $this -> input ->post('deuda_actual');
	$id_cliente = $this -> input ->post('id_cliente');
	
	$suma_total = $this -> Modelo_venta -> Suma_productos_nota($id_venta);
	foreach($suma_total as $suma)
	{
		$total_bs = $suma -> suma_total;	
	}
	$data = array (
	'total_a_pagar' 			=> $total_bs,
	'total_a_pagar_descuento' 	=> $total_bs,
	'saldo'						=> 	$total_bs,					
	'estado'		=> "PENDIENTE");
	//-> Cambia el estado de la nota
	$termina_nota = $this -> Modelo_venta -> Termina_nota($id_venta,$data);
	//-> FIN Cambia el estado de la nota
	
	$nueva_deuda = $deuda_actual + $total_bs;
	//-> Agrega nueva deuda a cliente
	$data = array(
	'deuda_actual' => $nueva_deuda);
	$deuda_cliente = $this -> Modelo_venta -> Actualiza_deuda_cliente($id_cliente,$data);
	//-> FIN Agrega nueva deuda a cliente
}
//-> FIN Imprimir_nota

//->Imprimir_nota
function Imprimir_nota()
{
	$id_venta = $this -> input ->get('id_venta');
	$data['datos_de_nota_venta'] = $this -> Modelo_venta -> Recupera_nota_venta_por_id_venta($id_venta);
	$data['productos_de_la_nota'] = $this -> Modelo_venta -> Busca_productos_nota($id_venta);
	$this -> load ->view('venta/imprime_nota',$data);
}
//->FIN Imprimir_nota
						
//->Lista_de_ventas
function Lista_de_ventas()
{
	$data['titulo']=" LISTA DE VENTAS";
			$data['ventas'] = $this -> Modelo_venta -> Ventas();
			$data['vendedores'] = $this -> Modelo_venta -> Vendedores();
			$data['productos'] = $this -> Modelo_productos -> Lista();
			
			$this -> load -> view('header',$data);
			$this -> load -> view('venta/lista_de_ventas.php',$data);
			$this -> load -> view( $this->session->userdata('tipo_de_usuario') );
}
//-> FIN Lista_de_ventas

//->Recupera_nota_venta_por_id_venta				
function Recupera_nota_venta_por_id_venta()
{
	$id_venta = $this -> input ->post('id_venta');
	$datos_de_nota_venta = $this -> Modelo_venta -> Recupera_nota_venta_por_id_venta($id_venta);
	foreach($datos_de_nota_venta as $nota)
	{
	echo"<script type='text/javascript'>
				$('#tipo_de_nota').val('" .$nota -> descripcion. "');
				$('#numero_de_nota').val('" .$nota -> numero_de_nota. "');	
				$('#no_orden_compra').val('" .$nota -> no_orden_compra. "');
				
				$('#vendedor option[value='+ '" .$nota -> vendedor. "' +']').attr('selected',true);
				$('#cliente').val('" .$nota -> tipo." ".$nota -> razon_social. "');
				$('#id_cliente1').val('" .$nota -> id_cliente. "');
				 
	
		</script> ";
	}
}
//->FIN Recupera_nota_venta_por_id_venta

//->Modifica_nota
function Modifica_nota()
{
	
	$boton_modificar_nota 	= $this -> input ->post('boton_modificar_nota');
	
	$id_venta				= $this -> input ->post('id_venta');
	$no_orden_compra = $this -> input ->post('no_orden_compra');
	$id_cliente = $this -> input ->post('id_cliente1');
	$vendedor = $this -> input ->post('vendedor');
	
	if($boton_modificar_nota==1)
	{
		$data = array(
						'no_orden_compra'	=> $no_orden_compra,
						'id_cliente'		=> $id_cliente,
						'vendedor' 			=> $vendedor
		);
		$modifica_nota = $this -> Modelo_venta -> Termina_nota($id_venta, $data);
		
	} 
}
//-> FIN Modifica_nota

//-> Modifica_agrega_productos_nota
function Modifica_agrega_productos_nota()
{
	
	$id_venta = $this -> input ->post('boton_agregar');
	$data['datos_de_nota_venta'] = $this -> Modelo_venta -> Recupera_nota_venta_por_id_venta($id_venta);
	$data['productos'] = $this -> Modelo_productos -> Lista();
	$data['titulo']="PRODUCTOS PARA NOTA DE VENTA";			
			
	$this -> load -> view('header',$data);
	$this -> load -> view('venta/agrega_producto',$data);
	$this -> load -> view( $this->session->userdata('tipo_de_usuario') );
				
}
//-> FIN Modifica_agrega_productos_nota

//-> Anular
function Anular()
{
	$id_venta = $this -> input ->post('id_venta');
	$datos_de_nota_venta = $this -> Modelo_venta -> Recupera_nota_venta_por_id_venta($id_venta);
	foreach($datos_de_nota_venta as $nota)
	{
		$total_a_pagar_descuento = $nota -> total_a_pagar_descuento;
	}
	if($total_a_pagar_descuento > 0)
	{
		echo"<script type='text/javascript'>
			toastr.error('La nota tiene productos y no puede anularla', 'ERROR ANULAR LA NOTA');
			</script> ";
	}
	else
	{
		$data = array(
						'estado'	=> "ANULADO"
		);
		$modifica_nota = $this -> Modelo_venta -> Termina_nota($id_venta, $data);
		echo"<script type='text/javascript'>
			toastr.success('La nota fue Anulada', 'NOTA ANULADA');
			</script> ";
	}
}
//-> FIN Anular

}