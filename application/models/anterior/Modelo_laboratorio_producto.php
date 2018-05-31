<?PHP if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
class Modelo_laboratorio_producto extends CI_Model {
//->VERIFICAR
function Verificar($id_laboratorio, $producto, $concentrado, $presentacion, $clasificacion_terapeutica)
{
	$query = $this->db->query(" SELECT * FROM lab_productos WHERE id_laboratorio = '".$id_laboratorio."' and producto = '".$producto."' and concentrado = '".$concentrado."' and  presentacion = '".$presentacion."' and  clasificacion_terapeutica = '".$clasificacion_terapeutica."' ");																							
			if($query->num_rows()>0)
			{
				return $query->result();	
			}
			else
			{
				return false;	
			}

}
//->FIN VERIFICAR

//->INSERTAR 
function Insertar($data)
{
	$consulta=$this->db->insert('lab_productos', $data); 
	if($consulta==true){ return true;} else{return false;}
}
//->FIN INSERTAR 

//->LISTA
function Lista($id_laboratorio)
{
	$query = $this->db->query(" 
		SELECT
		lab_productos.id_producto_laboratorio,
		lab_productos.producto,
		lab_productos.concentrado,
		lab_productos.presentacion,
		lab_productos.clasificacion_terapeutica,
		lab_productos.precio_distribuidora_referencial,
		lab_productos.precio_farmacia_referencial,
		lab_productos.precio_instituciones_referencial,
		laboratorios.descripcion
		FROM
		lab_productos
		INNER JOIN laboratorios ON lab_productos.id_laboratorio = laboratorios.id_laboratorio
		WHERE
		lab_productos.id_laboratorio = '".$id_laboratorio."'
	
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

//->FIN LISTA

//->BUSCA POR ID

function Busca_por_id($id_producto_laboratorio)
{
	$query = $this->db->query(" SELECT * FROM lab_productos WHERE id_producto_laboratorio = '".$id_producto_laboratorio."' ");																							
			if($query->num_rows()>0)
			{
				return $query->result();	
			}
			else
			{
				return false;	
			}
}
//->FIN BUSCA POR ID



//->CAMBIA ESTADO
function Estado($id_laboratorio,$estado)
{
		$data=array( 'estado' => $estado);
		$this->db->where('id_laboratorio', $id_laboratorio);
        $this->db->update('laboratorios', $data);
}
//->CAMBIA ESTADO

//->MODIFICA
function Modifica($id_producto_laboratorio, $data)
{
	$this->db->where('id_producto_laboratorio', $id_producto_laboratorio);
    $this->db->update('lab_productos', $data);
}
//->FIN MODIFICA


}