<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifica extends CI_Controller {

	public function index()
	{
		$tipo_de_usuario=$this->session->userdata('tipo_de_usuario');
		
		switch($tipo_de_usuario)
		{
			case "ADMINISTRADOR":
			  
			  $data['titulo'] ="ADMINISTRADOR";  
			  $this ->  load  ->view('header', $data);
			  $this ->  load  ->view('ADMINISTRADOR');
			break;
			
			case "ALMACENES":
			  
			  $data['titulo'] ="ALMACENES";  
			  $this ->  load  ->view('header', $data);
			  $this ->  load  ->view('ALMACENES');
			break;	
		}
		
	}
}