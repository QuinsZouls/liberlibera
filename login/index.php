<?php
	@ob_start();
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php
		if(!isset($_SESSION)){
			@ob_start();
			session_start();
		}
	?>
    <meta charset="utf-8">
    <meta name="theme-color" content="#F0F0E9" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Entrar | LiberLibera</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/price-range.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/home/liberlibera.jpg">
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
								<li><a href=""><i class="fa fa-envelope"></i> Clubliberlibera@gmail.com</a></li>
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

					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li>
									<?php
										if(isset($_SESSION['active'])){
											echo '<a href="#"><i class="fa fa-user"></i> Cuenta</a>';
											echo "<script type='text/javascript'>window.top.location='../';</script>";
										}
									?>
								</li>
								<li>
									<?php
										if(isset($_SESSION['active'])){
											echo'<a href="../php/close_session.php"><i class="fa fa-lock"></i> Cerrar Sesi&oacuten</a>';
										}else{
											echo '<a href="../login/"><i class="fa fa-lock"></i> Iniciar Sesi&oacuten</a>';
										}
									?>
								</li>
								<li>
									<?php
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
								<li><a href="../libros/">Libros</a></li>
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

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Inicia sesion con tu cuenta</h2>
						<form action="../php/login.php" method="post" >
							<input type="email" placeholder="Correo Electronico" name="email"  required="true"/>
							<input type="password" name="password" placeholder="contrase&ntilde;a"  required="true">
							<span>
								<input type="checkbox" class="checkbox" name="openss" checked>
								Mantener sesion iniciada
							</span>
							<?php
								if(isset($_GET['error'])){
									echo "<br><span class='text-danger'>Correo o contrase&ntilde;a incorrecta.</span>";
								}
							?>
							<button type="submit" class="btn btn-default">Entrar</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">O</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--registrar form-->
						<h2>Nuevo Usuario</h2>
						<form action="../php/registrar.php" method="post">
							<input type="text" required name="Nombre" placeholder="Nombre"/>
							<input type="text" required name="Apellidos" placeholder="Apeliidos"/>
							<input type="email" required name="Email" placeholder="Email " id="email" />
							<span class="text-danger text-hide" id="txte">El email ingresado ya está en uso.<br></span>
							<label>Fecha de nacimiento</label>
							<input type="date" required name="Nacimiento" placeholder="Fecha de nacimiento">
							<input type="password"  required name="Password" id="pass" placeholder="Contrase&ntilde;a"/>
							<span class="text-danger text-hide" id="txtl">La contrase&ntilde;a debe tener m&iacute;nimo 6 car&aacute;cteres.</span>
							<input type="password" required name="Passwordr" id="pass1" placeholder="Verifique su contrase&ntilde;a"/>
							<span class="text-danger text-hide" id="txtc"> La contrase&ntilde;a no coicide.</span><br>
			              <label>Clave de socio</label>
			              <input type="text" required name="Clave_Socio" placeholder="Clave" id="clave"/>
			              <span class="text-danger text-hide" id="txtcnv"> La clave ingresada no es valida.</span>
			              <span class="text-danger text-hide" id="txtcd"> La clave ingresada ya fu&eacute; usada.</span>
										<button type="submit" class="btn btn-default " id="regis">Registrarse</button>
			              <a class="btn btn-default disabled" id="desa">Registrarse</a>
						</form>
					</div><!--/registrar form-->
				</div>
			</div>
		</div>
	</section><!--/form-->


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
