<?php

require_once("../core/base_controller.php");
require_once("models/estudiante.php");



class EstudianteController extends BaseController {
    /*public function __constructor(){  
        $this->set_dir_views("../views/estudiante");
    }*/
    private $models;

    public function __CONSTRUCT(){
        $this->models = new Estudiante();
    }

    public function dirViews(){
        return "views/estudiante";
    }

    public function index(){
        $model = new Estudiante();

        $estudiantes = $model->listar();

        $this->render("lista.php", $estudiantes);
    }

    public function handleRequest(){
        $model = new Estudiante();

        $op = isset($_GET['a']) ? $_GET['a'] : null;

        try {
            if (!$op || $op == 'Guardar'){
                    $this->render("estudiantes.php");
                    $this->Guardar();
            }
             else {
                $this->showError("Page not found", "Page for execution" . $op . " was not found");
            }
        }
        catch(Exception $e)
        {
            $this->showError("Application error", $e->getMessage());
        }
    }   

    public function Guardar(){

        $errors = array();

        if (isset($_POST['form-submitted'])) 
            {
            $id = (isset($_REQUEST['id']))?($_REQUEST['id']):(""); //Cambiar 'id' a id_estudiante
            $model = new Estudiante();
            $model->atributos = [
            "primer_nombre" => (isset($_REQUEST['nombre1']))?($_REQUEST['nombre1']):(null),
            "segundo_nombre" => (isset($_REQUEST['nombre2']))?($_REQUEST['nombre2']):(null),
            "primer_apellido" =>  (isset($_REQUEST['apellido1']))?($_REQUEST['apellido1']):(null),
            "segundo_apellido" =>  (isset($_REQUEST['apellido2']))?($_REQUEST['apellido2']):(null),
            "cedula" =>  (isset($_REQUEST['cedula']))?($_REQUEST['cedula']):(""),
            "fecha_nacimiento" =>  (isset($_REQUEST['fecha_nac']))?($_REQUEST['fecha_nac']):(null),
            "correo" =>  (isset($_REQUEST['email']))?($_REQUEST['email']):(null),
            "direccion" =>  (isset($_REQUEST['direccion']))?($_REQUEST['direccion']):(null),
            "observaciones" =>  (isset($_REQUEST['observacion']))?($_REQUEST['observacion']):(null),
            ];           
             try 
                {
                    $model->crear();
                    header('Location: index.php?c=Estudiante');
                    return;
                }
                catch(ValidationException $e)
                {
                    $errors = $e->getErrors();
                }
            }
    
    }  




}


//         $model->primer_nombre =  (isset($_REQUEST['nombre1']))?($_REQUEST['nombre1']):("");
//         $model->segundo_nombre =  (isset($_REQUEST['nombre2']))?($_REQUEST['nombre2']):("");
//         $model->primer_apellido =  (isset($_REQUEST['apellido']))?($_REQUEST['apellido']):("");
//         $model->segundo_apellido =  (isset($_REQUEST['apellido2']))?($_REQUEST['apellido2']):("");
//         $model->cedula =  (isset($_REQUEST['cedula']))?($_REQUEST['cedula']):("");
//         $model->fecha_nacimiento =  (isset($_REQUEST['fecha_nac']))?($_REQUEST['fecha_nac']):("");
//         $model->correo =  (isset($_REQUEST['email']))?($_REQUEST['email']):("");
// //        $model->telefono = $_REQUEST['fijo_est'];
//         $model->direccion =  (isset($_REQUEST['direccion']))?($_REQUEST['direccion']):("");
//     //    $model->carrera_id = $_REQUEST['fnac_est'];
//         $model->observaciones=  (isset($_REQUEST['observacion']))?($_REQUEST['observacion']):("");

    

        //header('Location: index.php');
