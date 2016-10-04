<!DOCTYPE html>
<?php 
	include('php/restrito.php');
?>
<html lang="pt-BR">

<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>CJR-área cliente</title>

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="css/stylish-portfolio.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

</head>

<body>

		<!-- Navigation -->
		<a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
		<nav id="sidebar-wrapper">
				<ul class="sidebar-nav">
						<a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
						<li class="sidebar-brand" role="presentation">
								<a href="#home1" id="home-tab1" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">home</a>
						</li>
						<li role="presentation" ><a href="#profile1" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile" aria-expanded="false">pedidos</a></li>
						<li role="presentation" ><a href="#pontos" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile" aria-expanded="false">pontos</a></li>
						<li><a href="novo-pedido.php">novo pedido</a></li>
						<li><a href="conta-cliente.php"> minha conta</a></li>
						<li><a href="php/restrito.php?out=true">sair</a></li>
				</ul>
		</nav>
<div class="container">
<div class="bs-example bs-example-tabs" data-example-id="togglable-tabs"> 
		<ul class="nav nav-tabs  " id="myTabs" role="tablist"> 
				<li role="presentation" class="active" ><a href="#home1" id="home-tab1" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><i class="fa fa-home" aria-hidden="true"></i></a></li>
				<li role="presentation" ><a href="#profile1" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile" aria-expanded="false"><i class="fa fa-pencil" aria-hidden="true"></i></a></li> 
				<li role="presentation" ><a href="#pontos" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile" aria-expanded="false"><i class="fa fa-trophy" aria-hidden="true"></i></a></li> 
		</ul>
		<div class="tab-content" id="myTabContent"> 
				<div class="tab-pane fade active in" role="tabpanel" id="home1" aria-labelledby="home-tab1">
						<!--localizacao na area do cliente-->
						<ol class="breadcrumb">
						<li><a href="#home1" id="home-tab1" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><i class="fa fa-user" aria-hidden="true"></i></a></li>
						 <li><a href="#">area-cliente</a></li>
						<li><a href="#">home</a></li>
						</ol>
						<!--icons com numero de ponto, etc-->
						<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
										<div class="jumbotron">
												<p class=" text-center" >
														<i class="fa fa-trophy fa-5x"></i></span> <span class="badge">4 pontos</span>
											 </p>
										</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
										<div class="jumbotron">
												<p class=" text-center">
														<i class="fa fa-pencil fa-5x"></i></span> <span class="badge">4</span>
											 </p>
										</div>
								</div>
						</div>
								
						<div class="page-header">
								<h2>Notícias<small> nnnnnnn n</small></h2>
							<?php 
								 //msg de teste 
								echo  $_SESSION['usuarioSession'];

								echo $_COOKIE["cookie_pass"];
								$la=$_COOKIE["cookie_user"];
								echo $la;
							?>
						</div>
						<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
												<div class="panel panel-info">
														<div class="panel-heading bg-danger" role="tab" id="headingOne">
																<h4 class="panel-title ">
																<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
																<strong>noticia</strong> um <span class="label label-default pull-right">2016/03/02</span>
																</a>
																</h4>
														</div>
														<div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
																<div class="panel-body">
																Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
																</div>
														</div>
												</div>

												<div class="panel panel-default">
														<div class="panel-heading" role="tab" id="headingThree">
																<h4 class="panel-title">
																<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
																<strong>noticia</strong> tres <span class="label label-default pull-right">2016/03/02</span>
																</a>
																</h4>
														</div>
														<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
																<div class="panel-body">
																Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div> 
				<!-- tela de pedidos-->
				<div class="tab-pane fade" role="tabpanel" id="profile1" aria-labelledby="profile-tab1"> 
						<ol class="breadcrumb">
						<li><a href="#home1" id="home-tab1" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><i class="fa fa-user" aria-hidden="true"></i></a></li>
						 <li><a href="#">area-cliente</a></li>
						<li><a href="#">pedidos</a></li>
						</ol>
								
					
						<div class="page-header">
								<h2>Seus pedidos</h2>
						</div>
						<!--tabela de pedidos-->
						<div class="table-responsive">
								<table class="table table-striped">
										<thead>
												<tr>
														<th>Aparelho</th>
														<th>Serviço</th>
														<th>Descrição</th>
												</tr>
										</thead>
										<tbody>
												<?php
														include('./php/relatorioPedidos.php');
												?>
										</tbody>
								</table>
						</div>
				</div>
						<!--pontos-->
						<div class="tab-pane fade " role="tabpane3" id="pontos" aria-labelledby="home-tab1">
								<ol class="breadcrumb">
								<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
								<li><a href="#">area-cliente</a></li>
								<li><a href="#">pontos</a></li>
								</ol>
								<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="jumbotron">
														<p class=" text-center" >
																<i class="fa fa-trophy fa-5x"></i></span> <span class="badge">
																	<?php
																			echo "Você possui " . $pontos . " pontos!";
																	?>
																</span>
												</p>
												</div>
										</div>
								</div>
								<div class="table-responsive">
										<table class="table table-striped">
												<thead>
														<tr>
															<th>Aparelho</th>
															<th>Serviço</th>
															<th>Descrição</th>
														</tr>
												</thead>
												<tbody>
												<?php
														include('./php/relatorioPedidos.php');
												?>
												</tbody>
										</table>
								</div>
					 </div> 
				</div> 
		</div> 
</div>


	


		<!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Custom Theme JavaScript -->
		<script>
		// Closes the sidebar menu
		$("#menu-close").click(function(e) {
				e.preventDefault();
				$("#sidebar-wrapper").toggleClass("active");
		});
		// Opens the sidebar menu
		$("#menu-toggle").click(function(e) {
				e.preventDefault();
				$("#sidebar-wrapper").toggleClass("active");
		});
		// Scrolls to the selected menu item on the page
		$(function() {
				$('a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])').click(function() {
						if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
								var target = $(this.hash);
								target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
								if (target.length) {
										$('html,body').animate({
												scrollTop: target.offset().top
										}, 1000);
										return false;
								}
						}
				});
		});
		//#to-top button appears after scrolling
		var fixed = false;
		$(document).scroll(function() {
				if ($(this).scrollTop() > 250) {
						if (!fixed) {
								fixed = true;
								// $('#to-top').css({position:'fixed', display:'block'});
								$('#to-top').show("slow", function() {
										$('#to-top').css({
												position: 'fixed',
												display: 'block'
										});
								});
						}
				} else {
						if (fixed) {
								fixed = false;
								$('#to-top').hide("slow", function() {
										$('#to-top').css({
												display: 'none'
										});
								});
						}
				}
		});
		// Disable Google Maps scrolling
		// See http://stackoverflow.com/a/25904582/1607849
		// Disable scroll zooming and bind back the click event
		var onMapMouseleaveHandler = function(event) {
				var that = $(this);
				that.on('click', onMapClickHandler);
				that.off('mouseleave', onMapMouseleaveHandler);
				that.find('iframe').css("pointer-events", "none");
		}
		var onMapClickHandler = function(event) {
						var that = $(this);
						// Disable the click handler until the user leaves the map area
						that.off('click', onMapClickHandler);
						// Enable scrolling zoom
						that.find('iframe').css("pointer-events", "auto");
						// Handle the mouse leave event
						that.on('mouseleave', onMapMouseleaveHandler);
				}
				// Enable map zooming with mouse scroll when the user clicks the map
		$('.map').on('click', onMapClickHandler);
		</script>

</body>

</html>
