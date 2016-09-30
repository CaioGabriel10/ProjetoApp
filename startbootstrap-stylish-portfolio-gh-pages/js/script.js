function enviarRegisto() {
	
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

	/*
	 * Criação da variável data que vai conter toda a informação
	 * a enviar para o servidor.
	 */
	data = nome + '&' + email + '&' + senha;

	//Começa aqui o pedido ajax
	$.ajax({
		//Tipo do pedido que, neste caso, é POST
        type: 'POST', 
        /*
         * URL do ficheiro que para o qual iremos enviar os dados. 
         * Pode ser um url absoluto ou relativo.
         */
        url: '../php/inserir-conta.php', 
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
			div.textContent = "SHOW,  Registo bem Sucedido!";
			var text = div.textContent;
        } else {
        	//Caso contrário dizemos que aconteceu algum erro.
			var div = document.getElementById("textDiv");
			div.textContent = "NAOOO,  FOI POSSÍVEL CADASTRAAAAAAAA!";
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