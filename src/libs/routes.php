<?php


use Admin1\CrudPhpMysql\libs\Database;
use Admin1\CrudPhpMysql\controllers\StudentController;

$router=new \Bramus\Router\Router();

session_start();


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config/');
$dotenv->load();

$router->get("/", function(){
    
    $database = new Database();
    
    try {
        $pdo = $database->connect();
        $stmt = $pdo->query("SELECT DATABASE()");
        $databaseName = $stmt->fetchColumn();
        var_dump($databaseName);
        if ($databaseName === false) {
            echo "No se pudo obtener el nombre de la base de datos.";
        } else {
            echo "Conexión exitosa a la base de datos: " . $databaseName;
        }
        //echo "Conexión exitosa a la base de datos: " . $databaseName;
    } catch (PDOException $e) {
        echo "Error en la conexión: " . $e->getMessage();
        var_dump($e);
    }
});

$router->get('/home', function(){
    $controller=new StudentController();
    $controller->index();
});


$router->post("/addStudent", function(){
    $controller=new StudentController();
    $controller->saveStudent();
});

$router->get('/deleteStudent/{id}', function($id){
    $controller=new StudentController();
    $controller->deleteeStudent($id);
});

/*
$router->put("/editStudent", function(){

});
*/

$router->run();

?>