<?php

require_once("../../core/base_controller.php");
require_once("../models/estudiante.php");


class EstudianteController extends BaseController {
    /*public function __constructor(){  
        $this->set_dir_views("../views/estudiante");
    }*/

    public function dirViews(){
        return "../views/estudiante";
    }

    public function index(){
        $model = new Estudiante();

        $estudiantes = $model->listar();

        $this->render("mostrar_estudiantes.template.php", $estudiantes);
    }
}