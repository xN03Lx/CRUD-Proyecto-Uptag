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
			<h2 class="h2">Docentes</h2>
			<a href="?c=Docente&a=Guardar" class="btn" style="margin: 3px 3px;">Crear nuevo registro</a>

			<br>
			<table>
				<thead>

					<th>Nombre</th>
					<th>Apellido</th>
					<th>Cedula</th>
					<th>Acciones</th>
				</thead>
				<tbody class="tbody" id="tbody">
					<?php foreach($_SESSION["data"] as $value): ?>

  					<tr>
	  					 <td><?php echo $value->primer_nombre." ".$value->segundo_nombre; ?></td>
	  					 <td><?php echo $value->primer_apellido." ".$value->segundo_apellido; ?></td>
	  					 <td><?php echo $value->cedula; ?></td>
	  					 <td>
	  					 	<a href='?c=Docente&a=Editar&id_docente=<?php echo  $value->id?>' class='btn'>Editar</a>
	  					    <a class="btn danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Docente&a=Eliminar&id_docente=<?php echo $value->id; ?>">Eliminar</a>
	   					</td>
	   				</tr>
				<?php endforeach; ?> 
				</tbody>
		
			</table>
			</div>
	</div>
</div>



</body>
</html>