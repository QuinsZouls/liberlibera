<?php
	@ob_start();
	session_start();
    if(!isset($_SESSION['active'])){
        header("Location:../login/");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#F0F0E9" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Notificaciones | LiberLibera</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/price-range.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/cuenta.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/star.css">
	<link href="../css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/home/liberlibera.jpg">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/home/liberlibera.jpg">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript">
    	jQuery(document).ready(function($) {
	        $("#texto_busqueda").keypress(function(event){
	            var keycode = (event.keyCode ? event.keyCode : event.which);
	            if(keycode == '13'){
	                var txt=$("#texto_busqueda").val();
	                window.top.location='../busqueda/?q='+txt;
	            }
	        });
    	});
    </script>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-envelope"></i> Clubliberlibera@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/people/Club-Liber-Libera-Cecyteq/100010390333615"  target="_blanck"><i class="fa fa-facebook"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="../"><img src="../images/logocecyte.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li>
									<?php
										if(!isset($_SESSION))session_start();
										if(isset($_SESSION['active'])){
											echo'<a href="#" data-toggle="modal" data-target="#modalclosesesion"><i class="fa fa-lock"></i> Cerrar Sesi&oacuten</a>';
										}else{
											echo "<script type='text/javascript'>window.top.location='../login/';</script>";
											echo '<a href="../login"><i class="fa fa-lock"></i> Iniciar Sesi&oacuten</a>';
										}
									?>
								</li>
								<li>
									<?php
										if(isset($_SESSION['active'])){
											echo '<a href="../cuenta/"><i class="fa fa-user"></i> Cuenta</a>';
										}
									?>
								</li>
								<li>
									<?php
										if(!isset($_SESSION))session_start();
										if(isset($_SESSION['type_user'])){
											if($_SESSION['type_user']=='1')
												echo'<a href="../panel"><i class="fa fa-lock"></i>Administrador</a>';
										}
									?>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
		<!--modal cerrar sesion-->
		<div class="modal fade" id="modalclosesesion">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">¿Desea cerrar la sesi&oacuten?</h5>
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">Ten en cuenta que se perder&aacuten todos los cambios que no hayas guardado.</div>
					<div class="modal-footer">
						<a href="../php/close_session.php"class="btn btn-success">confirmar</a>
						<button class="btn btn-danger" data-dismiss="modal">cancelar</button>
					</div>
				</div>
			</div>
		</div>
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="../">Inicio</a></li>
								<li><a href="../libros/?index=1">Libros</a> </li>
				                <li><a href="../autores/?index=1">Autores</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Buscar" id="texto_busqueda" onfocus="" />
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section>
		<div class="container">
			<div class="row">
				<div class="cuenta">
					<div class="detalles">

						<div class="info usuario clearfix">
							<div class="txt-3">
								<p>Notificaciones</p>
							</div>
							<?php
								require("../php/crypto.php");
								include("../php/conexion.php");
	                            $sql="SELECT * FROM usuarios WHERE Email='".$_SESSION['email']."'";
	                            $consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
	                            $datos=mysqli_fetch_array($consulta);
							?>
							<br>
							<div class="txt-3">
								<p>Libros no entregados</p>
							</div>
							<?php
								include("../php/conn.php");
								include("../php/conexion.php");
								$sql="SELECT * FROM prestamos WHERE Aprobado=1 and Recibido=0 and Alumno=".$_SESSION['id']."  ";
								$consulta=$conn->query($sql) or die("error en la consulta");
	                            if($consulta->num_rows>0){
			                        while($datos = $consulta->fetch_assoc()){
			                        	$sql="SELECT * FROM libros WHERE ID_TEMPORAL='".$datos['Libro']."'";
			                            $consulta1=mysqli_query($conexion,$sql) or die("error en la consulta");
			                            $libro=mysqli_fetch_array($consulta1);
			                            $datos['Libro'] = $libro['Titulo'];
			                        	echo "
			                        	<div class='libro_notify'>
			                        		<label>T&iacute;tulo del libro:  </label>".utf8_encode($datos['Libro'])."
			                        		<br>
			                        		<label>Fecha de pr&eacute;stamo:  </label>".$datos['Fecha_prestamo']."
			                        		<br>
			                        		<label>Fecha de enterga:  </label>".$datos['Fecha_entrega']."
			                        	</div>
			                        	";
			                        }

			                    }else{
			                        echo "No hay libros sin entregar :D, pide uno.";
			                    }
							?>
					
						</div>
						<div class="info socio clearfix">
							<div class="txt-3">
								<p>Pr&eacute;stamos pendientes de aprobaci&oacute;n</p>
							</div>
							<?php
								include("../php/conn.php");
	                            $sql="SELECT * FROM prestamos WHERE Aprobado=0 and Alumno=".$_SESSION['id']."  ";
	                            $consulta=$conn->query($sql) or die("error en la consulta");
	                            if($consulta->num_rows>0){
			                        while($datos = $consulta->fetch_assoc()){
										$sql="SELECT * FROM libros WHERE ID_TEMPORAL='".$datos['Libro']."'";
			                            $consulta1=mysqli_query($conexion,$sql) or die("error en la consulta");
			                            $libro=mysqli_fetch_array($consulta1);
			                            $datos['Libro'] = $libro['Titulo'];
			                        	echo "
			                        	<div class='libro_notify'>
			                        		<label>T&iacute;tulo del libro:  </label>".utf8_encode($datos['Libro'])."
			                        		<br>
			                        		<label>Se necesita la aprobaci&oacute;n del club de lectura  </label>
			                        	</div>
			                        	";
			                        }

			                    }else{
			                        echo "Sin pr&eacute;stamos pendientes";
			                    }
			                    $conexion->close();
							?>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<footer id="footer"><!--Footer-->

		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>LiberLibera</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Ayuda en l&iacute;nea</a></li>
								<li><a href="#">Cont&aacute;ctanos</a></li>
								<li><a href="#">Solicitar un libro</a></li>
								<li><a href="#">Nuestra Ubicaci&oacute;n</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Acerca de liberlibera</h2>
							<form action="#" class="searchform">
								<input type="email" placeholder="Tu direcci&oacute;n de correo electr&oacute;nico" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Recibe notificaciones de libros <br /> y contenido nuevo a tu correo...</p>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright &copy; 2018 LiberLibera. Todos los derechos reservados.</p>
				</div>
			</div>
		</div>

	</footer><!--/Footer-->



    <script src="../js/jquery.js"></script>
	<script src="../js/price-range.js"></script>
    <script src="../js/jquery.scrollUp.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>
