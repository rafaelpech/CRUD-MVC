<?php 

class View{

	protected $data;
	protected $path;

	protected static function getDefaultViewPath(){
		$router = App::getRouter();
		if ( !$router ) {
			return false;
		}
		// Se arma la ruta del directiorio donde se encuentra el controlador.
		$controller_dir = $router->getController();
		$template_name = $router->getMethodPrefix().$router->getAction().'.html';
		// obtiende la vista predeterminada con los argumentos que el usuario solicita.
		return VIEWS_PATH.DS.$controller_dir.DS.$template_name;
	}

	public function __construct($data = array(), $path = null){
		if ( !$path) {
			$path = self::getDefaultViewPath();
		}
		if ( !file_exists($path) ) {
			throw new Exception('Template file is not found in path: '.$path);
		}
		$this->path = $path;
		$this->data = $data;
	}

	// Realiza la mezcla entre php y html.
	public function render(){
		$data = $this->data;
		// Recupera el contenido como si fuera texto plano.
		ob_start();
		include($this->path);
		$content = ob_get_clean();

		return $content;
	}

}

?>