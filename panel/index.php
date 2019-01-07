<?php
	@ob_start();
	session_start();
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#ecf0f1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio| Panel de Control</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Mukta|Open+Sans|Roboto" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="asset/img/panel.png">
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
    <script src="js/main.js"></script>
</head>

<body class="bg-light">
    <header class="nav-down">
        <div class="header-middle">
            <div class="logo">LIBERLIBERA</div>
            <div class="enlaces">
                <ul>
                    <li>
                        <a  id="user"><img src="../images/user.png" alt="" class="circulo avatar-usuario"></a>
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
                            <a href="../php/close_session.php" class="btn btn-success">confirmar</a>

                            <button class="btn btn-danger" data-dismiss="modal">cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        <h1 style="text-align: center;">Tablas</h1>
        <!--<canvas id="graficas"  style="position: relative; height:400px; width:100%"></canvas>-->
        <div class="tarjetas">
            <ul>
                <li>
                    <div class="card text-center border-primary text-primary">
                        <div class="card-body">
                            <i class="fas fa-book"></i>
                            <h4 class="card-title">Libros</h4>
                            <p class="card-text">Administra todos los libros disponibles</p>
                            <a href="libros/" class="btn btn-primary">Ir</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card text-center border-warning text-warning">
                        <div class="card-body">
                            <i class="fas fa-user-edit"></i>
                            <h4 class="card-title">Autores</h4>
                            <p class="card-text">Administre todos los autores disponibles</p>
                            <a href="autor/" class="btn btn-warning">Ir</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card text-center border-dark text-dark">
                        <div class="card-body">
                            <i class="fas fa-bookmark"></i>
                            <h4 class="card-title">Editoriales</h4>
                            <p class="card-text">Administre todas las editoriales disponibles</p>
                            <a href="editorial/" class="btn btn-dark">Ir</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card text-center border-primary text-primary">
                        <div class="card-body">
                            <i class="fas fa-atlas"></i>
                            <h4 class="card-title">G&eacute;neros</h4>
                            <p class="card-text">Administra todos los g&eacute;neros disponibles</p>
                            <a href="generos/" class="btn btn-primary">Ir</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card text-center border-secondary text-secondary">
                        <div class="card-body">
                            <i class="fas fa-book-reader"></i>
                            <h4 class="card-title">Pr&eacute;stamos</h4>
                            <p class="card-text">Administre todos los prestamos disponibles</p>
                            <a href="prestamos/" class="btn btn-secondary">Ir</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card text-center border-info text-info">
                        <div class="card-body">
                            <i class="fas fa-user"></i>
                            <h4 class="card-title">Socios</h4>
                            <p class="card-text">Administre todos los socios del club disponibles</p>
                            <a href="socios/" class="btn btn-info">Ir</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card text-center border-secondary text-secondary">
                        <div class="card-body">
                            <i class="fas fa-user"></i>
                            <h4 class="card-title">Usuarios</h4>
                            <p class="card-text">Administre todos los usuarios del club disponibles</p>
                            <a href="usuarios/" class="btn btn-secondary">Ir</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card text-center border-warning text-warning">
                        <div class="card-body">
                            <i class="fas fa-user"></i>
                            <h4 class="card-title">Servicio Social</h4>
                            <p class="card-text">Administre las personas del servicio social del club disponibles</p>
                            <a href="empleados/" class="btn btn-warning">Ir</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <h1 style="text-align: center; width: 100%; float: right;">Blog</h1>
        <div class="tarjetas">
            <ul>
                <li>
                    <div class="card text-center border-primary text-primary">
                        <div class="card-body">
                            <i class="fas fa-edit"></i>
                            <h4 class="card-title">Nuevo Post</h4>
                            <p class="card-text">Escriba un nuevo post</p>
                            <a href="post/nuevo/" class="btn btn-primary">Ir</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card text-center border-warning text-warning">
                        <div class="card-body">
                            <i class="fas fa-pencil-alt"></i>
                            <h4 class="card-title">Editar Post</h4>
                            <p class="card-text">Edite una publicaci&oacute;n</p>
                            <a href="#" class="btn btn-warning">Ir</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card text-center border-info text-info">
                        <div class="card-body">
                            <i class="fas fa-eraser"></i>
                            <h4 class="card-title">Eliminar una publicaci&oacute;n</h4>
                            <p class="card-text">Elimine una publicaci&oacute;n </p>
                            <a href="#" class="btn btn-info">Ir</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card text-center border-secondary text-secondary">
                        <div class="card-body">
                            <i class="fas fa-file-export"></i>
                            <h4 class="card-title">Ver todos los post</h4>
                            <p class="card-text">Vea todos los post disponibles</p>
                            <a href="#" class="btn btn-secondary">Ir</a>
                        </div>
                    </div>
                </li>
            </ul>

        </div>


    </main>
    <footer>

    </footer>
    <script src="js/index.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById("grafica");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"],
                datasets: [{
                    label: '0 total de visitas',
                    data: [0, 0, 0, 0, 0, 0, 0, 0],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>
