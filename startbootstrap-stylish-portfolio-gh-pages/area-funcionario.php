<!DOCTYPE html>
<?php 
	include('php/restrito.php');
	include('php/dboard_relatorio.php');


if(isset($_SESSION['id']) != 1 || !isset($_SESSION['id']) ):
    header("Location: ./area-cliente.php");
endif;

?>
<html lang="pt-BR">

<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>CJR - Área do funcionário</title>

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="css/stylish-portfolio.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
		<script src="js/script.js"></script>

		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	    <script type="text/javascript" src="./js/jquery.js"></script>

	    <script type="text/javascript">
	      google.load('visualization', '1.0', {'packages':['corechart']});
	      google.setOnLoadCallback(function(){
	        var json_text = $.ajax({url: "./php/getDadosGrafico.php", dataType:"json",data:'func=graficoUm',type:'POST', async: false}).responseText;
	        var json = eval("(" + json_text + ")");
	        var dados = new google.visualization.DataTable(json.dados);

	        var chart = new google.visualization.PieChart(document.getElementById('area_grafico'));
	        chart.draw(dados, json.config);
	      });
	    </script>
	    <script type="text/javascript">
	      google.setOnLoadCallback(function(){
	        var json_text = $.ajax({url: "./php/getDadosGrafico.php", dataType:"json",data:'func=graficoDois',type:'POST', async: false}).responseText;
	        var json = eval("(" + json_text + ")");
	        var dados = new google.visualization.DataTable(json.dados);

	        var chart = new google.visualization.ColumnChart(document.getElementById('area_grafico2'));
	        chart.draw(dados, json.config);
	      });
	    </script>
	    <script type="text/javascript">
	      google.setOnLoadCallback(function(){
	        var json_text = $.ajax({url: "./php/getDadosGrafico.php", dataType:"json",data:'func=graficoTres',type:'POST', async: false}).responseText;
	        var json = eval("(" + json_text + ")");
	        var dados = new google.visualization.DataTable(json.dados);

	        var chart = new google.visualization.LineChart(document.getElementById('area_grafico3'));
	        chart.draw(dados, json.config);
	      });
	    </script>
	    <script type="text/javascript">
	      google.setOnLoadCallback(function(){
	        var json_text = $.ajax({url: "./php/getDadosGrafico.php", dataType:"json",data:'func=graficoQuatro',type:'POST', async: false}).responseText;
	        var json = eval("(" + json_text + ")");
	        var dados = new google.visualization.DataTable(json.dados);

	        var chart = new google.visualization.PieChart(document.getElementById('area_grafico4'));
	        chart.draw(dados, json.config);
	      });
	    </script>
	    	    <script type="text/javascript">
	      google.setOnLoadCallback(function(){
	        var json_text = $.ajax({url: "./php/getDadosGrafico.php", dataType:"json",data:'func=graficoCinco',type:'POST', async: false}).responseText;
	        var json = eval("(" + json_text + ")");
	        var dados = new google.visualization.DataTable(json.dados);

	        var chart = new google.visualization.PieChart(document.getElementById('area_grafico5'));
	        chart.draw(dados, json.config);
	      });
	    </script>

</head>

<body>

		<!-- Navigation -->
		<a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
		<nav id="sidebar-wrapper">
				<ul class="sidebar-nav">
						<a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand" role="presentation"><a href="./index.html">Home</a></li>
            <li><a href="./area-cliente.php">Área do cliente</a></li>
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
		</ul>
		<div class="tab-content" id="myTabContent"> 
				<div class="tab-pane fade active in" role="tabpanel" id="home1" aria-labelledby="home-tab1">
						<!--localizacao na area do cliente-->
						<ol class="breadcrumb">
						<li><a href="#home1" id="home-tab1" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><i class="fa fa-user" aria-hidden="true"></i></a></li>
						 <li><a href="./area-funcionario.php">Área do funcionário</a></li>
						<li><a href="#home1">Home</a></li>
						</ol>
						<!--Gráficos de Pizza - 1 grafico de status-->
						<div class="row">
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
										<div class="jumbotron">
											<h4 style="text-align: center;"><strong>Relação dos status dos pedidos:</strong></h4>
											<div id="area_grafico"></div>
										</div>
								</div>
						<!--Gráficos de Pizza - 4 grafico de dispositivos-->
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
										<div class="jumbotron">
											<h4 style="text-align: center;"><strong>Relação dos dispositivos dos pedidos:</strong></h4>
											<div id="area_grafico4"></div>
										</div>
								</div>
						<!--Gráficos de Pizza - 5 grafico de servicos-->
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
										<div class="jumbotron">
											<h4 style="text-align: center;"><strong>Relação dos serviços dos pedidos:</strong></h4>
											<div id="area_grafico5"></div>
										</div>
								</div>
						</div>
						<!--Segundo gráfico - Cliente por mês -->
						<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="jumbotron">
											<h4 style="text-align: center;"><strong>Clientes cadastrados por mês:</strong></h4>
											<div id="area_grafico2"></div>
										</div>
								</div>
						</div>
						<!--Terceiro gráfico - Pedidos por trimestre -->
						<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="jumbotron">
											<h4 style="text-align: center;"><strong>Pedidos realizados por trimestre em 2016:</strong></h4>
											<div id="area_grafico3"></div>
										</div>
								</div>
						</div>
						<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
										<div class="jumbotron">
												<p class=" text-center" >
													<i class="fa fa-comments fa-5x"></i>
											 </p>
											 <p class=" text-center" >
												<span class="badge">
													<?php
													//Exibe pedidos com status ENVIADO
													echo $j;
                                    				?> pedidos esperando respostas!</span>
											 </p>
										</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
										<div class="jumbotron">
											<p class=" text-center">
												<i class="fa fa-archive fa-5x"></i>
											 </p>
											 <p class=" text-center">
												 <span class="badge">pedios cancelados
												 <?php
													//Exibe pedidos com status ENVIADO
													echo $dboard_cancelados;
                                    				?> do total</span>
											 </p>
										</div>
								</div>
						</div>
						<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
										<div class="jumbotron">
											<p class=" text-center" >
														<i class="fa fa-users fa-5x"></i>
											 </p>
											 <p class=" text-center" >
												 <span class="badge">A CJR tem 
												 <?php
													//Exibe pedidos com status ENVIADO
													echo $l;
                                    				?> clientes!!</span>
											 </p>
										</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
										<div class="jumbotron">
												<p class=" text-center">
														<i class="fa fa-newspaper-o fa-5x"></i>
												 </p>
												 <p class=" text-center">
														 <span class="badge">50 e-mail's enviados</span>
												 </p>
										</div>
								</div>
						</div>
						<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
										<div class="jumbotron">
											<p class=" text-center" >
												<i class="fa fa-ban fa-5x"></i>
											 </p>
											 <p class=" text-center" >
												 <span class="badge">4 contas bloqueadas </span>
											 </p>
										</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
										<div class="jumbotron">
											<p class=" text-center">
													<i class="fa fa-pencil fa-5x"></i>
											 </p>
											 <p class=" text-center">
												 <span class="badge">4</span>
											 </p>
										</div>
								</div>
						</div>
								
						
					
				</div> 
				<!-- tela de pedidos-->
				<div class="tab-pane fade" role="tabpanel" id="profile1" aria-labelledby="profile-tab1"> 
						<ol class="breadcrumb">
						<li><a href="#home1" id="home-tab1" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><i class="fa fa-user" aria-hidden="true"></i></a></li>
						 <li><a href="./area-funcionario.php">Área do funcionário</a></li>
						<li><a href="#profile1">Pedidos</a></li>
						</ol>
								
					
						<div class="page-header">
								<h2>Pesquisa de pedidos e clientes</h2>
						</div>
						
						<div class="row">
							<div class="col-xs-8 col-sm-8 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
								<div class='input-group'>
								<input type="text" class="form-control" placeholder="Pesquise por pedidos ou marque ao lado para clientes" name="txtnome" id="txtnome">
								<div class='input-group-addon bg-info'><input type="checkbox" value="1" name="check_cliente"  id="check_cliente"></div>
								</div>
							</div>
							<div class="col-xs-2 col-sm-2 col-md-2  col-lg-2">
								<button type="submit" class="btn btn-info btn-md" name="btnPesquisar"  id="btnPesquisar" onclick="getDados()"><i class="fa fa-search" aria-hidden="true"></i></button>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12  col-lg-12">
								<div class="table-responsive">
									<div id="Resultado">
									</div>
								</div>
							</div>
						</div>
															
					
						<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog modal-lg">

								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Detalhes do pedido: <p id="codigoPedido" name="codigoPedido" class="btn btn-xs btn-info" disabled></p></h4>
										<br>
										<div class='alert alert-info alert-dismissible' role='alert'>
											<div id="textDivUP"></div>
										</div>

									</div>

									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="bs-example bs-example-tabs" data-example-id="togglable-tabs"> 
												<ul class="nav nav-tabs  " id="myTabs" role="tablist"> 
														<li role="presentation" class="active" ><a href="#email" id="email-tab1" role="tab" data-toggle="tab" aria-controls="email" aria-expanded="true"><i class="fa fa-home" aria-hidden="true"></i></a></li>
														<li role="presentation" ><a href="#info" role="tab" id="info-tab1" data-toggle="tab" aria-controls="info" aria-expanded="false"><i class="fa fa-pencil" aria-hidden="true"></i></a></li> 
														<li role="presentation" ><a href="#tstatus" role="tab" id="tstatus-tab1" data-toggle="tab" aria-controls="tstatus" aria-expanded="false"><i class="fa fa-trophy" aria-hidden="true"></i></a></li> 
												</ul>
												<div class="tab-content" id="infopedido"> 
													<div class="tab-pane fade active in" role="tabpanel" id="email" aria-labelledby="email-tab1">
														<form class="form-signin col-xs-12 .col-sm-12 .col-md-9" method="POST" action="javascript:EnviarEmail();">
															<br>
															<label for="email" class="sr-only">E-mail</label>
															<input type="email" id="Eemail" name="Eemail" class="form-control" placeholder="Email" required="">
															<br>
															<label for="senha" class="sr-only">Assunto</label>
															<input type="text" id="Eassunto" name="Eassunto" class="form-control" placeholder="Assunto" required="">
															<br> 
															<label for="conteudo" class="sr-only">conteudo</label>
															 <textarea class="form-control" id="Econteudo" name="Econteudo" rows="7" placeholder="Mensagem" required=""></textarea>															
															<br>
															<button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
														</form>
													</div> 
													<!-- tela de pedidos-->
													<div class="tab-pane fade" role="tabpane2" id="info" aria-labelledby="info-tab1"> 
														<form >
															<div class='form-group '>
																<br>
																<div class='row'>
																	<div class='col-xs-12   col-sm-6   col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2  '>
																		<div class='input-group '>
																			<div class='input-group-addon' >Nome</div>
																			<input class='form-control' id="rnome" name="rnome"  placeholder='nome usuario' readonly>
																		</div>
																		<br><!--necessário por problema de responsabilidade-->
																	</div>
																	<div class='col-xs-12 col-sm-6 col-md-4 col-lg-4 '>
																		<div class='input-group'>
																			<div class='input-group-addon'>Email</div>
																			<input class='form-control' id='remail' name='remail'  placeholder="email do usuario" readonly/>
																		</div>
																		<br>
																	</div>
																</div>
																<div class='row'>
																	<div class='col-xs-12   col-sm-6   col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2  '>
																		<div class='input-group '>
																			<div class='input-group-addon' >Dispositivo</div>
																			<input class='form-control' id='rdispositivo' name='rdispositivo' placeholder='dispositivo usuario' readonly>
																		</div>
																		<br><!--necessário por problema de responsabilidade-->
																	</div>
																	<div class='col-xs-12 col-sm-6 col-md-4 col-lg-4 '>
																		<div class='input-group'>
																			<div class='input-group-addon'>Servico</div>
																			<input class='form-control' id='rservico' name='rservico' placeholder='servico usuario' readonly>
																		</div>
																		<br>
																	</div>
																</div>
																<div class='row'>
																	<div class='col-xs-12   col-sm-6   col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2  '>
																		<div class='input-group '>
																			<div class='input-group-addon' >Status</div>
																			<input class='form-control' id='rstatus' name='rstatus' placeholder='status pedido' readonly>
																		</div>
																		<br><!--necessário por problema de responsabilidade-->
																	</div>
																	<div class='col-xs-12 col-sm-6 col-md-4 col-lg-4 '>
																		<div class='input-group'>
																			<div class='input-group-addon'>Valor</div>
																			<input class='form-control' id='rvalor' name='rvalor' placeholder='valor do pedido' readonly>
																		</div>
																		<br>
																	</div>
																</div>
																<div class='row'>
																	<div class='col-xs-12  col-sm-12    col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2'>
																		<div class='input-group'>
																			<div class='input-group-addon'>descrição</div>
																			<textarea class='form-control' id='rdescricao' name='rdescricao' rows='5' placeholder='descricao pedido' readonly></textarea>
																		</div>
																	</div>
																</div>
															</div>
														</form>
													</div>
													<!--atualizar status-->
													<div class="tab-pane fade " role="tabpane3" id="tstatus" aria-labelledby="tstatus-tab1">
														<form action='javascript:FuncAttPedido();'>
															<div class="form-group ">
																<br>
																<div class="row">
																	<div class="col-xs-12   col-sm-6   col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2  ">
																		<div class="input-group ">
																			<div class="input-group-addon" >status</div>
																			<input class="form-control" id="status" name="status" placeholder="nnn nnnn">
																		</div>
																		<br><!--necessário por problema de responsabilidade-->
																	</div>
																	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ">
																		<div class="input-group">
																			<div class="input-group-addon">valor</div>
																			<input class="form-control" id="valor" name="valor"  placeholder="valor serviço" >
																		</div>
																		<br>
																	</div>
																</div>
																<br>
																<div class="row">
																	<div class="col-xs-12   col-sm-6   col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2  ">
																		<div class="input-group ">
																			<button class="btn btn-md btn-primary btn-block" type="submit">Enviar</button>
																		</div>
																		<br><!--necessário por problema de responsabilidade-->
																	</div>
																</div>
															</div>
														</form>
													</div> 
												</div> 
											</div> 
										</div>
									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal" onclick="document.getElementById('btnPesquisar').click()">fechar</button>
									</div>
								</div>

							</div>
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
