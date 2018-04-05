<?php 
require_once "abstractclassbasicmodel.php";

class Tipo_model extends AbstractclassBasicModel{
	const DB_TABLE = "relacion_usuarios_tipos";
	const DB_TABLE_PK = "id";

	public $id;
	public $usuarios_id;
	public $usuarios_tipos_id;

	public function propiedadesTipoUsuario(array $datos){
		$this->id = isset($datos['id']) ? trim($datos['id']) : 0;
		$this->usuarios_id = isset($datos['usuarios_id']) ? trim($datos['usuarios_id']) : 0;
		$this->usuarios_tipos_id = isset($datos['usuarios_tipos_id']) ? trim($datos['usuarios_tipos_id']) : 0;
	}
}