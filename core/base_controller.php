<?php

class BaseController {
    //Solucionar este problema con le herencia
    /*public $dir_views;

    public function set_dir_views($path_views) {
        $this->dir_views = $path_views;
    }*/

    public function dirViews(){
        return "views";
    }

    public function render($name_file, $data=null) {
        //Aqui va la validacion de si existe la plantilla
        if(!is_null($data)){
            $_SESSION["data"] = $data;
        }
        
        require_once($this->dirViews()."/".$name_file);
    }

    public function responseJson($data) {
        //Completar cabeceras
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}