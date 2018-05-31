<?PHP if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
class Modelo_venta extends CI_Model {
	

//Busca_penidente_saldo
function Busca_penidente_saldo()
{
	$query = $this->db->query(" 
	SELECT
	venta.id_venta,
	venta.numero_de_nota,
	venta.total_a_pagar,
	venta.total_a_pagar_descuento,
	venta.saldo,
	venta.estado
	FROM
	venta
	WHERE
	venta.estado = 'PENDIENTE'
	ORDER BY
	venta.fecha_de_venta ASC
	");																							
	if($query->num_rows()>0)
	{
		//return $query->result();
		return $query->result();	
	}
	else
	{
		return false;	
	}
}


function Sumatoria_de_recibos($id_venta)
{
	$query = $this->db->query(" 
	SELECT
	Sum(venta_recibos.monto_depositado) AS suma_recibos
	FROM
	venta_recibos
	WHERE
	venta_recibos.id_venta = '".$id_venta."'
	");																							
	if($query->num_rows()>0)
	{
		//return $query->result();
		return $query->row();	
	}
	else
	{
		return false;	
	}
	
}

function Actualizar_saldos($id_venta,$data)
{
	$this->db->where('id_venta', $id_venta);
	$this->db->update('venta', $data);	
}
//Busca_penidente_saldo




//->Lista_tipo
function Lista_tipo()
{
	$query = $this->db->query(" 
	SELECT * FROM tipo_de_nota
	");																							
	if($query->num_rows()>0)
	{
		//return $query->result();
		return $query->result();	
	}
	else
	{
		return false;	
	}
}
//->FIN Lista_tipo

//Busca_clientes
function Busca_clientes($razon_social)
{
	$query = $this->db->query(" 
	SELECT * FROM clientes WHERE razon_social LIKE '%".$razon_social."%'
	");																							
	if($query->num_rows()>0)
	{
		//return $query->result();
		return $query->result();	
	}
	else
	{
		return false;	
	}

}
//FIN Busca_clientes

//Busca_vendedor
function Busca_vendedor()
{
	$query = $this->db->query(" 
	SELECT * FROM us_funcionarios WHERE cargo = 'VENDEDOR' and activo = '1'
	");																							
	if($query->num_rows()>0)
	{
		//return $query->result();
		return $query->result();	
	}
	else
	{
		return false;	
	}
}
//Busca_vendedor

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
function Insertar($data)
{
	$consulta=$this->db->insert('venta', $data); 
	if($consulta==true){ return true;} else{return false;}
}
//->FIN INSERTAR

//->Actualizar_tipo_nota 
function Actualizar_tipo_nota($id_tipo_de_venta,$data)
{
	
	$this->db->where('id_tipo_de_venta', $id_tipo_de_venta);
	$this->db->update('tipo_de_nota', $data);	
}
//->FIN Actualizar_tipo_nota

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
		venta.fecha_de_venta desc
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

//Buscar_producto
function Buscar_producto($producto)
{
	$query = $this->db->query(" 
		SELECT
		nota_de_ingresos_productos.no_de_lote,
		nota_de_ingresos_productos.registro_sanitario,
		nota_de_ingresos_productos.fecha_de_vencimiento,
		nota_de_ingresos_productos.estado,
		nota_de_ingresos_productos.cantidad_a_la_venta,
		nota_de_ingresos_productos.precio_instituciones,
		nota_de_ingresos_productos.precio_distribuidora,
		nota_de_ingresos_productos.precio_farmacia,
		nota_de_ingresos_productos.id_producto_venta,
		lab_productos.producto,
		lab_productos.concentrado,
		lab_productos.presentacion,
		lab_productos.clasificacion_terapeutica,
		lab_productos.id_producto_laboratorio
		
		FROM
		nota_de_ingresos_productos
		INNER JOIN lab_productos ON nota_de_ingresos_productos.id_producto_laboratorio = lab_productos.id_producto_laboratorio
		
		WHERE
		nota_de_ingresos_productos.estado = 'EN INVENTARIO' AND
		lab_productos.producto LIKE '%".$producto."%' AND
		nota_de_ingresos_productos.cantidad_a_la_venta > 0
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
//FIN Buscar_producto

//Busca_producto_precio
function Busca_producto_precio($id_producto_venta)
{
	$query = $this->db->query(" 
		SELECT
		nota_de_ingresos_productos.id_producto_venta,
		nota_de_ingresos_productos.no_de_lote,
		nota_de_ingresos_productos.registrado_por,
		nota_de_ingresos_productos.id_producto_laboratorio,
		nota_de_ingresos_productos.id_nota_de_ingreso_productos,
		nota_de_ingresos_productos.registro_sanitario,
		nota_de_ingresos_productos.fecha_de_vencimiento,
		nota_de_ingresos_productos.unidades_ingresadas,
		nota_de_ingresos_productos.precio_de_ingreso_unitario,
		nota_de_ingresos_productos.precio_de_ingreso_total,
		nota_de_ingresos_productos.observaciones_ingreso,
		nota_de_ingresos_productos.fecha_de_registro,
		nota_de_ingresos_productos.estado,
		nota_de_ingresos_productos.fecha_de_revision,
		nota_de_ingresos_productos.unidades_optimas,
		nota_de_ingresos_productos.unidades_defectuosas,
		nota_de_ingresos_productos.cantidad_a_la_venta,
		nota_de_ingresos_productos.precio_instituciones,
		nota_de_ingresos_productos.precio_distribuidora,
		nota_de_ingresos_productos.precio_farmacia,
		nota_de_ingresos_productos.revisado_por
		
		FROM
		nota_de_ingresos_productos
		
		WHERE
		nota_de_ingresos_productos.id_producto_venta = '".$id_producto_venta."'
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
//Busca_producto_precio

//Suma_productos
function Suma_productos($id_venta)
{
	$query = $this->db->query(" 
		SELECT
		Sum(venta_productos.total) AS total_nota
		FROM
		venta_productos
		WHERE
		venta_productos.id_venta = '".$id_venta."'
	");
			if($query->num_rows()>0){return $query->row();}else{return false;}
}

//Suma_productos

//->Insertar_producto 
function Insertar_producto($data)
{
	$consulta=$this->db->insert('venta_productos', $data); 
	if($consulta==true){ return true;} else{return false;}
}
//->FIN Insertar_producto

//->Actualizar_producto 
function Actualizar_producto($id_producto_venta,$data)
{
	$this->db->where('id_producto_venta', $id_producto_venta);
	$this->db->update('nota_de_ingresos_productos', $data);	
}
//->FIN Actualizar_tipo_nota

//->Actualizar_venta
function Actualizar_venta($id_venta,$data)
{
	$this->db->where('id_venta', $id_venta);
	$this->db->update('venta', $data);	
}
//->FIN Actualizar_venta

//Busca_venta_por_id
function Busca_venta_por_id($id_venta)
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
		tipo_de_nota.sigla,
		tipo_de_nota.descripcion,
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
		id_venta = '".$id_venta."'
	");
			if($query->num_rows()>0){return $query->row();}else{return false;}
}
//Busca_venta_por_id

//Busca_productos_nota
function Busca_productos_nota($id_venta)
{
	$query = $this->db->query(" 
		SELECT
		venta_productos.id_producto_vendido,
		venta_productos.id_venta,
		venta_productos.id_producto_venta,
		venta_productos.cantidad,
		venta_productos.precio,
		venta_productos.total,
		venta_productos.estado,
		nota_de_ingresos_productos.no_de_lote,
		nota_de_ingresos_productos.registro_sanitario,
		nota_de_ingresos_productos.fecha_de_vencimiento,
		lab_productos.producto,
		lab_productos.concentrado,
		lab_productos.presentacion,
		lab_productos.clasificacion_terapeutica
		
		FROM
		venta_productos
		INNER JOIN nota_de_ingresos_productos ON venta_productos.id_producto_venta = nota_de_ingresos_productos.id_producto_venta
		INNER JOIN lab_productos ON nota_de_ingresos_productos.id_producto_laboratorio = lab_productos.id_producto_laboratorio
		
		WHERE
		id_venta = '".$id_venta."' and venta_productos.estado ='VENDIDO'
	");
			if($query->num_rows()>0){return $query->result();}else{return false;}
}
//Busca_productos_nota

//Modifica_producto_nota
function Modifica_producto_nota($id_producto_vendido, $data)
{
	$this->db->where('id_producto_vendido', $id_producto_vendido);
	$this->db->update('venta_productos', $data);	
}
//Modifica_producto_nota

//Calcula_deuda_cliente
function Calcula_deuda_cliente($id_cliente)
{
	$query = $this->db->query(" 
		SELECT
		Sum(venta.total_a_pagar_descuento) AS deuda_total
		FROM
		venta
		WHERE
		venta.id_cliente = '".$id_cliente."' AND
		venta.estado = 'PENDIENTE'
	");
	if($query->num_rows()>0){return $query->row();}else{return false;}
}
//Calcula_deuda_cliente

//Cuenta_si_hay_producto
function Cuenta_si_hay_producto($id_venta)
{
	$query = $this->db->query(" 
		SELECT
		Count(venta_productos.id_venta) AS cantidad_de_productos
		FROM
		venta_productos
		WHERE
		venta_productos.id_venta = '".$id_venta."' AND
		venta_productos.estado = 'VENDIDO'
	");
	if($query->num_rows()>0){return $query->row();}else{return false;}
}
//Cuenta_si_hay_producto


}
