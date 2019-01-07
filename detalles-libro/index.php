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
    <title>Detalles del libro | LiberLibera</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/price-range.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/star.css">
	<link href="../css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

	<?php
    	echo '
	    	<script type="text/javascript" charset="utf-8" async defer>
	    		var id="'.$_GET['libro'].'";
	    	</script>'
    ;
    ?>
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script src="js/main.js" type="text/javascript" charset="utf-8" async defer></script>
    <link rel="shortcut icon" href="../images/home/liberlibera.jpg">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/home/liberlibera.jpg">
    <script type="text/javascript">
    	jQuery(document).ready(function($) {
        $("#texto_busqueda").keypress(function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                var txt=$("#texto_busqueda").val();
                window.top.location='../busqueda/?q='+txt;
            }
        });
    		$("#buscar").on("click",function(event) {
    			var txt=$("#texto_busqueda").val();
    			window.top.location='../busqueda/?q='+txt;
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
										if(isset($_SESSION['active'])){
											echo '<a href="../notificaciones/"><i class="fas fa-bell"></i></a>';
										}
									?>
								</li>
								<li>
									<?php
										if(!isset($_SESSION))session_start();
										if(isset($_SESSION['active']))
											echo '<a href="../cuenta/"><i class="fa fa-user"></i> Cuenta</a>';
									?>
								</li>
								<li>
									<?php
										if(!isset($_SESSION))session_start();
										if(isset($_SESSION['active'])){
											echo'<a href="#" data-toggle="modal" data-target="#modalclosesesion"><i class="fa fa-lock"></i> Cerrar Sesi&oacuten</a>';
										}else{
											echo '<a href="../login"><i class="fa fa-lock"></i> Iniciar Sesi&oacuten</a>';
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
		<div class="modal fade" id="pedir_libro">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">¿Desea pedir este libro?</h5>
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body"> el pr&eacute;stamo necesita la aprobaci&oacute;n del club de lectura, una vez aprobado el pr&eacute;stamo tienes 24 horas para poder recogerlo, de lo contrario se cancelar&aacute;.</div>
					<div class="modal-footer">
						<a href="#"class="btn btn-success" id="prestar" data-dismiss="modal">confirmar</a>
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
							<input type="text" placeholder="Buscar" id="#texto_busqueda"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>G&eacute;neros</h2>
						<div class="panel-group category-products" id="accordian"><!--categoria-->
							<?php
                                include("../php/conexion.php");
                                $sql="SELECT * FROM genero ORDER BY Nombre ASC";
                                $consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
                                while($datos=mysqli_fetch_array($consulta)){
                                    echo'
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a href="../libros/?index=1&genero='.utf8_encode($datos["Id_genero"]).'">'.utf8_encode($datos["Nombre"]).'</a></h4>
                                        </div>
                                    </div>
                                    ';
                                }
                            ?>

						</div><!--/Geneross-->

					</div>
				</div>

				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">

							<div id="similar-product" class="carousel slide" data-ride="carousel">

								  <!-- Wrapper for slides -->
								    <div class="portada">
								    	<a href="">
								    		<?php
												include('../php/conexion.php');
												//require("php/image_books.php");
												$id=$_GET['libro'];
												$sql="SELECT Titulo,Autor,Portada FROM libros WHERE ID_TEMPORAL='".$id."'";
												$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
												$titulo=mysqli_fetch_array($consulta);
												//$cautor=conca(utf8_encode($titulo['Autor']));
												//$ctitle=conca(utf8_encode($titulo['Titulo']));
												echo '<img src="../'.$titulo['Portada'].'"  class="books" alt="">';
											?>
								    		</a>

									</div>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/detalles del libro-->

								<p>
									<b>T&iacutetulo:</b>
									<h3>
										<?php
											include('../php/conexion.php');
											$id=$_GET['libro'];
											$sql="SELECT Titulo FROM libros WHERE ID_TEMPORAL='".$id."'";
											$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
											$titulo=mysqli_fetch_array($consulta);
											echo utf8_encode($titulo['Titulo']);
										?>
									</h3>
								</p>

								<p>
									<b>Autor:</b>
									<h3>
										<?php
											include('../php/conexion.php');
											$id=$_GET['libro'];
											$sql="SELECT Autor FROM libros WHERE ID_TEMPORAL='".$id."'";
											$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
											$registro=mysqli_fetch_array($consulta);
                                            $sql="SELECT * FROM autor WHERE Id_autor=".$registro['Autor']."";
                                            $autor=mysqli_query($conexion,$sql);
                                            $datos_autor=mysqli_fetch_array($autor);
                                            $registro['Autor']=$datos_autor['Nombre'];
                                            echo utf8_encode($registro['Autor']);
										?>
									</h3>
								</p>
								<p>
									<b>N&uacutemero de serie:</b>
									<h3><?php
										include('../php/conexion.php');
										$id=$_GET['libro'];
										$sql="SELECT Inventario FROM libros WHERE ID_TEMPORAL='".$id."'";
										$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
										$codigo=mysqli_fetch_array($consulta);
										echo utf8_encode($codigo['Inventario']);
									?></h3>

								</p>
								<p>
									<b>Estado:</b>
									<?php
										include('../php/conexion.php');
										$id=$_GET['libro'];
										$sql="SELECT Ocupado FROM libros WHERE ID_TEMPORAL='".$id."'";
										$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
										$estado=mysqli_fetch_array($consulta);
										if(!$estado['Ocupado']){
											echo"<b class='estado_book'>Disponible</b>";
										}else{
											echo"<b class='ocupado'>Ocupado</b>";
										}
									?>
								</p>
								<p>
									<b>G&eacutenero:</b>
									<h3>
										<?php
											include('../php/conexion.php');
											$id=$_GET['libro'];
											$sql="SELECT Genero FROM libros WHERE ID_TEMPORAL='".$id."'";
											$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
											$genero=mysqli_fetch_array($consulta);
                                            $sql="SELECT * FROM genero WHERE Id_genero='".$genero['Genero']."'";
                                            $consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
                                            $nombre=mysqli_fetch_array($consulta);
                                            echo utf8_encode($nombre['Nombre']);
										?>
									</h3>
								</p>
								<p>
									<b>Editorial:</b>
									<h3>
										<?php
											include('../php/conexion.php');
											$id=$_GET['libro'];
											$sql="SELECT Editorial FROM libros WHERE ID_TEMPORAL='".$id."'";
											$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
											$editorial=mysqli_fetch_array($consulta);
                                            $sql="SELECT * FROM editorial WHERE Id_editorial='".$editorial['Editorial']."'";
											$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
											$nombre=mysqli_fetch_array($consulta);
											echo utf8_encode($nombre['Nombre_editorial']);
										?>
									</h3>
								</p>
								<?php
									include('../php/conexion.php');
									$id=$_GET['libro'];
									$sql="SELECT Ocupado FROM libros WHERE ID_TEMPORAL='".$id."'";
									$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
									$estado=mysqli_fetch_array($consulta);
									if(!$estado['Ocupado'])
										if(isset($_SESSION['type_user'])){
											$sql="SELECT count(*) as Id_prestamo FROM prestamos WHERE Alumno='".$_SESSION['id']."' and Recibido ='0' ";
											$consulta2=mysqli_query($conexion,$sql) or die("error en la consulta");
											$prestamos=mysqli_fetch_assoc($consulta2);
											if($prestamos['Id_prestamo']<=1)
												echo '
												<span>
													<img src="images/product-details/rating.png" alt="" />
													<button type="button" class="btn btn-fefault cart" data-toggle="modal" data-target="#pedir_libro">

														Apartar
													</button>
												</span>';
											else {
												echo '
												<span>Actualmente tienes pendientes el maximo de libros prestados permitido</span>';
											}
										}else{
											echo '
											<span>
											<a href="../login/" class="btn btn-default add-to-cart"><i class=""></i>Debe ser miembro del club de lectura para pedir este libro</a>
											</span>';
										}
									else{
										echo'<span class="badge badge-danger">Este libro esta ocupado</span>';
									}
								?>

								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>

							</div><!--/product-information-->
						</div>
					</div><!--/detalles del libro-->

					<div class="category-tab shop-details-tab"><!--tabla-->
						<div class="col-sm-12"><!--Nav tabla--->
							<ul class="nav nav-tabs">
								<li class="active"><a href="#reviews" data-toggle="tab"><?php
									include('../php/conexion.php');
									$id=$_GET['libro'];
									$sql="SELECT count(*) as Id_comentario FROM comentarios WHERE Id_libro='".$id."'";
									$consulta=mysqli_query($conexion,$sql) or die("error en la consulta");
									$datos=mysqli_fetch_assoc($consulta);
									echo "Comentarios (".$datos['Id_comentario'].")";
								?></a></li>
								<li><a href="#autor-books" data-toggle="tab">Libros del Autor</a></li>
							</ul>
						</div><!--/Nav tabla--->
						<div class="tab-content"> <!--Contenido de la tabla--->

							<div class="tab-pane fade" id="autor-books" ><!--Libros del autor--->
								<?php
									include('../php/conexion.php');
									$id=$_GET['libro'];
									$sql="SELECT Autor FROM libros WHERE ID_TEMPORAL=".$id."";
									$consulta=mysqli_query($conexion,$sql) or die("error en la consulta1").mysql_error();
									$autor=mysqli_fetch_assoc($consulta);
									$sql2 = "SELECT Titulo,ID_TEMPORAL,Portada,Autor FROM libros WHERE Autor='".$autor['Autor']."' LIMIT 0,4";
									$consulta2=mysqli_query($conexion,$sql2) or die("error en la consulta2");
									while($datos=mysqli_fetch_assoc($consulta2)){
										if($id!=$datos['ID_TEMPORAL']){
											$sql3="SELECT Nombre FROM autor WHERE Id_autor=".$datos['Autor']."";
			                                $autorN=mysqli_query($conexion,$sql3);
			                                $datos_autor=mysqli_fetch_array($autorN);
			                                $datos['Autor']=$datos_autor['Nombre'];
											echo '
												<div class="col-sm-3">
													<div class="product-image-wrapper">
														<div class="single-products">
															<div class="productinfo text-center">
																<img src="../'.$datos['Portada'].'" alt="">
																<h2>'.utf8_encode($datos['Autor']).'</h2>
																<p>'.utf8_encode($datos['Titulo']).'</p>
																<a href="../detalles-libro/?libro='.$datos["ID_TEMPORAL"].'" class="btn btn-default add-to-cart"><i class="fas fa-book-open"></i>Ver Libro</a>
															</div>
														</div>
													</div>
												</div>
											';
										}

									}
								?>


							</div><!--/Libros del autor--->


							<div class="tab-pane fade active in " id="reviews" ><!--Reseñas-->
								<div class="col-sm-12">
									<div id="comentarios">


									</div>
									<?php
										if(isset($_SESSION['active'])){
											echo '
											<p><b>Escribe un comentario</b></p>

											<form action="#">
												<textarea  id="texto_comentario"></textarea>
												<b>Calificar:
													<p class="clasificacion no-seleccionable">
												    <input id="radio1" type="radio" name="estrellas" class="stt" value="5"><!--
												    --><label for="radio1">★</label><!--
												    --><input id="radio2" type="radio" name="estrellas" class="stt" value="4"><!--
												    --><label for="radio2">★</label><!--
												    --><input id="radio3" type="radio" name="estrellas" class="stt" value="3"><!--
												    --><label for="radio3">★</label><!--
												    --><input id="radio4" type="radio" name="estrellas" class="stt" value="2"><!--
												    --><label for="radio4">★</label><!--
												    --><input id="radio5" type="radio" name="estrellas" class="stt" value="1"><!--
												    --><label for="radio5">★</label>
												  </p>
												</b>
												<button type="button" id="enviar" class="btn btn-default pull-right">
													Enviar
												</button>
											</form>';
										}else
											echo '
											<p><b>Debes ser miembro del club para comentar.</b></p>';
									?>

								</div>
							</div><!--/Reseñas-->

						</div><!--/Contenido de la tabla--->
					</div><!--/tabla-->

					<div class="recommended_items"><!--Libros recomendados-->
						<h2 class="title text-center">Libros recomendados</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									<!--3 colsm4-->
								</div>
								<div class="item">
									<!--3 colsm4-->
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>
						</div>
					</div><!--/Libros recomendados-->

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
