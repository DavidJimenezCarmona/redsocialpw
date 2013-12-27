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

		if(!isset($_SESSION)) {
				session_start();
		}

		$this->load->model('modelo_usuario');

		if($usuario['nombre'] != '') {

			$amigos=$this->modelo_usuario->get_usuario_alias($usuario['nombre']);
			$this->mostrar_amigos($amigos);
		}

		else {

			$amigos=$this->modelo_usuario->get_usuarios();
			$this->mostrar_amigos($amigos);
		}
	}

	public function mostrar_amigos($amigos) {
		$this->load->helper('url');
		$this->load->helper('form');
		//Cargamos las vistas
		$this->load->view('headers_cuenta');
		$this->load->view('mostrar_amigos',$amigos);
		$this->load->view('footer_comun');
	}

}