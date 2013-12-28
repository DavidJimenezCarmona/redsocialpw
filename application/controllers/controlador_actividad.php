<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controlador_actividad extends CI_Controller 
{
	function __construct()
    {
        parent::__construct(); 
        $this->load->model('modelo_ciudad');
        $this->load->model('modelo_tipo');
        $this->load->model('modelo_actividad');
    }

	public function nuevaActividad($data="")
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
		$codprov = $this->input->get('id');
		//Pedimos al modelo los municipios
		echo form_dropdown('municipios', $this->modelo_ciudad->get_ciudades($codprov), null, "id='municipios'"); 
	}

	public function guardarActividad()
	{
		$data['nombre']=$_POST['nombre'];
        $data['id_tipo']=$_POST['tipo'];
        $data['fecha_inicio']=($_POST['anyoini']+2013).'-'.($_POST['mesini']+1).'-'.($_POST['diaini']+1);
        $data['fecha_fin']=($_POST['anyofin']+2013).'-'.($_POST['mesfin']+1).'-'.($_POST['diafin']+1);
        $data['id_ciudad']=$_POST['municipios'];
        $data['lugar']=$_POST['lugar'];
        $data['descripcion']=$_POST['descripcion'];
        $data['plazas']=$_POST['plazas'];
        if($data['nombre']==null ||  $data['lugar']==null || $data['descripcion']==null || $data['plazas']<1)
		{
			$data['mensaje_error']="No ha completado correctamente algún campo";
			$this->nuevaActividad($data);
		}
		else
		{
			$data['mensaje']="Actividad creada correctamente";
        	$this->modelo_actividad->insertar_actividad($data);
        	$this->nuevaActividad($data);
    	}
	}
}
?>