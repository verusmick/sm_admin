<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}
	/********** CONSULTA SI EXISTE USUARIO E INICIA SESION***********/		
	public function buscar_usuario()
	{	
		$usuario = $this -> input -> post ('usuario');
		$contraseña = $this -> input -> post ('contraseña');
	
		$verifica_usuario=$this->Modelo_login->buscar_usuario($usuario,$contraseña);
		if ($verifica_usuario==false) 
		{
       	   $data['mensaje']="<p id='error_login'> No existe el usuario. </p>";
		   $this->load->view('login',$data);
		} 
		else 
		{    
		   $usuario_data = array(
						 			   'id_usuario'			=>	$verifica_usuario	->	id_usuario,
									   'tipo_de_usuario'	=>	$verifica_usuario 	->	tipo_de_usuario,
									   'usuario'			=>	$verifica_usuario 	-> 	nombres." ".$verifica_usuario -> paterno." ".$verifica_usuario -> materno,
									   'ci'					=>	$verifica_usuario 	->	ci,
									   'cargo'				=>	$verifica_usuario 	->	cargo,
									   'activo'				=>	$verifica_usuario 	->	activo,
									   'logueado'			=>  '1'
            							);
		   $this->session->set_userdata($usuario_data);
		   redirect('Verifica'); 
		}
	}
/********** FIN CONSULTA SI EXISTE USUARIO E INICIA SESION***********/	
/********** DESTRUYE LA SESION ***********/	
	public function Salir()
	
	{
  		$this->session->sess_destroy();
  		redirect('Login');
 	}
/********** FIN DESTRUYE LA SESION ***********/
}
