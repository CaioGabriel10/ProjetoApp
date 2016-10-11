<?php

if (isset($_GET["txtnome"])) {
    $name = $_GET["txtnome"];
	//print_r($name);

 include('conexao.php');
 $conexao=$pdo;
	
	if (empty($name) ){
			$relatorio=$conexao->prepare("SELECT c.*, p.* FROM cliente c INNER JOIN  pedido p ON p.cliente_id_cliente = c.id_cliente");		
			$relatorio->execute();
		}else{
			$relatorio=$conexao->prepare("SELECT c.*,p.* FROM cliente c INNER JOIN pedido p ON  c.id_cliente = p.cliente_id_cliente WHERE p.id_pedido like :nome ");
			$relatorio->bindValue(":nome",$name.'%');
			$relatorio->execute();
		}
	
	
	
    sleep(1);
    
        // Atribui o código HTML para montar uma tabela
        $tabela = "<table class='table table-striped'>
                    <thead>
                        <tr>
							<th>#</th>
                            <th>aparelho</th>
                            <th>servico</th>
                            <th>status</th>
                            <th>atualizado em</th>
                            <th>ação</th>
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
            $return.= "<td><button type='button' class='btn btn-default btn-xs' data-toggle='modal' data-target='#myModal' value='" .($linha["id_cliente"]) ."'><i class='fa fa-ban' aria-hidden='true'></i></button></td>";
            $return.= "</tr>";
            
        }
        echo $return.="</tbody></table>";
		
		
}		
?>