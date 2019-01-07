const  mostrar_comentarios = id => {
	$.ajax({
		type: "POST",
		url:'php/mostrar_comentarios.php',
		data: {
			libro: id
		},
		dataType: 'HTML',
		success:(data) => {
			$("#comentarios").html(data);
		}
	});
}
const  agregar_comentario = (id,txt, r) => {
	$.ajax({
		type: "POST",
		url:'php/agregar_comentario.php',
		data: {
			id: id,
			texto : txt,
			rating: r
		},
		success:(data) => {
			mostrar_comentarios(id);
		}
	});
}
const  agregar_prestamo = libro => {
	$.ajax({
		type: "POST",
		url:'php/agregar_prestamo.php',
		data: {
			Libro: libro
		},
		success:(data) => {
			window.top.location="../notificaciones";
		}
	});
}
jQuery(document).ready(($) => {
	var ratign=5;
	
	
	
	mostrar_comentarios(id);
	/*$("#enviar").on('click', function(event) {
		var txt=$("#texto_comentario").val();
		agregar_comentario(id,txt, ratign);
	});
	$("#prestar").on('click', function(event) {
		agregar_prestamo(id);
	});
	$(".stt").on('click', function(event) {
		ratign = $(this).val();
	});
	
	*/
	document.querySelector("#enviar").addEventListener("click", (e)=>{
		let txt =document.querySelector("#texto_comentario").value;
		agregar_comentario(id,txt, ratign);
	});
	
	document.querySelector(".stt").addEventListener("click",(e)=>{
		ratign = this.value;
	});
	document.querySelector("#prestar").addEventListener("click",()=>{
		agregar_prestamo(id);
	});
	
});