<?php
include('conexao.php');
 $conexao=$pdo;

//BUSCANDO VALORES DO PEDIDO
if(isset($_POST['valorp'])):
    $valorp = $_POST['valorp'];
    $resultado = array();

    $pedido = $conexao->prepare("SELECT c.*, p.* FROM cliente c INNER JOIN pedido p ON c.id_cliente = p.cliente_id_cliente WHERE p.id_pedido = :idp");
    $pedido->bindValue(":idp",$valorp);
    $pedido->execute();

    while($row = $pedido->fetch(PDO::FETCH_ASSOC)){
        $resultado['nome'] = $row['nome'];
        $resultado['email'] = $row['email'];
        $resultado['dispositivo'] = $row['dispositivo'];
        $resultado['servico']= $row['servico'];
        $resultado['status'] = $row['status'];
        $resultado['descricao']= $row['descricao'];
        $resultado['valor'] = $row['valor'];
    }
    $resultado['dado']= 1;
  
    $resultado['cod'] = $valorp;
    //var_dump($resultado);

    header('Content-type: application/json');
    echo json_encode($resultado);
    else:
    $resultado['dado']=1;
endif;

//TABELA COM OS DADOS
if (isset($_GET["txtnome"]) ) {
    
    $name = $_GET["txtnome"];

    if(isset($_GET['check_cliente'])):
        $check = $_GET['check_cliente'];
		$relatorio=$conexao->prepare("SELECT c.* FROM cliente c WHERE c.id_cliente like :nome ");
		$relatorio->bindValue(":nome",$name.'%');
		$relatorio->execute();
        $tabela = "<table class='table table-striped'>
                    <thead>
                        <tr>
							<th>#</th>
                            <th>nome</th>
                            <th>email</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>"; 
        $return = "$tabela";
        // Captura os dados da consulta e inseri na tabela HTML
        while ($linha = $relatorio->fetch(PDO::FETCH_ASSOC)) {
            $return.= "<td>" . ($linha["id_cliente"]) . "</td>";
            $return.= "<td>" . ($linha["nome"]) . "</td>";
            $return.= "<td>" .($linha["email"]) . "</td>";
            $return.= "</tr>";
        }
        echo $return.="</tbody></table>";
    else:
        if (empty($name) ){
			$relatorio=$conexao->prepare("SELECT c.*, p.* FROM cliente c INNER JOIN  pedido p ON p.cliente_id_cliente = c.id_cliente");		
			$relatorio->execute();
		}else{
			$relatorio=$conexao->prepare("SELECT c.*,p.* FROM cliente c INNER JOIN pedido p ON  c.id_cliente = p.cliente_id_cliente WHERE p.id_pedido like :nome ");
			$relatorio->bindValue(":nome",$name.'%');
			$relatorio->execute();
		}
        $tabela = "<table class='table table-striped'>
                    <thead>
                        <tr>
							<th>#</th>
                            <th>aparelho</th>
                            <th>servico</th>
                            <th>status</th>
                            <th>atualizado</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>"; 
        $return = "$tabela";
        // Captura os dados da consulta e inseri na tabela HTML
        while ($linha = $relatorio->fetch(PDO::FETCH_ASSOC)) {
            $return.= "<td>" . ($linha["id_pedido"]) . "</td>";
            $return.= "<td>" . ($linha["dispositivo"]) . "</td>";
            $return.= "<td>" .($linha["servico"]) . "</td>";
            $return.= "<td>" .($linha["status"]) . "</td>";
            $return.= "<td>" .($linha["ultima_att"]) . "</td>";
            $return.= "<td><input type='radio' onclick='javascript:RelatorioPedido()' id='valorp' name='valorp' class='btn btn-warning btn-xs' data-toggle='modal' data-target='#myModal' value='" .($linha["id_pedido"]) ."'></td>";
            //$return.= "<button type='button' class='btn btn-warning btn-xs' onclick='javascript:AttPedido()' id='valorp' name='valorp' value='" .($linha["id_pedido"]) ."'><i class='fa fa-info' aria-hidden='true'></i></button></td>";
            $return.= "</tr>";
        }
        echo $return.="</tbody></table>";
    endif;

    
	//print_r($name);
	
        // Atribui o código HTML para montar uma tabela
        
}
?>