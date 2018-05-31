<?PHP if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
class Modelo_ingreso extends CI_Model {

//->INSERTAR
function Insertar($data)
{
	$consulta=$this->db->insert('nota_de_ingresos', $data); 
	if($consulta==true){ return true;} else{return false;}
}
//->FIN INSERTAR

//Ingresa_producto
function Ingresa_producto($data)
{
	$consulta=$this->db->insert('nota_de_ingresos_productos', $data); 
	if($consulta==true){ return true;} else{return false;}
}
//FIN Ingresa_producto

//->Lista_ingresos
function Lista_ingresos()
{
	$query = $this->db->query(" 
	SELECT
	nota_de_ingresos.id_nota_de_ingreso_productos,
	nota_de_ingresos.id_laboratorio,
	nota_de_ingresos.cantidad_de_productos,
	nota_de_ingresos.numero_de_nota,
	nota_de_ingresos.tipo_de_nota,
	nota_de_ingresos.fecha_de_la_nota,
	nota_de_ingresos.total_a_pagar,
	nota_de_ingresos.pagado,
	nota_de_ingresos.estado,
	laboratorios.descripcion
	FROM
	nota_de_ingresos
	INNER JOIN laboratorios ON nota_de_ingresos.id_laboratorio = laboratorios.id_laboratorio
	ORDER BY
	nota_de_ingresos.fecha_de_registro DESC
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
//->FIN Lista_clientes

//Busca_producto
function Busca_producto($producto, $id_laboratorio)
{
	$query = $this->db->query(" 
	SELECT
	lab_productos.id_producto_laboratorio,
	lab_productos.id_laboratorio,
	lab_productos.producto,
	lab_productos.concentrado,
	lab_productos.presentacion,
	lab_productos.clasificacion_terapeutica,
	lab_productos.precio_distribuidora_referencial,
	lab_productos.precio_farmacia_referencial,
	lab_productos.precio_instituciones_referencial,
	lab_productos.estado,
	lab_productos.fecha_de_registro
	FROM
	lab_productos
	WHERE
	lab_productos.id_laboratorio = '".$id_laboratorio."' AND
	lab_productos.producto LIKE '%".$producto."%'
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

//Busca_producto


//Modifica_nota_ingreso
function Modifica_nota_ingreso($id_nota_de_ingreso_productos,$data)
{
	$this->db->where('id_nota_de_ingreso_productos', $id_nota_de_ingreso_productos);
    $this->db->update('nota_de_ingresos', $data);	
}
//FIN Modifica_nota_ingreso

//Cuenta_ingresos
function Cuenta_ingresos($id_nota_de_ingreso_productos)
{
	$this->db->from('nota_de_ingresos_productos')->where('id_nota_de_ingreso_productos', $id_nota_de_ingreso_productos); 
	return $this->db->count_all_results();
}
//FIN Cuenta_ingresos

//Busca_nota_ingreso
function Busca_nota_ingreso($id_nota_de_ingreso_productos)
{
	$query = $this->db->query(" 
	SELECT
	nota_de_ingresos.id_nota_de_ingreso_productos,
	nota_de_ingresos.funcionario_que_registra,
	nota_de_ingresos.id_laboratorio,
	nota_de_ingresos.cantidad_de_productos,
	nota_de_ingresos.numero_de_nota,
	nota_de_ingresos.tipo_de_nota,
	nota_de_ingresos.fecha_de_la_nota,
	nota_de_ingresos.total_a_pagar,
	nota_de_ingresos.pagado,
	nota_de_ingresos.estado,
	nota_de_ingresos.fecha_de_registro,
	laboratorios.descripcion

	FROM
	nota_de_ingresos
	INNER JOIN laboratorios ON nota_de_ingresos.id_laboratorio = laboratorios.id_laboratorio

	WHERE
	nota_de_ingresos.id_nota_de_ingreso_productos = '".$id_nota_de_ingreso_productos."'
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
//FIN Busca_nota_ingreso

//Busca_productos_nota
function Busca_productos_nota($id_nota_de_ingreso_productos)
{
	$query = $this->db->query(" 
	SELECT
	nota_de_ingresos_productos.id_producto_venta,
	nota_de_ingresos_productos.id_nota_de_ingreso_productos,
	nota_de_ingresos_productos.id_producto_laboratorio,
	nota_de_ingresos_productos.registrado_por,
	nota_de_ingresos_productos.no_de_lote,
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
	nota_de_ingresos_productos.revisado_por,
	lab_productos.producto,
	lab_productos.concentrado,
	lab_productos.presentacion,
	lab_productos.clasificacion_terapeutica,
	lab_productos.precio_distribuidora_referencial,
	lab_productos.precio_farmacia_referencial,
	lab_productos.precio_instituciones_referencial
	FROM
	nota_de_ingresos_productos
	INNER JOIN lab_productos ON nota_de_ingresos_productos.id_producto_laboratorio = lab_productos.id_producto_laboratorio
	WHERE
	nota_de_ingresos_productos.id_nota_de_ingreso_productos = '".$id_nota_de_ingreso_productos."'
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
//

//Modificar_ingreso
function Modificar_datos_ingreso($data, $id_nota_de_ingreso_productos)
{
	$this->db->where('id_nota_de_ingreso_productos', $id_nota_de_ingreso_productos);
    $this->db->update('nota_de_ingresos', $data);
}
//Modificar_ingreso

//Modifica_producto
function Modifica_producto($id_producto_venta, $data)
{
	$this->db->where('id_producto_venta', $id_producto_venta);
    $this->db->update('nota_de_ingresos_productos', $data);
}
//FIN Modifica_producto

//Busca_productos_lab
function Busca_productos_lab($id_laboratorio)
{
	$query = $this->db->query(" 
	SELECT
	nota_de_ingresos_productos.id_producto_venta,
	nota_de_ingresos_productos.id_nota_de_ingreso_productos,
	nota_de_ingresos_productos.id_producto_laboratorio,
	nota_de_ingresos_productos.registrado_por,
	nota_de_ingresos_productos.no_de_lote,
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
	nota_de_ingresos_productos.revisado_por,
	lab_productos.producto,
	lab_productos.concentrado,
	lab_productos.presentacion,
	lab_productos.clasificacion_terapeutica
	FROM
	nota_de_ingresos_productos
	INNER JOIN lab_productos ON nota_de_ingresos_productos.id_producto_laboratorio = lab_productos.id_producto_laboratorio
	WHERE
	lab_productos.id_laboratorio = '".$id_laboratorio."' AND
	nota_de_ingresos_productos.estado = 'EN INVENTARIO'
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
//FIN Busca_productos_lab

//Busca_producto_id
function Busca_producto_id($id_producto_venta)
{
	$query = $this->db->query(" 
	SELECT
	nota_de_ingresos_productos.id_producto_venta,
	nota_de_ingresos_productos.id_nota_de_ingreso_productos,
	nota_de_ingresos_productos.id_producto_laboratorio,
	nota_de_ingresos_productos.registrado_por,
	nota_de_ingresos_productos.no_de_lote,
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
	nota_de_ingresos_productos.revisado_por,
	lab_productos.producto,
	lab_productos.concentrado,
	lab_productos.presentacion,
	lab_productos.clasificacion_terapeutica
	FROM
	nota_de_ingresos_productos
	INNER JOIN lab_productos ON nota_de_ingresos_productos.id_producto_laboratorio = lab_productos.id_producto_laboratorio
	WHERE
	nota_de_ingresos_productos.id_producto_venta = '".$id_producto_venta."' AND
	nota_de_ingresos_productos.estado = 'EN INVENTARIO'
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
//FIN Busca_producto_id

//Agrega_pago
function Agrega_pago($data)
{
	$consulta=$this->db->insert('recibos_nota_de_ingresos', $data); 
	if($consulta==true){ return true;} else{return false;}
}
//FIN Agrega_pago

//Busca_boletas
function Busca_boletas($id_nota_de_ingreso_productos)
{
	$query = $this->db->query(" 
	SELECT
	recibos_nota_de_ingresos.id_pago_de_nota,
	recibos_nota_de_ingresos.id_nota_de_ingreso_productos,
	recibos_nota_de_ingresos.id_funcionario,
	recibos_nota_de_ingresos.numero_pago,
	recibos_nota_de_ingresos.monto_pago,
	recibos_nota_de_ingresos.fecha_de_pago,
	recibos_nota_de_ingresos.estado
	FROM
	recibos_nota_de_ingresos
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

//FIN Busca_boletas

//Busca_pago_id
function Busca_pago_id($id_pago_de_nota)
{
	$query = $this->db->query(" 
	SELECT
	recibos_nota_de_ingresos.monto_pago,
	recibos_nota_de_ingresos.id_pago_de_nota,
	recibos_nota_de_ingresos.id_nota_de_ingreso_productos,
	recibos_nota_de_ingresos.id_funcionario,
	recibos_nota_de_ingresos.numero_pago,
	recibos_nota_de_ingresos.fecha_de_pago,
	recibos_nota_de_ingresos.estado
	
	FROM
	recibos_nota_de_ingresos
	
	WHERE
	recibos_nota_de_ingresos.id_pago_de_nota = '".$id_pago_de_nota."'
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
//FIN Busca_pago_id

////Modifica_pago
function Modifica_pago($id_pago_de_nota, $data)
{
	$this->db->where('id_pago_de_nota', $id_pago_de_nota);
    $this->db->update('recibos_nota_de_ingresos', $data);
}
//FIN Modifica_pago

//Suma_pagos
function Suma_pagos($id_nota_de_ingreso_productos)
{
	$query = $this->db->query(" 
	SELECT
	Sum(recibos_nota_de_ingresos.monto_pago) AS suma_pagos
	FROM
	recibos_nota_de_ingresos
	WHERE
	recibos_nota_de_ingresos.id_nota_de_ingreso_productos = '".$id_nota_de_ingreso_productos."'
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

//FIN Suma_pagos

}