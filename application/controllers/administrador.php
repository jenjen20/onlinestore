<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once "AbstractController.php";

class Administrador extends AbstractController{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		if($this->session->userdata('id') == null){
			echo("No autorizado");
		}else{
			$datos['titulo'] = "Administración OnlineStore";
			$datos['nombre'] = $this->session->userdata('nombre');
			$this->load->view('admin/index',$datos);
		}

		// $this->load->view('admin/index');
	}

}
 ?>