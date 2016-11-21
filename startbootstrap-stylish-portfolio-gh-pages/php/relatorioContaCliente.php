<?php
	include_once('conexao.php');
    $conexao = Conexao();
    
    //PEGANDO ID DO USUARIO PARA CONSULTAR OS PEDIDOS
    $email = $_SESSION['usuarioSession'];
    $cliente = $conexao->prepare("SELECT * FROM cliente WHERE  email=:email");
    $cliente->bindValue(":email",$email);
    $cliente->execute();
    $linha=$cliente->fetch(PDO::FETCH_ASSOC);
    $id_cliente= $linha['id_cliente'];

    //Consultando a data da alteração de senha
    $consultar = $conexao->prepare("SELECT `nome`, `email`, `ultima_att` FROM `cliente` WHERE `id_cliente` = :idCliente");
    $consultar->bindValue(":idCliente", $id_cliente);
    $consultar->execute();
    $resultado = $consultar->fetch(PDO::FETCH_ASSOC);
?>