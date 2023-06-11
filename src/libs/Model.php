<?php

namespace Admin1\CrudPhpMysql\libs;

use Admin1\CrudPhpMysql\libs\Database;

class Model{

    private Database $db;

    public function __construct(){
        $this->db=new Database();
    }

    //obtenemos la conexion a la base de datos con connect y
    //a su vez llamamos el metodo query 
    public function query($query){
        return $this->db->connect()->query($query);
    }

     //obtenemos la conexion a la base de datos con connect y
    //a su vez llamamos el metodo prepare()

    //el metodo prepare() recibe una consulta y la prepara 
    //para ser ejecutada despues no ahi mismo como funciona 
    //query()
    public function prepare($query){
        return $this->db->connect()->prepare($query);
    }

    
        
    

}

?>