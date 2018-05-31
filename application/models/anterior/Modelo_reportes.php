<?PHP if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
class Modelo_reportes extends CI_Model {
//->
function Ventas_por_laboratorio($id_laboratorio, $id_tipo_de_venta, $fecha_de_inicio, $fecha_de_fin)
{
	if(isset($id_laboratorio))
	{
		
	$query = $this->db->query(" 
								SELECT
								laboratorios.descripcion,
								lab_productos.producto,
								lab_productos.concentrado,
								lab_productos.presentacion,
								lab_productos.clasificacion_terapeutica,
								nota_de_ingresos_productos.no_de_lote,
								nota_de_ingresos_productos.registro_sanitario,
								nota_de_ingresos_productos.fecha_de_vencimiento,
								venta_productos.cantidad,
								venta.fecha_de_venta,
								venta_productos.precio,
								venta_productos.total,
								venta_productos.estado,
								venta.numero_de_nota,
								tipo_de_nota.descripcion AS descripcion_tipo_venta

								FROM
								venta_productos
								INNER JOIN nota_de_ingresos_productos ON venta_productos.id_producto_venta = nota_de_ingresos_productos.id_producto_venta
								INNER JOIN lab_productos ON nota_de_ingresos_productos.id_producto_laboratorio = lab_productos.id_producto_laboratorio
								INNER JOIN laboratorios ON lab_productos.id_laboratorio = laboratorios.id_laboratorio
								INNER JOIN venta ON venta_productos.id_venta = venta.id_venta
								INNER JOIN tipo_de_nota ON venta.id_tipo_de_venta = tipo_de_nota.id_tipo_de_venta
								WHERE
								laboratorios.id_laboratorio = '".$id_laboratorio."' AND
								venta_productos.estado = 'VENDIDO' AND venta.fecha_de_venta >= '".$fecha_de_inicio."' AND venta.fecha_de_venta <= '".$fecha_de_fin."'
	
							");																							
			if($query->num_rows()>0)
			{
				return $query->result();	
			}
			else
			{
				return false;	
			}
	}
	else
	{
		if(isset($fecha_de_fin))
		{
			$query = $this->db->query(" 
								SELECT
								laboratorios.descripcion,
								lab_productos.producto,
								lab_productos.concentrado,
								lab_productos.presentacion,
								lab_productos.clasificacion_terapeutica,
								nota_de_ingresos_productos.no_de_lote,
								nota_de_ingresos_productos.registro_sanitario,
								nota_de_ingresos_productos.fecha_de_vencimiento,
								venta_productos.cantidad,
								venta.fecha_de_venta,
								venta_productos.precio,
								venta_productos.total,
								venta_productos.estado,
								venta.numero_de_nota,
								tipo_de_nota.descripcion AS descripcion_tipo_venta

								FROM
								venta_productos
								INNER JOIN nota_de_ingresos_productos ON venta_productos.id_producto_venta = nota_de_ingresos_productos.id_producto_venta
								INNER JOIN lab_productos ON nota_de_ingresos_productos.id_producto_laboratorio = lab_productos.id_producto_laboratorio
								INNER JOIN laboratorios ON lab_productos.id_laboratorio = laboratorios.id_laboratorio
								INNER JOIN venta ON venta_productos.id_venta = venta.id_venta
								INNER JOIN tipo_de_nota ON venta.id_tipo_de_venta = tipo_de_nota.id_tipo_de_venta
								WHERE
								venta_productos.estado = 'VENDIDO' 
								
								AND 
								venta.fecha_de_venta >= '".$fecha_de_inicio."' 
								
								AND 
								venta.fecha_de_venta <= '".$fecha_de_fin."'
	
							");																							
			if($query->num_rows()>0)
			{
				return $query->result();	
			}
			else
			{
				return false;	
			}
		}
	}
	
}
//->FIN 

//-> INICIO
function Salida_por_tipo($id_tipo_de_venta, $fecha_de_inicio, $fecha_de_fin)
{
	$query = $this->db->query(" 
								SELECT
								laboratorios.descripcion,
								lab_productos.producto,
								lab_productos.concentrado,
								lab_productos.presentacion,
								lab_productos.clasificacion_terapeutica,
								nota_de_ingresos_productos.no_de_lote,
								nota_de_ingresos_productos.registro_sanitario,
								nota_de_ingresos_productos.fecha_de_vencimiento,
								venta_productos.cantidad,
								venta.fecha_de_venta,
								venta_productos.precio,
								venta_productos.total,
								venta_productos.estado,
								venta.numero_de_nota,
								tipo_de_nota.descripcion AS descripcion_tipo_venta

								FROM
								venta_productos
								
								INNER JOIN nota_de_ingresos_productos ON venta_productos.id_producto_venta = nota_de_ingresos_productos.id_producto_venta
								INNER JOIN lab_productos ON nota_de_ingresos_productos.id_producto_laboratorio = lab_productos.id_producto_laboratorio
								INNER JOIN laboratorios ON lab_productos.id_laboratorio = laboratorios.id_laboratorio
								INNER JOIN venta ON venta_productos.id_venta = venta.id_venta
								INNER JOIN tipo_de_nota ON venta.id_tipo_de_venta = tipo_de_nota.id_tipo_de_venta
								
								WHERE
								venta.id_tipo_de_venta = '".$id_tipo_de_venta."'
								
								AND 
								venta.fecha_de_venta >= '".$fecha_de_inicio."' 
								
								AND 
								venta.fecha_de_venta <= '".$fecha_de_fin."'
	
							");																							
			if($query->num_rows()>0)
			{
				return $query->result();	
			}
			else
			{
				return false;	
			}
}

//-> FIN

//-> Busca_ingresos
function Busca_ingresos($fecha_de_inicio, $fecha_de_fin)
{
	$query = $this->db->query("

								SELECT
								laboratorios.descripcion,
								nota_de_ingresos.id_nota_de_ingreso_productos,
								nota_de_ingresos.cantidad_de_productos,
								nota_de_ingresos.numero_de_nota,
								nota_de_ingresos.tipo_de_nota,
								nota_de_ingresos.fecha_de_la_nota,
								nota_de_ingresos.total_a_pagar,
								nota_de_ingresos.pagado,
								nota_de_ingresos.estado,
								nota_de_ingresos.fecha_de_registro
								FROM
								nota_de_ingresos
								INNER JOIN laboratorios ON nota_de_ingresos.id_laboratorio = laboratorios.id_laboratorio
								
								WHERE 
								nota_de_ingresos.fecha_de_registro >= '".$fecha_de_inicio."' 
								AND 
								nota_de_ingresos.fecha_de_registro <= '".$fecha_de_fin."'
	
							");																							
			if($query->num_rows()>0)
			{
				return $query->result();	
			}
			else
			{
				return false;	
			}
}
//-> FIN Busca_ingresos


//->Recibos_ingreso
function Recibos_ingreso($id_nota_de_ingreso_productos)
{
	$query = $this->db->query("
								SELECT
								us_funcionarios.nombres,
								us_funcionarios.paterno,
								us_funcionarios.materno,
								recibos_nota_de_ingresos.numero_pago,
								recibos_nota_de_ingresos.monto_pago,
								recibos_nota_de_ingresos.fecha_de_pago,
								recibos_nota_de_ingresos.fecha_de_registro
								
								FROM
								recibos_nota_de_ingresos
								INNER JOIN us_funcionarios ON recibos_nota_de_ingresos.id_funcionario = us_funcionarios.id_funcionario
								
								WHERE
								recibos_nota_de_ingresos.id_nota_de_ingreso_productos = '".$id_nota_de_ingreso_productos."'
							");																							
			if($query->num_rows()>0)
			{
				return $query->result();	
			}
			else
			{
				return false;	
			}
}
//->FIN Recibos_ingreso

//-> Notas_canceladas_pendientes
function Notas_canceladas_pendientes($id_cliente, $fecha_de_inicio, $fecha_de_fin, $estado)
{
	$query = $this->db->query("
								SELECT
								tipo_de_nota.descripcion,
								venta.numero_de_nota,
								venta.no_factura,
								venta.no_orden_compra,
								venta.fecha_de_venta,
								clientes.tipo,
								clientes.razon_social,
								us_funcionarios.nombres,
								us_funcionarios.paterno,
								us_funcionarios.materno,
								venta.tipo_de_pago,
								venta.total_a_pagar,
								venta.total_a_pagar_descuento,
								venta.fecha_de_vencimiento_de_credito,
								venta.descuento,
								venta.saldo,
								venta.observaciones,
								venta.estado
								
								FROM
								venta
								
								INNER JOIN clientes ON venta.id_cliente = clientes.id_cliente
								INNER JOIN us_funcionarios ON venta.vendedor = us_funcionarios.id_funcionario
								INNER JOIN tipo_de_nota ON venta.id_tipo_de_venta = tipo_de_nota.id_tipo_de_venta
								
								WHERE
								venta.id_cliente = '".$id_cliente."'
								AND
								venta.fecha_de_venta >= '".$fecha_de_inicio."'
								AND
								venta.fecha_de_venta <= '".$fecha_de_fin."'
								AND
								venta.estado = '".$estado."'
								
							");																							
			if($query->num_rows()>0)
			{
				return $query->result();	
			}
			else
			{
				return false;	
			}
	
}

//-> Notas_canceladas_pendientes

}
