<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function mostrar_amigos($usuario) {
		//$amigos = this->get_amigos($usuario)?
		//this->cargar_amigos($usuario);
	}

	public function cargar_amigos($usuario) {
		this->load->view('headers');
		this->load->view('amigos',$amigos);
		this->load->view('footer_comun');
	}

}