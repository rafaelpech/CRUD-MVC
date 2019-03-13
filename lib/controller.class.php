<?php 

class Controller{

	protected $data;
	protected $model;
	protected $params;

	public function getData(){
		return $this->data;
	}

	public function getModel(){
		return $this->model;
	}

	public function getParms(){
		return $this->params;
	}

	// Si data llega sin valores, será un arreglo en blanco.
	public function __construct($data = array()){
		$this->data = $data;
		// Recupera el objeto y llama a los parametros.
		$this->params = App::getRouter()->getParams();
	}
}

 ?>