<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pagina Principal</title>
	<link rel="icon" href="public/imagen/imagen1.jpg" sizes="32x32">
	<link href="public/css/stylesheet2.css" type="text/css" rel="stylesheet">
</head>
<body>
	<div class="cont">
		<div class="tabla">
			<div class="cont">
			<h2 class="h2">Estudiantes</h2>
			<a href="?c=Estudiante&a=Guardar" class="btn" style="margin: 3px 3px;">Crear nuevo registro</a>

			<br>
			<table>
				<thead>

					<th>Nombre</th>
					<th>Apellido</th>
					<th>Cedula</th>
					<th>Acciones</th>
				</thead>
				<tbody class="tbody" id="tbody">
					
					<?php foreach($_SESSION["data"] as $value){

  					 echo "<tr><td>".$value->primer_nombre." ".$value->segundo_nombre."</td>";
  					 echo "<td>".$value->primer_apellido." ".$value->segundo_apellido."</td>";
  					 echo "<td>".$value->cedula."</td>";
  					 echo "<td> <a href='#".$value->id."' class='btn'>Editar</a> <a href='#".$value->id."' class='btn danger'>Eliminar</a></td></tr>";
					} ?> 

					

				</tbody>
		
			</table>
			</div>
	</div>
</div>



</body>
</html>