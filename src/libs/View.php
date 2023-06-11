<?php

namespace Admin1\CrudPhpMysql\libs;


class View{

    public $data;

    function render(string $name, array $data=[]){
        $this->data=$data;
        require 'src/views/'. $name . '.php';
    }
}
?>