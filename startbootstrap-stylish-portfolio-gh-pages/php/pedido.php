<?php
    ob_start();
	session_start();
   
    include('conexao.php');
    $conexao = $pdo;
    
    if(isset($_POST['aparelho']) AND isset($_POST['servico']) AND isset($_POST['descricao'])):
        $aparelho = $_POST['aparelho'];
        $servico = $_POST['servico'];    
        $descricao = $_POST['descricao'];
    else:
        $aparelho = NULL;
        $servico = NULL;    
        $descricao = NULL;
    endif;
    
    $resultado =  array();
    
//PEGANDO ID DO USUARIO PARA PREENCHER A FOREIGN KEY
    $email = $_SESSION['usuarioSession'];
    $email = $_SESSION['usuarioSession'];
	$cliente = $conexao->prepare("SELECT * FROM cliente WHERE  email=:email");
	$cliente->bindValue(":email",$email);
	$cliente->execute();
	$linha=$cliente->fetch(PDO::FETCH_ASSOC);
	$id_cliente= $linha['id_cliente'];

	//CADASTRANDO
    if(!empty($servico) AND !empty($aparelho) AND !empty($descricao)){
        $inserirPedido = $conexao->prepare("INSERT INTO pedido (`id_pedido`,`dispositivo`,`servico`,`descricao`,`status`,`ultima_att`,`cliente_id_cliente`,`criacao_ped`)VALUE(NULL,:disp,:serv,:des,:status,NULL,:fk_cliente,NOW())");
        $inserirPedido->bindValue(":disp",$aparelho);
        $inserirPedido->bindValue(":serv",$servico);
        $inserirPedido->bindValue(":des",$descricao);
        $inserirPedido->bindValue(":status","enviado");
        $inserirPedido->bindValue(":fk_cliente",$id_cliente);
        $inserirPedido->execute();
        $resultado['status'] = true;
    }else{
        $resultado['status'] = false;
    }
    
    //cancelando pedido
  if(isset($_POST['codcancela']) AND isset($_POST['cancelar'] )AND isset($_POST['motivo'])):
    $cod = $_POST['codcancela'];
    $cancelar = $_POST['cancelar'];
   // var_dump($_POST['selected']);
    //$cancelar['array'] = $this->input->post('array');
    $motivo = $_POST['motivo'];
    //$length = count($_POST('selected'));

    //print_r($cancelar);
    else:
    $cod = NULL;
    $cancelar = NULL;
    $motivo = NULL;
endif;

    if(!empty($cod)  AND !empty($motivo) AND empty($servico) AND empty($aparelho) AND empty($descricao)):
    
        $cancelarPedido = $conexao->prepare("UPDATE pedido SET `status`=:sta, `descricao`=:des, `ultima_att` = NULL WHERE `pedido`.`id_pedido`= :id");
        $cancelarPedido->bindValue(":sta","cancelado");
        $cancelarPedido->bindValue(":des",$motivo);
        $cancelarPedido->bindValue(":id",$cancelar);
         $cancelarPedido->execute();
        
        
        $resultado['status'] = 1;
   
    endif;

    header('Content-type: application/json');

    echo json_encode($resultado);
?>