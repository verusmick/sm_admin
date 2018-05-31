<?PHP if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
class Modelo_funcionario extends CI_Model {

//->BUSCAR FUNCIONARIOS
function Buscar_funcionario($nombres, $paterno, $materno, $ci)
{
	$query = $this->db->query(" SELECT * FROM us_funcionarios WHERE nombres ='".$nombres."' and paterno ='".$paterno."' and materno ='".$materno."' and ci ='".$ci."'	");																							
			if($query->num_rows()>0)
			{
				return $query->result();	
			}
			else
			{
				return false;	
			}
}
//->FIN BUSCAR FUNCIONARIOS

//->INSERTAR FUNCIONARIOS
function Insertar($data)
{
	$consulta=$this->db->insert('us_funcionarios', $data); 
	if($consulta==true){ return true;} else{return false;}
}
//->FIN INSERTAR FUNCIONARIOS

//->LISTA FUNCIONARIOS
function Lista_funcionarios()
{
	$query = $this->db->query(" SELECT * FROM us_funcionarios ORDER BY paterno ASC");																							
			if($query->num_rows()>0)
			{
				return $query->result();	
			}
			else
			{
				return false;	
			}
}
//->FIN LISTA FUNCIONARIOS

//->BUSCA FUNCIONARIO POR ID
function Busca_por_id($id_funcionario)
{
	$query = $this->db->query(" SELECT * FROM us_funcionarios WHERE id_funcionario ='".$id_funcionario."'");																							
			if($query->num_rows()>0)
			{
				return $query->row();	
			}
			else
			{
				return false;	
			}
}
//->FIN BUSCA FUNCIONARIO POR ID

//->MODIFICA
function Modifica($id_funcionario,$data)
{
	$this->db->where('id_funcionario', $id_funcionario);
    $this->db->update('us_funcionarios', $data);
}
//->FIN MODIFICA




}