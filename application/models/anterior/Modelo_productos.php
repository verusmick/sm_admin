<?PHP if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
class Modelo_productos extends CI_Model {
	
//-> LISTA
function Lista()
{
	$query = $this->db->query(" 
								SELECT
								nota_de_ingresos_productos.id_producto_venta,
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
								nota_de_ingresos.numero_de_nota,
								nota_de_ingresos.tipo_de_nota,
								laboratorios.descripcion
								
								FROM
								nota_de_ingresos_productos
								INNER JOIN lab_productos ON nota_de_ingresos_productos.id_producto_laboratorio = lab_productos.id_producto_laboratorio
								INNER JOIN nota_de_ingresos ON nota_de_ingresos_productos.id_nota_de_ingreso_productos = nota_de_ingresos.id_nota_de_ingreso_productos
								INNER JOIN laboratorios ON lab_productos.id_laboratorio = laboratorios.id_laboratorio AND nota_de_ingresos.id_laboratorio = laboratorios.id_laboratorio
								
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
//-> FIN LISTA

//->Busca_producto
function Busca_producto($id_producto_venta)
{
	$query = $this->db->query(" 
								SELECT
								nota_de_ingresos_productos.id_producto_venta,
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
								nota_de_ingresos.numero_de_nota,
								nota_de_ingresos.tipo_de_nota,
								laboratorios.descripcion
								
								FROM
								nota_de_ingresos_productos
								INNER JOIN lab_productos ON nota_de_ingresos_productos.id_producto_laboratorio = lab_productos.id_producto_laboratorio
								INNER JOIN nota_de_ingresos ON nota_de_ingresos_productos.id_nota_de_ingreso_productos = nota_de_ingresos.id_nota_de_ingreso_productos
								INNER JOIN laboratorios ON lab_productos.id_laboratorio = laboratorios.id_laboratorio AND nota_de_ingresos.id_laboratorio = laboratorios.id_laboratorio
								
								WHERE
								nota_de_ingresos_productos.id_producto_venta = '".$id_producto_venta."'

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
//->FIN Busca_producto

//->Guardar_modificacion
function Guardar_modificacion($id_producto_venta, $data)
{
		$this->db->where('id_producto_venta', $id_producto_venta);
        $this->db->update('nota_de_ingresos_productos', $data);
}
//->FIN Guardar_modificacion



}