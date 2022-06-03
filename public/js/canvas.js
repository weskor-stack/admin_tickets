// Please see documentation at https://docs.microsoft.com/aspnet/core/client-side/bundling-and-minification
// for details on configuring this project to bundle and minify static web assets.

// Write your JavaScript code.

//===============================================================================================
//                                  FUNCIÓN DEL CANVAS
//===============================================================================================
// Esperamos el contenido del elemento de ventana para hacer las operaciones 

window.addEventListener('load', () => {

	redimensionar(); // Redimensionamos el tamaño del canvas al cargar la Página 
	document.addEventListener('mousedown', iniciarDibujado);
	document.addEventListener('mouseup', detenerDibujado);
	document.addEventListener('mousemove', dibujo);
	window.addEventListener('resize', redimensionar);
});

// Seleccionamos el id del elemento 
const canvas = document.querySelector('#segunda_pizarra');
//const $btnEnviar = document.querySelector("#btnEnviar");

//$btnDescargar = document.querySelector("#btnDescargar");

//$btnDescargar2 = document.querySelector("#btnDescargar");

// Contexto del canva para operaciones 2d 
const ctx = canvas.getContext('2d');

// Redimensionamos el tamaño del canvas según el tamaño de la ventana 
function redimensionar() {
	ctx.canvas.width = window.innerWidth;
	ctx.canvas.height = window.innerHeight;
}

// Colocamos el curos en su posición inicial 
let coordenadas = { x: 0, y: 0 };

// Con esta variable se inicia deshabilitado el dibujado en el Canvas 
let dibujar = false;

// Actualizamos las coordenadas del cursor cuando un evento se dispara
function obtenerPosicion(event) {
	coordenadas.x = event.clientX - canvas.offsetLeft;
	coordenadas.y = event.clientY - canvas.offsetTop;
}

// Habilitamos el dibujado en el Canvas  
function iniciarDibujado(event) {
	dibujar = true;
	obtenerPosicion(event);
}

// Detenemos el dibujado 
function detenerDibujado() {
	dibujar = false;
}

function dibujo(event) {

	if (!dibujar) return;

	ctx.beginPath();

	ctx.lineWidth = 5;

	// Trazo redondeado 
	ctx.lineCap = 'round';

	// Color del trazo del dibujo en el Canvas 
	ctx.strokeStyle = '#000000';

	// El cursor para comenzar a dibujar se mueve a esta coordenada 
	ctx.moveTo(coordenadas.x, coordenadas.y);

	// La posición del cursor se actualiza a medida que movemos el mouse alrededor del Canvas 
	obtenerPosicion(event);

	// Se traza una línea desde el inicio 
	ctx.lineTo(coordenadas.x, coordenadas.y);

	// Dibujamos las líneas  
	ctx.stroke();
}

// Listener del botón
$btnDescargar2.addEventListener("click", () => {
	// Crear un elemento <a>
	let enlace = document.createElement('a');
	// El título
	enlace.download = "Canvas como imagen.png";
	// Convertir la imagen a Base64 y ponerlo en el enlace
	enlace.href = canvas.toDataURL();
	// Hacer click en él
	enlace.click();
});

$btnDescargar.addEventListener("click", () => {
	// Crear un elemento <a>
	let enlace = document.createElement('a');
	// El título
	enlace.download = "Canvas como imagen.png";
	// Convertir la imagen a Base64 y ponerlo en el enlace
	enlace.href = canvas.toDataURL();
	// Hacer click en él
	enlace.click();
});

$btnEnviar.onclick = async () => {
	// Convertir la imagen a Base64 y ponerlo en el enlace
	const data = canvas.toDataURL("image/png");
	const fd = new FormData();
	fd.append("imagen", data); // Se llama "imagen", en PHP lo recuperamos con $_POST["imagen"]
	const respuestaHttp = await fetch("imagen.php", {
		method: "POST",
		body: fd,
	});
	const nombreImagenSubida = await respuestaHttp.json();
	console.log("La imagen ha sido enviada y tiene el nombre de: " + nombreImagenSubida);
};