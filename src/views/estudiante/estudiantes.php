
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

			            <h1 class="centrado">Registro Estudiantil</h1>
			            <div class="tamano">
				          <a title="docente"><img src="public/imagen/estudiante.png" alt="estudiante"/></a>
				        </div>
			            <p class="centrado">Bienvenid@ al Sistema de Registro UPTFAG (PNFI)</p>
		            </div>
		        <form class="form" id="form" method="POST" action="?c=Estudiante&a=Guardar">
		            <input type="hidden" name="id" value="<?php  ?>" />

		            <div class="registro">
			          	<div class="mover">
		
			          		<input type="text" placeholder="Primer Nombre" name="nombre1" id="nombre1" class="input">
							<input type="text" placeholder="Segundo Nombre" name="nombre2" id="nombre2" class="input">
			          	</div>
			          	<div class="mover">
			          		<input type="text" placeholder="Primer Apellido" name="apellido1" id="apellido1" class="input">
							<input type="text" placeholder="Segundo Apellido" name="apellido2" id="apellido2" class="input">
			          	</div>
			          	<div class="mover">
			          		<input type="text" placeholder="Cedula" name="cedula" id="cedula" class="input">
							<input type="text" placeholder="Fecha de Nac." name="fecha_nac" id="fecha_nac" class="input">
			          	</div>
		            </div>
		            <div class="registro2">
		            	<div class="mover">
							<input type="email" placeholder="Correo Electronico" name="email" id="email" class="input largo">
		          		</div>
		          		<div class="mover">
							<input type="text" placeholder="Dirección" name="direccion" id="direccion" class="input largo">
			          	</div>
			          	<div class="mover">
							<input type="text" placeholder="Observación" name="observacion" id="observacion" class="input largo">
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


	
