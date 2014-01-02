<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function cargarInicio()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->view('headers');
		$this->load->view('inicio');
		$this->load->view('footer');
	}

	public function cargarCuenta($usuario) 
	{
		//Creamos la sesión con la cuenta del usuario
		session_start();
		$_SESSION['usuario'] = $usuario;

		//Cargamos el modelo perfil
		$this->load->model('modelo_perfil');
		$perfil=$this->modelo_perfil->get_perfil($usuario->id);
		$_SESSION['perfil'] = $perfil;
		$this->home();
	}

	//Carga la página de inicio
	public function home() 
	{
		if(!isset($_SESSION)) {
			session_start();
		}
		
		$this->load->helper('url');
		$this->load->model('modelo_amigo');
		$notificaciones = $this->modelo_amigo->notificaciones_pendientes($_SESSION['usuario']->id);

		if($notificaciones == 0) {  //Hay notificaciones pendientes
			$data["notificaciones"]= 0;
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('table');
			//Cargamos las vistas
			$this->load->view('headers_cuenta',$data);
			$this->load->view('cuenta');
			$this->load->view('footer_comun');
		}

		else {
			$data["notificaciones"]= 1;
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('table');
			//Cargamos las vistas
			$this->load->view('headers_cuenta',$data);
			$this->load->view('cuenta');
			$this->load->view('footer_comun');
		}
	}

	public function cargarInicioErroneo()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->view('headers');
		$this->load->view('fallo_inicio_sesion');
		$this->load->view('footer');
	}

	public function index()
	{	
		$this->cargarInicio();
		$this->load->database(); 
	}

	public function registro() 
	{
		//Cargamos la página de registro
		$this->load->helper('form');
		$this->load->view('headers');
		$this->load->view('nuevoUsuario');
		$this->load->view('footer');	
	}

	public function registro_fallido() {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->view('headers');
		$data['mensaje'] = "Los datos no son correctos, por favor complete todos los campos"; //NO HACE FALTA OTRA VISTA SOLO PARA ESO
		$this->load->view('nuevoUsuario', $data);
		$this->load->view('footer');
	}

	public function nuevoUsuario()
	{
		//Metemos en un array los datos a insertar en la bd
		$this->load->helper('email');

		//Cargamos el modelo usuario
		$this->load->model('modelo_usuario');

		if($this->modelo_usuario->unicidad_alias($_POST['alias']) == 1) { //Comprobamos que el alias es único

			$usuario['alias']=$_POST['alias'];
			$usuario['pass']=$_POST['pass'];
			$usuario['nombre']=$_POST['nombre'];
			$usuario['apellidos']=$_POST['apellidos'];
			$usuario['fecha_nacimiento']=$_POST['fecha_nacimiento'];
			$usuario['sexo']=$_POST['sexo'];
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
				$this->registro_fallido();
			}
			else
			{
				//Llamamos al método del model que crea un nuevo usuario
				$this->modelo_usuario->insertar_usuario($usuario);
				//Creamos el perfil asociado (actualmente en blanco) al nuevo usuario
				$this->load->model('modelo_perfil');

				$data['id_usuario'] = mysql_insert_id();
				$this->modelo_perfil->insertar_perfil($data);

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
		$this->load->helper('url');
		$this->load->model('modelo_usuario');
		$usuario=$this->modelo_usuario->login($_POST['usuario'], $_POST['pass']);

		if(isset($_POST['registrate']))
			$this->registro();
		else
		{
			if($usuario==null)
			{
				$this->cargarInicioErroneo();
			}
			else
			{
				//TENEMOS EN LA VARIABLE $USUARIO TODOS LOS DATOS DEL USUARIO, SE LO PASAMOS TODO A LA VISTA PARA PODERLOS USAR5
				$this->cargarCuenta($usuario);
			}
		}
	}

	public function salir()
	{
		if(!isset($_SESSION))
			session_start();
		session_destroy();
		$this->cargarInicio();
	}
}
?>