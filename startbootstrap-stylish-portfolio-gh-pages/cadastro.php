<!DOCTYPE html>
<?php
ob_start();
session_start();

if(isset($_COOKIE['cookie_user']) AND isset($_COOKIE['cookie_pass'])){
	header("Location: novo-pedido.php");

}else if(isset($_SESSION['usuarioSession'])){

	header("Location: novo-pedido.php");

}else{	
	unset($_SESSION["usuarioSession"]);
	session_destroy();
}
//msg de teste 
//var_dump($_COOKIE);
?>
<html lang="pt-br">

<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Manutencao de computadores, smartphones, notebooks e tablets.">
		<meta name="author" content="CJR">

		<title>CJR</title>

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

		<!-- Navigation -->
		<a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
		<nav id="sidebar-wrapper">
				<ul class="sidebar-nav">
						<a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
						<li class="sidebar-brand">
								<a href="#index.html" onclick=$("#menu-close").click();>CJR</a>
						</li>
						<li>
								<a href="index.html" onclick=$("#menu-close").click();>Serviços</a>
						</li>
						<li>
								<a href="index.html" onclick=$("#menu-close").click();>Sobre</a>
						</li>
						<li>
								<a href="cadastro.html" onclick=$("#menu-close").click();>Fidelidade</a>
						</li>
						<li>
								<a href="cadastro.html" onclick=$("#menu-close").click();>Minha Conta</a>
						</li>
				</ul>
		</nav>

	<!-- Cadastro -->
	<div class="container">

		<br> <br>
			<div class="row">
				<div class="col-xs-12  col-sm-12 col-md-8 col-md-offset-2  col-lg-8 col-lg-offset-2 ">
					<form class="form-signin" method="POST" action="javascript:cadastro();">

						<h2 class="form-signin-heading">Cadastre-se para continuar:</h2>
						<br>
						<label for="nome" class="sr-only">Nome</label>
						<input type="name"  id="nome" name="nome" class="form-control" placeholder="Nome" required="" autofocus="" maxlength="45">
						<br>
						<label for="email" class="sr-only">Email</label>
						<input type="email"  id="email" name="email"class="form-control" placeholder="Email" required="" maxlength="45">
						<br>
						<label for="senha" class="sr-only">Senha</label>
						<input type="password"  id="senha" name="senha"class="form-control" placeholder="Senha" required="" maxlength="16">
						<br>
						<button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
						<br>
					</form>
					<div class='alert alert-info alert-dismissible ' role='alert'>
						<div id="textDiv"></div>
					</div>	
				</div>
			</div>
		</div>

		<br> <br> 

		<!-- PopUp do login -->
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Entre em sua conta:</h4>
					</div>

					<form class="form-signin col-xs-12 .col-sm-12 .col-md-9" method="POST" action="php/inserir-conta.php">
						<br>
						<label for="email" class="sr-only">Email</label>
						<input type="email" id="Lemail" name="Lemail" class="form-control" placeholder="Email" required="" maxlength="45">
						<br>
						<label for="senha" class="sr-only">Senha</label>
						<input type="password" id="Lsenha" name="Lsenha" class="form-control" placeholder="Senha" required="" maxlength="16">
						<br> 
						<div class="checkbox">
							<label>
							<input type="checkbox" id="Mlogado" name="Mlogado" value="1"> Continuar conectado
							</label>
						</div>
						<br>
						<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
						
						<br>
						<input type="hidden" id="Lnome" name="Lnome" value="none">

						<div class='alert alert-info alert-dismissible ' role='alert'>
							<div id="textDivLogin"></div>
						</div>
					</form>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
					</div>
				</div>

			</div>
		</div>
		
		<!-- Footer -->
		<footer>
				<div class="container">
						<div class="row">
								<div class="col-lg-10 col-lg-offset-1 text-center">
									<!-- Botão que abre o login -->
									<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">Já foi cadastrado?</button>
								</div>
						</div>
				</div>
				<a id="to-top" href="#top" class="btn btn-dark btn-lg"><i class="fa fa-chevron-up fa-fw fa-1x"></i></a>
		</footer>

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
		</script>

</body>

</html>
