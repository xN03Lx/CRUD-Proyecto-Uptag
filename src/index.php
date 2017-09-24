<?php



if(empty($_GET['c']))
{
	require_once('controllers/home_controller.php');
	$ce = new HomeController();
	return $ce->index();
}

else{

	$controller = strtolower($_GET['c']);
	if($controller == "estudiante"){
		if (isset($_GET['a'])){

			require_once('controllers/estudiante_controller.php');

			$controller = new EstudianteController();

			$controller->handleRequest();
		}
		else{
			require_once('controllers/estudiante_controller.php');
		 	$ce = new EstudianteController();
			return $ce->index(); 
		}
		
	}
	elseif ($controller == "docente"){
		if (isset($_GET['a'])){

			require_once('controllers/docente_controller.php');

			$controller = new DocenteController();

			$controller->handleRequest();
		}
		else{
			require_once('controllers/docente_controller.php');
		 	$ce = new DocenteController();
			return $ce->index(); 
		}
	}
}





