$(document).ready(function () {
    var idb = "";

    function mostrar_libros(index) {
        $.ajax({
            type: "POST",
            url: "php/mostrar_libros.php",
            data: {
                index: index
            },
            dataType: "html",
            success: function (data) {
                $("#tabla-contenedor").html(data);
            }
        });
    }
    mostrar_libros();

    function actualizar_libro(id_libro) {
        $.ajax({
            type: "POST",
            url: "php/actualizar_libro.php",
            data: {
                id_libro: id_libro
            },
            success: function () {

            }
        });
    }

    function verlibro(id) {
        $.ajax({
            type: 'POST',
            url: "php/cpanel/verlibro.php",
            data: {
                id: id
            },
            dataType: 'html',
            success: function (data) {
                console.log("hecho");
                $("#verlibro-contenedor").html(data);
            }
        });


    }

    function borrar_libro(id_libro) {
        $.ajax({
            type: "POST",
            url: "php/delete-book.php",
            data: {
                id: id_libro
            },
            success: function () {
                console.log("elemento eliminado");
                mostrar_libros();
                $("#delete-success").show();
                $("#delete-success").hide(4000);

            }
        });

    }

    $(document).on("click", "#viewbook", function () {
        var id = $(this).data("id");
        verlibro(id);
    });
    $(document).on("click", "#borrarlibro", function () {
        idb = $(this).data("id");

    });
    $(document).on("click", "#deletebook-yes", function () {
        borrar_libro(idb);
    });
});
