<?php

    include_once('conexao.php');
    $conexao = $pdo;
    
    //PEGANDO ID DO USUARIO PARA CONSULTAR OS PEDIDOS
    $email = $_SESSION['usuarioSession'];
    $cliente = $conexao->prepare("SELECT * FROM cliente WHERE  email=:email");
    $cliente->bindValue(":email",$email);
    $cliente->execute();
    $linha=$cliente->fetch(PDO::FETCH_ASSOC);
    $id_cliente= $linha['id-cliente'];

    //CONSULTANDO se o $id_cliente for válido
    
    $consultar = $conexao->prepare("SELECT * FROM `pedido` WHERE `cliente_id-cliente` = :cliente");
    $consultar->bindValue(":cliente",$id_cliente);
    $consultar->execute();

    //Exibe as linhas com o resultado da $consulta
    if (!empty($id_cliente)){
        while($row = $consultar->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr> <td>' . $row['dispositivo']. ' </td> <td>'. $row['servico'] . ' </td> <td> ' . $row['descricao'] . '</td> </tr>';
        }
    } else {
        echo "<tr><td>  Você ainda não fez pedidos.  </td></tr>";
    }

    //Conta as linhas/pedidos para mostrar a quantidade de pontos
    //DEPOIS ALTERERAR PARA CONSULTAR A TABELA ESPECIFICA DOS PONTOS/NOTAS FISCAIS
    $pontos = $consultar->rowCount ();


?>