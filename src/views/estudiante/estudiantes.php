<?php 
	if (isset($_SESSION["data"])){$estudiante = $_SESSION["data"];}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pagina Principal</title>
	<link rel="icon" href="public/imagen/imagen1.jpg" sizes="32x32">
	<link href="public/css/stylesheet2.css" type="text/css" rel="stylesheet">
</head>
<body>
	<div class="field">
		<fieldset>
			<div class="fields">
				<fieldset>
					<div class="encabezado">
					<?php  echo isset($estudiante) ?  "<h2 class='centrado'> Editar Estudiante $estudiante->primer_nombre</h1" :  "<h1 class='centrado'>Registro Estudiantil</h1>"; ?>
			            <div class="tamano" style="margin: auto; " >
				          <img src="public/imagen/estudiante.png" alt="estudiante" width="150px" style="margin: auto; display: block;" >
				        </div>
		            </div>
		        <form class="form" id="form" method="POST" action="">
		            <input type="hidden" name="id" value="<?php  ?>" />

		            <div class="registro">
			          	<div class="mover">
		
			          		<input type="text" placeholder="Primer Nombre" name="nombre1" id="nombre1" class="input" value="<?php echo isset($estudiante) ? $estudiante->primer_nombre : ''; ?>">
							<input type="text" placeholder="Segundo Nombre" name="nombre2" id="nombre2" class="input" value="<?php echo isset($estudiante) ? $estudiante->segundo_nombre : ''; ?>">
			          	</div>
			          	<div class="mover">
			          		<input type="text" placeholder="Primer Apellido" name="apellido1" id="apellido1" class="input" value="<?php echo isset($estudiante) ? $estudiante->primer_apellido : ''; ?>">
							<input type="text" placeholder="Segundo Apellido" name="apellido2" id="apellido2" class="input" value="<?php echo isset($estudiante) ? $estudiante->segundo_apellido : ''; ?>">
			          	</div>
			          	<div class="mover">
			          		<input type="text" placeholder="Cedula" name="cedula" id="cedula" class="input" value="<?php echo isset($estudiante) ? $estudiante->cedula: ''; ?>">
							<input type="text" placeholder="Fecha de Nac." name="fecha_nac" id="fecha_nac" class="input" value="<?php echo isset($estudiante) ? $estudiante->fecha_nacimiento : ''; ?>">
			          	</div>
		            </div>
		            <div class="registro2">
		            	<div class="mover">
							<input type="email" placeholder="Correo Electronico" name="email" id="email" class="input largo" value="<?php echo isset($estudiante) ? $estudiante->correo : ''; ?>">
		          		</div>
		          		<div class="mover">
							<input type="text" placeholder="Dirección" name="direccion" id="direccion" class="input largo" value="<?php echo isset($estudiante) ? $estudiante->direccion : ''; ?>">
			          	</div>
			          	<div class="mover">
							<input type="text" placeholder="Observación" name="observacion" id="observacion" class="input largo" value="<?php echo isset($estudiante) ? $estudiante->observaciones : ''; ?>">
			          	</div>
		            </div>
		            <br>
		            <div class="boton">
		       			<input type="hidden" name="form-submitted" value="1">
						<button id="btn" type="submit" class="btnenviar">Enviar</button>
						<button id="btn" type="reset" class="btnreset">Borrar</button>
					</div>
				
				</form>	
				
				<br><br><br>
				</fieldset>
			</div>
			<div>
				<ul class="errorr" id="error"><li>Error:</li></ul>
			</div>
		</fieldset>
	</div>

<script src="public/js/validacion.js"></script>
</body>
</html>


	
