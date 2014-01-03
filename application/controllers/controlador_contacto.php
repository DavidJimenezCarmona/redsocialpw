<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controlador_contacto extends CI_Controller {

	function __construct()
    {
        parent::__construct(); 

        //Propagamos la sesión
		if(!isset($_SESSION)) session_start(); 
    }

	public function contacta() 
	{
		//Cargamos las vistas
		$data["usuario"] = $_SESSION['usuario'];
		$data["notificaciones"] = $_SESSION['notificaciones'];
		$data["reportes"] = $_SESSION['reportes'];
		
		$this->load->view('headers_cuenta',$data);
		$this->load->view('contacto');
		$this->load->view('footer_comun');
	}
}