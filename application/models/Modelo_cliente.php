<?PHP if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
class Modelo_cliente extends CI_Model {

//->INSERTAR
function Insertar($data)
{
	$consulta=$this->db->insert('clientes', $data); 
	if($consulta==true){ return true;} else{return false;}
}
//->FIN INSERTAR

//->Lista_clientes
function Lista_clientes()
{
	$query = $this->db->query(" 
	SELECT
	*
	FROM
	clientes
	ORDER BY
	razon_social ASC
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

//Id
function Id($id)
{
	$query = $this->db->query(" 
	SELECT
	*
	FROM
	clientes
	WHERE
	id_cliente = '".$id."'
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
function Modifica($id,$data)
{
	$this->db->where('id_cliente', $id);
    $this->db->update('clientes', $data);	
}
//FIN Modifica

}