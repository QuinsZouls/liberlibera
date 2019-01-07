<?php
	@ob_start();
	session_start();
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#ecf0f1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestamos | Panel de control</title>
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
                    <li class="nav-item " style="margin-right: 20px;"><a class="btn btn-success active" href="#" data-toggle="modal" data-target="#add_prestamo">Nuevo</a></li>
                    <li class="nav-item "><a class="nav-link active" href="#" id="aprobados" >Aprobados</a></li>
                    <li class="nav-item "><a class="nav-link " href="#" id="no_entregados" >No Entregados</a></li>
                    <li class="nav-item "><a class="nav-link" href="#" id="entregados" >Entregados</a></li>
                    <li class="nav-item "><a class="nav-link " href="#" id="multas" >Multas</a></li>
                    <li class="nav-item "><a class="nav-link" href="#" id="no_aprobados" >No Aprobados</a></li>

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
            <div class="modal fade" id="delete_prestamo">
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
                            <a href="#" class="btn btn-success" data-dismiss="modal" id="delete_prestamo_yes">confirmar</a>

                            <button class="btn btn-danger" data-dismiss="modal">cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="renovarPrestamo">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Acciones</h5>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body mod-contenedor">
                            <div>
                                <h3>Renovar Libro</h3>
                                <br>
                                <label >Fecha de entrega</label>
                                <input type="date" class="form-control" id="fecha_renovacion">
                                <br>

                                <a href="#" class="btn btn-success" data-dismiss="modal" id="guardar_renovacion">Renovar este libro.</a>
                            </div>
                            <hr>
                            <div>
                                <h3>Entregar Libro</h3>
                                <br>
                                <textarea class="form-control" id="observacion" placeholder="Observaci&oacute;n"></textarea>
                                <br>
                               <a href="#" class="btn btn-success" data-dismiss="modal" id="entregado">Marcar como entregado.</a>
                            </div>
                            <hr>
                            <div>

                               <h3>Aprobar pr&eacute;stamo.</h3>
                               <label class="form-control">Fecha de entrega</label>
                               <input type="date" class="form-control" id="fecha_e" placeholder="">
                               <br>
                               <a href="#" class="btn btn-success" data-dismiss="modal" id="aprobado">Marcar como aprobado.</a>
                            </div>
                        </div>
                        <div class="modal-footer">


                            <button class="btn btn-danger" data-dismiss="modal">cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="add_prestamo">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar prestamo</h5>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body mod-contenedor list-group" id="">
                            <div class="form-group">
                                <label>Libro</label>
                                <select id="librop" class="form-control">
                                    <?php
                                        include ("../../php/conexion.php");
                                        $sql="SELECT * FROM libros WHERE Ocupado='0'";
                                        $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
                                        while($registro=mysqli_fetch_array($consulta)){
                                            echo'<option value="'.$registro['ID_TEMPORAL'].'">'.utf8_encode($registro['Titulo']).': '.$registro['Inventario'].'</option>';

                                        }
                                    ?>
                                </select>
                                <label>Socio</label>
                                <select class="form-control" id="sociop">
                                    <?php
                                        include ("../../php/conexion.php");
                                        require'../../php/crypto.php';
                                        $sql="SELECT * FROM socios";
                                        $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
                                        while($registro=mysqli_fetch_array($consulta)){
                                            echo'<option value="'.$registro['Id_socio'].'">'.decrypt($registro['Nombre_completo'],$key).'</option>';

                                        }
                                    ?>
                                </select>
                                <label>Persona que autoriza</label>
                                <select class="form-control" id="persona_autorizap">
                                    <?php
                                        include ("../../php/conexion.php");

                                        $sql="SELECT * FROM empleado";
                                        $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
                                        while($registro=mysqli_fetch_array($consulta)){
                                            $sql="SELECT * FROM socios WHERE Id_socio=".$registro['Alumno']."";
                                            $consulta2=mysqli_query($conexion,$sql) or die ("se murio la consulta");
                                            $nombre=mysqli_fetch_array($consulta2);
                                            echo'<option value="'.$registro['Numero_empleado'].'">'.decrypt($nombre['Nombre_completo'],$key).'</option>';

                                        }
                                    ?>
                                </select>
                                <label>Fecha de pr&eacute;stamo</label>
                                <input type="date" class="form-control" value="<?php echo date("Y-m-d");?>" id="fecha_prestamop">
                                <label>Fecha de entrega</label>
                                <input type="date" class="form-control" id="fecha_entregap">
                               <!-- <label>Entregado</label>
                                <select class="form-control" id="entregadop">
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Persona que recibe</label>
                                <select class="form-control" id="persona_autorizap">
                                    <?php
                                        include ("../../php/conexion.php");
                                        $sql="SELECT * FROM empleado";
                                        $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
                                        while($registro=mysqli_fetch_array($consulta)){
                                            $sql="SELECT * FROM socios WHERE Id_socio=".$registro['Alumno']."";
                                            $consulta2=mysqli_query($conexion,$sql) or die ("se murio la consulta");
                                            $nombre=mysqli_fetch_array($consulta2);
                                            echo'<option value="'.$registro['Numero_empleado'].'">'.utf8_encode($nombre['Nombre_completo']).'</option>';

                                        }
                                    ?>
                                </select>-->

                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-success" data-dismiss="modal" id="addp">Guardar</a>

                            <button class="btn btn-danger" data-dismiss="modal">cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="edit_prestamo">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Actualizar prestamo</h5>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body mod-contenedor list-group" id="actualizarprestamo_contenedor">
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
                            <th>Libro</th>
                            <th>Alumno</th>
                            <th>Empleado que autoriza</th>
                            <th>Fecha de Pr&eacute;stamo</th>
                            <th>Fecha de entrega</th>
                            <th>Entregado</th>
                            <th>Empleado que recibe</th>
                            <th>Fecha de recibo</th>
                            <th>Observaci&oacute;n</th>
                            <th>Aprobado</th>
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
    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>
