<?php
	
		@ob_start();
		session_start();
	
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		
		<meta charset="utf-8">
		<meta name="theme-color" content="#F0F0E9" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Liber Libera</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<link rel="shortcut icon" href="images/home/liberlibera.jpg">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/home/liberlibera.jpg">
		<script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
			$("#texto_busqueda").keypress(function(event){
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){
			var txt=$("#texto_busqueda").val();
			window.top.location='busqueda/?q='+txt;
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
							<a href="#"><img src="images/logocecyte.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li>
									<?php
										if(isset($_SESSION['active'])){
											echo '<a href="notificaciones/"><i class="fas fa-bell"></i></a>';
										}
									?>
								</li>
								<li>
									<?php
										if(isset($_SESSION['active'])){
											echo '<a href="cuenta/"><i class="fa fa-user"></i> Cuenta</a>';
										}
									?>
								</li>
								<li>
									<?php
										if(isset($_SESSION['active'])){
											echo'<a href="#" data-toggle="modal" data-target="#modalclosesesion"><i class="fa fa-lock" ></i> Cerrar Sesi&oacuten</a>';
										}else{
											echo '<a href="login/"><i class="fa fa-lock"></i> Iniciar Sesi&oacuten</a>';
										}
									?>
								</li>
								<li>
									<?php
										if(isset($_SESSION['type_user'])){
											if($_SESSION['type_user']=='1')
												echo'<a href="panel/"><i class="fas fa-address-card"></i>Administrador</a>';
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
							<a href="php/close_session.php"class="btn btn-success">confirmar</a>
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
								<li><a href="libros/?index=1">Libros</a> </li>
								<li><a href="autores/?index=1">Autores</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Buscar" id="texto_busqueda"/>
						</div>
					</div>
				</div>
			</div>
			</div><!--/header-bottom-->
			</header><!--/header-->
			<section id="slider"><!--slider-->
			<div class="container fondo">
				<div class="row">
					<div class="col-sm-12">
						<div id="slider-carousel" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
								<li data-target="#slider-carousel" data-slide-to="1"></li>
								<li data-target="#slider-carousel" data-slide-to="2"></li>
							</ol>
							<div class="carousel-inner"> <!--Contenido tipo 1-->
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>LiberLibera</span> Club de lectura</h1>
									<p>
										Es un espacio con una colecci&oacute;n de libros de diferentes g&eacute;neros literarios: suspenso, novela, prensamiento cr&iacute;tico, informativo, terror , pol&iacute;tica,etc.
									</p>
									<p>Todos son bienvenidos: estudiantes, docentes, personal del plantel y familiares, tanto de docentes como alumnos.</p>
								</div>
								<div class="col-sm-6">
									<img src="images/home/liberlibera.jpg" class="book img-responsive" alt=""  />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Liber</span>-Libera</h1>
									<h2>¿C&oacute;mo unirme?</h2>
									<p>
										Para ingresar al club lo que necesitas es donar un libro, ya que as&iacute; es como se forma nuestra colecci&oacute;n de libros.
									</p>
									<p>¡Pregunta por la lista de donaciones pendientes!</p>
								</div>
								<div class="col-sm-6">
									<img src="images/home/estante.jpg" class="book img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6" >
									<h2>¿Qu&eacute; beneficios obtengo al pertenecer al club?</h2>
									<p>
										&times;-Pedir prestado cualquier libro de la colecci&oacute;n hasta por 30 d&iacute;as
									</p>
									<p>&times;-Sugerir un libro de tu agrado para que se pueda donar o comprar.</p>
									<p>&times;-Leer en la sala del club em tus horas libres.</p>
									<p>&times;-Recibir asesor&iacute;a seg&uacute;n tu propia carrera de lectura&#40; principiante, intermedio, experto&#41; para la selecci&oacute;n de tu pr&oacute;ximo libro</p>
								</div>
								<div class="col-sm-6">
									<img src="images/home/libros.jpg" class="book img-responsive" alt="" />
								</div>
							</div>
						</div>
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		</section><!--/slider-->
		<section>
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="left-sidebar">
							<h2>G&eacute;neros</h2>
							<div class="panel-group category-products" id="accordian"><!--categoria-->
							<?php
							include("php/conexion.php");
							$sql="SELECT * FROM genero ORDER BY Nombre ASC";
							$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
							while($datos=mysqli_fetch_array($consulta)){
							echo'
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="libros/?index=1&genero='.utf8_encode($datos["Id_genero"]).'">'.utf8_encode($datos["Nombre"]).'</a></h4>
								</div>
							</div>
							';
							}
							?>
							</div><!--/Geneross-->
							
						</div>
					</div>
					<div class="col-sm-9 padding-right">
						<div class="features_items" id="result"><!--features_items-->
						<h2 class="title text-center">Libros Populares</h2>
						<?php
						include("php/conexion.php");
						$sql="SELECT * FROM libros WHERE Popularidad=1  Limit 1,6";
							$consulta=mysqli_query($conexion,$sql) or die ("consulta muerta").mysqli_error();
						while($registro=mysqli_fetch_array($consulta)){
						$sql="SELECT * FROM autor WHERE Id_autor=".$registro['Autor']."";
						$autor=mysqli_query($conexion,$sql);
						$datos_autor=mysqli_fetch_array($autor);
						$registro['Autor']=$datos_autor['Nombre'];
						echo '
									<div class="col-sm-4">
											<div class="product-image-wrapper" style="height:600px!important;"  data-id="'.$registro['ID_TEMPORAL'].'" data-cover="'.$registro['Portada'].'">
													<div class="single-products">
															<div class="productinfo text-center">
																	<img ross-origin="anonymous" src="'.$registro['Portada'].'" class="books" id="'.$registro['ID_TEMPORAL'].'" />
																	<h2>'.utf8_encode($registro['Autor']).'</h2>
																	<p>'.utf8_encode($registro['Titulo']).'</p>
																	<a href="detalles-libro/?libro='.$registro["ID_TEMPORAL"].'" class="btn btn-default add-to-cart"><i class="fas fa-book-open"></i>Ver Libro</a>
															</div>
															
													</div>
										';
										if(isset($_SESSION['type_user'])){
											if($_SESSION['type_user']==1){
												echo '
													<div class="choose">
															<ul class="nav nav-pills nav-justified">
																	<li><a href=""><i class="fas fa-pencil-alt"></i>Editar libro</a></li>
															</ul>
													</div>';
											}
										}
										echo '
											</div>
									</div>';
						}
						?>
						<!-- Producto   -->
						<!--fin del producto-->
						</div><!--features_items-->
						<div class="category-tab"><!--category-tab-->
						</div><!--/category-tab-->
						<div class="recommended_items"><!--Libros recomendados-->
						<h2 class="title text-center">Libros Recomendados</h2>
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									<!--3 itams -->
								</div>
								<div class="item">
									<!--3 item-->
								</div>
							</div>
							<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							</a>
							<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							</a>
						</div>
						</div><!--/recommended_items-->
						<div class="features_items" ><!--features_items-->
						<h2 class="title text-center">Libros Nuevos</h2>
						<?php
						include("php/conexion.php");
						$sql="SELECT * FROM libros  ORDER BY Fecha_alta DESC Limit 1,6 ";
							$consulta=mysqli_query($conexion,$sql) or die ("consulta muerta").mysqli_error();
						while($registro=mysqli_fetch_array($consulta)){
						$sql="SELECT * FROM autor WHERE Id_autor=".$registro['Autor']."";
						$autor=mysqli_query($conexion,$sql);
						$datos_autor=mysqli_fetch_array($autor);
						$registro['Autor']=$datos_autor['Nombre'];
						echo '
									<div class="col-sm-4">
											<div class="product-image-wrapper" style="height:600px!important;"  data-id="'.$registro['ID_TEMPORAL'].'" data-cover="'.$registro['Portada'].'">
													<div class="single-products">
															<div class="productinfo text-center">
																	<img ross-origin="anonymous" data-adaptive-background src="'.$registro['Portada'].'" class="books" id="'.$registro['ID_TEMPORAL'].'" />
																	<h2>'.utf8_encode($registro['Autor']).'</h2>
																	<p>'.utf8_encode($registro['Titulo']).'</p>
																	<a href="detalles-libro/?libro='.$registro["ID_TEMPORAL"].'" class="btn btn-default add-to-cart"><i class="fas fa-book-open"></i>Ver Libro</a>
															</div>
															<img src="images/home/new.png" class="new" alt="">
													</div>
										';
										if(isset($_SESSION['type_user'])){
											if($_SESSION['type_user']==1){
												echo '
													<div class="choose">
															<ul class="nav nav-pills nav-justified">
																	<li><a href=""><i class="fas fa-pencil-alt"></i>Editar libro</a></li>
															</ul>
													</div>';
											}
										}
										echo '
											</div>
									</div>';
						}
						?>
						<!-- Producto   -->
						<!--fin del producto-->
						</div><!--features_items-->
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
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.scrollUp.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>