<?PHP if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
class Modelo_usuario extends CI_Model {

//->INSERTAR
function Insertar($data)
{
	$consulta=$this->db->insert('us_usuarios', $data); 
	if($consulta==true){ return true;} else{return false;}
}
//->FIN INSERTAR

//->Lista_usuario
function Lista_usuario()
{
	$query = $this->db->query(" 
	SELECT
	us_usuarios.tipo_de_usuario,
	us_usuarios.estado,
	us_usuarios.usuario,
	us_usuarios.clave,
	us_funcionarios.nombres,
	us_funcionarios.paterno,
	us_funcionarios.materno,
	us_funcionarios.cargo,
	us_usuarios.id_usuario
	FROM
	us_usuarios
	INNER JOIN us_funcionarios ON us_usuarios.funcionario = us_funcionarios.id_funcionario
	ORDER BY
	us_usuarios.tipo_de_usuario ASC
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
//->FIN Lista_usuario

//Modifica
function Modifica($id_usuario,$data)
{
	$this->db->where('id_usuario', $id_usuario);
    $this->db->update('us_usuarios', $data);	
}
//FIN Modifica

}