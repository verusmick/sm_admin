<?PHP if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
class Modelo_cliente extends CI_Model {

//Registra
function Registra($data)
{
	$consulta=$this->db->insert('clientes', $data); 
	if($consulta==true){ return true;} else{return false;}
}
//FIN Registra

//->Lista
function Lista()
{
	$query = $this->db->query(" SELECT * FROM clientes ORDER BY razon_social");																							
			if($query->num_rows()>0)
			{
				return $query->result();	
			}
			else
			{
				return false;	
			}

}
//->FIN Lista

//->Busca
function Busca($id_cliente)
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
//->FIN Busca

//->Modifica
function Modifica($id_cliente,$data)
{
		$this->db->where('id_cliente', $id_cliente);
        $this->db->update('clientes', $data);
}
//->FIN Modifica
}