<?PHP if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
class Modelo_laboratorio extends CI_Model {

//->Busca_lab
function Busca_lab($descripcion)
{
	$this->db->from('laboratorios')->where('descripcion', $descripcion); 
	return $this->db->count_all_results(); 
}
//->FIN Busca_lab

//->Busca_lab_id
function Busca_lab_id($id_laboratorio)
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
//->FIN Busca_lab_id

//->INSERTAR
function Insertar($data)
{
	$consulta=$this->db->insert('laboratorios', $data); 
	if($consulta==true){ return true;} else{return false;}
}
//->FIN INSERTAR

//lista
function Lista()
{
	$query = $this->db->query(" SELECT * FROM laboratorios ORDER BY descripcion ASC");																							
	if($query->num_rows()>0)
	{
		return $query->result();	
	}
	else
	{
		return false;	
	}
}
//FIN Lista

//Modifica
function Modifica($id_laboratorio,$data)
{
	$this->db->where('id_laboratorio', $id_laboratorio);
    $this->db->update('laboratorios', $data);	
}
//fin Modifica

//Ver_productos
function Ver_productos($id_laboratorio)
{
	$query = $this->db->query(" SELECT * FROM lab_productos WHERE lab_productos.id_laboratorio = '".$id_laboratorio."' ORDER BY fecha_de_registro DESC");																							
	if($query->num_rows()>0)
	{
		return $query->result();	
	}
	else
	{
		return false;	
	}
}
//FIN Ver_productos

//->Insertar_producto
function Insertar_producto($data)
{
	$consulta=$this->db->insert('lab_productos', $data); 
	if($consulta == true)
	{ return true;} 
	else{ return false; }
}
//->FIN Insertar_producto

//Busca_prod
function Busca_prod($id_producto_laboratorio)
{
	$query = $this->db->query(" SELECT * FROM lab_productos WHERE lab_productos.id_producto_laboratorio = '".$id_producto_laboratorio."' ");																							
	if($query->num_rows()>0)
	{
		return $query->row();	
	}
	else
	{
		return false;	
	}
}
//FIN Busca_prod

//Modifica_prod
function Modifica_prod ($id_producto_laboratorio,$data)
{
	$this->db->where('id_producto_laboratorio', $id_producto_laboratorio);
    $this->db->update('lab_productos', $data);
}
//FIN Modifica_prod

}