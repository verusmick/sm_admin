<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

public function index()
{
	$this -> load -> view('login.php');	
}

//Busca_usuario
public function Busca_usuario()
{
	$usuario = $this -> input -> post('usuario');
	$clave = $this -> input -> post('clave');
	$verifica_usuario = $this -> Modelo_login -> Buscar_usuario($usuario, $clave);
	
	if($verifica_usuario == false)
	{
		/* echo"
	
		<div class='alert alert-danger alert-dismissable'>
        	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>  
				El usuario no fue encontrado o esta inactivo revise porfavor o contacte a su administrador de sistema. 
		</div>
		"; */
		echo"
		<script type='text/javascript'>
    		toastr.error('El usuario no fue encontrado verifique porfavor.', 'INGRESO FALLIDO')
		</script>
		";
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
		   
		echo"
		<script type='text/javascript'>
    		toastr.success('El usuario fue encontrado espere mientras carga su menu.', 'INGRESO CORRECTO')
		</script>
		";
		echo" <script type='text/javascript'>
		setTimeout(function(){ window.location = '".base_url('Login/Verificado')."'; }, 5000);
		$('#boton_ingresar').hide();
		</script>";
		
	}
}
//FINBusca_usuario

//Verificado
public function Verificado()
{
	if ( $this->session->userdata('logueado')==1)
	{
		$data ['titulo']="SICIV";
		$this->load->view('plantilla/header',$data);
		$this->load->view($this->session->userdata('tipo_de_usuario'));
		
		
	}
	else
	{
		redirect('Login');	
	}
}
//FIN Verificado

/********** DESTRUYE LA SESION ***********/	
	public function Salir()
	
	{
  		$this->session->sess_destroy();
  		redirect('Login');
 	}
/********** FIN DESTRUYE LA SESION ***********/
}