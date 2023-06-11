<?php

namespace Admin1\CrudPhpMysql\libs;


class Controller{
    private View $view;

    //El constructor asegura que se tenga una instancia
    /// de View disponible para su uso en el método render
    public function __construct()
    {
        $this->view=new View();
    }

    //el método render simplemente delega la llamada al método render de la instancia de
    // View para procesar y mostrar la vista correspondiente.
    public function render(string $name, array $data=[]){
        $this->view->render($name, $data);
    }

    public function post(string $param){
        if (!isset($_POST[$param])) {
            return NULL;
        }

        return $_POST[$param];
    }

    public function get(string $param){
        if (!isset($_GET['$param'])) {
            return NULL;
        }

        return $_GET[$param];
    }

}

?>