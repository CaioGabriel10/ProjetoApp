<?php
    ob_start();
	session_start();

    include('conexao.php');
    $conexao = $pdo;

    $aparelho = $_POST['aparelho'];
    $servico = $_POST['servico'];    
    $descricao = $_POST['descricao'];

    $resultado =  array();
    
//PEGANDO ID DO USUARIO PARA PREENCHER A FOREIGN KEY
    $email = $_SESSION['usuarioSession'];
    $email = $_SESSION['usuarioSession'];
	$cliente = $conexao->prepare("SELECT * FROM cliente WHERE  email=:email");
	$cliente->bindValue(":email",$email);
	$cliente->execute();
	$linha=$cliente->fetch(PDO::FETCH_ASSOC);
	$id_cliente= $linha['id-cliente'];

	//CADASTRANDO
    if(!empty($servico) AND !empty($aparelho) AND !empty($descricao)){
        $inserirPedido = $conexao->prepare("INSERT INTO pedido (`id-pedido`,`dispositivo`,`servico`,`descricao`,`cliente_id-cliente`)VALUE(NULL,:disp,:serv,:des,:fk_cliente)");
        $inserirPedido->bindValue(":disp",$aparelho);
        $inserirPedido->bindValue(":serv",$servico);
        $inserirPedido->bindValue(":des",$descricao);
        $inserirPedido->bindValue(":fk_cliente",$id_cliente);
        $inserirPedido->execute();
        $resultado['status'] = true;
    }else{
        $resultado['status'] = false;
    }
    
    header('Content-type: application/json');

    echo json_encode($resultado);
?>