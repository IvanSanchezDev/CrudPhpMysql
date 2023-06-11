<?php

namespace Admin1\CrudPhpMysql\Models;

use Admin1\CrudPhpMysql\libs\Model;
use PDO;
use PDOException;

class Student extends Model{

    private int $id;

    public function __construct(private int $cedula, private string $nombreEstudiante, private string $rutaFoto, private string $sexo, private string $jornada, private int $promedio)
    {
        parent::__construct();
        $this->cedula=$cedula;
        $this->nombreEstudiante=$nombreEstudiante;
        $this->rutaFoto=$rutaFoto;
        $this->sexo=$sexo;
        $this->jornada=$jornada;
        $this->promedio=$promedio;
    }

    public function __get($name){
        if (property_exists($this, $name)) {
            return $this->name;
        }

        //throw new Exception("Propiedad invalid" . $name);
    }

    public function __set($name, $value){
        if (property_exists($this, $name)) {
            $this->$name=$value;
        }
        //throw new Exception("Propiedad invalid" . $name);
    }

    public function addStudent(){
        try {
            $query=$this->prepare('INSERT INTO estudiante (cedula, nombre_estudiante, ruta_foto, sexo, jornada, promedio) VALUES (:cedula, :nombre_estudiante, :ruta_foto, :sexo, :jornada, :promedio)');
            $query->execute([
                'cedula'=>$this->cedula,
                'nombre_estudiante'=>$this->nombreEstudiante,
                'ruta_foto'=>$this->rutaFoto,
                'sexo'=>$this->sexo,
                'jornada'=>$this->jornada,
                'promedio'=>$this->promedio

            ]);
            return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
            return false;
        }
    }

}

?>