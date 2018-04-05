<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once "AbstractController.php";

class Autorizar extends AbstractController {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('usuario_model');
	}

	public function index()
	{
		if ($this->is_post()) {
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
			$this->form_validation->set_rules('email','email','trim|callback_email_check');
			$this->form_validation->set_rules('password','password','trim|callback_password_check');
			if ($this->form_validation->run() == TRUE) {
				$data = $this->arregloPost;
				$this->usuario_model->poblarPropiedades($this->arregloPost);
				$validado = $this->usuario_model->obtenerUsuario($data['email'],md5($data['password']));
				
				$usuario = array();
				foreach($validado->result() as $renglon):
					$usuario['id'] = $renglon->id;
					$usuario['email'] = $renglon->email;
					$usuario['nombre'] = $renglon->nombre;
					$usuario['apellidos'] = $renglon->apellidos;
					$usuario['tipos_id'] = $renglon->usuarios_tipos_id;
					$usuario['tipo_usuario'] = $renglon->tipo_usuario;
				endforeach;
				if (count($usuario)==0) {
					$this->vista_inicio("Usuario y Contraseña Inválida");
				}else{
					//seteando sesion
				    $this->session->set_userdata($usuario);

					if ($usuario['tipos_id'] == 1) { //admin
						redirect('administrador/index');
					}elseif ($usuario['tipos_id'] == 2) { //usuario
						redirect('indice/index');
					}

				}
				// $key = $this->encryption->create_key(16);
				// $datos['msg'] = $key;
				// $this->load->view('login/index', $datos);
			}
		}else{
			$this->vista_inicio("");
		}
	}

	public function vista_inicio($msg){
		$datos = $this->formularioLogin($this->arregloPost);
		$datos['msg'] = $msg;
		$this->load->view('login/index', $datos);
	}


    public function email_check($datosPost){
		if (empty($datosPost)) {
			$this->form_validation->set_message("email_check", "Debe ingresar el correo", 'email');
			return FALSE;
		}
		return TRUE;
	}
	public function password_check($datosPost){
		if (empty($datosPost)) {
			$this->form_validation->set_message("password_check", "Debe ingresar la contraseña", 'password');
			return FALSE;
		}
		return TRUE;
	}

	public function logout(){
		$this->session->unset_userdata('id','email','nombre','apellidos','tipos_id','tipo_usuario');
		$this->session->sess_destroy();
		redirect('autorizar/index');
		// $datos = $this->formularioLogin($this->usuario_model->getArregloPropiedades());
		// $datos['msg'] = "";
		// $this->load->view("login/index",$datos);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */