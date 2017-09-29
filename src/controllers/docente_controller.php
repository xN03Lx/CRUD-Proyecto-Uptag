<?php

require_once("../core/base_controller.php");
require_once("models/docente.php");



class DocenteController extends BaseController {

    public function dirViews(){
        return "views/docente";
    }

    public function index(){
        $model = new Docente();

        $docentes = $model->listar();

        $this->render("lista.php", $docentes);
    }

    public function handleRequest(){
        $model = new Docente();

        $op = isset($_GET['a']) ? $_GET['a'] : null;

        try {
            if (!$op || $op == 'Guardar'){
                    $Docente = null;
                    $this->render("Docentes.php", $Docente);
                    $this->Guardar();

            }

            if ($op == 'Editar'){
                
                if(isset($_REQUEST['id_docente'])){
                    $id = $_REQUEST['id_docente'];
                    $Docente = $model->obtener($id);

                    if (isset($Docente)){
                        $this->render("docentes.php", $Docente);
                        $this->Actualizar(); 
                    }
                    else {
                        echo "No Found"; //arregla cuando no se encuentre la id
                    }


                }

            }
             if ($op == 'Eliminar'){
                
                if(isset($_REQUEST['id_docente'])){
                    $id = $_REQUEST['id_docente'];
                
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

        $errors = array();

        if (isset($_POST['form-submitted'])) 
            {
            $model = new Docente();
            $model->atributos = [
                "primer_nombre" => (isset($_REQUEST['nombre1']))?($_REQUEST['nombre1']):(null),
                "segundo_nombre" => (isset($_REQUEST['nombre2']))?($_REQUEST['nombre2']):(null),
                "primer_apellido" =>  (isset($_REQUEST['apellido1']))?($_REQUEST['apellido1']):(null),
                "segundo_apellido" =>  (isset($_REQUEST['apellido2']))?($_REQUEST['apellido2']):(null),
                "cedula" =>  (isset($_REQUEST['cedula']))?($_REQUEST['cedula']):(""),
                "fecha_nacimiento" =>  (isset($_REQUEST['fecha_nac']))?($_REQUEST['fecha_nac']):(null),
                "nacionalidad" =>  (isset($_REQUEST['nacionalidad']))?($_REQUEST['nacionalidad']):(null),
                "correo" =>  (isset($_REQUEST['email']))?($_REQUEST['email']):(null),
                "direccion" =>  (isset($_REQUEST['direccion']))?($_REQUEST['direccion']):(null),
                "fecha_ingr_uptag" => (isset($_REQUEST['fec_ingr_iutag']))?($_REQUEST['fec_ingr_iutag']):(null),
                "maestria" =>  (isset($_REQUEST['maestria']))?($_REQUEST['maestria']):(null),
                "materias" =>  (isset($_REQUEST['materia_imparte']))?($_REQUEST['materia_imparte']):(null),
                "condicion" =>  (isset($_REQUEST['condic_contrac']))?($_REQUEST['condic_contrac']):(null),


            ];           
             try 
                {
                    $model->crear();
                    header('Location: index.php?c=Docente');
                    return;
                }
                catch(ValidationException $e)
                {
                    $errors = $e->getErrors();
                }
            }
    
    }  

    public function Actualizar(){


        if (isset($_POST['form-submitted'])) {
            $model = new Docente();
            $id = (isset($_REQUEST['id_docente']))?($_REQUEST['id_docente']):(0); 
            $model->atributos = [
                "primer_nombre" => (isset($_REQUEST['nombre1']))?($_REQUEST['nombre1']):(null),
                "segundo_nombre" => (isset($_REQUEST['nombre2']))?($_REQUEST['nombre2']):(null),
                "primer_apellido" =>  (isset($_REQUEST['apellido1']))?($_REQUEST['apellido1']):(null),
                "segundo_apellido" =>  (isset($_REQUEST['apellido2']))?($_REQUEST['apellido2']):(null),
                "cedula" =>  (isset($_REQUEST['cedula']))?($_REQUEST['cedula']):(""),
                "fecha_nacimiento" =>  (isset($_REQUEST['fecha_nac']))?($_REQUEST['fecha_nac']):(null),
                "nacionalidad" =>  (isset($_REQUEST['nacionalidad']))?($_REQUEST['nacionalidad']):(null),
                "correo" =>  (isset($_REQUEST['email']))?($_REQUEST['email']):(null),
                "direccion" =>  (isset($_REQUEST['direccion']))?($_REQUEST['direccion']):(null),
                "fecha_ingr_uptag" => (isset($_REQUEST['fec_ingr_iutag']))?($_REQUEST['fec_ingr_iutag']):(null),
                "maestria" =>  (isset($_REQUEST['maestria']))?($_REQUEST['maestria']):(null),
                "materias" =>  (isset($_REQUEST['materia_imparte']))?($_REQUEST['materia_imparte']):(null),
                "condicion" =>  (isset($_REQUEST['condic_contrac']))?($_REQUEST['condic_contrac']):(null),
            ]; 
      
             try 
                {
                    $model->actualizar($id);
                    header('Location: index.php?c=Docente');
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

        $id = isset($_GET['id_docente']) ? $_GET['id_docente'] : null;
        
        if (isset($id)){

            $model = new Docente();
            $model->eliminar($id);
            header('Location: index.php?c=Docente');
        }

    }

     public function showError($title, $message) 
    {

        $this->render("error.php");
    }
}

