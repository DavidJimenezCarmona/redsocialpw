<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controlador_mensajes extends CI_Controller 
{
	function __construct()
    {
        parent::__construct(); 

        //Propagamos la sesión
		if(!isset($_SESSION)) session_start(); 

		//Activamos los modelos que vamos a usar
		$this->load->model('modelo_mensaje');
    }

    function bandejaEntrada($data=null)
    {
    	//Pedir al modelo los mensajes del usuario
    	$data['mensajes']=$this->modelo_mensaje->get_mensajes($_SESSION['usuario']->id);

    	$this->load->view('headers_cuenta');
    	$this->load->view('bandeja_entrada', $data);   	
    }

    function verMensaje($id)
    {
    	//Pedir al modelo el mensaje
    	$data['mensajeAbierto']=$this->modelo_mensaje->get_mensaje($id);
    	//Marcar el mensaje como leido
    	$data['mensajeAbierto']->visto =1;
    	$this->modelo_mensaje->modificar_mensaje($data['mensajeAbierto']);
    	$this->bandejaEntrada($data);
    }
}

