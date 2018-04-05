<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once "AbstractController.php";

class indice extends AbstractController{

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		if($this->session->userdata('id') == null){
			echo("No autorizado");
		}else{
			$datos['titulo'] = "Online Store";
			$datos['nombre'] = $this->session->userdata('nombre');
			$this->load->view('usuario/index', $datos);
		}
		// $datos['titulo'] = "Online Store";
		// $this->load->view('usuario/index', $datos);
	}
}