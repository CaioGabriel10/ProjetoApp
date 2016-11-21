<?php
    include('conexao.php');
    $conexao = Conexao();

    $dash = $conexao->prepare("SELECT id_pedido , status  FROM pedido");
    $dash->execute();

    $clientes = $conexao->prepare("SELECT id_cliente from cliente");
    $clientes->execute();

    $i = 0;//pedidos cancelados
    $j = 0;//pedidos enviados
    $k = 0;//total de pedidos
    $l = 0;//total clientes
    
    foreach($dash as $row){
        if($row['status']=='cancelado'): 
        $i++; 
        elseif($row['status']=='enviado'):
         $j++; 
        endif;
        
        $k++;
    }

    foreach($clientes as $linha){
        if($linha!= 0):
            $l++;
        endif;
    }
     
     //echo $l;
    $dboard_cancelados = "$i , ".number_format($i/$k*100, 2, '.', ',')  . " % ";


//atualizar pedido com valo e status
    if(isset($_POST['status']) AND isset($_POST['valor'])  AND isset($_POST['idPedido'])):
        $status = $_POST['status'];
        $valor = $_POST['valor'];
        $idPedido = $_POST['idPedido'];
        $resultado = array();
//UPDATE pedido SET `status` = 'cancelado' , `valor` = 550.10 , `ultima_att` = null WHERE `id_pedido` = 51
        $upPedido = $conexao->prepare("UPDATE pedido SET `status` =:sta , `valor` =:val , `ultima_att` = NULL WHERE `id_pedido` = :id");
        $upPedido->bindValue(":id",$idPedido);
        $upPedido->bindValue(":sta",$status);
        $upPedido->bindValue(":val",$valor);
        $upPedido->execute();

        $resultado['status']=1;

        header('Content-type: application/json');
        echo json_encode($resultado);
    else:
        $resultado['status']=2;
    endif;

?>

