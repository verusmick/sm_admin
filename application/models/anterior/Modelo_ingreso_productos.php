<?PHP if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
class Modelo_ingreso_productos extends CI_Model {
//->VERIFICA
function Verifica($id_laboratorio, $cantidad_de_productos, $numero_de_nota, $tipo_de_nota, $fecha_de_la_nota)
{
	$query = $this->db->query(" SELECT * FROM nota_de_ingresos WHERE id_laboratorio ='".$id_laboratorio."' and cantidad_de_productos ='".$cantidad_de_productos."' and numero_de_nota ='".$numero_de_nota."' and tipo_de_nota ='".$tipo_de_nota."' and fecha_de_la_nota ='".$fecha_de_la_nota."' ");																							
			if($query->num_rows()>0)
			{
				return $query->result();	
			}
			else
			{
				return false;	
			}
}
//->VERIFICA

//->INSERTAR 
function Insertar($data)
{
	$consulta=$this->db->insert('nota_de_ingresos', $data); 
	if($consulta==true){ return true;} else{return false;}
}
//->FIN INSERTAR 

//-> LISTA
function Lista()
{
	$query = $this->db->query(" 
								SELECT
								nota_de_ingresos.id_nota_de_ingreso_productos,
								nota_de_ingresos.id_laboratorio,
								nota_de_ingresos.cantidad_de_productos,
								nota_de_ingresos.numero_de_nota,
								nota_de_ingresos.tipo_de_nota,
								nota_de_ingresos.fecha_de_la_nota,
								nota_de_ingresos.estado,
								nota_de_ingresos.total_a_pagar,
								nota_de_ingresos.pagado,
								laboratorios.descripcion

								FROM
								nota_de_ingresos
								INNER JOIN laboratorios ON nota_de_ingresos.id_laboratorio = laboratorios.id_laboratorio

								ORDER BY
								nota_de_ingresos.estado DESC
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
//-> FIN LISTA

//-> RECUPERA NOTA PARA AGREGAR PRODUCTOS
function Recupera_nota($id_nota_de_ingreso_productos)
{
	$query = $this->db->query(" 
								SELECT
								nota_de_ingresos.id_nota_de_ingreso_productos,
								nota_de_ingresos.id_laboratorio,
								nota_de_ingresos.cantidad_de_productos,
								nota_de_ingresos.numero_de_nota,
								nota_de_ingresos.tipo_de_nota,
								nota_de_ingresos.fecha_de_la_nota,
								nota_de_ingresos.pagado,
								nota_de_ingresos.total_a_pagar,
								nota_de_ingresos.estado,
								nota_de_ingresos.fecha_de_registro,
								laboratorios.descripcion

								FROM
								nota_de_ingresos
								INNER JOIN laboratorios ON nota_de_ingresos.id_laboratorio = laboratorios.id_laboratorio

								WHERE
								id_nota_de_ingreso_productos = '".$id_nota_de_ingreso_productos."'
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
//-> FIN RECUPERA NOTA PARA AGREGAR PRODUCTOS

//->Busca_productos_de_la_nota
function Busca_productos_de_la_nota($id_nota_de_ingreso_productos)
{
	$query = $this->db->query(" 
								SELECT
						
								nota_de_ingresos_productos.id_producto_venta,
								nota_de_ingresos_productos.id_nota_de_ingreso_productos,
								nota_de_ingresos_productos.unidades_ingresadas,
								nota_de_ingresos_productos.precio_de_ingreso_unitario,
								nota_de_ingresos_productos.precio_de_ingreso_total,
								nota_de_ingresos_productos.estado,
								lab_productos.producto,
								lab_productos.concentrado,
								lab_productos.presentacion,
								lab_productos.clasificacion_terapeutica
								
								FROM
								nota_de_ingresos_productos
								INNER JOIN lab_productos ON nota_de_ingresos_productos.id_producto_laboratorio = lab_productos.id_producto_laboratorio

								WHERE
								id_nota_de_ingreso_productos = '".$id_nota_de_ingreso_productos."'
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
//->fin Busca_productos_de_la_nota

//->Busca_los recibos del ingreso
function Busca_recibos_del_ingreso($id_nota_de_ingreso_productos)
{
	$query = $this->db->query(" 
								SELECT
								recibos_nota_de_ingresos.monto_pago,
								recibos_nota_de_ingresos.id_nota_de_ingreso_productos
								FROM
								recibos_nota_de_ingresos
								WHERE
								id_nota_de_ingreso_productos = '".$id_nota_de_ingreso_productos."'
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
//->fin Busca_los recibos del ingreso

//-> RECUPERA NOTA PARA AGREGAR PRODUCTOS
function Productos_laboratorio($id_nota_de_ingreso_productos)
{
	$query = $this->db->query(" 
								SELECT
								nota_de_ingresos.id_nota_de_ingreso_productos,
								nota_de_ingresos.id_laboratorio,
								nota_de_ingresos.cantidad_de_productos,
								nota_de_ingresos.numero_de_nota,
								nota_de_ingresos.tipo_de_nota,
								nota_de_ingresos.fecha_de_la_nota,
								nota_de_ingresos.estado,
								laboratorios.descripcion

								FROM
								nota_de_ingresos
								INNER JOIN laboratorios ON nota_de_ingresos.id_laboratorio = laboratorios.id_laboratorio

								WHERE
								id_nota_de_ingreso_productos = '".$id_nota_de_ingreso_productos."'
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
//-> FIN RECUPERA NOTA PARA AGREGAR PRODUCTOS

//->BUSCA PRODUCTOS POR LABORATORIO
function Busca_productos_del_laboratorio($id_laboratorio)
{
	$query = $this->db->query(" SELECT * FROM lab_productos WHERE id_laboratorio = '".$id_laboratorio."' ");																							
			if($query->num_rows()>0)
			{
				return $query->result();	
			}
			else
			{
				return false;	
			}
}
//->FIN BUSCA PRODUCTOS POR LABORATORIO

//->BUSCA PRODUCTOS POR SU ID
function Busca_producto_por_id($id_producto_laboratorio)
{
	$query = $this->db->query(" SELECT * FROM lab_productos WHERE id_producto_laboratorio = '".$id_producto_laboratorio."' ");																							
			if($query->num_rows()>0)
			{
				return $query->row();	
			}
			else
			{
				return false;	
			}
}
//->FIN BUSCA PRODUCTOS POR SU ID

//->INSERTAR PRODUCTO DE NOTA
function Insertar_producto($data)
{
	$consulta=$this->db->insert('nota_de_ingresos_productos', $data); 
	if($consulta==true){ return true;} else{return false;}
}
//->FIN INSERTAR PRODUCTO DE NOTA

//->CUENTA PRODUCTOS REGISTRADOS
function Cuenta_productos($id_nota_de_ingreso_productos)
{			
			$this->db->from('nota_de_ingresos_productos')->where('id_nota_de_ingreso_productos', '7'); 
			return $this->db->count_all_results();  
}
//->

//-> BUSCA PRODUCTO
function Buscar_producto($id_producto_venta)
{
	$query = $this->db->query(" 
								SELECT
								
								lab_productos.id_laboratorio,
								lab_productos.producto,
								lab_productos.concentrado,
								lab_productos.presentacion,
								lab_productos.clasificacion_terapeutica,
								lab_productos.precio_distribuidora_referencial,
								lab_productos.precio_farmacia_referencial,
								lab_productos.precio_instituciones_referencial,

								nota_de_ingresos_productos.id_producto_venta,
								nota_de_ingresos_productos.id_producto_laboratorio,
								nota_de_ingresos_productos.id_nota_de_ingreso_productos,
								nota_de_ingresos_productos.unidades_ingresadas,
								nota_de_ingresos_productos.precio_de_ingreso_unitario,
								nota_de_ingresos_productos.precio_de_ingreso_total,
								nota_de_ingresos_productos.observaciones_ingreso

								FROM
								nota_de_ingresos_productos
								INNER JOIN lab_productos ON nota_de_ingresos_productos.id_producto_laboratorio = lab_productos.id_producto_laboratorio

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
//-> FIN BUSCA PRODUCTO

//-> MODIFICA ESTADO NOTA INGRESO
function Modifica_estado_nota_ingreso($id_nota_de_ingreso_productos)
{
		$data=array( 'estado' => "INGRESADOS");
		$this->db->where('id_nota_de_ingreso_productos', $id_nota_de_ingreso_productos);
        $this->db->update('nota_de_ingresos', $data);
}
//-> FIN MODIFICA ESTADO NOTA INGRESO

//-> INGRESA REVISION DE PRODUCTO
function Ingresa_revision_producto($id_producto_venta,$data)
{
		$this->db->where('id_producto_venta', $id_producto_venta);
        $this->db->update('nota_de_ingresos_productos', $data);
}
//-> FIN INGRESA REVISION DE PRODUCTO

//-> MODIFICA DATOS DEL PRODUCTO DE INGRESO
function Modifica_datos_producto_ingreso($id_producto_venta, $data)
{
		$this->db->where('id_producto_venta', $id_producto_venta);
        $this->db->update('nota_de_ingresos_productos', $data);
}
//-> FIN MODIFICA DATOS DEL PRODUCTO DE INGRESO

//-> BUSCA TOTAL PAGADO
function Buscar_total_pagado($id_nota_de_ingreso_productos)
{
	$query = $this->db->query(" 
								SELECT
								Sum(recibos_nota_de_ingresos.monto_pago) AS total_pagado,
								nota_de_ingresos.total_a_pagar
								FROM
								recibos_nota_de_ingresos
								INNER JOIN nota_de_ingresos ON recibos_nota_de_ingresos.id_nota_de_ingreso_productos = nota_de_ingresos.id_nota_de_ingreso_productos
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
//-> FIN BUSCA TOTAL PAGADO

//-> GUARDA PAGO
function Guardar_pago($data)
{
	$consulta=$this->db->insert('recibos_nota_de_ingresos', $data); 
	if($consulta==true){ return true;} else{return false;}
}
//-> FIN GUARDA PAGO
//-> CAMBIA ESTADO DEL PAGO
function Modifica_pago_nota_ingreso($id_nota_de_ingreso_productos)
{
		$data=array( 'pagado' => "1");
		$this->db->where('id_nota_de_ingreso_productos', $id_nota_de_ingreso_productos);
        $this->db->update('nota_de_ingresos', $data);
}
//-> FIN CAMBIA ESTADO DEL PAGO



}