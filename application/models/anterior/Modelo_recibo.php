<?PHP if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
class Modelo_recibo extends CI_Model {
//-> Agrega_recibo
function Agrega_recibo($data)
{
	$consulta=$this->db->insert('venta_recibos', $data); 
	if($consulta==true)
	{ 
		return true;
	} 
	else
	{
		return false;
	}
}
//-> FIN Agrega_recibo

//->Actualiza_saldo
function Actualiza_saldo($id_venta,$data)
{
	
	$this->db->where('id_venta', $id_venta);
	$this->db->update('venta', $data);	
}
//-> FIN Actualiza_saldo

//->Busca_recibos
function Busca_recibos($id_venta)
{
	$query = $this->db->query("
								SELECT
								venta_recibos.fecha_de_pago,
								venta_recibos.recibo_no,
								venta_recibos.monto_depositado,
								venta_recibos.observaciones,
								us_funcionarios.nombres,
								us_funcionarios.paterno,
								us_funcionarios.materno
								FROM
								venta_recibos
								INNER JOIN us_funcionarios ON venta_recibos.entrega_el_funcionario = us_funcionarios.id_funcionario
								WHERE
								venta_recibos.id_venta = '".$id_venta."'
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
//->FIN Busca_recibos

}