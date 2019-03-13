<?php
class Factura extends Model{
    
    //Regresa todos los registros de la tabla paginas
    public function getList($publicados=false){
        $sql="select * from factura where 1";
        //Si la bandera es_publicado es true, entonces debe regresar solo los que estan activados para publicar
        if($publicados){
            $sql.=" and es_publicado=1";
        }
        return $this->db->query($sql);
    }
    //Regresa un solo resultado para utilizar en una página simple
    public function getByAlias($folio){
        //Saneamos la cadena alias para bloquear la inyección de código malicioso
        $folio = $this->db->escape($folio);
        
        //Armamos la consulta y pasamos a alias como un parametro.
        $sql = "select * from factura where folio ='{$folio}' limit 1";
        
        //Ejecutamos la consulta y lo almacenamos en la variable resultado
        $resultado = $this->db->query($sql);
        //Con esta condición simple regresa resultado si esta tiene valor, de lo contrario regresa null.
        return isset($resultado[0])?$resultado[0]:null;
        
    }

    public function save_register($row=array()){
        if(empty($row['folio'])){
            //$error['id']="No se puede realizar la operación";
            $rfc = $this->db->escape($row['rfc']);
            $nombre = $this->db->escape($row['nombre']);
            $direccion = $this->db->escape($row['direccion']);
            $col = $this->db->escape($row['col']);
            $cp = $this->db->escape($row['cp']);
            $correo = $this->db->escape($row['correo']);
            $monto = $this->db->escape($row['monto']);
            $tipo_de_pago = $this->db->escape($row['tipo_de_pago']);
            $cuenta = $this->db->escape($row['cuenta']);
            $concepto = $this->db->escape($row['concepto']);
            $sql="insert into factura values (null,'{$rfc}', '{$nombre}', '{$direccion}', '{$col}', '{$cp}', '{$correo}', '{$monto}', '{$tipo_de_pago}', '{$cuenta}', '{$concepto}')"; 
            $this->db->query($sql);
        }else{
            //Saneamos la cadena alias para bloquear la inyección de código malicioso
            $folio = $this->db->escape($row['folio']);
            $rfc = $this->db->escape($row['rfc']);
            $nombre = $this->db->escape($row['nombre']);
            $direccion = $this->db->escape($row['direccion']);
            $col = $this->db->escape($row['col']);
            $cp = $this->db->escape($row['cp']);
            $correo = $this->db->escape($row['correo']);
            $monto = $this->db->escape($row['monto']);
            $tipo_de_pago = $this->db->escape($row['tipo_de_pago']);
            $cuenta = $this->db->escape($row['cuenta']);
            $concepto = $this->db->escape($row['concepto']);
            $sql="update factura set rfc='{$rfc}',nombre='{$nombre}',direccion='{$direccion}',col='{$col}',
            cp='{$cp}',correo='{$correo}',monto='{$monto}',tipo_de_pago='{$tipo_de_pago}',cuenta='{$cuenta}',concepto='{$concepto}' where folio='{$folio}'";
            $this->db->query($sql);
        }
    }

    public function publicado($row = array()){
        if(empty($row)){
            $error['folio']="No se puede realizar la operacion";
            return json_encode($error,1);
            
        }else{
            //Saneamos la cadena alias para bloquear la inyección de código malicioso
            $folio = $this->db->escape($row['folio']);  
            $tipo_de_pago = $this->db->escape($row['tipo_de_pago']);      
            $sql="UPDATE factura SET tipo_de_pago = {$tipo_de_pago} WHERE folio = {$folio};";            
            $this->db->query($sql);
        }
    }
    
    public function eliminado($row = array()){
        if(empty($row)){
            $error['folio']="No se puede realizar la operacion";
            return json_encode($error,1);
            
        }else{
            //Saneamos la cadena alias para bloquear la inyección de código malicioso
            $folio = $this->db->escape($row['folio']);     
            $sql="DELETE FROM factura WHERE folio = {$folio};";            
            $this->db->query($sql);
        }
    }

}