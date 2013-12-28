<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controlador_actividad extends CI_Controller 
{
	function __construct()
    {
        parent::__construct(); 

        //Propagamos la sesión
		if(!isset($_SESSION)) session_start(); 

        $this->load->model('modelo_ciudad');
        $this->load->model('modelo_tipo');
        $this->load->model('modelo_actividad');
        $this->load->model('modelo_usuario_actividad');
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
	    //Recogemos los datos de la vista
		$data['nombre']=$_POST['nombre'];
        $data['id_tipo']=$_POST['tipo'];
        $data['fecha_inicio']=($_POST['anyoini']+2013).'-'.($_POST['mesini']+1).'-'.($_POST['diaini']+1);
        $data['fecha_fin']=($_POST['anyofin']+2013).'-'.($_POST['mesfin']+1).'-'.($_POST['diafin']+1);
        $data['id_ciudad']=$_POST['municipios'];
        $data['lugar']=$_POST['lugar'];
        $data['descripcion']=$_POST['descripcion'];
        $data['plazas']=$_POST['plazas'];

        //Comprobamos que se han insertado todos los datos
        if($data['nombre']==null ||  $data['lugar']==null || $data['descripcion']==null || $data['plazas']<1)
		{
			$data['mensaje_error']="No ha completado correctamente algún campo";
			$this->nuevaActividad($data);
		}
		else
		{
			//Creamos la actividad
        	$this->modelo_actividad->insertar_actividad($data);
        	$data['mensaje']="Actividad creada correctamente";

        	//Enlazamos la actividad con el usuario que la ha creado
        	$data['id_actividad']=mysql_insert_id();
        	$data['id_usuario']=$_SESSION['usuario']->id;
        	$this->modelo_usuario_actividad->insertar_usuario_actividad($data);
        	
        	//Mostramos la vista de nuevo
        	$this->nuevaActividad($data);
    	}
	}

	public function verActividades()
	{
		//Pedimos al modelo las actividades del usuario
		$actividades=$this->modelo_usuario_actividad->get_actividades($_SESSION['usuario']->id);

		//Cabecera de la tabla
		$datos[0]['nombre']='nombre';
		$datos[0]['id_tipo']='id_tipo';
		$datos[0]['fecha_inicio']='fecha_inicio';
		$datos[0]['fecha_fin']='fecha_fin';
		$datos[0]['id_ciudad']='id_ciudad';
		$datos[0]['lugar']='lugar';
		$datos[0]['descripcion']='descripcion';
		$datos[0]['plazas']='plazas';

		//Resto de datos de la tabla
		foreach ($actividades as $i) 
		{
			$datos[$i->id]['nombre']=$i->nombre;
			$datos[$i->id]['id_tipo']=$i->id_tipo;
			$datos[$i->id]['fecha_inicio']=$i->fecha_inicio;
			$datos[$i->id]['fecha_fin']=$i->fecha_fin;
			$datos[$i->id]['id_ciudad']=$i->id_ciudad;
			$datos[$i->id]['lugar']=$i->lugar;
			$datos[$i->id]['descripcion']=$i->descripcion;
			$datos[$i->id]['plazas']=$i->plazas;
		}

		//Creamos la tabla y se la pasamos a la vista
		$data['tabla']=$this->table->generate($datos);
		$this->load->view('headers_cuenta');
		$this->load->view('ver_actividades', $data);
		

	}
}
?>