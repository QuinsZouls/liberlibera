<?php
	@ob_start();
	session_start();
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="theme-color" content="#ecf0f1" />
    <title>Autores | Panel de control</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Mukta|Open+Sans|Roboto" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <?php
        if(!isset($_SESSION))session_start();
        if(isset($_SESSION['type_user'])){
            if($_SESSION['type_user']!=1){
                header("Location:../404");
          echo "<script type='text/javascript'>window.top.location='../../404';</script>"; exit;
            }
        }else{
            header("Location:../404");
        echo "<script type='text/javascript'>window.top.location='../../404';</script>"; exit;
        }
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
		<script src="../js/main.js"></script>
    <script>
        $(document).ready(function() {
            var ida = "";

            function mostrar_autores(index) {
                $.ajax({
                    type: "POST",
                    url: "php/mostrar_autores.php",
                    data: {
                        index: index
                    },
                    dataType: "html",
                    success: function(data) {
                        $("#tabla-contenedor").html(data);
                    }
                });
            }
            mostrar_autores();
            function actualizar_autor(id_autor, nombre, nacionalidad, nacimiento, muerte, sexo) {
                $.ajax({
                    type: "POST",
                    url: "php/actualizar_autor.php",
                    data: {
                        Id_autor: id_autor,
                        Nombre: nombre,
                        Nacionalidad: nacionalidad,
                        Nacimiento: nacimiento,
                        Muerte: muerte,
                        Sexo: sexo
                    },
                    success: function() {
                        mostrar_autores();
                        console.log("elemento actualizado");
                    }
                });
            }

            function agregar_autor(id_autor, nombre, nacionalidad, nacimiento, muerte, sexo) {
                $.ajax({
                    type: "POST",
                    url: "php/agregar_autor.php",
                    data: {
                        Id_autor: id_autor,
                        Nombre: nombre,
                        Nacionalidad: nacionalidad,
                        Nacimiento: nacimiento,
                        Muerte: muerte,
                        Sexo: sexo
                    },
                    success: function() {
                        mostrar_autores();
                        console.log("elemento agrgado");

                    }
                });
            }

            function verupdate(id) {
                $.ajax({
                    type: 'POST',
                    url: "php/editar-autor.php",
                    data: {
                        id: id
                    },
                    dataType: 'html',
                    success: function(data) {
                        console.log("hecho");
                        $("#actualizarautor_contenedor").html(data);
                    }
                });


            }

            function borrar_autor(id_autor) {
                $.ajax({
                    type: "POST",
                    url: "php/borrar_autor.php",
                    data: {
                        id: id_autor
                    },
                    success: function() {
                        console.log("elemento eliminado");
                        mostrar_autores();

                    }
                });

            }
            function buscar_autor(txt) {
                $.ajax({
                    type: "POST",
                    url: "php/buscador.php",
                    data: {
                        Nombre: txt
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
                buscar_autor(txt);
            });
            $(document).on("click", "#save", function() {
                var id = $("#id_autor").val(),
                    nombre = $("#nombre").val(),
                    nacionalidad = $("#nacionalidad").val(),
                    nacimiento = $("#nacimiento").val(),
                    muerte = $("#muerte").val(),
                    sexo = $("#sexo").val();
                actualizar_autor(id, nombre, nacionalidad, nacimiento, muerte, sexo);

            });
            $(document).on("click", "#savea", function() {
                var id = $("#id_autora").val(),
                    nombre = $("#nombrea").val(),
                    apellidop = $("#apellido_pa").val(),
                    apellidom = $("#apellido_ma").val(),
                    nacionalidad = $("#nacionalidada").val(),
                    nacimiento = $("#nacimientoa").val(),
                    muerte = $("#muertea").val(),
                    sexo = $("#sexoa").val();
                $("#id_autora").val("");
                $("#nombrea").val("");
                $("#nacionalidad").val("");
                $("#nacimientoa").val("");
                $("#muertea").val("");
                $("#sexoa").val("");
                agregar_autor(id, nombre, nacionalidad, nacimiento, muerte, sexo);

            });
            $(document).on("click", "#editarautor", function() {
                var id = $(this).data("id");
                ida = id;
                verupdate(id);
            });
            $(document).on("click", "#borrarautor", function() {
                ida = $(this).data("id");

            });
            $(document).on("click", "#deleteda", function() {
                borrar_autor(ida);
            });
            $(document).on("click", "#deleteautor-yes", function() {
                borrar_autor(ida);
            });

        });

    </script>
</head>

<body class="bg-light">
    <header class="nav-down">
        <div class="header-middle">
            <div class="logo">LIBERLIBERA</div>
            <div class="enlaces">
                <ul>
                    <li>
                        <a  id="user"><img src="../../images/user.png" alt="" class="circulo avatar-usuario"></a>
                    </li>
                </ul>
                <div class="user-tool hide">
                    <ul>
                        <li><a href="../"><i class="fas fa-arrow-left"></i> Volver</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#cerrar_session""><i class="fas fa-lock"></i> Cerrar sesi&oacute;n</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </header>
    <main>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="navbar-collapse">
                <ul class="nav nav-pills nav-fill bg-light">
                    <li class="nav-item "><a class="nav-link active" href="#" data-toggle="modal" data-target="#addautor">Nuevo</a></li>
                    <li><input type="text" name="buscador" id="busca" style="margin-left: 60px; margin-top: 10px; width: auto; " placeholder="buscar"></li>

                </ul>
            </div>
        </nav>
        <div class="top">
            <div class="modal fade" id="cerrar_session">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">¿Desea cerrar la sesi&oacute;n?</h5>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            se perder&aacute;n los cambios que no hayas guardado
                        </div>
                        <div class="modal-footer">
                            <a href="../../php/close_session.php" class="btn btn-success">confirmar</a>

                            <button class="btn btn-danger" data-dismiss="modal">cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="delete_autor">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">¿Desea eliminar este elemento?</h5>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            se perder&aacute; de forma permanente.
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-success" data-dismiss="modal" id="deleteda">confirmar</a>

                            <button class="btn btn-danger" data-dismiss="modal">cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="addautor">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar autor</h5>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body mod-contenedor list-group" id="">
                            <div class="form-group">
                                <label>Id_autor</label>
                                <input type="text" class="form-control" id="id_autora">
                                <label>Nombre</label>
                                <input type="text" class="form-control" id="nombrea">
                                <label>Pa&iacute;s de origen</label>
                                <input type="text" class="form-control" id="nacionalidada">
                                <label>Nacimiento</label>
                                <input type="date" class="form-control" id="nacimientoa">
                                <label>Muerte</label>
                                <input type="date" class="form-control" id="muertea">
                                <label>Sexo</label>
                                <select class="form-control" id="sexoa">
                                    <option value="1">Hombre</option>
                                    <option value="0">Mujer</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-success" data-dismiss="modal" id="savea">Guardar</a>

                            <button class="btn btn-danger" data-dismiss="modal">cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="editautor">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Actualizar autor</h5>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body mod-contenedor list-group" id="actualizarautor_contenedor">
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-success" data-dismiss="modal" id="save">Guardar</a>

                            <button class="btn btn-danger" data-dismiss="modal">cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="middle">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="">
                        <tr>
                            <th>Id_Autor</th>
                            <th>Nombre</th>
                            <th>Pa&iacute;s de origen</th>
                            <th>Nacimiento</th>
                            <th>Muerte</th>
                            <th>Sexo</th>
                            <th></th>
                            <th></th>
                        </tr>

                    </thead>
                    <tbody id="tabla-contenedor">

                    </tbody>
                </table>
            </div>
        </div>
        <div class="bottom"></div>
    </main>
    <footer>

    </footer>
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>
