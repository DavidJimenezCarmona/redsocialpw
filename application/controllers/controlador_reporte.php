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

    public function mostrar_reportes() {

        $reportes = $this->modelo_reporte->get_reportes();

        if($reportes == null) 
        {
            $data["mensaje"] = "No tiene actualmente reportes que revisar.";
        }
        else 
        {
            $data["reportes_nuevos"] = $reportes;
        }

        //Cargamos las vistas
        $this->load->view('headers_cuenta');
        $this->load->view('mostrar_reportes',$data);
        $this->load->view('footer_comun');
    }

    public function crear_reporte_admin($idUser) {

        if($this->modelo_reporte->esta_reportado($idUser)) {

            $this->load->view('headers_cuenta');
            $data['mensaje'] = "El usuario que intentas reportar ya esta reportado.";
            $this->load->view('footer_comun');
        }

        else {
            $reporte->id_usuario_reportado=$idUser;
            $reporte->id_usuario_reportador=$_SESSION["usuario"]->id;
            $reporte->motivo ="Baneado por un administrador";

            $this->modelo_reporte->insertar_reporte($reporte);
            $this->banear_usuario('mysql_insert_id' , $idUser);
        }
    }

    public function eliminar_reporte_admin($idUser) {

        $this->modelo_reporte->borrar_reporte($idUser);
        $this->load->view('headers_cuenta');
        $data['mensaje'] = "Se ha eliminado el baneo y el reporte asociado a dicho usuario correctamente.";
        $this->load->view('notificacion', $data);
        $this->load->view('footer_comun');
    }

    public function banear_usuario($idReporte, $idUser) {
        $this->modelo_usuario->banear_usuario($idUser); //Se banea al usuario reportado
        $this->modelo_reporte->modificar_reporte($idReporte); //Se marca el reporte como atendido
        $data["usuario"] = $_SESSION['usuario'];
        $data["notificaciones"] = $_SESSION['notificaciones'];
        $_SESSION['reportes'] = $this->modelo_reporte->notificaciones_pendientes(); //Volvemos a calcularlo ya que hemos quitado 1
        $data["reportes"] = $_SESSION['reportes'];
        $this->load->view('headers_cuenta');
        $data['mensaje'] = "El usuario se ha baneado.";
        $this->load->view('notificacion', $data);
        $this->load->view('footer_comun');
    }

    public function banear_usuario_admin($idUser) {
        $this->modelo_usuario->banear_usuario($idUser); //Se banea al usuario reportado
        $data["usuario"] = $_SESSION['usuario'];
        $data["notificaciones"] = $_SESSION['notificaciones'];
        $_SESSION['reportes'] = $this->modelo_reporte->notificaciones_pendientes(); //Volvemos a calcularlo ya que hemos quitado 1
        $data["reportes"] = $_SESSION['reportes'];
        $this->load->view('headers_cuenta');
        $data['mensaje'] = "El usuario se ha baneado.";
        $this->load->view('notificacion', $data);
        $this->load->view('footer_comun');
    }

    public function desbanear_usuario_admin($idUser) {
        $this->modelo_usuario->desbanear_usuario($idUser); //Se desbanea al usuario reportado
        $data["usuario"] = $_SESSION['usuario'];
        $data["notificaciones"] = $_SESSION['notificaciones'];
        $data["reportes"] = $_SESSION['reportes'];
        $this->load->view('headers_cuenta');
        $data['mensaje'] = "El usuario se ha desbaneado.";
        $this->load->view('notificacion', $data);
        $this->load->view('footer_comun');
    }

    public function eliminar_reporte($idReporte) {

        $this->modelo_reporte->borrar_reporte_id($idReporte);
        $_SESSION['reportes'] = $this->modelo_reporte->notificaciones_pendientes(); //Volvemos a calcularlo ya que hemos quitado 1
        $data["reportes"] = $_SESSION['reportes'];
        $this->load->view('headers_cuenta');
        $data['mensaje'] = "Se ha eliminado el reporte ya que se ha considerado de poca importancia.";
        $this->load->view('notificacion', $data);
        $this->load->view('footer_comun');
    }

}

?>