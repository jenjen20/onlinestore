<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once "AbstractController.php";

class registro extends AbstractController{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('tipo_model');
	}

	public function index(){
		
		if ($this->is_post()) {

			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
			$this->form_validation->set_rules('nombre','Nombre','trim|callback_nombre_check');
			if ($this->form_validation->run() == TRUE) {
				$this->usuario_model->poblarPropiedades($this->arregloPost);
				$this->usuario_model->save();
				$ultimoidusuario = $this->usuario_model->getLastID();
				//print_r($ultimoidusuario);
				$this->tipo_model->propiedadesTipoUsuario(array('id' => 0,'usuarios_id' => $ultimoidusuario, 'usuarios_tipos_id' =>2));
				$this->tipo_model->save();
				redirect('autorizar/index');
			}
		}
		$datos = $this->formularioRegistrar($this->arregloPost);
		$datos['titulo'] = "Registrar Usuario";
		$this->load->view('login/registrar', $datos);
	}


	public function nombre_check($datosPost){
		if (empty($datosPost)) {
			$this->form_validation->set_message("nombre_check", "El nombre es requerido", 'nombre');
			return FALSE;
		}
		return TRUE;
	}
}