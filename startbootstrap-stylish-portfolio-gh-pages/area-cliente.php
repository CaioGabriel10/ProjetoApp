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
		<script src="js/script.js"></script>
</head>

<body>

	<div style="display: none;">
		<?php
			//Ele deve rodar o arquivo que conta as linhas para mostrar os pedidos e pontos na HOME, mas ñão deve ser mostrado aqui -- Processamento perdido desnecessariamente
			include('./php/relatorioPedidos.php');
		?>
	</div>
		<!-- Navigation -->
		<a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
		<nav id="sidebar-wrapper">
				<ul class="sidebar-nav">
						<a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>

			            <li class="sidebar-brand" role="presentation"><a href="./index.html">Home</a></li>
			            <li><a href="./area-cliente.php">Área do cliente</a></li>
			            <li role="presentation" ><a href="#profile1" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile" aria-expanded="false">Pedidos</a></li>
						<li role="presentation" ><a href="#pontos" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile" aria-expanded="false">Pontos</a></li>
			            <li><a href="./novo-pedido.php">Novo pedido</a></li>
			            <li><a href="./conta-cliente.php">Minha conta</a></li>
			            <li><a href="./php/restrito.php?out=true">Sair</a></li>
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
						 <li><a href="#">Área do cliente</a></li>
						<li><a href="#">Home</a></li>
						</ol>
						<!--icons com numero de ponto, etc-->
						<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
										<div class="jumbotron">
												<p class=" text-center" >
																<i class="fa fa-trophy fa-5x"></i></span> <span class="badge">
																	<?php
																			$calculoDePontos = $pontos/2;
																			echo "Você possui " . $calculoDePontos . " pontos!";
																	?>
																</span>
												</p>
										</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
										<div class="jumbotron">
												<p class=" text-center">
														<i class="fa fa-pencil fa-5x"></i></span> <span class="badge">
														<?php
																echo "Você realizou " . $pontos . " pedidos!";			
														?>
																		
														</span>
											 </p>
										</div>
								</div>
						</div>
								
						<div class="page-header">
			                <h2>Notícias</h2>
			            </div>
			            <div class="row">
			                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			                        <div class="panel panel-info">
			                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			                                <div class="panel-heading" role="tab" id="headingOne">
			                                    <h4 class="panel-title ">
			                                    
			                                    <strong>Loja Física</strong><span class="label label-default pull-right">14/10/2016</span>
			                                    
			                                    </h4>
			                                </div>
			                            </a>
			                            <div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
			                                <div class="panel-body">
			                                Nosssa nova loja física será inaugurada em 2197, agradeçemos a todos que confiam em nosso trabalho, somente com seu apoio conseguimos dar esse passo para atender melhor suas necessidades. Em breve teremos novas novidades.
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
						 <li><a href="#">Área do cliente</a></li>
						<li><a href="#">Pedidos</a></li>
						</ol>
								
					
						<div class="page-header">
								<h2>Seus pedidos <button class="btn btn-danger btn-xs pull-right"  data-title="Delete" data-toggle="modal" data-target="#delete">Cancelar pedido</button></h2> 
						</div>
						<!--tabela de pedidos-->
						<div id="reload" class="table-responsive">
								<table class="table table-striped">
										<thead>
												<tr>
														<th>#</th>
														<th>Aparelho</th>
														<th>Serviço</th>
														<th>Status</th>
														<th>Última atualização</th>
														<th>Descricao</th>
												</tr>
										</thead>
										<tbody>
												<?php
														include('./php/relatorioPedidos.php');
												?>
										</tbody>
								</table>
						</div>

					<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
						<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
							<h4 class="modal-title custom_align" id="Heading">Deletar pedido </h4>
							</div>
							<div class="modal-body">

							<div class="alert alert-danger" id="textDiv"> Quer mesmo deletar esse pedido?</div>
							
								<div class="row">
									<div class="col-xs-12   col-sm-12   col-md-12  col-lg-12">
											<textarea class="form-control" id="motivo" name="motivo" rows="5" placeholder="descreva o motivo do cancelamento. "></textarea>
									</div>
									<input type="hidden" value="1" name="codcancela" id="codcancela">
								</div>
							</div>
							<div class="modal-footer ">
							<input type="submit" onclick="CancelarPedido()" class="btn btn-danger" id="acao" value="Sim">
							<button type="button" class="btn btn-default" data-dismiss="modal" id="fechar">Cancelar</button>
							</div>
						</div>
						</div>
					</div>
				</div>
						<!--pontos-->
						<div class="tab-pane fade " role="tabpane3" id="pontos" aria-labelledby="home-tab1">
								<ol class="breadcrumb">
								<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
								<li><a href="#">Área do cliente</a></li>
								<li><a href="#">Pontos</a></li>
								</ol>
								<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="jumbotron">
														<p class=" text-center" >
																<i class="fa fa-trophy fa-5x"></i></span> <span class="badge">
																	<?php
																			echo "Você possui " . $calculoDePontos . " pontos!";
																	?>
																</span>
												</p>
												</div>
										</div>
								</div>
								<div class="table-responsive">
										<table class="table table-striped">
												<thead>
														<th>#</th>
														<th>Aparelho</th>
														<th>Serviço</th>
														<th>Status</th>
														<th>Última atualização</th>
														<th>Descricao</th>
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
