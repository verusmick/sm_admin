<?PHP if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
class Modelo_laboratorio extends CI_Model {
//->BUSCAR laboratorio
function Buscar_descripcion($descripcion)
{
	$query = $this->db->query(" SELECT * FROM laboratorios WHERE descripcion = '".$descripcion."'");																							
			if($query->num_rows()>0)
			{
				return $query->result();	
			}
			else
			{
				return false;	
			}

}
//->FIN BUSCAR laboratorio

//->INSERTAR 
function Insertar($data)
{
	$consulta=$this->db->insert('laboratorios', $data); 
	if($consulta==true){ return true;} else{return false;}
}
//->FIN INSERTAR 

//->LISTA
function Lista_laboratorio()
{
	$query = $this->db->query(" SELECT * FROM laboratorios ORDER BY descripcion ASC ");																							
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

function Busca_por_id($id_laboratorio)
{
	$query = $this->db->query(" SELECT * FROM laboratorios WHERE id_laboratorio = '".$id_laboratorio."' ");																							
			if($query->num_rows()>0)
			{
				return $query->row();	
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
function Modifica($id_laboratorio,$data)
{
	$this->db->where('id_laboratorio', $id_laboratorio);
    $this->db->update('laboratorios', $data);
}
//->FIN MODIFICA

//->LISTA
function Lista_tipo_nota()
{
	$query = $this->db->query(" SELECT * FROM tipo_de_nota ");																							
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


}