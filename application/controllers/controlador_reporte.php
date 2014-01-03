<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controlador_reporte extends CI_Controller {

	function __construct()
    {
        parent::__construct(); 

        //Propagamos la sesión
		if(!isset($_SESSION)) session_start(); 

        $this->load->model('modelo_usuario');
        $this->load->model('modelo_preporte');
    }

    public function crear_reporte($idUser) {

    }

}

?>