<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->view('headers');
		$this->load->view('inicio');
		$this->load->view('footer');

	}
	public function login()
	{
		
	}
}
