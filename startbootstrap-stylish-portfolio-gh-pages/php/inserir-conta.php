<?php
	ob_start();
	session_start();

	include('conexao.php');
	$conexao= $pdo;
	
	$resultado =  array();

// dados cadastro
	$nome =$_POST['nome'];
	$email =$_POST['email'];
	$senha =$_POST['senha'];

// dados login
	$Lnome = $_POST['Lnome'];
	$Lemail = $_POST['Lemail'];
	$Lsenha = $_POST['Lsenha'];
	$Mlogado = $_POST['Mlogado'];

	//print_r($Mlogado);
//cadastrando
	if($nome!="none" AND !empty($senha) AND !empty($email)){
	$inserirUser= $conexao->prepare("INSERT INTO cliente (`id_cliente`, `nome`, `email`, `senha`,`criacao_cli`)VALUES(NULL,:nome,:email,:senha,NOW())");
	$inserirUser->bindValue(":nome",$nome);
	$inserirUser->bindValue(":email",$email);
	$inserirUser->bindValue(":senha",$senha);
	$validar= $conexao->prepare("SELECT * FROM cliente WHERE email=?");
	$validar->execute(array($email));
		if($validar->rowcount() == 0){
			$inserirUser->execute();
			$_SESSION['usuarioSession'] = $email;
			header("Location: ../novo-pedido.php");
			//$resultado['status'] = 3;
		}else {
			$resultado['status'] = 1;
			unset($_SESSION['usuarioSession']);
		}
	//logando
	} else if($Lnome=="none" AND !empty($Lemail) AND !empty($Lsenha)){
		$validarLOGIN= $conexao->prepare("SELECT * FROM cliente WHERE email=:email AND senha=:senha");
		$validarLOGIN->bindValue(":email",$Lemail);
		$validarLOGIN->bindValue(":senha",$Lsenha);
		$validarLOGIN->execute();
		
		$linha = $validarLOGIN->fetch(PDO::FETCH_ASSOC);
		$Vuser=$linha["email"];
		$Vpass=$linha["senha"];
		$Vid=$linha["id_cliente"];
		
			if($Vuser == $Lemail AND $Vpass==$Lsenha){
				if($Vid != 1){
					header("Location: ../novo-pedido.php");
					$_SESSION['usuarioSession'] = $Vuser;
					//session_cache_expire(1);
					//fazendo biscoito para 7 dias
					//$resultado['status'] = 3;
					if($Mlogado == '1'){
						
						setcookie("cookie_user",$Lemail,time()+86400,"/ProjetoApp","localhost","0","0");
						setcookie("cookie_pass",$Lsenha,time()+86400,"/ProjetoApp","localhost","0","0");
					}					
				}else{
					//header("Location: ../relatorio-usuario.php");
					//$_SESSION['idSession'] = $Vid;
					//echo "caso tenha tela de admin;)";
					//$resultado['status'] = 3;
				}
			}else {
				$resultado['status'] = 2;
				//apagar usuário sessao
				unset($_SESSION['usuarioSession']);
			}
	}else {
		$resultado['status'] = 4;	
		//apagar usuário sessao
		unset($_SESSION['usuarioSession']);
	}



    header('Content-type: application/json');

    echo json_encode($resultado);
?>