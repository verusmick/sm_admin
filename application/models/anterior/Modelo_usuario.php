<?PHP if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
class Modelo_usuario extends CI_Model {
//->BUSCAR FUNCIONARIO
function Buscar_funcionario($id_funcionario)
{
	$query = $this->db->query(" SELECT * FROM us_funcionarios WHERE id_funcionario ='".$id_funcionario."'");																							
			if($query->num_rows()>0)
			{
				return $query->result();	
			}
			else
			{
				return false;	
			}

}
//->FIN BUSCAR FUNCIONARIO

//->BUSCAR USUARIO
function Verifica_usuario($id_funcionario, $tipo_de_usuario)
{
$query = $this->db->query(" SELECT * FROM us_usuarios WHERE funcionario ='".$id_funcionario."' and tipo_de_usuario ='".$tipo_de_usuario."'	");																							
			if($query->num_rows()>0)
			{
				return $query->result();	
			}
			else
			{
				return false;	
			}
}
//->FIN BUSCAR USUARIO

//->INSERTAR 
function Insertar($data)
{
	$consulta=$this->db->insert('us_usuarios', $data); 
	if($consulta==true){ return true;} else{return false;}
}
//->FIN INSERTAR 

//->BUSCAR USUARIOS DE FUNCIONARIO
function Verifica_usuarios($id_funcionario)
{
$query = $this->db->query(" 
							SELECT
							us_usuarios.id_usuario,
							us_usuarios.tipo_de_usuario,
							us_usuarios.usuario,
							us_usuarios.contraseña,
							us_usuarios.estado,
							us_funcionarios.nombres,
							us_funcionarios.paterno,
							us_funcionarios.materno,
							us_funcionarios.cargo
							FROM
							us_usuarios
							INNER JOIN us_funcionarios ON us_usuarios.funcionario = us_funcionarios.id_funcionario
							WHERE
							us_usuarios.funcionario ='".$id_funcionario."'
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
//->FIN BUSCAR USUARIOS DE FUNCIONARIO

//->CAMBIA ESTADO
function Estado($id_usuario,$estado)
{
		$data=array( 'estado' => $estado);
		$this->db->where('id_usuario', $id_usuario);
        $this->db->update('us_usuarios', $data);
}
//->CAMBIA ESTADO

}