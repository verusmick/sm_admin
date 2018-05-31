<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nota_ingreso extends CI_Controller {

	public function Nuevo()
	{
		$tipo_de_usuario = $this -> session -> userdata('tipo_de_usuario');
		$logueado 		 = $this -> session -> userdata('logueado');
		
		if( $logueado=="1")
		{
			$data['titulo']="REGISTRO DE NOTA DE INGRESO";
			$data['lista_laboratorio'] = $this -> Modelo_laboratorio -> Lista_laboratorio();

			$this -> load -> view('header',$data);
			$this -> load -> view('nota_ingreso/nuevo',$data);
			$this ->  load  ->view($this->session->userdata('tipo_de_usuario'));
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
		 $cantidad_de_productos = trim($this -> input -> post('cantidad_de_productos'));
		 $numero_de_nota = trim($this -> input -> post('numero_de_nota'));
		 $tipo_de_nota = trim($this -> input -> post('tipo_de_nota'));
		 $fecha_de_la_nota = trim($this -> input -> post('fecha_de_la_nota'));		
			
			
			$verifica =	$this -> Modelo_ingreso_productos -> Verifica($id_laboratorio, $cantidad_de_productos, $numero_de_nota, $tipo_de_nota, $fecha_de_la_nota);
			if($verifica==0)
			{
				echo"<div id='alert_succes' class='alert alert-callout alert-success' role='alert'>
					<strong>Puede realizar el registro.
					</div>
				";	
				echo"<script type='text/javascript'>
					$('#registrar_nota_ingreso').removeAttr('disabled');
				</script> ";
			}
			else
			{
				echo"<div id='alert_succes' class='alert alert-callout alert-danger' role='alert'>
					<strong>El registro ya existe.
					</div>
				";
				echo"<script type='text/javascript'>
				$('#registrar_nota_ingreso').attr('disabled', 'disabled');
				
				</script> ";
			}
			
	}
	//->FIN VERIFICA
	
	//->INSERTA 
	public function Insertar()
	{
		$tipo_de_usuario = $this -> session -> userdata('tipo_de_usuario');
		$logueado 		 = $this -> session -> userdata('logueado');
		if( $logueado=="1")
		{
			
			$data = array(
							'funcionario_que_registra' 	=> trim($this -> input -> post('funcionario_que_registra')),
							'id_laboratorio' 			=> trim($this -> input -> post('id_laboratorio')),
							'cantidad_de_productos' 	=> trim($this -> input -> post('cantidad_de_productos')),
							'numero_de_nota' 			=> trim($this -> input -> post('numero_de_nota')),
							'tipo_de_nota' 				=> trim($this -> input -> post('tipo_de_nota')),
							'fecha_de_la_nota' 			=> trim($this -> input -> post('fecha_de_la_nota')),
							'total_a_pagar'				=> trim($this -> input -> post('total_a_pagar')),	
							'estado' 					=> "PENDIENTE",
							'fecha_de_registro' 		=> date ("Y-m-d")	
			);
			
			$Insertar =	$this -> Modelo_ingreso_productos -> Insertar($data);
			redirect('Nota_ingreso/Lista');
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
		
		if( $logueado=="1")
		{
			$data['titulo'] = "LISTA DE NOTAS DE INGRESO";
						
			$data['lista'] = $this -> Modelo_ingreso_productos -> Lista();
			$data['funcionarios'] = $this -> Modelo_funcionario -> Lista_funcionarios();
			
			$this -> load -> view('header',$data);
			$this -> load -> view('nota_ingreso/lista',$data);
			$this ->  load  ->view($this->session->userdata('tipo_de_usuario'));
		}
		else
		{
			redirect('Login/Salir');	
		}
	}
	//->FIN LISTA
	
	//->RECUPERA NOTA PARA AGREGAR PRODUCTO
	public function Producto()
	{
		$id_nota_de_ingreso_productos = $this -> input ->get('id_nota_de_ingreso_productos');
		$id_laboratorio = $this -> input ->get('id_laboratorio');
		
		$data['recupera_nota'] = $this -> Modelo_ingreso_productos -> Recupera_nota($id_nota_de_ingreso_productos);
		$data['busca_productos_del_laboratorio'] = $this -> Modelo_ingreso_productos -> Busca_productos_del_laboratorio($id_laboratorio);
		$data['titulo'] = "INGRESO DE PRODUCTOS DE LA NOTA";		
		
		$this -> load -> view('header',$data);
		$this -> load -> view('nota_ingreso/producto/nuevo',$data);
		$this ->  load  ->view($this->session->userdata('tipo_de_usuario'));
	}
	
	//->FIN RECUPERA NOTA PARA AGREGAR PRODUCTO
	
	//->Busca_productos_de_la_nota
	public function Busca_productos_de_la_nota()
	{
		$id_nota_de_ingreso_productos = $this -> input ->post('id_nota_de_ingreso_productos');
		$id_laboratorio = $this -> input ->post('id_laboratorio');
		
		//->cuenta los registros
		$this->db->like('id_nota_de_ingreso_productos', $id_nota_de_ingreso_productos);
		$this->db->from('nota_de_ingresos_productos');
		$data['total_productos_encontrados'] = $this->db->count_all_results(); // Produces an integer, like 17
		//->fincuenta los registros
		
		$data['cantidad_de_productos'] 			= $this -> input ->post('cantidad_de_productos');
		$data['id_nota_de_ingreso_productos'] 	= $this -> input ->post('id_nota_de_ingreso_productos');
		$data['id_laboratorio'] 				= $this -> input ->post('id_laboratorio');
		$data['titulo'] 						= "PRODUCTOS DE LA NOTA";
		$data['busca_productos_de_la_nota'] 	= $this -> Modelo_ingreso_productos -> Busca_productos_de_la_nota($id_nota_de_ingreso_productos);
		$data['busca_productos_del_laboratorio'] = $this -> Modelo_ingreso_productos -> Busca_productos_del_laboratorio($id_laboratorio);
		$this -> load -> view('nota_ingreso/producto/lista_productos',$data);
	}
	//->FIN Busca_productos_de_la_nota
	
	
	//->INSERTAR PRODUCTO
	public function Insertar_producto()
	{
		$id_laboratorio = $this -> input ->post('id_laboratorio');
		$cantidad_de_productos = $this -> input ->post('cantidad_de_productos');
		$id_nota_de_ingreso_productos = $this -> input ->post('id_nota_de_ingreso_productos');
		
		//->cuenta los registros
		$this->db->like('id_nota_de_ingreso_productos', $id_nota_de_ingreso_productos);
		$this->db->from('nota_de_ingresos_productos');
		$total_productos_registrados = $this->db->count_all_results(); // Produces an integer, like 17
		//->fincuenta los registros
		if($total_productos_registrados >= $cantidad_de_productos  )
		{
			echo"<script type='text/javascript'>
			$('#agregar_producto').attr('disabled', 'disabled');
			</script> ";
			$modifica_estado_nota_ingreso =	$this -> Modelo_ingreso_productos -> Modifica_estado_nota_ingreso($id_nota_de_ingreso_productos);
		}
		else
		{
			echo"<script type='text/javascript'>
			$('#agregar_producto').removeAttr('disabled');
			</script> ";
			
			$data = array(
							'id_nota_de_ingreso_productos' 	=> $this -> input -> post('id_nota_de_ingreso_productos'),
							'id_producto_laboratorio' 		=> $this -> input -> post('id_producto_laboratorio'),
							'registrado_por' 				=> $this -> input -> post('registrado_por'),
							'unidades_ingresadas' 			=> $this -> input -> post('unidades_ingresadas'),
							'precio_de_ingreso_unitario' 	=> round($this -> input -> post('precio_de_ingreso_unitario'),2),
							'precio_de_ingreso_total' 		=> round($this -> input -> post('precio_de_ingreso_total'),2),
							'observaciones_ingreso' 		=> $this -> input -> post('observaciones_ingreso'),
							'fecha_de_registro'				=> date("Y-m-d"),
							'estado'						=> "REVISION"
						);
			$Insertar =	$this -> Modelo_ingreso_productos -> Insertar_producto($data);
			//->cuenta los registros
			$this->db->like('id_nota_de_ingreso_productos', $id_nota_de_ingreso_productos);
			$this->db->from('nota_de_ingresos_productos');
			echo $total_productos_registrados_ver = $this->db->count_all_results(); // Produces an integer, like 17
			//->fincuenta los registros
			echo $cantidad_de_productos_1 = $this -> input ->post('cantidad_de_productos');
			if($total_productos_registrados_ver >= $cantidad_de_productos_1  )
			{
				$modifica_estado_nota_ingreso =	$this -> Modelo_ingreso_productos -> Modifica_estado_nota_ingreso($id_nota_de_ingreso_productos);
				echo"<script type='text/javascript'>
				$('#agregar_producto').attr('disabled', 'disabled');
				</script> ";
			}
		}
	}
	//->FIN INSERTAR PRODUCTO
	
	//->IMPRIME LISTA DE REVISION
	public function Imprime_lista_revision()
	{
		$id_nota_de_ingreso_productos = $this -> input -> get('id_nota_de_ingreso_productos');
		$data['nota_de_ingreso'] = $this -> Modelo_ingreso_productos -> Recupera_nota($id_nota_de_ingreso_productos);
		$data['productos_de_la_nota'] = $this -> Modelo_ingreso_productos -> Busca_productos_de_la_nota($id_nota_de_ingreso_productos);
		$this -> load -> view('nota_ingreso/revision',$data);
	}
	//->FIN IMPRIME LISTA DE REVISION
	
	//->REVISA PRODUCTO
	  public function Revisa_producto()
	{
		$id_producto_venta = $this -> input -> get('id_producto_venta'); 
		$data['producto'] = $this -> Modelo_ingreso_productos -> Buscar_producto($id_producto_venta);
		$data['titulo'] = "REVISA PRODUCTO";		
		
		$this -> load -> view('header',$data);
		$this -> load -> view('nota_ingreso/producto/revisa_producto',$data);
		$this ->  load  ->view($this->session->userdata('tipo_de_usuario'));
	}
	//->FIN REVISA PRODUCTO
	
	//->INGRESA REVISION PRODUCTO
	public function Ingresa_revision()
	{
		$id_producto_venta = $this -> input -> post('id_producto_venta');
		$data=array(
		'no_de_lote' => trim($this -> input -> post('no_de_lote')),
		'registro_sanitario' => trim($this -> input -> post('registro_sanitario')),
		
		'fecha_de_vencimiento' => trim($this -> input -> post('fecha_de_vencimiento')),
		'fecha_de_revision' => date("Y-m-d"),
		
		'unidades_optimas' => $this -> input -> post('unidades_optimas'),
		'unidades_defectuosas' => trim($this -> input -> post('unidades_defectuosas')),
		'cantidad_a_la_venta' =>$this -> input -> post('unidades_optimas'),
		
		'precio_instituciones' => $this -> input -> post('precio_instituciones'),
		'precio_distribuidora' => $this -> input -> post('precio_distribuidora'),
		'precio_farmacia' => $this -> input -> post('precio_farmacia'),
		'revisado_por' => $this->session->userdata('id_usuario'),
		'estado' => "EN INVENTARIO"
		
		);
		$ingresa_revision_producto = $this -> Modelo_ingreso_productos -> Ingresa_revision_producto($id_producto_venta,$data);
		
		
		//-> ENVIA A NOTA DE INGRESO
		$id_nota_de_ingreso_productos = $this -> input ->post('id_nota_de_ingreso_productos');
		$data['recupera_nota'] = $this -> Modelo_ingreso_productos -> Recupera_nota($id_nota_de_ingreso_productos);
		$data['titulo'] = "INGRESO DE PRODUCTOS DE LA NOTA";		
		$this -> load -> view('header',$data);
		$this -> load -> view('nota_ingreso/producto/nuevo',$data);
		$this ->  load  ->view($this->session->userdata('tipo_de_usuario'));
		//-> FIN NOTA DE INGRESO
	
	}
	//->FIN INGRESA REVISION PRODUCTO
	
	//->MODIFICA PRODUCTO
	public function Modifica_datos_producto()
	{
		$id_producto_venta = $this -> input ->get('id_producto_venta');
		$recupera_producto = $this -> Modelo_ingreso_productos -> Buscar_producto($id_producto_venta);
		
		$data['recupera_producto'] = $this -> Modelo_ingreso_productos -> Buscar_producto($id_producto_venta);
		$data['titulo'] = "MODIFICA PRODUCTO INGRESADO";
		
		foreach($recupera_producto as $lab){ $id_laboratorio = $lab -> id_laboratorio; }
		$data['productos_laboratorio'] = $this -> Modelo_ingreso_productos -> Busca_productos_del_laboratorio($id_laboratorio);
		
		$data['id_laboratorio'] = $id_laboratorio;
		
		$this -> load -> view('header',$data);
		$this -> load -> view('nota_ingreso/producto/modifica_datos',$data);
		$this -> load -> view($this->session->userdata('tipo_de_usuario'));
	}
	//->FIN MODIFICA PRODUCTO
	
	//->GUARDAR CAMBIOS PRODUCTO INGRESADO
	public function Guardar_cambios_producto_ingreso()
	{
		$id_producto_venta = $this -> input ->post('id_producto_venta');
		$data = array(
					  'id_producto_laboratorio'			=> $this -> input -> post('id_producto_laboratorio'),
					  'unidades_ingresadas' 			=> $this -> input -> post('unidades_ingresadas'),
					  'precio_de_ingreso_unitario' 		=> round($this -> input -> post('precio_de_ingreso_unitario'),2),
					  'precio_de_ingreso_total' 		=> round($this -> input -> post('precio_de_ingreso_total'),2),
					  'observaciones_ingreso' 			=> $this -> input -> post('observaciones_ingreso')
					 );
		$modifica_datos_producto_ingreso = $this -> Modelo_ingreso_productos -> Modifica_datos_producto_ingreso($id_producto_venta, $data);
		
		//-> ENVIA A NOTA DE INGRESO
		$id_nota_de_ingreso_productos = $this -> input ->post('id_nota_de_ingreso_productos');
		$data['recupera_nota'] = $this -> Modelo_ingreso_productos -> Recupera_nota($id_nota_de_ingreso_productos);
		$id_laboratorio	= $this -> input ->post('id_laboratorio');
		
		$data['busca_productos_del_laboratorio'] = $this -> Modelo_ingreso_productos -> Busca_productos_del_laboratorio($id_laboratorio);
		$data['titulo'] = "INGRESO DE PRODUCTOS DE LA NOTA";		
		
		$this -> load -> view('header',$data);
		$this -> load -> view('nota_ingreso/producto/nuevo',$data);
		$this -> load -> view($this->session->userdata('tipo_de_usuario'));
		//-> FIN NOTA DE INGRESO			 
	}
	//->FIN GUARDAR CAMBIOS PRODUCTO INGRESADO
	
	//->GUARDAR PAGO NOTA DE INGRESO
	public function Guardar_pago()
	{
		$total_pagado = $this -> input ->post('total_pagado');
		$total_a_pagar = $this -> input ->post('total_a_pagar');
		$suma_total=$total_pagado+$this -> input ->post('monto_pago');
	
		if($suma_total>=$total_a_pagar)
		{
			$data=array(
			'id_nota_de_ingreso_productos'	=>	$this -> input ->post('id_nota_de_ingreso_productos'),
			'id_funcionario'				=>	$this -> input ->post('id_funcionario'),
			'numero_pago'					=>	$this -> input ->post('numero_pago'),
			'monto_pago'					=>	$this -> input ->post('monto_pago'),
			'fecha_de_pago'					=>	$this -> input ->post('fecha_de_pago'),
			'fecha_de_registro'				=>	date("Y-m-d")
			);
			$guardar_pago= $this -> Modelo_ingreso_productos -> Guardar_pago($data);
			
			//->CAMBIA EL PAGO
			$id_nota_de_ingreso_productos = $this -> input ->post('id_nota_de_ingreso_productos');
			$cambiar_pago= $this -> Modelo_ingreso_productos -> Modifica_pago_nota_ingreso($id_nota_de_ingreso_productos);
			//->FIN CAMBIA EL PAGO
			
			redirect('Nota_ingreso/Lista'); 
		}
		else
		{
			$data=array(
			'id_nota_de_ingreso_productos'	=>	$this -> input ->post('id_nota_de_ingreso_productos'),
			'id_funcionario'				=>	$this -> input ->post('id_funcionario'),
			'numero_pago'					=>	$this -> input ->post('numero_pago'),
			'monto_pago'					=>	$this -> input ->post('monto_pago'),
			'fecha_de_pago'					=>	$this -> input ->post('fecha_de_pago'),
			'fecha_de_registro'				=>	date("Y-m-d")
			);
			$guardar_pago= $this -> Modelo_ingreso_productos -> Guardar_pago($data);
			redirect('Nota_ingreso/Lista'); 
		}
	}
	//->GUARDAR PAGO NOTA DE INGRESO
	
	//->Nota_pagada
	public function Nota_pagada()
	{
		$id_nota_de_ingreso_productos = $this -> input ->get('id_nota_de_ingreso_productos');	
		$data['nota_de_ingreso'] = $this -> Modelo_ingreso_productos -> Recupera_nota($id_nota_de_ingreso_productos);
		$data['productos_de_la_nota'] = $this -> Modelo_ingreso_productos -> Busca_productos_de_la_nota($id_nota_de_ingreso_productos);
		$data['recibos_de_la_nota'] = $this -> Modelo_ingreso_productos -> Busca_recibos_del_ingreso($id_nota_de_ingreso_productos);
		$this -> load -> view('nota_ingreso/nota_pagada',$data);
		
		//->cuenta los registros
			$this->db->like('id_nota_de_ingreso_productos', $id_nota_de_ingreso_productos);
			$this->db->from('nota_de_ingresos_productos');
			$total_productos_registrados_ver = $this->db->count_all_results(); // Produces an integer, like 17
		//->fincuenta los registros
	}
	//->FIN Nota_pagada
	
	//->Buscar_nota_para_pago
	public function Buscar_total_pagado()
	{
		$id_nota_de_ingreso_productos = $this -> input ->post('id_nota_de_ingreso_productos');
		$nota_ingreso = $this -> Modelo_ingreso_productos -> Buscar_total_pagado($id_nota_de_ingreso_productos);
		
		echo"<script type='text/javascript'>
			$('#total_pagado').val('".$nota_ingreso -> total_pagado."');
			$('#total_a_pagar').val('".$nota_ingreso -> total_a_pagar."');
			</script> "; 
	}
	//->fin Buscar_nota_para_pago
}