var form = document.getElementById('form');
var error = document.getElementById('error');
var maestria = document.getElementById('dn_maestria');


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

let valFechas = (e, fecha, red, mensaje) => {
	let fechaRegex = /^([0][1-9]|[12][0-9]|3[01])(\/|-)([0][1-9]|[1][0-2])\2(\d{4})$/;

	if(fechaRegex.test(fecha) == false){
		error.style.display = 'block';
		error.innerHTML += `<li>Campo ${mensaje} debe tener un formato valido: dd/mm/aaaa  </li>`;
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

let valMaestria = (e, maestria, red) =>{
	if (maestria == 0) {
		error.style.display = 'block';
		error.innerHTML += `<li>Seleccione una opcion en el campo posee una maestria</li>`;
		red.className = 'maestria errorSelect'; 
		e.preventDefault();
	}
	else{
		red.className = 'maestria'; 
	}
}

let valDocente = (e) => {
	let primer_nombre =document.getElementById('nombre1');
	let seg_nombre =document.getElementById('nombre2');
	let primer_apellido =document.getElementById('apellido1');
	let seg_apellido =document.getElementById('apellido2');
	let cedula =document.getElementById('cedula');
	let fecha_nacimiento =document.getElementById('fecha_nac');
	let email =document.getElementById('email');
	let direccion =document.getElementById('direccion');
	let observacion =document.getElementById('observacion');
	let fecha_ingreso = document.getElementById('fec_ingr_iutag');
	let materia_imparte = document.getElementById('materia_imparte');
	let condic_contrac = document.getElementById('condic_contrac');
	let select_maestria = document.getElementById('select-maestria');

	let nombre = 'Primer nombre';
	let nombre2 = 'Segundo nombre';
	let apellido = 'Primer apellido';
	let apellido2 = 'Segundo apellido';
	let nombre_direccion= 'direccion';
	let fecha = ' fecha de nacimiento';
	let ingreso = 'fecha de ingreso';
	let materia = 'materia';
	let contrato = 'condicion de contrato';
	let maest = 'maestria';

	valCampo(e, primer_nombre.value, primer_nombre, nombre);
	valCampo(e, seg_nombre.value, seg_nombre, nombre2);
	valCampo(e, primer_apellido.value, primer_apellido, apellido);
	valCampo(e, seg_apellido.value, seg_apellido, apellido2);
	valCel(e, cedula.value, cedula);
	valFechas(e, fecha_nacimiento.value, fecha_nacimiento, fecha);
	valEmail(e, email.value, email);
	valCampoVacio(e, direccion.value, direccion, nombre_direccion);
	valFechas(e, fecha_ingreso.value, fecha_ingreso, ingreso);
	valCampoVacio(e, materia_imparte.value, materia_imparte, materia );
	valCampo(e, condic_contrac.value, condic_contrac, contrato);
	valMaestria(e, select_maestria.value, select_maestria);

	if (maestria.style.display == 'inline-block'){
		valCampo(e, maestria.value, maestria, maest);
	}
	
}

let valFormulario = (e) =>{
	error.innerHTML = ""
	error.innerHTML += '<li>Verifique lo siguiente:</li>';
	valDocente(e);
	
}

form.addEventListener("submit", valFormulario);


var activa = (v) =>{
	if (v==1) {
		maestria.style.display = 'inline-block';

	}
	else {
		maestria.style.display = 'none';
	}

}
 