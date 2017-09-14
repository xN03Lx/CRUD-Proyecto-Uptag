<?php

require_once('../../core/base_model.php');

class Estudiante extends BaseModel {
    public function getTable(){
        return "estudiantes";
    }
}