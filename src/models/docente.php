<?php

require_once('../core/base_model.php');

class Docente extends BaseModel {
    public function getTable(){
        return "docentes";
    }
}