<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controlador_actividad extends CI_Controller 
{
	public function index()
	{
		$this->load->database(); 
	}

	public function nuevaActividad()
	{
		$this->load->model('modelo_ciudad');

		//Pedimos al modelo las provincias
		$result = $this->modelo_ciudad->get_provincias();

		$provincias=array();

		foreach ($result as $provincia) 
		{
			array_push($provincias, $provincia->provincia);
		}
		
		$data['provincias']=$provincias;	

		//Pedimos al modelo los municipios
		$municipios = $this->modelo_ciudad->get_ciudades();
		$data['municipios'] = $municipios;

		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('table');
		//Cargamos las vistas
		$this->load->view('headers_cuenta');
		$this->load->view('nueva_actividad', $data);
		$this->load->view('footer_comun');
	}

	public function guardarActividad()
	{
		echo "No se ha hecho na, pero tenemos pensado hacerlo";
	}
}
?>