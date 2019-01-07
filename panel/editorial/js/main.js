$(document).ready(function () {
    var ide = "";

    function mostrar_editoriales(index) {
        $.ajax({
            type: "POST",
            url: "php/mostrar_editorial.php",
            data: {
                index: index
            },
            dataType: "html",
            success: function (data) {
                $("#tabla-contenedor").html(data);
            }
        });
    }
    mostrar_editoriales();
    function actualizar_editorial(id_editorial, editorial) {
        $.ajax({
            type: "POST",
            url: "php/actualizar_editorial.php",
            data: {
                Id_editorial: id_editorial,
                Nombre_editorial: editorial
            },
            success: function () {
                mostrar_editoriales();
                console.log("elemento actualizado");
            }
        });
    }

    function agregar_editorial(id_editorial, editorial) {
        $.ajax({
            type: "POST",
            url: "php/agregar_editorial.php",
            data: {
                Id_editorial: id_editorial,
                Nombre_editorial: editorial
            },
            success: function () {
                mostrar_editoriales();
                console.log("elemento agregado");
            }
        });
    }

    function verupdate(id) {
        $.ajax({
            type: 'POST',
            url: "php/editar-editorial.php",
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


    function borrar_editorial(id_editorial) {
        $.ajax({
            type: "POST",
            url: "php/borrar_editorial.php",
            data: {
                id: id_editorial
            },
            success: function () {
                console.log("elemento eliminado");
                mostrar_editoriales();

            }
        });

    }
    $(document).on("click", "#add", function () {
        var id ="",
            editorial = $("#editoriale").val();
        $("#editoriale").val("");
        agregar_editorial(id, editorial);
    });
    $(document).on("click", "#savee", function () {
        var id = "",
            editorial = $("#nombre_editorial").val();

        actualizar_editorial(id, editorial);
    });
    $(document).on("click", "#editareditorial", function () {
        ide = $(this).data("id");
        verupdate(ide);
    });
    $(document).on("click", "#borrareditorial", function () {
        ide = $(this).data("id");

    });
    $(document).on("click", "#borrar-editorial-yes", function () {
        borrar_editorial(ide);
    });
});
