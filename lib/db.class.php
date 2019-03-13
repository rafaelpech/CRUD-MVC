<?php

class DB{
    protected $conexion;
    
    //Función para abrir la conexión
    public function __construct($host,$usuario,$passw,$db){
        $this->conexion= new mysqli($host,$usuario,$passw,$db);
        if(mysqli_connect_error()){
            throw new Exception("Could not connect to {$db}");
        }
        
    }
    public function query($sql){
        //Si no existe una conexión abierta, regresa falso
        if(!$this->conexion)
            return false;
        
        //Ejecutamos la consulta y almacenamos el resultado
        $resultado=$this->conexion->query($sql);
        
        //Tomamos el error de la consulta y ejecutamos una excepción
        if(mysqli_error($this->conexion)){
            throw new Exception(mysqli_connect_error($this->conexion));
        }
        //Si el resultado de la QUERY es de tipo boleano, este deberá ser regresado. 
        if(is_bool($resultado)){
            return $resultado;
        }
        
        //declaro data para almacenar el contenido de la consulta que se ejecuto.
        $data=array();
        
        //recorremos el resultado registro por registro y lo almacenamos
        while($row = mysqli_fetch_assoc($resultado)){
            $data[]=$row;
        }
        return $data;
    }
    //Esta función se usa para crear una cadena SQL legal que se puede usar en una sentencia SQL, tomando en cuenta el conjunto de caracteres actual de la conexión.
    public function escape($str){
       return mysqli_escape_string($this->conexion,$str); 
    }
}