<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controlador_amigos extends CI_Controller {

	function __construct()
    {
        parent::__construct(); 

        //Propagamos la sesión
		if(!isset($_SESSION)) session_start(); 

        $this->load->model('modelo_usuario');
        $this->load->model('modelo_amigo');
        $this->load->model('modelo_perfil');
    }

	public function buscar_amigos() 
	{
		//Cargamos las vistas
		$this->load->view('headers_cuenta');
		$this->load->view('buscar_amigos');
		$this->load->view('footer_comun');
	}

	public function filtrar_usuarios() 
	{
		$usuario['nombre']=$_POST['nombre'];

		if($usuario['nombre'] != '') 
		{
			$amigos=$this->modelo_usuario->get_usuario_alias($usuario['nombre']);

			if($amigos == null) 
			{
				$data['mensaje'] = "No hay coincidencias con la búsqueda realizada";
			}
			else 
			{
				$data['amigos'] = $amigos;
			}

			$this->mostrar_usuarios($data);
		}
		else 
		{
			$data['amigos']=$this->modelo_usuario->get_usuarios();
			$this->mostrar_usuarios($data);
		}
	}

	public function mostrar_usuarios($data) 
	{
		//Cargamos las vistas
		$this->load->view('headers_cuenta');
		$this->load->view('mostrar_usuarios',$data);
		$this->load->view('footer_comun');
	}

	public function agregar_amigo($id) 
	{
		if($this->modelo_amigo->es_amigo($_SESSION['usuario']->id, $id) == 0) 
		{
			$this->load->view('headers_cuenta');
			$data['mensaje'] = "Ya le enviaste una petición de amistad a este usuario con anterioridad, 
			por favor espera a que éste la responda 
			o asegurate de que no se encuentra ya en tu lista de amigos.";
			$this->load->view('notificacion', $data);
			$this->load->view('footer_comun');
		}
		else 
		{
			$this->modelo_amigo->insertar_amigo($_SESSION['usuario']->id,$id);
			$this->load->view('headers_cuenta');
			$data['mensaje'] = "La petición de amistad de ha enviado correctamente, 
			espera a que el usuario la responda 
			y aparecerá en tu lista de  amigos.";
			$this->load->view('notificacion', $data);
			$this->load->view('footer_comun');

		}
	}

	public function mostrar_perfil($id) {
		$amigo = $this->modelo_amigo->get_amigo($_SESSION['usuario']->id,$id);

		$data["amigo"] = $amigo;

		//Recuperamos además los datos del perfil del anterior amigo:

		$perfil = $this->modelo_perfil->get_perfil($id);

		$data["perfil"] = $perfil;

		//Cargamos las vistas

		$this->load->view('headers_cuenta');
		$this->load->view('mostrar_perfil', $data);
		$this->load->view('footer_comun');
	}

	public function mostrar_amigos() 
	{
		$amigos = $this->modelo_amigo->get_amigos($_SESSION['usuario']->id);

		if($amigos == null) 
		{
			$data['mensaje'] = "No hay amigos que mostrar actualmente. 
								Si has añadido un amigo primero, éste, 
								tiene que aceptar tu petición de amistad para que aparezca en esta lista.";
		}
		else 
		{
			$data['amigos'] = $amigos;
		}
		
		//Cargamos las vistas
		$this->load->view('headers_cuenta');
		$this->load->view('mostrar_amigos',$data);
		$this->load->view('footer_comun');
	}

	public function mostrar_peticiones() 
	{
		$peticiones = $this->modelo_amigo->get_peticiones($_SESSION['usuario']->id);

		if($peticiones == null) 
		{
			$data['mensaje'] = "No tiene actualmente peticiones de amistad disponibles.";
		}
		else 
		{
			$data['peticiones'] = $peticiones;
		}

		//Cargamos las vistas
		$this->load->view('headers_cuenta');
		$this->load->view('mostrar_peticiones',$data);
		$this->load->view('footer_comun');
	}

	public function aceptar_peticion($id1, $id2) 
	{
		$peticiones = $this->modelo_amigo->aceptar_peticion($id1, $id2);
		$this->load->view('headers_cuenta');
		$data['mensaje'] = "Has aceptado la petición de amistad, ahora puedes encontrar a este usuario en tu lista de amigos!";
		$this->load->view('notificacion', $data);
		$this->load->view('footer_comun');
	}


}