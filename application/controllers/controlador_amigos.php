<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controlador_amigos extends CI_Controller {


	public function buscar_amigos() {
		$this->load->helper('url');
		$this->load->helper('form');
		//Cargamos las vistas
		$this->load->view('headers_cuenta');
		$this->load->view('buscar_amigos');
		$this->load->view('footer_comun');
	}

	public function filtrar_usuarios() {

		$usuario['nombre']=$_POST['nombre'];

		$this->load->model('modelo_usuario');

		if(!isset($_SESSION)) {
				session_start();
		}


		if($usuario['nombre'] != '') {

			$amigos=$this->modelo_usuario->get_usuario_alias($usuario['nombre']);

			if($amigos == null) {
				$data['mensaje'] = "No hay coincidencias con la búsqueda realizada";
			}

			else {
				$data['amigos'] = $amigos;
			}

			$this->mostrar_usuarios($data);

		}

		else {

			$data['amigos']=$this->modelo_usuario->get_usuarios();
			$this->mostrar_usuarios($data);
		}
	}

	public function mostrar_usuarios($data) {
		$this->load->helper('url');
		$this->load->helper('form');
		//Cargamos las vistas
		$this->load->view('headers_cuenta');
		$this->load->view('mostrar_usuarios',$data);
		$this->load->view('footer_comun');
	}

	public function agregar_amigo($id) {
		if(!isset($_SESSION)) {
			session_start();
		}


		$this->load->model('modelo_amigo');

		if($this->modelo_amigo->es_amigo($_SESSION['usuario']->id, $id) == 0) {

			echo "No puedes enviarle mas peticiones de amistad a este usuario";

		}

		else {

			$this->modelo_amigo->insertar_amigo($_SESSION['usuario']->id,$id);

			echo "Amigo agregado con exito.";

		}

	}

	public function mostrar_amigos() {
		if(!isset($_SESSION)) {
			session_start();
		}


		$this->load->model('modelo_amigo');
		$amigos = $this->modelo_amigo->get_amigos($_SESSION['usuario']->id);

		if($amigos == null) {
			$data['mensaje'] = "No hay amigos que mostrar actualmente. Si has añadido un amigo primero éste tiene que aceptar tu petición de amistad para que aparezca en esta lista.";
		}

		else {
			$data['amigos'] = $amigos;
		}

		$this->load->helper('url');
		$this->load->helper('form');
		//Cargamos las vistas
		$this->load->view('headers_cuenta');
		$this->load->view('mostrar_amigos',$data);
		$this->load->view('footer_comun');
	}


}