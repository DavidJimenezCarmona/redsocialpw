<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{	
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->view('headers');
		$this->load->view('inicio');
		$this->load->view('footer');
		$this->load->database(); 

	}
	public function login()
	{
		$this->load->helper('url');
		$this->load->model('modelo_usuario');
		$usuario=$this->modelo_usuario->login($_POST['usuario'], $_POST['pass']);

		if($usuario==0)
		{
			$this->load->helper('form');
			$this->load->view('headers');
			$this->load->view('fallo_inicio_sesion');
			$this->load->view('footer');
		}
		else
		{
			//Cargar página principal
		}
	}
}
?>