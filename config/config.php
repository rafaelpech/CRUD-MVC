<?php 

Config::set('site_name', 'Mi sitio');

Config::set('languages', array('es','en','fr'));

// Routes. Route name => method prefix
Config::set('routes', array(
	'default' => '',
	'admin' => 'admin_'
));

Config::set('default_route', 'default');
Config::set('default_language', 'es');
Config::set('default_controller', 'facturas');
Config::set('default_action', 'index');


//Agregar las variables para la conexión a la BD
//Recuerde agregar el num de puerto, de ser necesario :8080
Config::set('db.host', 'localhost'); 
Config::set('db.usuario', 'root');
Config::set('db.password', 'Rafaelpech.24');
Config::set('db.db_name', 'MCP2R1');
//Crear la Clase db en lib

?>