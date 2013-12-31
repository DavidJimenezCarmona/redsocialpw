<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controlador_acercade extends CI_Controller {

	function __construct()
    {
        parent::__construct(); 

        //Propagamos la sesión
		if(!isset($_SESSION)) session_start(); 
    }

	public function sobre_nosotros() 
	{
		//Cargamos las vistas
		$this->load->view('headers_cuenta');
		$this->load->view('acerca_nosotros');
		$this->load->view('footer_comun');
	}
}
