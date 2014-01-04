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
		if(isset ($id))
			$codprov = $id;
		else
			$codprov = $this->input->get('id');
		//Pedimos al modelo los municipios
		echo form_dropdown('municipios', $this->modelo_ciudad->get_ciudades($codprov), null, "id='municipios'"); 
	}
	public function municipiosR()
	{

		$codprov = $this->input->get('id');
		//Pedimos al modelo los municipios
		echo form_dropdown('municipio', $this->modelo_ciudad->get_ciudades($codprov), null, "id='municipio'"); 
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

	public function verActividades($data=null)
	{
		//Pedimos al modelo las actividades del usuario
		$data['actividades']=$this->modelo_usuario_actividad->get_actividades($_SESSION['usuario']->id);

		$this->load->view('headers_cuenta');
		$this->load->view('ver_actividades', $data);
	}

	public function noAsistir()
	{
		//Desenlazamos la actividad con el usuario
		$this->modelo_usuario_actividad->borrar_usuario_actividad($_SESSION['usuario']->id, $_REQUEST["actividad"]);
		$data['mensaje'] = "Has decidido no ir a una actividad";

		//Sumamos una plaza a la actividad
		$actividad= $this->modelo_actividad->get_actividad($_REQUEST['actividad']);
        $actividad->plazas++;
        $this->modelo_actividad->modificar_actividad($actividad);

        //Mostramos las actividades activas
		$this->verActividades($data);
	}

	public function asistir()
	{
		//Enlazamos la actividad con el usuario
        $data['id_actividad']=$_REQUEST['actividad'];
        $data['id_usuario']=$_SESSION['usuario']->id;
        $this->modelo_usuario_actividad->insertar_usuario_actividad($data);

        //Restamos una plaza a la actividad
        $actividad= $this->modelo_actividad->get_actividad($_REQUEST['actividad']);
        $actividad->plazas--;
        $this->modelo_actividad->modificar_actividad($actividad);

        //Mostramos las actividades activas
        $this->verActividades();
	}

	public function buscarActividades($data=null)
	{
		//Pedimos al modelo las provincias
		$data['provincias'] = $this->modelo_ciudad->get_provincias();
		$this->load->view('headers_cuenta');
		$this->load->view('buscar_actividades', $data);
	}

	public function buscarPorProvincia()
	{
		//Pedimos al modelo las actividades
		$data['actividades'] = $this->modelo_actividad->get_actividades_provincia($_POST['provincias']);

		//Miramos las actividades a las que ya está apuntado el usuario
		$actividadesActivas = $this->modelo_usuario_actividad->get_actividades($_SESSION['usuario']->id);

		//Creamos un array para guardar las actividades a las que aun no ha confirmado ir el usuario
		$data['actividadesNoActivas']=array();

		//Comprobamos a cuales no ha confirmado y las metemos en el array
		$control=0;
		foreach ($data['actividades'] as $a) 
		{
			foreach($actividadesActivas as $aa)
			{
				if($aa->id == $a->id)
				{
					$control=1;
				}
			}
			if ($control == 0)
				array_push($data['actividadesNoActivas'], $a );
			$control=0;
		}

		//Mostramos las actividades
		$this->buscarActividades($data);

	}
}
?>