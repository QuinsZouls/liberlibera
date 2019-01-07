$(document).ready(function () {
    var ide = "";
    $("#user").click(function(){
        $(".user-tool").toggleClass('hide');
    });
    function mostrar_generos(index) {
        $.ajax({
            type: "POST",
            url: "php/mostrar_generos.php",
            data: {
                index: index
            },
            dataType: "html",
            success: function (data) {
                $("#tabla-contenedor").html(data);
            }
        });
    }
    mostrar_generos();
    setInterval(function() {
        mostrar_generos();
    },1000);
    function actualizar_genero(id_genero, genero) {
        $.ajax({
            type: "POST",
            url: "php/actualizar_genero.php",
            data: {
                Id_genero: id_genero,
                Nombre_genero: genero
            },
            success: function () {
                mostrar_generos();
                console.log("elemento actualizado");
            }
        });
    }

    function agregar_genero(id_genero, genero) {
        $.ajax({
            type: "POST",
            url: "php/agregar_genero.php",
            data: {
                Id_genero: id_genero,
                Nombre_genero: genero
            },
            success: function () {
                mostrar_generos();
                console.log("elemento agregado");
            }
        });
    }

    function verupdate(id) {
        $.ajax({
            type: 'POST',
            url: "php/editar-genero.php",
            data: {
                id: id
            },
            dataType: 'html',
            success: function (data) {
                console.log("hecho");
                $("#editar-contenedor").html(data);
            }
        });


    }


    function borrar_genero(id_genero) {
        $.ajax({
            type: "POST",
            url: "php/borrar_genero.php",
            data: {
                id: id_genero
            },
            success: function () {
                console.log("elemento eliminado");
                mostrar_generos();

            }
        });

    }
    $(document).on("click", "#add", function () {
        var id = "",
            genero = $("#nombreg").val();
        $("#id_generog").val("");
        $("#nombreg").val("");
        agregar_genero(id, genero);
    });
    $(document).on("click", "#saveg", function () {
        var id = "",
            genero = $("#nombre").val();
        
        actualizar_genero(id, genero);
    });
    $(document).on("click", "#editargenero", function () {
        ide = $(this).data("id");
        verupdate(ide);
    });
    $(document).on("click", "#borrargenero", function () {
        ide = $(this).data("id");

    });
    $(document).on("click", "#borrar-genero-yes", function () {
        borrar_genero(ide);
    });
});
