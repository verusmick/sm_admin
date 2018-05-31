<?PHP if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
class Modelo_venta extends CI_Model {
//->VENDEDORES
function Vendedores()
{
	$query = $this->db->query(" SELECT * FROM us_funcionarios WHERE cargo ='VENDEDOR' ");																							
			if($query->num_rows()>0)
			{
				return $query->result();	
			}
			else
			{
				return false;	
			}

}
//->FIN VENDEDORES

//->TIPOS DE NOTA
function Tipo_de_nota()
{
	$query = $this->db->query(" SELECT * FROM tipo_de_nota ");																							
			if($query->num_rows()>0)
			{
				return $query->result();	
			}
			else
			{
				return false;	
			}

}
//->FIN TIPOS DE NOTA

//->Busca_cliente
function Busca_cliente($cliente)
{
	$query = $this->db->query(" SELECT * FROM clientes WHERE razon_social LIKE '%".$cliente."%' ");																							
			if($query->num_rows()>0)
			{
				return $query->result();	
			}
			else
			{
				return false;	
			}

}
//->FIN Busca_cliente

//->Busca_datos_cliente
function Busca_datos_cliente($id_cliente)
{
	$query = $this->db->query(" SELECT * FROM clientes WHERE id_cliente = '".$id_cliente."' ");																							
			if($query->num_rows()>0)
			{
				return $query->row();	
			}
			else
			{
				return false;	
			}

}
//->FIN Busca_datos_cliente

//->Busca_tipo_de_nota 
function Busca_tipo_de_nota($id_tipo_de_venta)
{
	$query = $this->db->query(" SELECT * FROM tipo_de_nota WHERE id_tipo_de_venta = '".$id_tipo_de_venta."' ");																							
			if($query->num_rows()>0)
			{
				return $query->row();	
			}
			else
			{
				return false;	
			}

}
//->Fin Busca_tipo_de_nota 

//->INSERTAR 
function Insertar($data,$id_tipo_de_venta,$numero_de_nota)
{
	$consulta=$this->db->insert('venta', $data); 
	if($consulta==true)
	{ 
		return true;
	} 
	else
	{
		return false;
	}
}
//->FIN INSERTAR

//->Actualizar_tipo_nota 
function Actualizar_tipo_nota($id_tipo_de_venta,$numero_de_nota)
{
		$data=array( 'numero_de_nota' => $numero_de_nota);
		$this->db->where('id_tipo_de_venta', $id_tipo_de_venta);
        $this->db->update('tipo_de_nota', $data);	
}
//->FIN Actualizar_tipo_nota

//->Recupera_nota_venta
function Recupera_nota_venta($id_tipo_de_venta,$numero_de_nota)
{
	$query = $this->db->query(" 
								SELECT
								venta.id_venta,
								venta.id_cliente,
								venta.numero_de_nota,
								venta.no_orden_compra,
								venta.fecha_de_venta,
								venta.tipo_de_pago,
								venta.fecha_de_vencimiento_de_credito,
								venta.observaciones,
								tipo_de_nota.descripcion,
								tipo_de_nota.sigla,
								clientes.tipo,
								clientes.razon_social,
								clientes.deuda_actual,
								us_funcionarios.nombres,
								us_funcionarios.paterno,
								us_funcionarios.materno
								
								FROM
								venta
								INNER JOIN tipo_de_nota ON venta.id_tipo_de_venta = tipo_de_nota.id_tipo_de_venta
								INNER JOIN clientes ON venta.id_cliente = clientes.id_cliente
								INNER JOIN us_funcionarios ON venta.vendedor = us_funcionarios.id_funcionario
								
								WHERE
								venta.id_tipo_de_venta = '".$id_tipo_de_venta."' AND venta.numero_de_nota = '".$numero_de_nota."' ");																							

			if($query->num_rows()>0)
			{
				return $query->result();	
			}
			else
			{
				return false;	
			}	
}
//-> FIN Recupera_nota_venta

//-> Agregar_producto
function Agregar_producto($data)
{
	$consulta=$this->db->insert('venta_productos', $data); 
	if($consulta==true)
	{ 
		return true;
	} 
	else
	{
		return false;
	}
}
//-> FIN Agregar_producto

//->Busca_productos_nota
function Busca_productos_nota($id_venta)
{
	$query = $this->db->query(" 
								SELECT
								venta_productos.id_producto_vendido,
								venta_productos.id_producto_venta,
								venta_productos.cantidad,
								venta_productos.precio,
								venta_productos.total,
								lab_productos.producto,
								lab_productos.concentrado,
								nota_de_ingresos_productos.no_de_lote,
								nota_de_ingresos_productos.registro_sanitario,
								nota_de_ingresos_productos.fecha_de_vencimiento,
								nota_de_ingresos_productos.cantidad_a_la_venta
								FROM
								venta_productos
								INNER JOIN nota_de_ingresos_productos ON venta_productos.id_producto_venta = nota_de_ingresos_productos.id_producto_venta
								INNER JOIN lab_productos ON nota_de_ingresos_productos.id_producto_laboratorio = lab_productos.id_producto_laboratorio
								WHERE
								venta_productos.id_venta = '".$id_venta."' AND venta_productos.estado = 'VENDIDO'
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
//-> FIN Busca_productos_nota

//->Suma_productos_nota
function Suma_productos_nota($id_venta)
{
	$query = $this->db->query(" 
								SELECT
								venta_productos.id_venta,
								Sum(venta_productos.total) AS suma_total
								FROM
								venta_productos
								WHERE
								venta_productos.id_venta = '".$id_venta."' and venta_productos.estado = 'VENDIDO'
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
//-> FIN Suma_productos_nota

//->Datos_de_producto_venta
function Datos_de_producto_venta($id_producto_vendido)
{
	$query = $this->db->query(" 
								SELECT
								venta_productos.id_producto_vendido,
								venta_productos.id_venta,
								venta_productos.id_producto_venta,
								venta_productos.cantidad,
								venta_productos.estado,
							
								nota_de_ingresos_productos.cantidad_a_la_venta,
							
								venta.id_cliente
							
								FROM
								venta_productos
								
								INNER JOIN nota_de_ingresos_productos ON venta_productos.id_producto_venta = nota_de_ingresos_productos.id_producto_venta
								INNER JOIN venta ON venta_productos.id_venta = venta.id_venta
								
								WHERE
								venta_productos.id_producto_vendido = '".$id_producto_vendido."'
							
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
//-> FIN Datos_de_producto_venta

//-> Quita_de_nota
function Quita_de_nota($id_producto_vendido)
{
	$data=array( 'estado' => "ELIMINADO");
	$this->db->where('id_producto_vendido', $id_producto_vendido);
	$this->db->update('venta_productos', $data);	
}
//-> FIN Quita_de_nota

//-> Cambia_saldo
function Cambia_saldo($id_producto_venta, $data)
{
	$this->db->where('id_producto_venta', $id_producto_venta);
	$this->db->update('nota_de_ingresos_productos', $data);	
}
//-> FIN Cambia_saldo

//-> Actualiza_deuda_cliente
function Actualiza_deuda_cliente($id_cliente,$data)
{
	$this->db->where('id_cliente', $id_cliente);
	$this->db->update('clientes', $data);	
}
//-> FIN Actualiza_deuda_cliente

//-> Imprimir_nota
function Termina_nota($id_venta,$data)
{
	
	$this->db->where('id_venta', $id_venta);
	$this->db->update('venta', $data);	
}
//-> FIN Imprimir_nota

//->Recupera_nota_venta_por_id_venta
function Recupera_nota_venta_por_id_venta($id_venta)
{
	$query = $this->db->query(" 
								SELECT
								venta.id_venta,
								venta.no_factura,
								venta.numero_de_nota,
								venta.no_orden_compra,
								venta.fecha_de_venta,
								venta.id_cliente,
								venta.vendedor,
								venta.tipo_de_pago,
								venta.fecha_de_vencimiento_de_credito,
								venta.observaciones,
								venta.total_a_pagar,
								venta.total_a_pagar_descuento,
								venta.descuento,
								venta.saldo,
								tipo_de_nota.descripcion,
								tipo_de_nota.sigla,
								clientes.tipo,
								clientes.razon_social,
								clientes.deuda_actual,
								us_funcionarios.nombres,
								us_funcionarios.paterno,
								us_funcionarios.materno
								
								FROM
								venta
								INNER JOIN tipo_de_nota ON venta.id_tipo_de_venta = tipo_de_nota.id_tipo_de_venta
								INNER JOIN clientes ON venta.id_cliente = clientes.id_cliente
								INNER JOIN us_funcionarios ON venta.vendedor = us_funcionarios.id_funcionario
								
								WHERE
								venta.id_venta = '".$id_venta."'
								
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
//-> FIN Recupera_nota_venta_por_id_venta

//->Ventas
function Ventas()
{
	$query = $this->db->query(" 
								SELECT
								venta.id_venta,
								venta.id_tipo_de_venta,
								venta.numero_de_nota,
								venta.no_factura,
								venta.no_orden_compra,
								venta.fecha_de_venta,
								venta.id_cliente,
								venta.vendedor,
								venta.tipo_de_pago,
								venta.total_a_pagar,
								venta.total_a_pagar_descuento,
								venta.fecha_de_vencimiento_de_credito,
								venta.descuento,
								venta.saldo,
								venta.observaciones,
								venta.estado,
								venta.id_usuario,
								tipo_de_nota.descripcion,
								tipo_de_nota.sigla,
								clientes.tipo,
								clientes.razon_social,
								us_funcionarios.nombres,
								us_funcionarios.paterno,
								us_funcionarios.materno
								FROM
								venta
								INNER JOIN tipo_de_nota ON venta.id_tipo_de_venta = tipo_de_nota.id_tipo_de_venta
								INNER JOIN clientes ON venta.id_cliente = clientes.id_cliente
								INNER JOIN us_funcionarios ON venta.vendedor = us_funcionarios.id_funcionario
								ORDER BY
								venta.fecha_de_venta DESC
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
//-> FIN Ventas

//->suma_deudas
function Suma_deudas($id_cliente)
{
	$query = $this->db->query(" 
								SELECT
								Sum(venta.total_a_pagar_descuento) AS suma_deuda
								FROM
								venta
								WHERE
								venta.id_cliente = '".$id_cliente."' AND venta.estado = 'PENDIENTE'
							");
			if($query->num_rows()>0)
			{
				return $query->row();	
			}
			else
			{
				return false;	
			}	
	
}

//->suma_deudas


}