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
					<div class="encabezado">
					<?php  echo isset($estudiante) ?  "<h2 class='centrado'> Editar Estudiante $estudiante->primer_nombre $estudiante->primer_apellido</h1" :  "<h1 class='centrado'>Registro Estudiantil</h1>"; ?>
			            <div class="tamano" style="margin: auto; " >
				          <img src="public/imagen/estudiante.png" alt="estudiante" width="150px" style="margin: auto; display: block;" >
				        </div>
		            </div>
		        <form class="form" id="form" method="POST" action="">
		            <input type="hidden" name="id" value="<?php  ?>" />

		            <div class="registro2">
			          	<div class="mover">
		
			          		<input type="text" placeholder="Primer Nombre" name="nombre1" id="nombre1" class="input" value="<?php echo isset($estudiante) ? $estudiante->primer_nombre : ''; ?>">
							<input type="text" placeholder="Segundo Nombre" name="nombre2" id="nombre2" class="input" value="<?php echo isset($estudiante) ? $estudiante->segundo_nombre : ''; ?>">
			          	</div>
			          	<div class="mover">
			          		<input type="text" placeholder="Primer Apellido" name="apellido1" id="apellido1" class="input" value="<?php echo isset($estudiante) ? $estudiante->primer_apellido : ''; ?>">
							<input type="text" placeholder="Segundo Apellido" name="apellido2" id="apellido2" class="input" value="<?php echo isset($estudiante) ? $estudiante->segundo_apellido : ''; ?>">
			          	</div>
			          	<div class="mover">
			          		<select class="select" name="nacionalidad" id="nacionalidad">
								<option value="0" selected>Nacionalidad</option>
								<option <?php echo isset($estudiante->nacionalidad) ? $estudiante->nacionalidad == '1' ? 'selected' : '' :''; ?> value="1">Venezolano</option>
								<option <?php echo isset($estudiante->nacionalidad) ? $estudiante->nacionalidad == '2' ? 'selected' : '' :''; ?> value="2">Extranjero</option>	
							</select>
			          		<input type="text" placeholder="Cedula" name="cedula" id="cedula" class="input" value="<?php echo isset($estudiante) ? $estudiante->cedula: ''; ?>">
						
			          	</div>
		            </div>
		            <div class="registro2">
		            	<div class="mover">
		            		<input type="text" placeholder="Fecha de Nac." name="fecha_nac" id="fecha_nac" class="input" value="<?php echo isset($estudiante) ? $estudiante->fecha_nacimiento : ''; ?>">

			          		<select class="select" name="carrera" id="carrera">
								<option selected value="0">Carrera</option>
								<option <?php echo isset($estudiante->carrera_id) ? $estudiante->carrera_id == '1' ? 'selected' : '' :''; ?> value="1">Contaduria</option>
								<option  <?php echo isset($estudiante->carrera_id) ? $estudiante->carrera_id == '2' ? 'selected' : '' :''; ?> value="2">Informatica</option>	
								<option  <?php echo isset($estudiante->carrera_id) ? $estudiante->carrera_id == '3' ? 'selected' : '' :''; ?> value="3">Administracion</option>	
								<option  <?php echo isset($estudiante->carrera_id) ? $estudiante->carrera_id == '4' ? 'selected' : '' :''; ?> value="4">Mecanica</option>	
								<option  <?php echo isset($estudiante->carrera_id) ? $estudiante->carrera_id == '5' ? 'selected' : '' :''; ?> value="5">Electricidad</option>	


							</select>
						
		          		</div>
		          		<div class="mover">
		          			<input type="text" placeholder="Telefono" name="telefono" id="telefono" class="input" value="<?php echo isset($estudiante) ? $estudiante->telefono : ''; ?>">

							<input type="text" placeholder="Dirección" name="direccion" id="direccion" class="input " value="<?php echo isset($estudiante) ? $estudiante->direccion : ''; ?>">
			          	</div>
			          	<div class="mover">
			          		<input type="email" placeholder="Correo Electronico" name="email" id="email" class="input " value="<?php echo isset($estudiante) ? $estudiante->correo : ''; ?>">
							<input type="text" placeholder="Observación" name="observacion" id="observacion" class="input " value="<?php echo isset($estudiante) ? $estudiante->observaciones : ''; ?>">
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
			
			<div>
				<ul class="errorr" id="error"><li>Error:</li></ul>
			</div>

			</div>

		</fieldset>


	</div>
	<div class="regresar">
				
		<a href="?c=Estudiante" class="btn info" style="margin: 3px 3px; padding: 9px;">Regresar</a>

	</div>

<script src="public/js/validacion.js"></script>
</body>
</html>


	
