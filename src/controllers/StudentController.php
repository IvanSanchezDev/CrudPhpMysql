<?php


namespace Admin1\CrudPhpMysql\controllers;

use Admin1\CrudPhpMysql\libs\Controller;
use Admin1\CrudPhpMysql\Models\Student;
use Exception;


class StudentController extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->render('estudiante/index');
    }

    public function saveStudent(){
        $errors = [];
        $cedula=$this->post('cedula');
        $nombre=$this->post('nombre_estudiante');
        $rutaFoto=$this->post('ruta_foto');
        $sexo=$this->post('sexo');
        $jornada=$this->post('jornada');
        $promedio=$this->post('promedio');

        if (empty($cedula) || empty($nombre) || empty($rutaFoto) || empty($sexo) || empty($jornada) || empty($promedio)) {
            $errors['general'] = 'Todos los campos deben ser completados.';
        } else {
            $student = new Student($cedula, $nombre, $rutaFoto, $sexo, $jornada, $promedio);
            try {
                if ($student->addStudent()) {
                    header('Location: /CrudPhpMysql/home');
                    exit();
                } else {
                    $errors['general'] = 'La cédula ya está en uso.';
                }
            } catch (Exception $e) {
                $errors['general'] = 'Error al agregar el estudiante.';
            }
        }
    
        $this->render('estudiante/index', ['errors' => $errors]);
    }
    

   


}



?>