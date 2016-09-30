<?php
	
	include('conexao.php');
	$conexao= $pdo;
	
	header('Content-type: application/json');
	
	$nome=$_POST['nome'];
	$senha=$_POST['senha'];
	$email=$_POST['email'];
	
		/*
	 * Criação de uma variável que mais tarde irá
	 * guardar o resultado da operação: se foi concluída
	 * com sucesso ou não.
	 */
	$resultado =  array();
	
	

	if(!empty($nome) AND !empty($senha) AND !empty($email)){
	$inserirUser= $conexao->prepare("INSERT INTO cliente (`id-cliente`, `nome`, `email`, `senha`)VALUES(NULL,:nome,:email,:senha)");
	$inserirUser->bindValue(":nome",$nome);
	$inserirUser->bindValue(":email",$email);
	$inserirUser->bindValue(":senha",$senha);
	$validar= $conexao->prepare("SELECT * FROM cliente WHERE email=?");
	$validar->execute(array($email));
		if($validar->rowcount() == 0){
			$inserirUser->execute();
			$resultado['status'] = true;
		}
} else {
	//Caso contrário será falso.
	$resultado['status'] = false;
}


/*
 * Informa que o arquivo vai ser do tipo Json.
 * Assim, o Ajax vai conseguir receber a resposta
 * corretamente.
 */



/*
 * Envio da array $resultado novamente para o lado do cliente
 * em  formato json.
 */
echo json_encode($resultado);
?>