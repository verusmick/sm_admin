<?PHP if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
class Modelo_arregla extends CI_Model {



//->Lista_clientes
function Lista_venta()
{
	$query = $this->db->query(" 
	SELECT
	*
	FROM
	venta
	
	WHERE
	estado = 'PENDIENTE'
	ORDER BY
	fecha_de_venta ASC
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

function Lista_recibos($id_venta)
{
	$query = $this->db->query(" 
	SELECT
	Sum(venta_recibos.monto_depositado) AS suma
	FROM
	venta_recibos
	WHERE
	venta_recibos.id_venta = '".$id_venta."' AND
	venta_recibos.estado = 'INGRESADO'
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

//Modifica
function Actualizar($id_venta, $data)
{
	$this->db->where('id_venta', $id_venta);
    $this->db->update('venta', $data);	
}
//FIN Modifica

}