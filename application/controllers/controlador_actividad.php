<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controlador_actividad extends CI_Controller 
{
	function __construct()
    {
        parent::__construct(); 
        $this->load->model('modelo_ciudad');
        $this->load->model('modelo_tipo');
    }

	public function nuevaActividad()
	{
		//Pedimos al modelo las provincias y los tipos de actividades
		$data['provincias'] = $this->modelo_ciudad->get_provincias();
		$data['tipo'] = $this->modelo_tipo->get_tipos();
		//Cargamos las vistas
		$this->load->view('headers_cuenta');
		$this->load->view('nueva_actividad', $data);
		
	}

	public function municipios()
	{
		$this->load->model('modelo_ciudad');
		$codprov = $this->input->get('id');
		//Pedimos al modelo los municipios
		echo form_dropdown('municipios', $this->modelo_ciudad->get_ciudades($codprov), null, "id='municipios'"); 
	}

	public function guardarActividad()
	{
		echo "No se ha hecho na, pero tenemos pensado hacerlo";
	}
}
?>