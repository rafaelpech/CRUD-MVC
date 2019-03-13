<?php 

class FacturasController extends Controller{

 //Creamos el método constructor que se va a encargar de llamar al constructor del padre
    //y así el padre pueda acceder al atributo model 
    public function __construct($data = array()){
        parent::__construct($data);
        //Creamos al objeto y lo asignamos al atributo model del padre
        $this->model =new Factura();
    }
	public function index(){
		//$this->data['test_content'] = 'Here will be a pages list';
		//Recueperamos los registros a través del método getList
        $this->data['facturas'] = $this->model->getList();
	}

	public function view(){
		$params = App::getRouter()->getParams();

		if ( isset($params[0]) ) {
			$alias = strtolower($params[0]);
			//$this->data['content'] = "Here will be a pages with '{$alias}' alias";
			//Accedemos a un registro especifico
            $this->data['factura']= $this->model->getByAlias($alias);
		}
		//Hacemos las correcciones correcciones en las diferentes vistas
		

	}

	public function edit(){
		$params = App::getRouter()->getParams();

		if ( isset($params[0]) ) {
			$alias = strtolower($params[0]);
			//$this->data['content'] = "Here will be a pages with '{$alias}' alias";
			//Accedemos a un registro especifico
            $this->data['factura']= $this->model->getByAlias($alias);
		}
		//Hacemos las correcciones correcciones en las diferentes vistas
	}

	
	public function new(){
		$params = App::getRouter()->getParams();

		if ( isset($params[0]) ) {
			$alias = strtolower($params[0]);
			//$this->data['content'] = "Here will be a pages with '{$alias}' alias";
			//Accedemos a un registro especifico
            $this->data['factura']= $this->model->getByAlias($alias);
		}
		//Hacemos las correcciones correcciones en las diferentes vistas
	}

	public function save(){

		$this->data['msg']= array('folio'=> 0,'txt'=>"Registro creado satisfactoriamente");
		$row['folio']=$_POST['folio'];
		$row['rfc']=$_POST['rfc'];
		$row['nombre']=$_POST['nombre'];
		$row['direccion']=$_POST['direccion'];
		$row['col']=$_POST['col'];
		$row['cp']=$_POST['cp'];
		$row['correo']=$_POST['correo'];
		$row['monto']=$_POST['monto'];
		$row['tipo_de_pago']=$_POST['tipo_de_pago'];
		$row['cuenta']=$_POST['cuenta'];
		$row['concepto']=$_POST['concepto'];
		$this->data['factura']= $this->model->save_register($row);

	}
	public function activar(){    
        $params = App::getRouter()->getParams();
        $row['tipo_de_pago'] = $params[1];
        $row['folio'] = $params[0];    
        $this->data['factura'] = $this->model->publicado($row);
	}
	
	public function eliminar(){    
        $params = App::getRouter()->getParams();
        $row['folio'] = $params[0];    
        $this->data['factura'] = $this->model->eliminado($row);
    }
}

?>