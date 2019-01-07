$(document).ready(function () {
	var ide="";
	$("#user").click(function(){
        $(".user-tool").toggleClass('hide');
    });
	function mostrar_empleados(index){
		$.ajax({
			type: "POST",
            url: "php/mostrar_empleados.php",
            data: {
                index: index
            },
            dataType: "html",
            success: function (data) {
                $("#tabla-contenedor").html(data);
            }
		});
	}
	/**setInterval(function() {
        mostrar_empleados();
    },1000);**/
    mostrar_empleados();
	function agregar_empleado(numero, alumno, cargo, turno, fecha) {
        $.ajax({
            type: "POST",
            url: "php/agregar_empleado.php",
            data: {
                Numero_empleado: numero,
                Alumno: alumno,
                Cargo: cargo,
                Turno: turno,
                Fecha_alta: fecha
            },
            success: function () {
                mostrar_empleados();
                console.log("elemento agregado");

            }
        });
    }
    function actualizar_empleado(numero, alumno, cargo, turno, fecha){
    	$.ajax({
            type: "POST",
            url: "php/actualizar_empleado.php",
            data: {
                Numero_empleado: numero,
                Alumno: alumno,
                Cargo: cargo,
                Turno: turno,
                Fecha_alta: fecha
            },
            success: function () {
                mostrar_empleados();
                console.log("elemento actualizado");

            }
        });	
    }
	function editar_empleado(id) {
		$.ajax({
			type: "POST",
			url: "php/editar-empleado.php",
			data:{
				id:id
			},
			dataType: "html",
			success:function (data) {
				$("#actualizarempleado_contenedor").html(data);
				// body...
			}
		});
		// body...
	}
	function borrar_empleado(id) {
		$.ajax({
			type: "POST",
			url: "php/borrar_empleado.php",
			data:{
				id:id
			},
			success:function () {
				console.log("elemento eliminado");
				mostrar_empleados();
				// body...
			}
		});
		// body...
	}
	mostrar_empleados();
	$(document).on("click","#editarempleado",function () {
		ide=$(this).data("id");
		editar_empleado(ide);
		// body...
	});
	$(document).on("click","#save", function() {
		var numero=$("#id_empleado").val(), alumno=$("#alumno").val(),cargo=$("#cargo").val(), turno=$("#turno").val(), fecha=$("#fecha").val();
		actualizar_empleado(numero, alumno, cargo, turno, fecha);
	});
	$(document).on("click", "#delete_empleado_yes", function() {
		borrar_empleado(ide);
	});
	$(document).on("click", "#adde", function() {
		var numero=$("#id_empleadoe").val(), alumno=$("#alumnoe").val(),cargo=$("#cargoe").val(), turno=$("#turnoe").val(), fecha=$("#fechae").val();
		agregar_empleado(numero, alumno, cargo, turno, fecha);
	});
	$(document).on("click", "#borrarempleado", function() {
		ide=$(this).data("id");

	});
	// body...
});