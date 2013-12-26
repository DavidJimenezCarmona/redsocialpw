<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function cargarInicio()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->view('headers');
		$this->load->view('inicio');
		$this->load->view('footer');
	}

	public function index()
	{	
		$this->cargarInicio();
		$this->load->database(); 
	}

	public function registro() 
	{
		$this->load->helper('form');
		$this->load->view('headers');
		$this->load->view('nuevoUsuario');
		$this->load->view('footer');	
	}

	public function login()
	{
		$this->load->helper('url');
		$this->load->model('modelo_usuario');
		$usuario=$this->modelo_usuario->login($_POST['usuario'], $_POST['pass']);

		if(isset($_POST['registrate']))
			$this->registro();
		else
		{
			if($usuario==0)
			{
				$this->cargarInicio();
				echo "Usuario o contraseñas incorrectas";
			}
			else
			{
				//Cargar página principal
			}
		}
	}
}
?>