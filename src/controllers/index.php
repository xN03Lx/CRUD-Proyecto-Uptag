<?php

require_once('../controllers/estudiante_controller.php');


$ce = new EstudianteController();

return $ce->index();