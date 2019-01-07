function Autor(id,colaboracion) {
    this.autor='{"Id_autor":'+id+',"colaboracion":"'+colaboracion+'"}';
}
var autores='{"Autores":[';
var fin=']}';
$(document).ready(function() {
    var idb = "";
    var f = new Date();
    var ma=0;
    function obtener_nolibro(nombre, tipo) {
                $.ajax({
                    type: "POST",
                    url: "php/obtener_nolibro.php",
                    data: {
                        titulo: nombre,
                        tipo: tipo
                    },
                    success: function(data) {
                        $("#no_librol").val(data);
                    }
                });
                // body...
            }
            function obtener_copia(nombre) {
                $.ajax({
                    type: "POST",
                    url: "php/obtener_copia.php",
                    data: {
                        titulo: nombre
                    },
                    success: function(data) {
                        $("#no_copial").val(data);
                        if(data!="1"){
                            po=1;
                            obtener_nolibro(nombre,1);
                            obtener_portada(nombre);
                        }else{
                            po=0;
                            obtener_nolibro(nombre,2);
                        }
                    }
                });
                // body...
            }
    function mostrar_libros(index) {
        $.ajax({
            type: "POST",
            url: "php/mostrar_libros.php",
            data: {
                index: index
            },
            dataType: "html",
            success: function(data) {
                $("#tabla-contenedor").html(data);
            }
        });
    }
    mostrar_libros();
    function agregar_libro(inventario, titulo, multi_autor, autor, editorial, no_paginas, estado, observacion,
     ano_edicion, genero , popularidad, precio, saga, nombre_saga, forma_ad, donador, fecha_alta,
      no_copia, no_libro, ocupado, tipo,portada) {
        $.ajax({
            type: "POST",
            url: "php/agregar_libro.php",
            data:{
                Inventario: inventario,
                Titulo: titulo,
                Multi_autor: multi_autor,
                Autor: autor,
                Editorial: editorial,
                Numero_paginas: no_paginas,
                Estado: estado,
                Observacion: observacion,
                Ano_edicion: ano_edicion,
                Genero: genero,
                Popularidad: popularidad,
                Precio: precio,
                Saga: saga,
                Nombre_saga:nombre_saga,
                Forma_adquisicion: forma_ad,
                Donador: donador,
                Fecha_alta:fecha_alta,
                No_Copia:no_copia,
                No_Libro:no_libro,
                Ocupado:'0',
                Tipo: tipo,
                Portada: portada

            },
            success:function (data) {
                console.log(data);
                mostrar_libros();
            }
        });
    }
    function verupdate(id) {
        $.ajax({
            type: 'POST',
            url: "php/editar-libro.php",
            data: {
                id: id
            },
            dataType: 'html',
            success: function (data) {
                $("#actualizarlibro_contenedor").html(data);
            }
        });


    }
    function colectar_autores() {
        var autorx= new Autor($("#autor"+(1)).val(),$("#coo"+(1)).val());
        autores+=autorx.autor;
        for(var i=2;i<ma;i++){
            autorx= new Autor($("#autor"+(i)).val(),$("#coo"+(i)).val());
            autores+=",";
            autores+=autorx.autor;
        }
        autorx= new Autor($("#autor"+(ma)).val(),$("#coo"+(ma)).val());
        autores+=",";
        autores+=autorx.autor;
        autores+=fin;
    }
   
    function actualizar_libro(id,inventario, titulo, multi_autor, autor, editorial, no_paginas, estado, observacion,
     ano_edicion, genero , popularidad, precio, saga, nombre_saga, forma_ad, donador, fecha_alta,
      no_copia, no_libro, ocupado, tipo,portada) {
        $.ajax({
            type: "POST",
            url: "php/actualizar_libro.php",
            data:{
                ID_TEMPORAL: id,
                Inventario: inventario,
                Titulo: titulo,
                Multi_autor: multi_autor,
                Autor: autor,
                Editorial: editorial,
                Numero_paginas: no_paginas,
                Estado: estado,
                Observacion: observacion,
                Ano_edicion: ano_edicion,
                Genero: genero,
                Popularidad: popularidad,
                Precio: precio,
                Saga: saga,
                Nombre_saga:nombre_saga,
                Forma_adquisicion: forma_ad,
                Donador: donador,
                Fecha_alta:fecha_alta,
                No_Copia:no_copia,
                No_Libro:no_libro,
                Ocupado:'0',
                Tipo: tipo,
                Portada: portada

            },
            success:function (data) {
                console.log(data);
                mostrar_libros();
            }
        });
    }

    function verlibro(id) {
        $.ajax({
            type: 'POST',
            url: "php/verlibro.php",
            data: {
                id: id
            },
            dataType: 'html',
            success: function(data) {
                $("#verlibro-contenedor").html(data);
            }
        });


    }
    function nuevo_libro() {
        bo=0;
        $.ajax({
            type: 'POST',
            url: "php/nuevo-libro.php",
            dataType: 'html',
            success: function(data) {
                $("#nuevo_libro").html(data);
            }
        });


    }
    
    function borrar_libro(id_libro) {
        $.ajax({
            type: "POST",
            url: "php/borrar_libro.php",
            data: {
                id: id_libro
            },
            success: function() {
                mostrar_libros();
                $("#delete-success").show();
                $("#delete-success").hide(4000);

            }
        });

    }
    function buscar_titulo(txt) {
        $.ajax({
            type: "POST",
            url: "php/buscador.php",
            data: {
                Titulo: txt
            },
            dataType: "html",
            success: function(data) {
                $("#tabla-contenedor").html(data);
            }
        });
        // body...
    }
   
    $("#busca").on("input",function (event) {
        var txt=$(this).val();
        buscar_titulo(txt);
    });
    $(document).on('click', '#add-autor', function() {
        //ma++;
        m++;
       //multi_autor(ma);
    });
    $(document).on('click', '#nuevo', function() {
        m=0;
        nuevo_libro();
    });
    $(document).on("click", "#viewbook", function() {
        var id = $(this).data("id");
        verlibro(id);
    });
    $(document).on("click", "#borrar-libro", function() {
        idb = $(this).data("id");
    });
    $(document).on("click","#editar-libro", function () {
        idb=$(this).data("id");
        verupdate(idb);
    });
     $(document).on("click", "#delete_libro_yes", function () {
        borrar_libro(idb);
    });
    
    $(document).on("click", "#addl", function() {
        var
        inventario=$("#inventariol").val(), 
        titulo=$("#titulol").val(), 
        autor=$("#autorl").val(), 
        editorial=$("#editoriall").val(), 
        no_paginas=$("#no_paginasl").val(), 
        estado=$("#estadol").val(), 
        observacion=$("#observacionl").val(),
        ano_edicion=$("#ano_edicionl").val(), 
        genero=$("#generol").val() , 
        popularidad=$("#popularidadl").val(), 
        precio=$("#precio_reposicionl").val(), 
        saga=$("#sagal").val(), 
        nombre_saga=$("#nombre_sagal").val(), 
        forma_ad=$("#forma_adquisicionl").val(), 
        donador=$("#donadorl").val(), 
        fecha_alta=$("#fecha_altal").val(),
        no_copia=$("#no_copial").val(),
        no_libro=$("#no_librol").val(), 
        ocupado=0, 
        tipo=$("#tipol").val(),
        portada=$("#dir_portadal").val();;
        if(m>0)colectar_autores();
        multi_autor=autores;
        $("#autores-contenedor").html("");
        m=0;
        agregar_libro(inventario, titulo, multi_autor, autor, editorial, no_paginas, estado, observacion,
         ano_edicion, genero , popularidad, precio, saga, nombre_saga, forma_ad, donador, fecha_alta,
         no_copia, no_libro, ocupado, tipo,portada);
        bo=0;
    });
    $(document).on('click', '#quit', function() {
        m=0;
    });
    $(document).on("click", "#save", function() {
        var
        id=$("#id_libro").val(),
        inventario=$("#inventario").val(), 
        titulo=$("#titulo").val(), 
        multi_autor="", 
        autor=$("#autor").val(), 
        editorial=$("#editorial").val(), 
        no_paginas=$("#no_paginas").val(), 
        estado=$("#estado").val(), 
        observacion=$("#observacion").val(),
        ano_edicion=$("#ano_edicion").val(), 
        genero=$("#genero").val() , 
        popularidad=$("#popularidad").val(), 
        precio=$("#precio_reposicion").val(), 
        saga=$("#saga").val(), 
        nombre_saga=$("#nombre_saga").val(), 
        forma_ad=$("#forma_adquisicion").val(), 
        donador=$("#donador").val(), 
        fecha_alta=$("#fecha_alta").val(),
        no_copia=$("#no_copia").val(),
        no_libro=$("#no_libro").val(), 
        ocupado=0, 
        tipo=$("#tipo").val(),
        portada=$("#dir_portada2").val();
        console.log($("#donador").val());
        actualizar_libro(idb,inventario, titulo, multi_autor, autor, editorial, no_paginas, estado, observacion,
         ano_edicion, genero , popularidad, precio, saga, nombre_saga, forma_ad, donador, fecha_alta,
         no_copia, no_libro, ocupado, tipo,portada);
    });
    $("#user").click(function(){
        $(".user-tool").toggleClass('hide');
    });
});
