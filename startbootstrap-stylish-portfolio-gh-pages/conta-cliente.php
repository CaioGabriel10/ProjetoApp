<!DOCTYPE html>
<?php 
    include('php/restrito.php');
    include_once('php/relatorioContaCliente.php');
?>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CJR - área do cliente</title>

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
            <li class="sidebar-brand" role="presentation"><a href="./index.html">Home</a></li>
            <li><a href="./area-cliente.php">Área do cliente</a></li>
            <li><a href="./novo-pedido.php">Novo pedido</a></li>
            <li><a href="./conta-cliente.php">Minha conta</a></li>
            <li><a href="./php/restrito.php?out=true">Sair</a></li>
        </ul>
    </nav>
<div class="container">
<div class="bs-example bs-example-tabs" data-example-id="togglable-tabs"> 

    <!-- abas conta cliente-->
     <ul class="nav nav-tabs  " id="myTabs" role="tablist"> 
        <li role="presentation" class="active" ><a href="#home1" id="home-tab1" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><i class="fa fa-home" aria-hidden="true"></i></a></li>
        <li role="presentation" ><a href="#profile1" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile" aria-expanded="false"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>  
    </ul>

    <div class="tab-content" id="myTabContent"> 
        <div class="tab-pane fade active in" role="tabpanel" id="home1" aria-labelledby="home-tab1">
            <!--localizacao na area do cliente-->
            <ol class="breadcrumb">
            <li><a href="#home1" id="home-tab1" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><i class="fa fa-user" aria-hidden="true"></i></a></li>
            <li><a href="area-cliente.php">area-cliente</a></li>
            <li><a href="#">minha conta</a></li>
            </ol>
            <div class="page-header">
                 <h1>Gerencie sua conta<small></small></h1>
            </div>
            <blockquote>
                <p>Bem-vindo,   <strong>
                    <?php 
                        //Exibe o nome do cliente
                        echo $resultado['nome'];
                    ?>                    
                </strong></p>
            </blockquote>
            <!--icons com numero de ponto, etc-->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="jumbotron">
                        <p class=" text-center" >
                             <i class="fa fa-lock fa-5x"></i></span> <span class="badge"><i class="fa fa-check"></i></span>
                       </p>
                       <ul class="list-unstyled">
                          <li class="text-center"> Dados de segurança alterados em    
                              <span class="label label-default ">
                                    <?php
                                        //Converte a data para o formato BR e exibe.
                                        $data = $resultado['ultima_att'];
                                        echo date('d/m/Y H:i', strtotime($data));
                                    ?>
                              </span>
                          <li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="jumbotron">
                        <p class=" text-center">
                            <i class="fa fa-cogs fa-5x"></i></span> <span class="badge"></span>
                        </p>
                       <ul class="list-unstyled">

                          <li class="text-center"> Seu número de Identificação é    
                              <span class="label label-default ">
                                    <?php
                                        //Exibe o id do cliente
                                        echo $id_cliente;
                                    ?>
                              </span>
                          <li>

                          <li class="text-center"> Seu email cadastrado é    
                              <span class="label label-default ">
                                    <?php
                                        //Exibe o id do cliente
                                        echo $resultado['email'];
                                    ?>
                              </span>
                          <li>

                        </ul>
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
        <!-- aba atualizar dados-->
        <div class="tab-pane fade" role="tabpanel" id="profile1" aria-labelledby="profile-tab1"> 
            <ol class="breadcrumb">
            <li><a href="#home1" id="home-tab1" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><i class="fa fa-user" aria-hidden="true"></i></a></li>
            <li><a href="#">minha conta</a></li>
            </ol>
            <div class="page-header">
                <h2>Atualize seus dados </h2>
            </div>
                <form method="POST" action="javascript:atualizarCliente();">
                    <div id="reload" class="form-group col-xs-12  col-sm-12 col-md-8 col-md-offset-2  col-lg-8 col-lg-offset-2">
                       <div class="row">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-unlock-alt fa-1x" aria-hidden="true"></i></div>
                                <input class="form-control" name="senhaA" id="senhaA" type="password" placeholder="Sua Senha Atual" maxlength="16">
                                </div>
                                <br> 
                        </div>
                        <br>
                         <div class="row">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user fa-1x" aria-hidden="true"></i></div>
                                <input class="form-control" name="nome" id="nome" type="text" placeholder="Seu Nome" maxlength="45">
                                </div>
                                <br>    
                        </div>
                        <br>
                        <div class="row">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-unlock-alt fa-1x" aria-hidden="true"></i></div>
                                <input class="form-control" name="senha" id="senha" type="password" placeholder="Nova Senha" maxlength="16">
                                </div>
                                <br>
                        </div>
                        <br>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Atualizar</button>
                        <br>
                        <div class='alert alert-info alert-dismissible ' role='alert'>
                            <div id="textDiv"></div>
                        </div>  
                       
                    </div>
                </form>
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
