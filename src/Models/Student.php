<?php

namespace Admin1\CrudPhpMysql\Models;

use Admin1\CrudPhpMysql\libs\Database;
use Admin1\CrudPhpMysql\libs\Model;
use PDO;
use PDOException;
use Exception;

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
            return $this->{$name};
        }
        throw new Exception("Propiedad invalid" . $name);
    }


    public function __set($name, $value){
        if (property_exists($this, $name)) {
            $this->$name=$value;
        }
        throw new Exception("Propiedad invalid" . $name);
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

    public static  function getStudents(){
        $students=[];
        try {
            $db=new Database();
            $query=$db->connect()->query('SELECT * FROM estudiante');
            while ($e=$query->fetch(PDO::FETCH_ASSOC)) {
                $student=new Student($e['cedula'], $e['nombre_estudiante'], $e['ruta_foto'], $e['sexo'], $e['jornada'], $e['promedio']);
                $student->id=$e['id'];
                array_unshift($students, $student);
            }

            return $students;
        } catch (\Throwable $th) {
            echo  "error" . $th->getMessage();
        }
    }

}

?>