<?PHP if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
class Modelo_login extends CI_Model {

//->BUSCAR USUARIO
function buscar_usuario($usuario,$contraseña)
{
	$query = $this->db->query("
								SELECT
								us_usuarios.id_usuario,
								us_usuarios.tipo_de_usuario,
								us_funcionarios.nombres,
								us_funcionarios.paterno,
								us_funcionarios.materno,
								us_funcionarios.ci,
								us_funcionarios.cargo,
								us_funcionarios.activo
								
								FROM
								us_usuarios
								INNER JOIN us_funcionarios ON us_usuarios.funcionario = us_funcionarios.id_funcionario
								
								WHERE
								us_usuarios.usuario = '".$usuario."' AND
								us_usuarios.`contraseña` = '".$contraseña."' AND
								us_usuarios.estado = 1
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
//->FIN BUSCAR USUARIO
}