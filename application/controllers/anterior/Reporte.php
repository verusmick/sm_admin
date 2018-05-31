<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller {

	//->Inventario
	public function Inventario()
	{
		$data['titulo']="Inventario";	
		$data['productos'] = $this -> Modelo_productos -> Lista();
		
		$this -> load -> view('header',$data);
		$this -> load -> view('reportes/inventario',$data);
		$this -> load -> view( $this->session->userdata('tipo_de_usuario') );
	}
	//->FIN Inventario
	
	//->Ventas_por_laboratorio
	public function Ventas_por_laboratorio()
	{
		$data['titulo']="Ventas por Laboratorio";	
		
		$data['laboratorios'] = $this -> Modelo_laboratorio -> Lista_laboratorio();
		
		$this -> load -> view('header',$data);
		$this -> load -> view('reportes/laboratorio',$data);
		$this -> load -> view( $this->session->userdata('tipo_de_usuario') );
	}
	//->FIN Ventas_por_laboratorio
	
	//->Busca_ventas_por_laboratorio
	public function Busca_ventas_por_laboratorio()
	{
		$id_laboratorio 	= $this -> input -> post('id_laboratorio');
		$id_tipo_de_venta	= $this -> input -> post('id_tipo_de_venta');
		$fecha_de_inicio 	= $this -> input -> post('fecha_de_inicio');
	 	$fecha_de_fin 		= $this -> input -> post('fecha_de_fin');
		
		$data['producto_por_laboratorio'] = $this -> Modelo_reportes -> Ventas_por_laboratorio($id_laboratorio, $id_tipo_de_venta, $fecha_de_inicio, $fecha_de_fin);
		if($data['producto_por_laboratorio'] == false)
		{
			echo"<script type='text/javascript'>
			toastr.warning('No se encontraron registros.', 'VACIO');
			</script> ";	
		}
		else
		{
			echo"<script type='text/javascript'>
			toastr.success('La consulta fue exitosa.', 'DATOS ENCONTRADOS');
			</script> ";
			$this -> load -> view('reportes/por_laboratorio',$data);		
		}
	}
	//->FIN Busca_ventas_por_laboratorio
	
	//->Ventas_de_productos
	public function Ventas_de_productos()
	{
		$data['titulo']="Ventas por productos";	
		
		$data['laboratorios'] = $this -> Modelo_laboratorio -> Lista_laboratorio();
		
		$this -> load -> view('header',$data);
		$this -> load -> view('reportes/salida_productos',$data);
		$this -> load -> view( $this->session->userdata('tipo_de_usuario') );
	}
	//->FIN Ventas_de_productos
	
	//->Ventas_de_productos
	public function Salida_por_tipo()
	{
		$data['titulo']="Por tipod de nota";	
		
		$data['tipos_de_nota'] = $this -> Modelo_laboratorio -> Lista_tipo_nota();
		
		$this -> load -> view('header',$data);
		$this -> load -> view('reportes/tipo_de_nota',$data);
		$this -> load -> view( $this->session->userdata('tipo_de_usuario') );
	}
	//->FIN Ventas_de_productos
	
	//-> INICIO
	public function Busca_ventas_por_tipo()
	{
		
		$id_tipo_de_venta	= $this -> input -> post('id_tipo_de_venta');
		$fecha_de_inicio 	= $this -> input -> post('fecha_de_inicio');
	 	$fecha_de_fin 		= $this -> input -> post('fecha_de_fin');
		
		$data['producto_por_laboratorio'] = $this -> Modelo_reportes -> Salida_por_tipo($id_tipo_de_venta, $fecha_de_inicio, $fecha_de_fin);
		if($data['producto_por_laboratorio'] == false)
		{
			echo"<script type='text/javascript'>
			toastr.warning('No se encontraron registros.', 'VACIO');
			</script> ";	
		}
		else
		{
			echo"<script type='text/javascript'>
			toastr.success('La consulta fue exitosa.', 'DATOS ENCONTRADOS');
			</script> ";
			$this -> load -> view('reportes/por_laboratorio',$data);		
		}
	}
	//-> FIN
	
	//-> Ingresos
	public function Ingresos()
	{
		$data['titulo']="REPORTE DE INGRESOS";	

		$this -> load -> view('header',$data);
		$this -> load -> view('reportes/reporte_ingresos',$data);
		$this -> load -> view( $this->session->userdata('tipo_de_usuario') );
	}
	
	public function Busca_ingresos()
	{
		$fecha_de_inicio 	= $this -> input -> post('fecha_de_inicio');
	 	$fecha_de_fin 		= $this -> input -> post('fecha_de_fin');
		
		$data['ingresos'] = $this -> Modelo_reportes -> Busca_ingresos($fecha_de_inicio, $fecha_de_fin);
		if($data['ingresos'] == false)
		{
			echo"<script type='text/javascript'>
			toastr.warning('No se encontraron registros.', 'VACIO');
			</script> ";	
		}
		else
		{
			echo"<script type='text/javascript'>
			toastr.success('La consulta fue exitosa.', 'DATOS ENCONTRADOS');
			</script> ";
			$this -> load -> view('reportes/reporte_ingresos_resultado',$data);	
		}
	}
	
	//-> FIN Ingresos
	
	//-> Cupos
	public function Cupos()
	{
		$data['titulo']="REPORTE DE CUPOS CLIENTES";	
		
		$data['clientes'] = $this -> Modelo_cliente -> Lista();
		$this -> load -> view('header',$data);
		$this -> load -> view('reportes/cliente/cupo',$data);
		$this -> load -> view( $this->session->userdata('tipo_de_usuario') );
	}
	//-> FIN Cupos
	
	//-> Cancelado_pendiente
	public function Cancelado_pendiente()
	{
		$data['titulo']="REPORTE CLIENTES";	

		$this -> load -> view('header',$data);
		$this -> load -> view('reportes/cliente/cancelado_pendiente',$data);
		$this -> load -> view( $this->session->userdata('tipo_de_usuario') );
	}
	
	public function Busca_cliente()
	{
		$cliente = $this -> input ->post('cliente');
		$busca_cliente = $this -> Modelo_venta -> Busca_cliente($cliente);
		
			foreach($busca_cliente as $cliente)
			{
				echo "<option value='".$cliente->id_cliente."'> ".$cliente->tipo." ".$cliente->razon_social." </option>";
			} 
	}
	
	
	public function Notas_canceladas_pendientes()
	{
		$id_cliente 	= $this -> input -> post('id_cliente');
		$fecha_de_inicio 	= $this -> input -> post('fecha_de_inicio');
	 	$fecha_de_fin 		= $this -> input -> post('fecha_de_fin');
		$estado 		= $this -> input -> post('estado');
		
		$data['fecha_de_inicio']=$fecha_de_inicio;
		$data['fecha_de_fin']=$fecha_de_fin;
		$data['canceladas_pendientes'] = $this -> Modelo_reportes -> Notas_canceladas_pendientes($id_cliente, $fecha_de_inicio, $fecha_de_fin, $estado );
		if($data['canceladas_pendientes'] == false)
		{
			echo"<script type='text/javascript'>
			toastr.warning('No se encontraron registros.', 'VACIO');
			</script> ";	
		}
		else
		{
			echo"<script type='text/javascript'>
			toastr.success('La consulta fue exitosa.', 'DATOS ENCONTRADOS');
			</script> ";
			$this -> load -> view('reportes/cliente/cancelado_pendiente_resultado',$data);	
		}
	}

	//-> FIN Cancelado_pendiente
}

