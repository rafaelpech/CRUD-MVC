<?php 

define('DS', '/');
// dirname: regresa la ruta del index
define('ROOT', dirname(dirname(__FILE__)));
define('WEBROOT', "http://localhost:8080/DAII/MCP2R1");
define('VIEWS_PATH', ROOT.DS.'views');
require_once(ROOT.DS.'lib'.DS.'init.php');
App::run(str_replace("/DAII/MCP2R1","",$_SERVER['REQUEST_URI']));



/*
MODIFICACIONES DEL INDEX.PHP EN EL ACTUAL REPOSITORIO
define('RUTA_LOCAL',explode('/webroot',$_SERVER['PHP_SELF'])[0]);
define('DS', '/');
define('ROOT', dirname(dirname(__FILE__)));
define('WEBROOT', 'http://localhost'.RUTA_LOCAL);
define('VIEWS_PATH', ROOT.DS.'views');
require_once(ROOT.DS.'lib'.DS.'init.php');
echo "<pre style='display:none;'>";
print_r($_SERVER);
echo "</pre>";
App::run(str_replace(RUTA_LOCAL,"",$_SERVER['REQUEST_URI']));
*/















// $uri = $_SERVER['REQUEST_URI'];
// print_r($uri);

// $router = new Router(str_replace("DAII/ExamenMVC","",$_SERVER['REQUEST_URI']));

// echo "<pre>";
// print_r('Route: '.$router->getRoute().PHP_EOL);
// print_r('Language: '.$router->getLanguage().PHP_EOL);
// print_r('Controller: '.$router->getController().PHP_EOL);
// print_r('Action to be called: '.$router->getMethodPrefix().$router->getAction().PHP_EOL);
// echo "Params: ";
// print_r($router->getParams());

// Se llama a App y a su metodo abstracto run, el cual toma las peticiones del usuario y 
// enviarlos al controlador el cual llamará a la vista.



?>