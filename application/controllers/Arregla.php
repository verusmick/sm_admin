<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arregla extends CI_Controller {

	public function index()
	{
		
		$data['ventas'] = $this -> Modelo_arregla -> Lista_venta();
		$this ->  load  ->view('arregla/lista',$data);
		 
	}
	
	
}