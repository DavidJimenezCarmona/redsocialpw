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
		$this->load->view('headers_cuenta');
		$this->load->view('contacto');
		$this->load->view('footer_comun');
	}
}