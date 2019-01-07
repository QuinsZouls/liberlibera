$(document).ready(function () {
    var idu = "";
    var tipo=1;
    $("#user").click(function(){
        $(".user-tool").toggleClass('hide');
    });
    function mostrar_usuarios(index) {
        $.ajax({
            type: "POST",
            url: "php/mostrar_usuarios.php",
            data: {
                index: index
            },
            dataType: "html",
            success: function (data) {
                $("#tabla-contenedor").html(data);
            }
        });
    }
    function opciones(n, email) {
        $.ajax({
            type: "POST",
            url: "php/acciones.php",
            data:{
                tipo: n,
                id: email
            },
            success: function () {
                console.log("accion hecha");
                mostrar_usuarios(tipo);
                // body...
            }
        });
    }

    mostrar_usuarios(tipo);
    $(document).on("click", "#cambio", function () {
        if(tipo)
            tipo=0;
        else
            tipo=1;
        mostrar_usuarios(tipo);

    });
    $(document).on("click","#activar", function () {
        var email=$(this).data("id");
        opciones(1,email);
        // body...
    });
    $(document).on("click","#desactivar", function () {
        var email=$(this).data("id");
        opciones(2,email);
        // body...
    });
    $(document).on("click","#admin", function () {
        var email=$(this).data("id");
        opciones(3,email);
        // body...
    });
    $(document).on("click","#quitar_admin", function () {
        var email=$(this).data("id");
        opciones(4,email);
        // body...
    });
});