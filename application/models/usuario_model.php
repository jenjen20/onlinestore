<?php 
require_once "abstractclassbasicmodel.php";

class Usuario_model extends AbstractclassBasicModel{
	const DB_TABLE = "usuarios";
	const DB_TABLE_PK = "id";

	public $id;
	public $email;
	public $password;
	public $cumpleanios;
	public $nombre;
	public $apellidos;
	public $telefono;
	public $fotografia;

	public function poblarPropiedades(array $datos){
		$this->id = isset($datos['id']) ? trim($datos['id']) : 0;
		$this->email = isset($datos['email']) ? trim($datos['email']) : null;
		$this->password = isset($datos['password']) ? md5($datos['password']) : null;
		$this->cumpleanios = isset($datos['cumpleanios']) ? trim($datos['cumpleanios']) : null;
		$this->nombre = isset($datos['nombre']) ? trim($datos['nombre']) : null;
		$this->apellidos = isset($datos['apellidos']) ? trim($datos['apellidos']) : null;
		$this->telefono = isset($datos['telefono']) ? trim($datos['telefono']) : null;
		$this->fotografia = isset($datos['fotografia']) ? trim($datos['fotografia']) : null;
	}

	public function getArregloPropiedades(){
		return array('id' => $this->id,
					'email' => $this->email,
					'password' => $this->password,
					'cumpleanios' => $this->cumpleanios,
					'nombre' => $this->nombre,
					'apellidos' => $this->apellidos,
					'telefono' => $this->telefono,
					'fotografia' => $this->fotografia
				);
	}

	public function obtenerUsuario($correo,$pass){
		$this->db->select('usuarios.id, usuarios.nombre, usuarios.apellidos, usuarios.email, relacion_usuarios_tipos.usuarios_tipos_id, usuarios_tipos.tipo_usuario');
		$this->db->from($this::DB_TABLE);
		$this->db->join('relacion_usuarios_tipos', 'usuarios.id = relacion_usuarios_tipos.usuarios_id');
		$this->db->join('usuarios_tipos', 'relacion_usuarios_tipos.usuarios_tipos_id = usuarios_tipos.id');
		$this->db->where('usuarios.email',$correo);
		$this->db->where('usuarios.password',$pass);
		$sql = $this->db->get();
		return $sql;
	}

}