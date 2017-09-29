var form = document.getElementById('form');
var error = document.getElementById('error');


let valCampo = (e, nombre, red, mensaje) => {
	let nombreRegex = /^([a-z\xc0-\xff/\s/]+)$/i;
	//validar campo vacio
	if(nombre == null || nombre.length == 0){
		error.style.display = 'block';
		error.innerHTML += `<li>Campo ${mensaje}: vacio</li>`;
		red.className = 'input errorInput';
		e.preventDefault();
	}
	//Validar cantidad de caracteres
	else if (nombre.length <= 3  || nombre.length >= 15) {
		error.style.display = 'block';
		error.innerHTML +=  `<li>Campo ${mensaje}: debe contener de 3 a 15 letras</li>`;
		red.className = 'input errorInput';
		e.preventDefault();		
	}
	//Validar solo texto
	else if (nombreRegex.test(nombre) == false) {
		error.style.display = 'block';
		error.innerHTML +=  `<li>Campo ${mensaje}: Contiene numeros</li>`;
		red.className = 'input errorInput';
		nombre = "";
		e.preventDefault();

	}
	else{
		red.className = 'input cheked';
	}
}

let valCel = (e, cedula, red) => {
	//Validar Campos vacios
	if(cedula == null || cedula.length == 0){
		error.style.display = 'block';
		error.innerHTML += `<li>Campo cedula vacia</li>`;
		red.className = 'input errorInput';
		e.preventDefault();
	}
	//validar cantidad de digitos
	else if (cedula.length <= 6 || cedula.length > 8){
		error.style.display = 'block';
		error.innerHTML += `<li>El campo cedula debe contener 7 o 8 digitos</li>`;
		red.className = 'input errorInput';
		e.preventDefault();
	}
	//Validar numeros en cedula
	else if (isNaN(cedula) == true) {
		error.style.display = 'block';
		error.innerHTML += `<li>Solo numeros en el campo cedula</li>`;
		red.className = 'input errorInput';
		e.preventDefault();
	}	
	else{
		red.className = 'input cheked';
	}
}

//valida select vacio
let valSelect = (e, value, red, mensaje) =>{
	if (value < 1) {
		error.style.display = 'block';
		error.innerHTML += `<li>el campo ${mensaje}: no esta seleccionada</li>`;
		red.className = 'select errorSelect'; 
		e.preventDefault();
	}
	else{
		red.className = 'select'; 
	}
}

let valFechas = (e, fecha, red) => {
	let fechaRegex = /^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/;

	if(fechaRegex.test(fecha) == false){
		error.style.display = 'block';
		error.innerHTML += `<li>Campo fecha nacimiento debe tener un formato valido: aaaa-mm-dd  </li>`;
		red.className = 'input errorInput';
		e.preventDefault();
	}

	else{
		red.className = 'input cheked';
	}
}

let valEmail = (e, email, red) =>{
	let emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
//Validar Campos vacios
	if(email == null || email.length == 0){
		error.style.display = 'block';
		error.innerHTML += `<li>Campo correo vacio</li>`;
		red.className = 'input errorInput';
		e.preventDefault();
	}
	//email valido
	
	else if (email.length >= 1 && emailRegex.test(email) == false) {
		error.style.display = 'block';
		error.innerHTML += `<li>Correo invalido</li>`;
		red.className = 'input errorInput';
		e.preventDefault();
	}
	else{
		red.className = 'input cheked';
	}
}

let valCampoVacio = (e, campo, red, nombre) => {
		if(campo == null || campo.length == 0){
		error.style.display = 'block';
		error.innerHTML += `<li>Campo ${nombre} vacio</li>`;
		red.className = 'input errorInput';
		e.preventDefault();
	}
		else{
		red.className = 'input cheked';
	}

}

let valEstudiante = (e) =>{
	let primer_nombre =document.getElementById('nombre1');
	let seg_nombre =document.getElementById('nombre2');
	let primer_apellido =document.getElementById('apellido1');
	let seg_apellido =document.getElementById('apellido2');
	let cedula =document.getElementById('cedula');
	let fecha_nacimiento =document.getElementById('fecha_nac');
	let email =document.getElementById('email');
	let telefono =document.getElementById('telefono');
	let nacionalidad = document.getElementById('nacionalidad');
	let carrera = document.getElementById('carrera');
	let direccion =document.getElementById('direccion');
	let observacion =document.getElementById('observacion');

	//hacer for
	let nombre = 'Primer nombre';
	let nombre2 = 'Segundo nombre';
	let apellido = 'Primer apellido';
	let apellido2 = 'Segundo apellido';
	let nombre_direccion= 'direccion';
	let mensaje = 'nacionalidad';
	let mensaje2 = 'carrera';


	valCampo(e, primer_nombre.value, primer_nombre, nombre);
	valCampo(e, seg_nombre.value, seg_nombre, nombre2);
	valCampo(e, primer_apellido.value, primer_apellido, apellido);
	valCampo(e, seg_apellido.value, seg_apellido, apellido2);
	valCel(e, cedula.value, cedula);
	valFechas(e, fecha_nacimiento.value, fecha_nacimiento);
	valEmail(e, email.value, email);
	valSelect(e, nacionalidad.value,  nacionalidad, mensaje);
	valSelect(e, carrera.value,  carrera, mensaje2);
	valCampoVacio(e, direccion.value, direccion, nombre_direccion);
}


let valFormulario = (e) =>{
	error.innerHTML = ""
	error.innerHTML += '<li>Verifique lo siguiente:</li>';
	valEstudiante(e);
}

form.addEventListener("submit", valFormulario);
