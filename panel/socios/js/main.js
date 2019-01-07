$(document).ready(function () {
    var ids = "";
    $("#user").click(function(){
        $(".user-tool").toggleClass('hide');
    });

    function mostrar_socios(index) {
        $.ajax({
            type: "POST",
            url: "php/mostrar_socios.php",
            data: {
                index: index
            },
            dataType: "html",
            success: function (data) {
                $("#tabla-contenedor").html(data);
            }
        });
    }
    mostrar_socios();
    /**setInterval(function() {
        mostrar_socios();
    },1000);**/
    function actualizar_socio(id_socio, nombre, sexo, alumno, grado, grupo, especialidad, turno, no_control, nacimiento, email, facebook) {
        $.ajax({
            type: "POST",
            url: "php/actualizar_socio.php",
            data: {
                Id_socio: id_socio,
                Nombre: nombre,
                Sexo: sexo,
                Alumno: alumno,
                Grado:grado,
                Grupo:grupo,
                Especialidad: especialidad,
                Turno:turno,
                No_control: no_control,
                Fecha_de_nacimiento: nacimiento,
                Email:email,
                Facebook:facebook
            },
            success: function (data) {
                mostrar_socios();
                console.log(data);
            }
        });
    }

    function agregar_socio(id_socio, nombre, sexo, alumno, grado, grupo, especialidad, turno, no_control, nacimiento, email, facebook) {
        var random=Math.random()* (100000000 - 10000000) + 10000000;
        random=Math.round(random);
        $.ajax({
            type: "POST",
            url: "php/agregar_socio.php",
            data: {
                Id_socio: random,
                Nombre: nombre,
                Sexo: sexo,
                Alumno: alumno,
                Grado:grado,
                Grupo:grupo,
                Especialidad: especialidad,
                Turno:turno,
                No_control: no_control,
                Fecha_de_nacimiento: nacimiento,
                Email:email,
                Facebook:facebook
            },
            success: function () {
                mostrar_socios();
                console.log("elemento agregado");

            }
        });
    }

    function verupdate(id) {
        $.ajax({
            type: 'POST',
            url: "php/editar-socio.php",
            data: {
                id: id
            },
            dataType: 'html',
            success: function (data) {
                console.log("hecho");
                $("#actualizarsocio_contenedor").html(data);
            }
        });


    }

    function borrar_socio(id_socio) {
        $.ajax({
            type: "POST",
            url: "php/borrar_socio.php",
            data: {
                id: id_socio
            },
            success: function () {
                console.log("elemento eliminado");
                mostrar_socios();

            }
        });

    }
    $(document).on("click", "#save", function () {
        var id = $("#id_socio").val(),
            nombre = $("#nombre").val(),
            sexo = $("#sexo").val(),
            alumno = $("#alumno").val(),
            grado = $("#grado").val(),
            grupo = $("#grupo").val(),
            especialidad = $("#especialidad").val(),
            turno=$("#turno").val(),
            no_control = $("#no_control").val(),
            nacimiento = $("#nacimiento").val(),
            email = $("#email").val(),
            facebook = $("#facebook").val();
        actualizar_socio(id, nombre, sexo, alumno, grado, grupo, especialidad, turno, no_control, nacimiento, email, facebook);

    });
    $(document).on("click", "#adds", function () {

        var id = $("#id_socios").val(),
            nombre = $("#nombres").val(),
            sexo = $("#sexos").val(),
            alumno = $("#alumnos").val(),
            grado = $("#grados").val(),
            grupo = $("#grupos").val(),
            especialidad = $("#especialidads").val(),
            turno=$("#turnos").val(),
            no_control = $("#no_controls").val(),
            nacimiento = $("#nacimientos").val(),
            email = $("#emails").val(),
            facebook = $("#facebooks").val();

        $("#id_socios").val("");
        $("#nombres").val("");
        $("#sexos").val("");
        $("#alumnos").val("");
        $("#especialidads").val("");
        $("#grados").val("");
        $("#grupos").val("");
        $("#turnos").val("");
        $("#no_controls").val("");
        $("#nacimientos").val("");
        $("#emails").val("");
        $("#facebooks").val("");
        agregar_socio(id, nombre, sexo, alumno, grado, grupo, especialidad, turno, no_control, nacimiento, email, facebook);

    });
    $(document).on("click", "#editarsocio", function () {
        var id = $(this).data("id");
        ids = id;
        verupdate(id);
    });
    $(document).on("click", "#borrarsocio", function () {
        ids = $(this).data("id");

    });
    $(document).on("click", "#deleteda", function () {
        borrar_socio(ids);
    });
    $(document).on("click", "#delete_socio_yes", function () {
        borrar_socio(ids);
    });
});
