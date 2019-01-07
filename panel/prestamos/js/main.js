$(document).ready(function() {
	var id_prestamo=0;
    $("#user").click(function(){
        $(".user-tool").toggleClass('hide');
    });
	function mostrar_prestamo(n) {
		$.ajax({
			type: "POST",
			url:'php/mostrar_prestamos.php',
			data: {
				index: n
			},
			dataType: 'HTML',
			success:function(data) {
				$("#tabla-contenedor").html(data);
			}
		});
		// body...
	}
	function agregar_prestamo( libro, alumno, empleado, fecha_prestamo, fecha_entrega) {
        $.ajax({
            type: "POST",
            url: "php/agregar_prestamo.php",
            data: {
                Libro: libro,
                Alumno: alumno,
                Empleado: empleado,
                Fecha_prestamo: fecha_prestamo,
                Fecha_entrega: fecha_entrega
            },
            success: function (data) {
                mostrar_prestamo(1);
                console.log(data);
            }
        });
    }
    function renovar_prestamo(id, fecha) {
    	$.ajax({
            type: "POST",
            url: "php/renovar_prestamo.php",
            data: {
                id: id,
                fecha: fecha
            },
            success: function (data) {
                mostrar_prestamo(1);
                console.log(data);
            }
        });
    }
    function aprobar_prestamo(id,fecha){
    	$.ajax({
            type: "POST",
            url: "php/aprobar_prestamo.php",
            data: {
                id: id,
                fecha: fecha
            },
            success: function (data) {
                mostrar_prestamo(1);
                console.log(data);
            }
        });
    }
    function entregar_libro(id, observacion) {
    	$.ajax({
            type: "POST",
            url: "php/entregar_libro.php",
            data: {
                id: id,
                observacion: observacion
            },
            success: function (data) {
                mostrar_prestamo(1);
                console.log(data);
            }
        });
    }
	mostrar_prestamo(1);
	$("#addp").on("click", function () {
        var id ="",
            libro = $("#librop").val(),
            socio = $("#sociop").val(),
            personaAu = $("#persona_autorizap").val(),
            fecha_p = $("#fecha_prestamop").val(),
            fecha_e = $("#fecha_entregap").val()
            ;
        $("#librop").val("");
        $("#sociop").val("");
        $("#persona_autorizap").val("");
        $("#fecha_prestamop").val("");
        $("#fecha_entregap").val("");
        agregar_prestamo(libro, socio, personaAu, fecha_p, fecha_e);
    });
    $("#aprobados").on('click', function(event) {
    	mostrar_prestamo(1);
    	$("#aprobados").addClass('active');
    	$("#no_aprobados").removeClass('active');
    });
    $("#no_aprobados").on('click', function(event) {
    	mostrar_prestamo(0);
    	$("#aprobados").removeClass('active');
    	$("#no_aprobados").addClass('active');
    });
    
    $("#guardar_renovacion").on('click', function(event) {
    	var fecha=$("#fecha_renovacion").val();
    	renovar_prestamo(id_prestamo, fecha);
    });
    $("#aprobado").on('click',  function(event) {
        var fecha = $("#fecha_e").val();
    	aprobar_prestamo(id_prestamo,fecha);    	/* Act on the event */
    });
    $("#entregado").on('click', function(event) {
    	var observacion=$("#observacion").val();
    	entregar_libro(id_prestamo,observacion);
    });
    $(document).on('click', "#renovarP", function(event) {
    	id_prestamo=$(this).data("id");
    });
    $(document).on('click', "#editarprestamo", function() {
    	id_prestamo=$(this).data("id");
    });
    $(document).on('click', "#borrarprestamo", function() {
    	id_prestamo=$(this).data("id");
    });
});