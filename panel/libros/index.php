<?php
	@ob_start();
	session_start();
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#ecf0f1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <title>Panel de control | LiberLibera</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Mukta|Open+Sans|Roboto" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
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
    <script src="js/main.js">

    </script>
</head>

<body class="bg-light">
    <header>
        <div class="header-middle">
            <div class="logo">LIBERLIBERA</div>
            <div class="enlaces">
                <ul>
                    <li>
                        <a data-toggle="modal" href="#" id="user"><img src="../../images/user.png" alt="" class="circulo avatar-usuario"></a>
                    </li>
                </ul>
                <div class="user-tool hide">
                    <ul>
                        <li><a href="../" ><i class="fas fa-arrow-left"></i> Volver</a></li>
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
                    <li id="nuevos"  class="nav-item "><a class="nav-link active" id="nuevo" href="#" data-toggle="modal" data-target="#add_libro">Nuevo</a></li>
                    <li><input type="text" name="buscador" id="busca" style="margin-left: 60px; margin-top: 10px; width: auto; " placeholder="buscar"></li>

                </ul>
            </div>
        </nav>
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
        <div class="top">
            <div class="modal fade" id="add_libro">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar Libro</h5>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body mod-contenedor list-group" id="">
                            <div class="form-group" id="nuevo_libro">


                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-success" data-dismiss="modal" id="addl">Guardar</a>

                            <button class="btn btn-danger" id="quit" data-dismiss="modal">cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="verlibro">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detalles del libro</h5>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body mod-contenedor list-group" id="verlibro-contenedor">
                            <div>
                                Cargando contenido
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="delete_libro">
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
                            <a href="#" class="btn btn-success" data-dismiss="modal" id="delete_libro_yes">confirmar</a>

                            <button class="btn btn-danger" data-dismiss="modal">cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="edit_libro">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Actualizar Libro</h5>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body mod-contenedor list-group" id="actualizarlibro_contenedor">
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
                            <th>C&oacute;digo del Libro</th>
                            <th>T&iacute;tulo</th>
                            <th>Autor</th>
                            <th>G&eacute;nero</th>
                            <th>Tipo</th>
                            <th>N&uacute;mero de Libro</th>
                            <th>Disponibilidad</th>
                            <th></th>
                            <th></th>
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
    <script src="../js/index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>
