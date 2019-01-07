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
    <title>Socios | Panel de control</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Mukta|Open+Sans|Roboto" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
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
</head>

<body class="bg-light">
    <header>
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
                    <li class="nav-item "><a class="nav-link active" href="#" data-toggle="modal" data-target="#add_socio">Nuevo</a></li>

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
            <div class="modal fade" id="delete_socio">
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
                            <a href="#" class="btn btn-success" data-dismiss="modal" id="delete_socio_yes">confirmar</a>

                            <button class="btn btn-danger" data-dismiss="modal">cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="add_socio">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar socio</h5>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body mod-contenedor list-group" id="">
                            <div class="form-group">
                                <label>Nombre completo</label>
                                <input type="text" class="form-control" id="nombres">
                                <label>Sexo</label>
                                <select class="form-control" id="sexos">
                                    <option value="1">Masculino</option>
                                    <option value="0">Femenino</option>
                                </select>
                                <label>Alumno</label>
                                <select class="form-control" id="alumnos">
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Grado</label>
                                <select class="form-control" id="grados">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                                <label>Grupo</label>
                                <select class="form-control" id="grupos">
                                    <option value="1">BM</option>
                                    <option value="2">AM</option>
                                    <option value="3">AM-BI</option>
                                    <option value="4">AV</option>
                                    <option value="5">BV</option>
                                </select>
                                <label>Especialidad</label>
                                <select class="form-control" id="especialidads">
                                    <option value="1">Gesti&oacute;n administrativa.</option>
                                    <option value="2">Electr&oacute;nica</option>
                                    <option value="3">Mantenimiento</option>
                                    <option value="4">Mecatr&oacute;nica</option>
                                    <option value="5">Plasticos</option>
                                    <option value="6">Programaci&oacute;n</option>
                                </select>
                                <label>Turno</label>
                                <select class="form-control" id="turnos">
                                    <option value="1">Matutino</option>
                                    <option value="2">Vespertino</option>
                                </select>
                                <label>N&uacute;mero de control</label>
                                <input type="text" class="form-control" id="no_controls">
                                <label>Fecha de nacimiento</label>
                                <input type="date" class="form-control" id="nacimientos">
                                <label>Email</label>
                                <input type="email" class="form-control" id="emails">
                                <label>Facebook</label>
                                <input type="text" class="form-control" id="facebooks">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-success" data-dismiss="modal" id="adds">Guardar</a>

                            <button class="btn btn-danger" data-dismiss="modal">cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="edit_socio">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Actualizar socio</h5>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body mod-contenedor list-group" id="actualizarsocio_contenedor">
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
                            <th>Clave de socio</th>
                            <th>Nombre</th>
                            <th>Sexo</th>
                            <th>Alumno</th>
                            <th>Grado</th>
                            <th>Grupo</th>
                            <th>Especialidad</th>
                            <th>Turno</th>
                            <th>N&uacute;mero de control</th>
                            <th>Fecha de nacimiento</th>
                            <th>Email</th>
                            <th>Facebook</th>
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
    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>
