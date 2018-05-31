<?PHP if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
class Modelo_reporte extends CI_Model {
	
//->Busca_productos
function Busca_productos()
{
	$query = $this->db->query(" 
	SELECT
	nota_de_ingresos_productos.no_de_lote,
	nota_de_ingresos_productos.registro_sanitario,
	nota_de_ingresos_productos.fecha_de_vencimiento,
	nota_de_ingresos_productos.unidades_ingresadas,
	nota_de_ingresos_productos.precio_de_ingreso_unitario,
	nota_de_ingresos_productos.precio_de_ingreso_total,
	nota_de_ingresos_productos.observaciones_ingreso,
	nota_de_ingresos_productos.fecha_de_registro,
	nota_de_ingresos_productos.fecha_de_revision,
	nota_de_ingresos_productos.unidades_optimas,
	nota_de_ingresos_productos.unidades_defectuosas,
	nota_de_ingresos_productos.cantidad_a_la_venta,
	nota_de_ingresos_productos.precio_instituciones,
	nota_de_ingresos_productos.precio_distribuidora,
	nota_de_ingresos_productos.precio_farmacia,
	nota_de_ingresos_productos.revisado_por,
	nota_de_ingresos_productos.registrado_por,
	lab_productos.producto,
	lab_productos.concentrado,
	lab_productos.presentacion,
	lab_productos.clasificacion_terapeutica,
	us_funcionarios.nombres,
	us_funcionarios.paterno,
	us_funcionarios.materno,
	us_usuarios.tipo_de_usuario,
	laboratorios.descripcion
	FROM
	nota_de_ingresos_productos
	INNER JOIN lab_productos ON nota_de_ingresos_productos.id_producto_laboratorio = lab_productos.id_producto_laboratorio
	INNER JOIN us_usuarios ON nota_de_ingresos_productos.registrado_por = us_usuarios.id_usuario
	INNER JOIN us_funcionarios ON us_usuarios.funcionario = us_funcionarios.id_funcionario
	INNER JOIN laboratorios ON lab_productos.id_laboratorio = laboratorios.id_laboratorio
	WHERE
	nota_de_ingresos_productos.estado = 'EN INVENTARIO' AND
	nota_de_ingresos_productos.cantidad_a_la_venta >= 1
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
//->FIN Busca_productos

//->Productos_por_tipo_de_nota
function Productos_por_tipo_de_nota($id_tipo_de_venta)
{
	$query = $this->db->query(" 
	SELECT
	venta_productos.cantidad,
	venta_productos.precio,
	venta_productos.total,
	venta_productos.estado,
	nota_de_ingresos_productos.registrado_por,
	nota_de_ingresos_productos.no_de_lote,
	nota_de_ingresos_productos.registro_sanitario,
	nota_de_ingresos_productos.fecha_de_vencimiento,
	lab_productos.producto,
	lab_productos.concentrado,
	lab_productos.presentacion,
	lab_productos.clasificacion_terapeutica,
	laboratorios.descripcion AS laboratorio,
	venta.numero_de_nota,
	clientes.tipo,
	clientes.razon_social,
	tipo_de_nota.descripcion AS tipo_nota
	
	FROM
	venta_productos
	INNER JOIN nota_de_ingresos_productos ON venta_productos.id_producto_venta = nota_de_ingresos_productos.id_producto_venta
	INNER JOIN lab_productos ON nota_de_ingresos_productos.id_producto_laboratorio = lab_productos.id_producto_laboratorio
	INNER JOIN venta ON venta_productos.id_venta = venta.id_venta
	INNER JOIN laboratorios ON lab_productos.id_laboratorio = laboratorios.id_laboratorio
	INNER JOIN clientes ON venta.id_cliente = clientes.id_cliente
	INNER JOIN tipo_de_nota ON venta.id_tipo_de_venta = tipo_de_nota.id_tipo_de_venta
	
	WHERE
	venta.id_tipo_de_venta = '".$id_tipo_de_venta."' AND
	venta_productos.estado = 'VENDIDO'
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
//->FIN Productos_por_tipo_de_nota

//Ingresos
function Ingresos()
{
	$query = $this->db->query(" 
	SELECT
	nota_de_ingresos.cantidad_de_productos,
	nota_de_ingresos.numero_de_nota,
	nota_de_ingresos.tipo_de_nota,
	nota_de_ingresos.fecha_de_la_nota,
	nota_de_ingresos.total_a_pagar,
	nota_de_ingresos.pagado,
	laboratorios.descripcion
	FROM
	nota_de_ingresos
	INNER JOIN laboratorios ON nota_de_ingresos.id_laboratorio = laboratorios.id_laboratorio
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
//FIN Ingresos

//Ingresos_de_productos
function Ingresos_de_productos()
{
	$query = $this->db->query("
	SELECT
	nota_de_ingresos_productos.no_de_lote,
	nota_de_ingresos_productos.registro_sanitario,
	nota_de_ingresos_productos.fecha_de_vencimiento,
	nota_de_ingresos_productos.unidades_ingresadas,
	nota_de_ingresos_productos.precio_de_ingreso_unitario,
	nota_de_ingresos_productos.precio_de_ingreso_total,
	nota_de_ingresos_productos.observaciones_ingreso,
	nota_de_ingresos_productos.unidades_optimas,
	nota_de_ingresos_productos.unidades_defectuosas,
	nota_de_ingresos_productos.cantidad_a_la_venta,
	nota_de_ingresos_productos.precio_instituciones,
	nota_de_ingresos_productos.precio_distribuidora,
	nota_de_ingresos_productos.precio_farmacia,
	lab_productos.producto,
	lab_productos.concentrado,
	lab_productos.presentacion,
	lab_productos.clasificacion_terapeutica,
	nota_de_ingresos_productos.fecha_de_registro,
	laboratorios.descripcion
	
	FROM
	nota_de_ingresos_productos
	INNER JOIN lab_productos ON nota_de_ingresos_productos.id_producto_laboratorio = lab_productos.id_producto_laboratorio
	INNER JOIN laboratorios ON lab_productos.id_laboratorio = laboratorios.id_laboratorio
	
	WHERE
	nota_de_ingresos_productos.estado = 'EN INVENTARIO'
	
	ORDER BY fecha_de_registro ASC
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
//Ingresos_de_productos

//Lista_de_productos
function Lista_de_productos()
{
	$query = $this->db->query("
		SELECT
		lab_productos.id_producto_laboratorio,
		lab_productos.id_laboratorio,
		lab_productos.producto,
		lab_productos.concentrado,
		lab_productos.presentacion,
		lab_productos.clasificacion_terapeutica
		FROM
		lab_productos
		ORDER BY
		lab_productos.producto ASC
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
//Lista_de_productos

//Ventas_por_producto
function Ventas_por_producto($id_producto_laboratorio)
{
	$query = $this->db->query("
	SELECT
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
	lab_productos.clasificacion_terapeutica,
	venta.numero_de_nota,
	venta.vendedor,
	us_funcionarios.nombres,
	us_funcionarios.paterno,
	us_funcionarios.materno
	FROM
	venta_productos
	INNER JOIN nota_de_ingresos_productos ON venta_productos.id_producto_venta = nota_de_ingresos_productos.id_producto_venta
	INNER JOIN lab_productos ON nota_de_ingresos_productos.id_producto_laboratorio = lab_productos.id_producto_laboratorio
	INNER JOIN venta ON venta_productos.id_venta = venta.id_venta
	INNER JOIN us_funcionarios ON venta.vendedor = us_funcionarios.id_funcionario

	WHERE
	lab_productos.id_producto_laboratorio = '".$id_producto_laboratorio."' AND
	venta_productos.estado = 'VENDIDO'
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
//Ventas_por_producto

//Ventas_por_laboratorio
function Ventas_por_laboratorio($id_laboratorio)
{
	$query = $this->db->query("
	SELECT
	lab_productos.producto,
	lab_productos.concentrado,
	lab_productos.presentacion,
	lab_productos.clasificacion_terapeutica,
	nota_de_ingresos_productos.registrado_por,
	nota_de_ingresos_productos.no_de_lote,
	nota_de_ingresos_productos.registro_sanitario,
	nota_de_ingresos_productos.fecha_de_vencimiento,
	venta_productos.cantidad,
	venta_productos.precio,
	venta_productos.total,
	venta.numero_de_nota,
	venta_productos.estado,
	venta.fecha_de_venta,
	clientes.tipo,
	clientes.razon_social,
	us_funcionarios.nombres,
	us_funcionarios.paterno,
	us_funcionarios.materno,
	laboratorios.descripcion
	
	FROM
	lab_productos
	INNER JOIN nota_de_ingresos_productos ON nota_de_ingresos_productos.id_producto_laboratorio = lab_productos.id_producto_laboratorio
	INNER JOIN venta_productos ON venta_productos.id_producto_venta = nota_de_ingresos_productos.id_producto_venta
	INNER JOIN venta ON venta_productos.id_venta = venta.id_venta
	INNER JOIN clientes ON venta.id_cliente = clientes.id_cliente
	INNER JOIN us_funcionarios ON venta.vendedor = us_funcionarios.id_funcionario
	INNER JOIN laboratorios ON lab_productos.id_laboratorio = laboratorios.id_laboratorio
	
	WHERE
	lab_productos.id_laboratorio = '".$id_laboratorio."' AND
	venta_productos.estado ='VENDIDO'
	
	ORDER BY venta.fecha_de_venta ASC
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

//Lista_recibos
function Lista_recibos()
{
	$query = $this->db->query("
	SELECT
	venta_recibos.fecha_de_pago,
	venta_recibos.recibo_no,
	venta_recibos.monto_depositado,
	venta_recibos.estado,
	venta_recibos.observaciones,
	venta_recibos.entrega_el_funcionario,
	us_funcionarios.nombres,
	us_funcionarios.paterno,
	us_funcionarios.materno,
	venta.numero_de_nota,
	clientes.tipo,
	clientes.razon_social,
	venta.fecha_de_venta
	FROM
	venta_recibos
	INNER JOIN us_funcionarios ON venta_recibos.entrega_el_funcionario = us_funcionarios.id_funcionario
	INNER JOIN venta ON venta_recibos.id_venta = venta.id_venta
	INNER JOIN clientes ON venta.id_cliente = clientes.id_cliente
	ORDER BY
	venta_recibos.fecha_de_pago DESC
	
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
//Lista_recibos

//Cliente_cupo
function Cliente_cupo()
{
	$query = $this->db->query("
	SELECT
	clientes.tipo,
	clientes.razon_social,
	clientes.credito_otorgado,
	clientes.deuda_actual
	FROM
	clientes
	ORDER BY
	clientes.razon_social ASC
	
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
//Cliente_cupo

//Lista_precios
function Lista_precios()
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
	nota_de_ingresos_productos.precio_instituciones,
	nota_de_ingresos_productos.precio_distribuidora,
	nota_de_ingresos_productos.precio_farmacia
	FROM
	nota_de_ingresos_productos
	INNER JOIN lab_productos ON nota_de_ingresos_productos.id_producto_laboratorio = lab_productos.id_producto_laboratorio
	INNER JOIN laboratorios ON lab_productos.id_laboratorio = laboratorios.id_laboratorio
	WHERE
	nota_de_ingresos_productos.estado = 'EN INVENTARIO'
	
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
//Lista_precios

//Nota_con_factura
function Nota_con_factura()
{
	$query = $this->db->query("
	SELECT
	venta.numero_de_nota,
	venta.no_factura,
	venta.no_orden_compra,
	venta.fecha_de_venta,
	venta.total_a_pagar_descuento,
	venta.fecha_de_vencimiento_de_credito,
	venta.saldo,
	clientes.tipo,
	clientes.razon_social,
	us_funcionarios.nombres,
	us_funcionarios.paterno,
	us_funcionarios.materno
	FROM
	venta
	INNER JOIN clientes ON venta.id_cliente = clientes.id_cliente
	INNER JOIN us_funcionarios ON venta.vendedor = us_funcionarios.id_funcionario
	WHERE
	venta.no_factura > 0
	
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

//Nota_con_factura

//Ventas_vendedor
function Ventas_vendedor($id_funcionario,$fecha1,$fecha2)
{
	$query = $this->db->query("
SELECT
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
venta.total_a_pagar_descuento,
venta.fecha_de_vencimiento_de_credito,
venta.saldo,
venta.observaciones,
venta.estado
FROM
venta
INNER JOIN us_funcionarios ON venta.vendedor = us_funcionarios.id_funcionario
INNER JOIN clientes ON venta.id_cliente = clientes.id_cliente
WHERE
us_funcionarios.id_funcionario = '".$id_funcionario."' AND
venta.fecha_de_venta >= '".$fecha1."' AND
venta.fecha_de_venta <= '".$fecha2."'
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
//Ventas_vendedor

//Ventas_al_cliente
function Ventas_al_cliente($id_cliente,$estado)
{
	$query = $this->db->query("
	SELECT
	venta.id_venta,
	venta.numero_de_nota,
	venta.no_factura,
	venta.no_orden_compra,
	venta.fecha_de_venta,
	venta.tipo_de_pago,
	venta.total_a_pagar_descuento,
	venta.fecha_de_vencimiento_de_credito,
	venta.saldo,
	venta.observaciones,
	venta.estado,
	clientes.tipo,
	clientes.razon_social,
	us_funcionarios.nombres,
	us_funcionarios.paterno,
	us_funcionarios.materno
	FROM
	venta
	INNER JOIN clientes ON venta.id_cliente = clientes.id_cliente
	INNER JOIN us_funcionarios ON venta.vendedor = us_funcionarios.id_funcionario
	WHERE
	venta.id_cliente = '".$id_cliente."' AND
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
//Ventas_al_cliente



}