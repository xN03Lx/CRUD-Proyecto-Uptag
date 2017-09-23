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


	// $controller = strtolower($_GET['c']);
  

	// if($controller == "estudiante"){

	// 	if (isset($_GET['a'])) {
	// 		$accion = strtolower($_GET['a']);
	// 		if($accion == "guardar"){
	// 			require_once('controllers/estudiante_controller.php');
	// 			$ce = new EstudianteController();
	// 			call_user_func( array("Estudiante", "Guardar" ) );

	// 			return $ce->abc();
	// 		}

	// 	}

	// 	else{
	// 		require_once('controllers/estudiante_controller.php');
	// 		$ce = new EstudianteController();
	// 		return $ce->index(); 
	// 	}
	// }

}




