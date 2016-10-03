<?php
	ob_start();
	session_start();

	include('conexao.php');
	$conexao= $pdo;
	

	$nome =$_POST['nome'];
	$email =$_POST['email'];
	$senha =$_POST['senha'];
	
//cadastrando
	if($nome!="none" AND !empty($senha) AND !empty($email)){
	$inserirUser= $conexao->prepare("INSERT INTO cliente (`id-cliente`, `nome`, `email`, `senha`)VALUES(NULL,:nome,:email,:senha)");
	$inserirUser->bindValue(":nome",$nome);
	$inserirUser->bindValue(":email",$email);
	$inserirUser->bindValue(":senha",$senha);
	$validar= $conexao->prepare("SELECT * FROM cliente WHERE email=?");
	$validar->execute(array($email));
		if($validar->rowcount() == 0){
			$inserirUser->execute();
			header("Location: ../area-cliente.php");
			$_SESSION['usuarioSession'] = $email;
		}else {
		//montar html para mostrar que errouuu no cadastro
		echo"esse email já foi cadastrado \o/";
		//apagar usuário sessao
		unset($_SESSION['usuarioSession']);
	}
//logando
} else if($nome=="none" AND !empty($email) AND !empty($senha)){
	$validarLOGIN= $conexao->prepare("SELECT * FROM cliente WHERE email=:email AND senha=:senha");
	$validarLOGIN->bindValue(":email",$email);
	$validarLOGIN->bindValue(":senha",$senha);
	$validarLOGIN->execute();
	
	$linha = $validarLOGIN->fetch(PDO::FETCH_ASSOC);
	$Vuser=$linha["email"];
	$Vpass=$linha["senha"];
	$Vid=$linha["id-cliente"];
	
	if($Vuser == $email and $Vpass==$senha){
		if($Vid != 1){
			header("Location: ../area-cliente.php");
			$_SESSION['usuarioSession'] = $Vuser;
		}else{
			//header("Location: ../relatorio-usuario.php");
			//$_SESSION['idSession'] = $Vid;
			echo"caso tenha tela de admin;)";
		}
	}else {
	//montar html para mostrar que errouuu no cadastro
	echo"errouuu!!! email é senha :(";
	//apagar usuário sessao
	unset($_SESSION['usuarioSession']);
}

}else {
	//montar html para mostrar que errouuu no cadastro
	echo"errouuu!!! :(";
	//apagar usuário sessao
	unset($_SESSION['usuarioSession']);
}
?>