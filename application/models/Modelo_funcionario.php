<?PHP if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
class Modelo_funcionario extends CI_Model {

//->BUSCAR USUARIO
function Buscar_funcionario($ci)
{
	$query = $this->db->query(" SELECT * FROM us_funcionarios WHERE us_funcionarios.ci = '".$ci."' ");																							
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
//->FIN BUSCAR USUARIO

//Busca_id
function Busca_id($id_funcionario)
{
	$query = $this->db->query(" SELECT * FROM us_funcionarios WHERE us_funcionarios.id_funcionario = '".$id_funcionario."' ");																							
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
//FIN Busca_id

//->INSERTAR FUNCIONARIOS
function Insertar($data)
{
	$consulta=$this->db->insert('us_funcionarios', $data); 
	if($consulta==true){ return true;} else{return false;}
}
//->FIN INSERTAR FUNCIONARIOS

//Lista_funcionarios
function Lista_funcionarios()
{
	$query = $this->db->query(" SELECT * FROM us_funcionarios ORDER BY nombres  ASC");																							
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
//Lista_funcionarios

//Modifica
function Modifica($id_funcionario,$data)
{
	$this->db->where('id_funcionario', $id_funcionario);
    $this->db->update('us_funcionarios', $data);	
}
//FIN Modifica
}