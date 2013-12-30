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
		$this->load->model('modelo_amigo');

		//Activamos los helpers que vamos a usar
		$this->load->helper('date');
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

    function nuevoMensaje($data=null)
    {
    	//Pedir al modelo los amigos del usuario
    	$amigos=$this->modelo_amigo->get_amigos($_SESSION['usuario']->id);

    	$amigo=array();
    	//Formateamos para pasarlo al dropdown
    	foreach ($amigos as $reg) 
        {
            $amigo[$reg['id']] = $reg['alias'];
        }

    	$data['amigos']=$amigo;

    	//Cargamos la vista
    	$this->load->view('headers_cuenta');
    	$this->load->view('nuevo_mensaje', $data);
    }

    function enviarMensaje()
    {
    	//Creamos el objeto mensaje
		$mensaje->id_usuario_emisor=$_SESSION['usuario']->id;
		$mensaje->id_usuario_receptor=$_POST['amigos'];
		$mensaje->titulo=$_POST['titulo'];
		$mensaje->contenido=$_POST['contenido'];
		$mensaje->fecha=mdate("%Y-%m-%d", time());
		$mensaje->visto=0;


		//Le pasamos al modelo el mensaje para insertarlo
		$this->modelo_mensaje->insertar_mensaje($mensaje);

		//Creamos un mensaje para la vista
		$data['mensaje']="Has enviado el mensaje correctamente";

		//Cargamos la vista de nuevo mensaje
		$this->nuevoMensaje($data);


    }
}

