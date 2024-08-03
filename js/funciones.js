function limpiar(){
    document.form.reset();
    document.form.usuario.focus();
}
function validar(){
    var form =  document.form;
    if(form.usuario.value == 0 ){
        Swal.fire({
            icon: 'error',
            title: '¡¡ERROR !!',
            text: '¡Debe digitar un usuario!',
        });
        form.usuario.value="";
        form.usuario.focus();
        return false;
    }
    if(form.contra.value == 0 ){
        Swal.fire({
            icon: 'error',
            title: '¡¡ERROR !!',
            text: '¡Debe digitar una contraseña!',
        });
        form.contra.value="";
        form.contra.focus();
        return false;
    }
    form.submit();
}
function limpiar1(){
    document.form.reset();
    document.form.nombre.focus();
}
function registro(){
    var form =  document.form;
    if(form.nombre.value == 0 ){
        Swal.fire({
            icon: 'error',
            title: '¡¡ERROR !!',
            text: '¡Debe digitar su nombre!',
            timer: 1500,
        });
        form.nombre.value="";
        form.nombre.focus();
        return false;
    }
    if(form.apellido.value == 0 ){
        Swal.fire({
            icon: 'error',
            title: '¡¡ERROR !!',
            text: '¡Debe digitar su apellido!',
        });
        form.apellido.value="";
        form.apellido.focus();
        return false;
    }
    if(form.correo.value == 0 ){
        Swal.fire({
            icon: 'error',
            title: '¡¡ERROR !!',
            text: '¡Debe digitar su correo!',
        });
        form.correo.value="";
        form.correo.focus();
        return false;
    }
    if(form.password.value == 0 ){
        Swal.fire({
            icon: 'error',
            title: '¡¡ERROR !!',
            text: '¡Debe digitar una contraseña!',
        });
        form.password.value="";
        form.password.focus();
        return false;
    }
    form.submit();
}
function eliminar(url) {
    Swal.fire({
        title: "Esta seguro de eliminar el registro?",
        text: "No podras revertir la accion",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#878180',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, eliminar el registro",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = url;
        }
    });
}
const fila = document.querySelector('.contenedor-carousel');
const peliculas = document.querySelectorAll('.pelicula');

const flechaIzquierda = document.getElementById('flecha-izquierda');
const flechaDerecha = document.getElementById('flecha-derecha');

// ? ----- ----- Event Listener para la flecha derecha. ----- -----
flechaDerecha.addEventListener('click', () => {
	fila.scrollLeft += fila.offsetWidth;

	const indicadorActivo = document.querySelector('.indicadores .activo');
	if(indicadorActivo.nextSibling){
		indicadorActivo.nextSibling.classList.add('activo');
		indicadorActivo.classList.remove('activo');
	}
});

// ? ----- ----- Event Listener para la flecha izquierda. ----- -----
flechaIzquierda.addEventListener('click', () => {
	fila.scrollLeft -= fila.offsetWidth;

	const indicadorActivo = document.querySelector('.indicadores .activo');
	if(indicadorActivo.previousSibling){
		indicadorActivo.previousSibling.classList.add('activo');
		indicadorActivo.classList.remove('activo');
	}
});

// ? ----- ----- Paginacion ----- -----
const numeroPaginas = Math.ceil(peliculas.length / 5);
for(let i = 0; i < numeroPaginas; i++){
	const indicador = document.createElement('button');

	if(i === 0){
		indicador.classList.add('activo');
	}

	document.querySelector('.indicadores').appendChild(indicador);
	indicador.addEventListener('click', (e) => {
		fila.scrollLeft = i * fila.offsetWidth;

		document.querySelector('.indicadores .activo').classList.remove('activo');
		e.target.classList.add('activo');
	});
}

// ? ----- ----- Hover ----- -----
peliculas.forEach((pelicula) => {
	pelicula.addEventListener('mouseenter', (e) => {
		const elemento = e.currentTarget;
		setTimeout(() => {
			peliculas.forEach(pelicula => pelicula.classList.remove('hover'));
			elemento.classList.add('hover');
		}, 200);
	});
});

fila.addEventListener('mouseleave', () => {
	peliculas.forEach(pelicula => pelicula.classList.remove('hover'));
});