<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controlador_reporte extends CI_Controller {

	function __construct()
    {
        parent::__construct(); 

        //Propagamos la sesión
		if(!isset($_SESSION)) session_start(); 

        $this->load->model('modelo_usuario');
        $this->load->model('modelo_reporte');
    }

    public function crear_reporte_admin($idUser) {

        $data["usuario"] = $_SESSION['usuario'];
        $data["notificaciones"] = $_SESSION['notificaciones'];
        $data["reportes"] = $_SESSION['reportes'];

        if($this->modelo_reporte->esta_reportado($idUser)) {

            $this->load->view('headers_cuenta',$data);
            $data['mensaje'] = "El usuario que intentas reportar ya esta reportado.";
            $this->load->view('notificacion', $data);
            $this->load->view('footer_comun');
        }

        else {
            $this->modelo_reporte->insertar_reporte($_SESSION['usuario']->id, $idUser);
            $this->load->view('headers_cuenta',$data);
            $data['mensaje'] = "El usuario se ha baneado y se ha creado correctamente el reporte que lo notifica.";
            $this->load->view('notificacion', $data);
            $this->load->view('footer_comun');
        }
    }

}

?>