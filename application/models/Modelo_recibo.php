<?PHP if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
class Modelo_recibo extends CI_Model {

//Suma_recibos
function Suma_recibos($id_venta)
{
	$query = $this->db->query(" 
	SELECT
	Sum(venta_recibos.monto_depositado) AS suma_recibos
	
	FROM
	venta_recibos
	
	WHERE
	venta_recibos.id_venta = '".$id_venta."' AND
	venta_recibos.estado = 'INGRESADO'
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
//Suma_recibos

//->Insertar_recibo
function Insertar_recibo($data)
{
	$consulta=$this->db->insert('venta_recibos', $data); 
	if($consulta==true){ return true;} else{return false;}
}
//->FIN Insertar_recibo

//->Busca_recibo_por_id_venta
function Busca_recibo_por_id_venta($id_venta)
{
	$query = $this->db->query(" 
		SELECT
		venta_recibos.id_recibo_venta,
		venta_recibos.id_venta,
		venta_recibos.fecha_de_pago,
		venta_recibos.recibo_no,
		venta_recibos.monto_depositado,
		venta_recibos.estado,
		venta_recibos.observaciones,
		venta_recibos.entrega_el_funcionario,
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
//->FIN Busca_recibo_por_id_venta

//Actualiza_recibo
function Actualiza_recibo($data, $id_recibo_venta)
{
	$this->db->where('id_recibo_venta', $id_recibo_venta);
	$this->db->update('venta_recibos', $data);	
}
//FIN Actualiza_recibo

//Recupera_id_cliente
function Recupera_id_cliente($id_venta)
{
	$query = $this->db->query(" 
		SELECT
		venta.id_cliente
		FROM
		venta
		WHERE
		venta.id_venta = '".$id_venta."'
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
//Recupera_id_cliente

//Suma_ventas
function Suma_ventas($id_cliente)
{
	$query = $this->db->query(" 
		SELECT
		Sum(venta.total_a_pagar_descuento) AS deuda_actual
		FROM
		venta
		WHERE
		venta.id_cliente = '".$id_cliente."'
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
//Suma_ventas


}