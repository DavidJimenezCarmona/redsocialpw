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

	public function nuevoUsuario()
	{
		//Metemos en un array los datos a insertar en la bd
		$usuario['alias']=$_POST['alias'];
		$usuario['pass']=$_POST['pass'];
		$usuario['nombre']=$_POST['nombre'];
		$usuario['apellidos']=$_POST['apellidos'];
		$usuario['fecha_nacimiento']=$_POST['fecha_nacimiento'];
		$usuario['sexo']=$_POST['sexo'];
		$usuario['email']=$_POST['email'];

		//Cargamos el modelo usuario
		$this->load->model('modelo_usuario');
		//Llamamos al método del model que crea un nuevo usuario
		$this->modelo_usuario->insertar_usuario($usuario);

		//Cargamos la página de inicio
		$this->cargarInicio();
		echo "Se ha registrado correctamente";	
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
				$this->cargarInicio();
				echo "Usuario o contraseñas incorrectas";
			}
			else
			{
				//Cargar página principal
				echo "Has entrado";
			}
		}
	}
}
?>