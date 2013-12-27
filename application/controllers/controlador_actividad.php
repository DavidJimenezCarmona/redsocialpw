<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controlador_actividad extends CI_Controller 
{
	public function index()
	{
		$this->load->database(); 
	}

	public function nuevaActividad()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('table');
		//Cargamos las vistas
		$this->load->view('headers_cuenta');
		$this->load->view('nueva_actividad');
		$this->load->view('footer_comun');
	}

	public function guardarActividad()
	{
		echo "No se ha hecho na, pero tenemos pensado hacerlo";
	}
}
?>