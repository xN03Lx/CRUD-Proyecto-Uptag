<?php 
	if (isset($_SESSION["data"])){$docente = $_SESSION["data"];}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pagina Principal</title>
	<link rel="icon" href="imagen/imagen1.jpg" sizes="32x32">
	<link href="public/css/stylesheet2.css" type="text/css" rel="stylesheet">
</head>
<body>
	<div class="field">
		<fieldset>
			<div class="fields">
				<fieldset>
					<div class="encabezado">
					<?php  echo isset($docente) ?  "<h2 class='centrado'> Editar Docente $docente->primer_nombre</h1" :  "<h1 class='centrado'>Registro Docente</h1>"; ?>			            
					<div class="tamano">
				          <a title="docente"><img src="public/imagen/docente.png" alt="docente" width="150" style="margin: auto; display: block;" /></a>
				        </div>
		            </div>
		         <form class="form" id="form" action="" method="POST">
		            <div class="registro">
			          	<div class="mover">
			          		<input type="text" placeholder="Primer Nombre" name="nombre1" id="nombre1" class="input" value="<?php echo isset($docente) ? $docente->primer_nombre : ''; ?>">
							<input type="text" placeholder="Segundo Nombre" name="nombre2" id="nombre2" class="input" value="<?php echo isset($docente) ? $docente->segundo_nombre : ''; ?>">
			          	</div>
			          	<div class="mover">
			          		<input type="text" placeholder="Primer Apellido" name="apellido1" id="apellido1" class="input" value="<?php echo isset($docente) ? $docente->primer_apellido : ''; ?>">
							<input type="text" placeholder="Segundo Apellido" name="apellido2" id="apellido2" class="input" value="<?php echo isset($docente) ? $docente->segundo_apellido : ''; ?>">
			          	</div>
			          	<div class="mover">
			          		<input type="text" placeholder="Cedula" name="cedula" id="cedula" class="input" value="<?php echo isset($docente) ? $docente->cedula : ''; ?>">
							<input type="text" placeholder="Fecha de Nac." name="fecha_nac" id="fecha_nac" class="input" value="<?php echo isset($docente) ? $docente->fecha_nacimiento : ''; ?>">
			          	</div>
		            </div>
		            <div class="registro2">
		            	<div class="mover">
							<input type="email" placeholder="Correo Electronico" name="email" id="email" class="input largo" value="<?php echo isset($docente) ? $docente->correo: ''; ?>">
		          		</div>
		          		<div class="mover">
							<input type="text" placeholder="Dirección" name="direccion" id="direccion" class="input largo" value="<?php echo isset($docente) ? $docente->direccion : ''; ?>">
			          	</div>
			          	<div class="mover">
							<input type="text" placeholder="Fecha de Ingreso a la IUTAG" name="fec_ingr_iutag" id="fec_ingr_iutag" class="input largo" value="<?php echo isset($docente) ? $docente->fecha_ingr_uptag : ''; ?>">
			          	</div>
			          	<div class="mover">
							<input type="text" placeholder="Materias que Imparte" name="materia_imparte" id="materia_imparte" class="input largo" value="<?php echo isset($docente) ? $docente->materias : ''; ?>">>
			          	</div>
			          	<br>
			          	<div class="mover">
			          		<label for="selec-maestria">Posee una maestria?</label><br>
			          		<select name="select-maestria" class="maestria" id="select-maestria" onclick="activa(this.value)">
								<option value="0" selected>«SELECCIONE»</option>
								<option <?php echo !empty($docente->maestria) ? 'selected' : ''; ?> value="1">SI</option>
                        		<option <?php echo empty($docente->maestria) ? 'selected' : ''; ?> value="2">NO</option>
							</select>
							<input type="text" placeholder="Que Maestria" name="maestria" id="dn_maestria" style="display: none; width: 37%;" class="input corto" value="<?php echo isset($docente) ? $docente->maestria : ''; ?>">
			          	</div>
			          	<div class="mover">
							<input type="text" placeholder="Condición de Contrato" name="condic_contrac" id="condic_contrac" class="input largo" value="<?php echo isset($docente) ? $docente->condicion : ''; ?>">
			          	</div>
			          	<br>
			            <div class="boton">
			            	<input type="hidden" name="form-submitted" value="1">
							<button id="btn" type="submit" class="btnenviar">Enviar</button>
							<button id="btn" type="reset" class="btnreset">Borrar</button>
						</div>
						</form>
						<br><br><br>
		            </div>
				</fieldset>
			</div>
			<div>
				<ul class="errorr" id="error"><li>Error:</li></ul>
			</div>
		</fieldset>
	</div>/
	<script src="public/js/validacion_docente.js"></script>
	<script type="text/javascript">
	</script>
</body>
</html>