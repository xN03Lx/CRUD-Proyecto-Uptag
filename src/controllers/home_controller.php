<?php

require_once("../core/base_controller.php");
//require_once("models/estudiante.php");
//require_once("models/docente.php");


class HomeController extends BaseController {
    /*public function __constructor(){  
        $this->set_dir_views("../views/estudiante");
    }*/

    public function dirViews(){
        return "views";
    }

    public function index(){

        $this->render("principal.html");
    }
}