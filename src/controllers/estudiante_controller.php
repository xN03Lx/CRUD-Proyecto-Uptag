<?php

require_once("../core/base_controller.php");
require_once("models/estudiante.php");



class EstudianteController extends BaseController {

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
                    $estudiante = null;
                    $this->render("estudiantes.php", $estudiante);
                    $this->Guardar();

            }

            if ($op == 'Editar'){
                
                if(isset($_REQUEST['id_estudiante'])){
                    $id = $_REQUEST['id_estudiante'];
                    $estudiante = $model->obtener($id);

                    if (isset($estudiante)){
                        $this->render("estudiantes.php", $estudiante);
                        $this->Actualizar(); 
                    }
                    else {
                        echo "No Found"; //arregla cuando no se encuentre la id
                    }


                }

            }
             if ($op == 'Eliminar'){
                
                if(isset($_REQUEST['id_estudiante'])){
                    $id = $_REQUEST['id_estudiante'];
                    $estudiantes = $model->obtener($id);
                
                    $this->Eliminar();

                }

            }

        }
        catch(Exception $e)
        {
            $e->getMessage();
        }
    }   

    public function Guardar(){


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
                    $e->getMessage();
                }
            }
    
    }  

    public function Actualizar(){

        $errors = array();

        if (isset($_POST['form-submitted'])) {
            $model = new Estudiante();
            $id = (isset($_REQUEST['id_estudiante']))?($_REQUEST['id_estudiante']):(0); //Cambiar 'id' a id_estudiante
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
                    $model->actualizar($id);
                    header('Location: index.php?c=Estudiante');
                    return;
                }
                catch(ValidationException $e)
                {
                     $e->getMessage();
                }
        }

    }
    
    public function Eliminar()
    {

        $id = isset($_GET['id_estudiante']) ? $_GET['id_estudiante'] : null;
        
        if (isset($id)){

            $model = new Estudiante();
            $model->eliminar($id);
            header('Location: index.php?c=Estudiante');
        }
       

    }

     public function showError($title, $message) 
    {

        $this->render("error.php");
    }
}

