<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
    {
        parent::__construct(); 

        //Propagamos la sesión
		if(!isset($_SESSION)) session_start(); 

		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('email');

        $this->load->model('modelo_usuario');
        $this->load->model('modelo_amigo');
        $this->load->model('modelo_perfil');
        $this->load->model('modelo_ciudad');
        $this->load->model('modelo_reporte');
        $this->load->model('modelo_actividad');
        $this->load->model('modelo_usuario_actividad');
    }

	public function cargarInicio()
	{
		$this->load->view('headers');
		$this->load->view('inicio');
		$this->load->view('footer');
	}

	public function cargarCuenta($usuario) 
	{
		$_SESSION['usuario'] = $usuario;

		//Cargamos el modelo perfil
		$perfil=$this->modelo_perfil->get_perfil($usuario->id);
		$_SESSION['perfil'] = $perfil;
		$this->home();

	}

	//Carga la página de inicio
	public function home($data=null) 
	{
		
		$notificaciones = $this->modelo_amigo->notificaciones_pendientes($_SESSION['usuario']->id);
		$reportes = $this->modelo_reporte->notificaciones_pendientes($_SESSION['usuario']->id);

		if($notificaciones == 1) {  //Hay notificaciones pendientes
			$_SESSION["notificaciones"] = 1;
		}

		else {
			$_SESSION["notificaciones"] = 0;
		}

		if($reportes == 1) {  //Hay reportes disponibles
			$_SESSION["reportes"] = 1;
		}

		else {
			$_SESSION["reportes"] = 0;
		}

		//Cargamos las actividades de los amigos
		//Primero cargamos a los amigos
		$amigos=$this->modelo_amigo->get_amigos($_SESSION['usuario']->id);

		//Cargamos las actividades de cada amigo
		foreach ($amigos as $amigo) 
		{
			$data['actividades'][$amigo->alias]=$this->modelo_usuario_actividad->get_actividades($amigo->id);
		}

			//Cargamos las vistas
			$this->load->view('headers_cuenta');
			$this->load->view('cuenta',$data);
			$this->load->view('footer_comun');
	}

	public function modificar_perfil() {

		$notificaciones = $this->modelo_amigo->notificaciones_pendientes($_SESSION['usuario']->id);

		//Pedimos al modelo las provincias y los tipos de actividades
		$data['provincias'] = $this->modelo_ciudad->get_provincias();
		$data['municipiosIniciales'] = $this->modelo_ciudad->get_ciudades(2);

		//Cargamos las vistas
		$this->load->view('headers_cuenta');
		$this->load->view('modificar_perfil',$data);
		$this->load->view('footer_comun');

	}

	public function actualizar_perfil() 
	{
		$perfil->id_ciudad_nacimiento=$_POST['municipios'];
		$perfil->id_ciudad_residencia=$_POST['municipio'];
		$perfil->ocupacion=$_POST['ocupacion'];
		$perfil->centro_actividad=$_POST['centro_actividad'];
		$perfil->foto=$_SESSION['perfil']->foto;

		$this->modelo_perfil->modificar_perfil($perfil);
		$_SESSION['perfil']=$perfil;
		$this->home();
	}

	public function cargarInicioErroneo($mensaje)
	{
		$data["mensaje"] = $mensaje;
		$this->load->view('headers');
		$this->load->view('inicio',$data);
		$this->load->view('footer');
	}

	public function index()
	{	
		$this->cargarInicio();
		$this->load->database(); 
	}

	public function registro() 
	{
		$data['provincias'] = $this->modelo_ciudad->get_provincias();

		//Cargamos la página de registro
		$this->load->view('headers');
		$this->load->view('nuevoUsuario',$data);
		$this->load->view('footer');	
	}

	public function registro_fallido($caso) {
		if($caso == 0) {
			$this->load->view('headers');
			$data['mensaje'] = "Los datos no son correctos, por favor complete todos los campos."; 
			$this->load->view('nuevoUsuario', $data);
			$this->load->view('footer');
		}

		else {
			$this->load->view('headers');
			$data['mensaje'] = "Las contraseñas deben coincidir.";
			$this->load->view('nuevoUsuario', $data);
			$this->load->view('footer');
		}
	}

	public function nuevoUsuario()
	{
		if($this->modelo_usuario->unicidad_alias($_POST['alias']) == 1) { //Comprobamos que el alias es único

			$usuario['alias']=$_POST['alias'];
			$usuario['pass']=$_POST['pass1'];
			$usuario['nombre']=$_POST['nombre'];
			$usuario['apellidos']=$_POST['apellidos'];
			$usuario['fecha_nacimiento']=(2013 - $_POST['anyo']).'-'.($_POST['mes']+1).'-'.($_POST['dia']+1);
			$usuario['sexo'] = $_POST['sexo'];
			$usuario['email']=$_POST['email'];

			//Comprobamos que todos los campos se hayan insertdo
			if ($usuario['alias']=="" || 
				$usuario['pass']=="" || 
				$usuario['nombre']=="" || 
				$usuario['apellidos']=="" ||
				$usuario['fecha_nacimiento']=="" ||
				$usuario['sexo']=="" ||
				$usuario['email']=="")
			{
				$this->registro_fallido(1);
			}

			if($_POST['pass1'] != $_POST['pass2']) {
				$this->registro_fallido(2);
			}

			else
			{
				//Llamamos al método del modelo que crea un nuevo usuario
				$this->modelo_usuario->insertar_usuario($usuario);
				//Creamos un nuevo perfil para el usuario insertado
				$usuario['id'] = mysql_insert_id();
				$this->modelo_perfil->insertar_perfil($usuario['id']);

				//Cargamos la página de inicio pasándole el usuario que acabamos de insertar
				$this->cargarCuenta($this->modelo_usuario->get_usuario_alias($usuario['alias']));
			}

		}

		else {

			$this->load->view('headers');
			$data['mensaje'] = "El alias elegido ya esta en uso.";
			$this->load->view('nuevoUsuario', $data);
			$this->load->view('footer');

		}

	}

	public function login()
	{
		$usuario=$this->modelo_usuario->login($_POST['usuario'], $_POST['pass']);

		if(isset($_POST['registrate']))
			$this->registro();
		else
		{
			if($usuario==null) {
				$mensaje = "Usuario y/o contraseña incorrectos.";
				$this->cargarInicioErroneo($mensaje);
			}
			else if($usuario->activo == 0) {
				$mensaje = "Este usuario actualmente esta baneado.";
				$this->cargarInicioErroneo($mensaje);
			}

			else {
				$this->cargarCuenta($usuario);
			}
		}
	}

	public function subirFoto()
	{
		if($_SESSION['perfil']->foto==1)
		{
			$file = './img/fotos_perfil/' . $_SESSION['usuario']->alias . ".jpg";
			$do = unlink($file);
	 
			if($do != true)
			{
	 			echo "Error borrando el archivo <br />";
	 		}
	 		else
	 		{
	 			$_SESSION['perfil']->foto=0;
				$this->modelo_perfil->modificar_perfil($_SESSION['perfil']);
	 		}
 		}

		$config['upload_path'] = './img/fotos_perfil/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = $_SESSION['usuario']->alias . ".jpg";
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$data['error'] = array('error' => $this->upload->display_errors());

			$this->home($data);
		}	
		else
		{
			$data['upload_data'] = array('upload_data' => $this->upload->data());
			
			$_SESSION['perfil']->foto=1;
			$this->modelo_perfil->modificar_perfil($_SESSION['perfil']);
			$this->home($data);
		}
	}

	public function salir()
	{
		session_destroy();
		$this->cargarInicio();
	}
}
?>