function CancelarPedido() {
	
	/*
	 * Obtenção dos dados do formulário e colocação dos mesmos
	 * no formato nomeDaInfo=Info para enviar por POST.
	 *
	 * Utiliza-se a função val() para obter os valores
	 * dos inputs com os id's em questão.
	 */
	var selected = new Array();
	$("input:radio[id=cancelar]:checked").each(function() {
       selected.push($(this).val());
  });
	/*if( $('#cancelar').is(':checked') ){
		cancelar = 'cancelar=' + $('#cancelar').val();
	}else{
		cancelar = 'cancelar=' + $('#cancelar').val('0');
	}*/	
	cancelar = 'cancelar=' + selected;
	motivo = 'motivo=' + $('#motivo').val();
	cod = 'codcancela=' + $('#codcancela').val();

	
	
	/*
	 * Criação da variável data que vai conter toda a informação
	 * a enviar para o servidor.
	 */
	data = motivo  + '&' + cod + '&' + cancelar;

	//Começa aqui o pedido ajax
	$.ajax({
		//Tipo do pedido que, neste caso, é POST
        type: 'POST', 
        /*
         * URL do ficheiro que para o qual iremos enviar os dados. 
         * Pode ser um url absoluto ou relativo.
         */
        url: 'php/pedido.php', 
        //Que dados vamos enviar? A variável "data"
        data: data,
        //O tipo da informação da resposta
        dataType: 'json'
    }).done(function(response) {

    	/* 
    	 * Quando a chamada Ajax é terminada com sucesso,
    	 * o javascript confirma o status da operação
    	 * com a variável que enviámos no formato json.
    	 */
        if(response.status == 1) {
        	//Se for positivo, mostra ao utilizador uma janela de sucesso.
			var div = document.getElementById("textDiv");
			div.textContent = "pedido cancelado";
			var text = div.textContent;

			//mudar nome de campo
			var div = document.getElementById("fechar");
			div.textContent = "sair";
			var text = div.textContent;
			//esconder botao
			document.getElementById('acao').type = 'hidden';

			//voltar botoes
			setTimeout(function(){				
				var div = document.getElementById("fechar");
				div.textContent = "cancelar";
				var text = div.textContent;

				var div = document.getElementById("textDiv");
				div.textContent = "Quer mesmo deletar esse pedido?";
				var text = div.textContent;
				//esconder botao
				document.getElementById('acao').type = 'button';
			},10000)

			//recarregar a div da tabela
			$("#reload").load("area-cliente.php #reload");
			//limpar campo
			document.getElementById('motivo').value='';
			document.getElementById('cancelar').checked = false;
			setTimeout(function(){
				var div = document.getElementById("textDiv");
				div.textContent = "clique sair dessa ação para fechar essa tela";
				var text = div.textContent;
				
			},5000)
        } else {
        	//Caso contrário dizemos que aconteceu algum erro.
			var div = document.getElementById("textDiv");
			div.textContent = "erro ao tentar cancelar o pedido";
			var text = div.textContent;
        }

    }).fail(function(xhr, desc, err) {
    	/*
    	 * Caso haja algum erro na chamada Ajax,
    	 * o utilizador é alertado e serão enviados detalhes
    	 * para a consola javascript que pode ser visualizada 
    	 * através das ferramentas de desenvolvedor do browser.
    	 */
		var div = document.getElementById("textDiv");
		div.textContent = "Uups! Ocorreu algum erro! NO CÓDIGO!";
		var text = div.textContent;
		
        console.log(xhr);
        console.log("Detalhes: " + desc + "\nErro:" + err);
    });
}
function enviarRegisto() {
	
	/*
	 * Obtenção dos dados do formulário e colocação dos mesmos
	 * no formato nomeDaInfo=Info para enviar por POST.
	 *
	 * Utiliza-se a função val() para obter os valores
	 * dos inputs com os id's em questão.
	 */

	aparelho = 'aparelho=' + $('#aparelho').val();
	servico = 'servico=' + $('#servico').val();
	descricao = 'descricao=' + $('#descricao').val();

	/*
	 * Criação da variável data que vai conter toda a informação
	 * a enviar para o servidor.
	 */
	data = aparelho + '&' + servico + '&' + descricao;

	//Começa aqui o pedido ajax
	$.ajax({
		//Tipo do pedido que, neste caso, é POST
        type: 'POST', 
        /*
         * URL do ficheiro que para o qual iremos enviar os dados. 
         * Pode ser um url absoluto ou relativo.
         */
        url: 'php/pedido.php', 
        //Que dados vamos enviar? A variável "data"
        data: data,
        //O tipo da informação da resposta
        dataType: 'json'
    }).done(function(response) {

    	/* 
    	 * Quando a chamada Ajax é terminada com sucesso,
    	 * o javascript confirma o status da operação
    	 * com a variável que enviámos no formato json.
    	 */
        if(response.status == true) {
        	//Se for positivo, mostra ao utilizador uma janela de sucesso.
			var div = document.getElementById("textDiv");
			div.textContent = "pedido enviado para nossa equipe.";
			var text = div.textContent;
        } else {
        	//Caso contrário dizemos que aconteceu algum erro.
			var div = document.getElementById("textDiv");
			div.textContent = "todos são obrigatorios!";
			var text = div.textContent;
        }

    }).fail(function(xhr, desc, err) {
    	/*
    	 * Caso haja algum erro na chamada Ajax,
    	 * o utilizador é alertado e serão enviados detalhes
    	 * para a consola javascript que pode ser visualizada 
    	 * através das ferramentas de desenvolvedor do browser.
    	 */
		var div = document.getElementById("textDiv");
		div.textContent = "Uups! Ocorreu algum erro! NO CÓDIGO!";
		var text = div.textContent;
		
        console.log(xhr);
        console.log("Detalhes: " + desc + "\nErro:" + err);
    });
}

function cadastro() {
	
	/*
	 * Obtenção dos dados do formulário e colocação dos mesmos
	 * no formato nomeDaInfo=Info para enviar por POST.
	 *
	 * Utiliza-se a função val() para obter os valores
	 * dos inputs com os id's em questão.
	 */

	nome = 'nome=' + $('#nome').val();
	email = 'email=' + $('#email').val();
	senha = 'senha=' + $('#senha').val();

	Lnome = 'Lnome=' + $('#Lnome').val();
	Lemail = 'Lemail=' + $('#Lemail').val();
	Lsenha = 'Lsenha=' + $('#Lsenha').val();
	
	if( $('#Mlogado').is(':checked') ){
		Mlogado = 'Mlogado=' + $('#Mlogado').val();
	}else{
		Mlogado = 'Mlogado=' + $('#Mlogado').val('0');
	}
	/*	
	 * Criação da variável data que vai conter toda a informação
	 * a enviar para o servidor.
	 */
	data = nome + '&' + email + '&' + senha + '&' + Lnome + '&' + Lemail + '&' + Lsenha + '&' + Mlogado;

	//Começa aqui o pedido ajax
	$.ajax({
		//Tipo do pedido que, neste caso, é POST
        type: 'POST', 
        /*
         * URL do ficheiro que para o qual iremos enviar os dados. 
         * Pode ser um url absoluto ou relativo.
         */
        url: 'php/inserir-conta.php', 
        //Que dados vamos enviar? A variável "data"
        data: data,
        //O tipo da informação da resposta
        dataType: 'json'
    }).done(function(response) {

    	/* 
    	 * Quando a chamada Ajax é terminada com sucesso,
    	 * o javascript confirma o status da operação
    	 * com a variável que enviámos no formato json.
    	 */
        if(response.status == 1) {
        	//Se for positivo, mostra ao utilizador uma janela de sucesso.
			var div = document.getElementById("textDiv");
			div.textContent = "esse email já foi cadastrado \o/";
			var text = div.textContent;
        } else if (response.status == 2){
        	//Caso contrário dizemos que aconteceu algum erro.
			var div = document.getElementById("textDivLogin");
			div.textContent = "dados não combinam !!";
			var text = div.textContent;
			
        } else if (response.status == 3){
			location.reload();
		} else if (response.status == 4){
			var div = document.getElementById("textDiv");
			div.textContent = "Errouuu...";
			var text = div.textContent;
		}

    }).fail(function(xhr, desc, err) {
    	/*
    	 * Caso haja algum erro na chamada Ajax,
    	 * o utilizador é alertado e serão enviados detalhes
    	 * para a consola javascript que pode ser visualizada 
    	 * através das ferramentas de desenvolvedor do browser.
		 * 
		var div = document.getElementById("textDiv");
		div.textContent = "Uups! Ocorreu algum erro! NO CÓDIGO!";
		var text = div.textContent;
		 */
		location.reload();
		
        console.log(xhr);
        console.log("Detalhes: " + desc + "\nErro:" + err);
    });
}

function atualizarCliente() {
	
	/*
	 * Obtenção dos dados do formulário e colocação dos mesmos
	 * no formato nomeDaInfo=Info para enviar por POST.
	 *
	 * Utiliza-se a função val() para obter os valores
	 * dos inputs com os id's em questão.
	 */

	nome = 'nome=' + $('#nome').val();
	senhaA = 'senhaA=' + $('#senhaA').val();
	senha = 'senha=' + $('#senha').val();

	/*
	 * Criação da variável data que vai conter toda a informação
	 * a enviar para o servidor.
	 */
	data = nome + '&' + senhaA + '&' + senha;

	//Começa aqui o pedido ajax
	$.ajax({
		//Tipo do pedido que, neste caso, é POST
				type: 'POST', 
				/*
				 * URL do ficheiro que para o qual iremos enviar os dados. 
				 * Pode ser um url absoluto ou relativo.
				 */
				url: 'php/atualizarConta.php', 
				//Que dados vamos enviar? A variável "data"
				data: data,
				//O tipo da informação da resposta
				dataType: 'json'
		}).done(function(response) {

			/* 
			 * Quando a chamada Ajax é terminada com sucesso,
			 * o javascript confirma o status da operação
			 * com a variável que enviámos no formato json.
			 */
				if(response.status == 1) {
			var div = document.getElementById("textDiv");
			div.textContent = "ATUALIZADO COM SUCESSO!";
			var text = div.textContent;
				} else if(response.status == 2){
			var div = document.getElementById("textDiv");
			div.textContent = "SUA SENHA ATUAL ESTA ERRADA, TENTE NOVAMENTE!";
			var text = div.textContent;
				} else {
			var div = document.getElementById("textDiv");
			div.textContent = "TODOS OS CAMPOS SÃO OBRIGATORIOS!";
			var text = div.textContent;
		}

		}).fail(function(xhr, desc, err) {
			/*
			 * Caso haja algum erro na chamada Ajax,
			 * o utilizador é alertado e serão enviados detalhes
			 * para a consola javascript que pode ser visualizada 
			 * através das ferramentas de desenvolvedor do browser.
			 */
		var div = document.getElementById("textDiv");
		div.textContent = "Uups! Ocorreu algum erro! NO CÓDIGO!";
		var text = div.textContent;
		
				console.log(xhr);
				console.log("Detalhes: " + desc + "\nErro:" + err);
		});
}
/**
  * Função para criar um objeto XMLHTTPRequest
  */
 function CriaRequest() {
     try{
         request = new XMLHttpRequest();        
     }catch (IEAtual){
         
         try{
             request = new ActiveXObject("Msxml2.XMLHTTP");       
         }catch(IEAntigo){
         
             try{
                 request = new ActiveXObject("Microsoft.XMLHTTP");          
             }catch(falha){
                 request = false;
             }
         }
     }
     
     if (!request) 
         alert("Seu Navegador não suporta Ajax!");
     else
         return request;
 }
 
 /**
  * Função para enviar os dados
  */
 function getDados() {
     
     // Declaração de Variáveis
     var nome   = document.getElementById("txtnome").value; 
     var result = document.getElementById("Resultado");
     var xmlreq = CriaRequest();
     
	 //alert("Entrou!"+nome+""+opcaoNada+""+opcaoNome+""+opcaoCargo);
	 
     // Exibi a imagem de progresso
     //result.innerHTML = '<img src="Progresso1.gif"/>';
     
     // Iniciar uma requisição
	 
     xmlreq.open("GET", "php/relatorio-func.php?txtnome=" + nome, true);
	     
     // Atribui uma função para ser executada sempre que houver uma mudança de ado
     xmlreq.onreadystatechange = function(){
         
         // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
         if (xmlreq.readyState == 4) {
             
             // Verifica se o arquivo foi encontrado com sucesso
             if (xmlreq.status == 200) {
                 result.innerHTML = xmlreq.responseText;
             }else{
                 result.innerHTML = "Erro: " + xmlreq.statusText;
             }
         }
     };
     xmlreq.send(null);
 }