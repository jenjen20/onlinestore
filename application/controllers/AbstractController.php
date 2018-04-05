<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


abstract class AbstractController extends CI_Controller 
{
	//protected $arregloPost;

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
    	$this->load->helper('html');
	}

	protected function is_post()
	{
		$tempArray = $this->input->post();
		
		if(empty($tempArray))
		{
			$this->arregloPost = array();
			return FALSE;
		}

		$this->arregloPost = $tempArray;
		return TRUE;
	}

	protected function formularioRegistrar(array $datosPost){
		$arregloCampos = array(
			'id' => isset($datosPost['id']) ? $datosPost['id'] : 0,
			'nombre' => array('name' => 'nombre',
								'id' => 'nombre',
								'class' => 'form-control input-lg',
								'required' => 'required',
								'data-error' => 'Dato requerido',
								'value' => isset($datosPost['nombre']) ? $datosPost['nombre'] : null
							),
			'email' => array('name' => 'email',
								'id' => 'email',
								'class' => 'form-control input-lg',
								'required' => 'required',
								'data-error' => 'Dato requerido',
								'value' => isset($datosPost['email']) ? $datosPost['email'] : null
							),
			'apellidos' => array('name' => 'apellidos',
								'id' => 'apellidos',
								'class' => 'form-control input-lg',
								'data-error' => 'Dato requerido',
								'value' => isset($datosPost['apellidos']) ? $datosPost['apellidos'] : null
							),
			'password' => array('name' => 'password',
								'id' => 'password',
								'class' => 'form-control input-lg',
								'required' => 'required',
								'data-error' => 'Dato requerido',
								'value' => isset($datosPost['password']) ? $datosPost['password'] : null
							),
			'cumpleanios' => array('name' => 'cumpleanios',
								'id' => 'cumpleanios',
								'class' => 'form-control input-lg',
								'data-error' => 'Dato requerido',
								'value' => isset($datosPost['cumpleanios']) ? $datosPost['cumpleanios'] : null
							),
			'telefono' => array('name' => 'telefono',
								'id' => 'telefono',
								'class' => 'form-control input-lg',
								'data-error' => 'Dato requerido',
								'value' => isset($datosPost['telefono']) ? $datosPost['telefono'] : null
							),
			'fotografia' => array('name' => 'fotografia',
								'id' => 'fotografia',
								'class' => 'form-control input-lg',
								'value' => isset($datosPost['fotografia']) ? $datosPost['fotografia'] : null
							),
		);
		return $arregloCampos;
	}

	protected function formularioLogin(array $datosPost){
		$arregloCampos = array(
			'email' => array('name' => 'email',
								'id' => 'inputEmail',
								'class' => 'form-control',
								'type' => 'email',
								'placeholder' => 'Direccion de Email',
								'required' => 'required',
								'autofocus' => 'autofocus',
								'value' => isset($datosPost['email']) ? $datosPost['email'] : null
							),
			'password' => array('name' => 'password',
								'id' => 'inputPassword',
								'class' => 'form-control',
								'type' => 'password',
								'placeholder' => 'Password',
								'required' => 'required',
								'value' => isset($datosPost['password']) ? $datosPost['password'] : null
							)
		);
		return $arregloCampos;
	}

}