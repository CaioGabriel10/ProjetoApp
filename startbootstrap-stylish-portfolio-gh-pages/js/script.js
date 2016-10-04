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
	Mlogado = 'Mlogado=' + $('#Mlogado').val();

	/*
	var manter_logado = document.getElementsByName('#Mlogado');
	if( manter_logado.checked ){
		Mlogado = 'Mlogado=' + $('#Mlogado').val();
	}else{
		Mlogado = 'Mlogado=' + $('#Mlogado').val('0');
	}
	
	
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