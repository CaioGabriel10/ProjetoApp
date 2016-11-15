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

    //CONSULTANDO se o $id_cliente for válido
    
    $consultar = $conexao->prepare("SELECT * FROM `pedido` WHERE `cliente_id_cliente` = :cliente");
    $consultar->bindValue(":cliente",$id_cliente);
    $consultar->execute();

    //Exibe as linhas com o resultado da $consulta
    if (!empty($id_cliente)){
        while($row = $consultar->fetch(PDO::FETCH_ASSOC)) {
            $check = '<td ><input  name="cancelar" id="cancelar"  value=' .$row['id_pedido'] .' type="radio"></td><td>';
            echo '<tr>'.$check. $row['dispositivo']. ' </td> <td>'. $row['servico'] . ' </td> <td> ' . $row['status'] .'</td><td>'.$row['ultima_att'] .'</td><td>'.$row['descricao'] . '</td> </tr>';

        }
    } else {
        echo "<tr><td>  Você ainda não fez pedidos.  </td></tr>";
    }

    //Conta as linhas/pedidos para mostrar a quantidade de pontos
    //DEPOIS ALTERERAR PARA CONSULTAR A TABELA ESPECIFICA DOS PONTOS/NOTAS FISCAIS
    $pontos = $consultar->rowCount();
//$check = '<td><button  name="cancelar" id="cancelar" class="btn btn-danger btn-xs"  data-title="Delete" data-toggle="modal" data-target="#delete"  value=' .$row['cliente_id_cliente'] .' type="checkbox"><i class="fa fa-ban fa-x1"></i></button></td><td>';


?>