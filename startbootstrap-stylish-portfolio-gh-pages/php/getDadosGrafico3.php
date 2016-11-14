<?php

    include('conexao.php');
    $conexao = $pdo;

    // Estrutura basica do grafico
    $grafico3 = array(
        'dados' => array(
            'cols' => array(
                array('type' => 'string', 'label' => 'Data'),
                array('type' => 'number', 'label' => 'Quantidade')
            ),  
            'rows' => array()
        ),
        'config' => array(
            'width' => '100%',
            'height' => '100%',
            'legend' => 'none',
            'backgroundColor' => 'transparent',
            'fontSize' => '16'
        )
    );

    // Consultar dados no BD
    $consultaG = $conexao->prepare("select CASE WHEN MONTH(criacao_ped) in (1,2,3) THEN 'Primeiro' 
WHEN MONTH(criacao_ped) in (4,5,6) THEN 'Segundo'
WHEN MONTH(criacao_ped) in (7,8,9) THEN 'Terceiro' 
WHEN MONTH(criacao_ped) in (10,11,12) THEN 'Quarto' END AS trimestre,
COUNT(CASE WHEN MONTH(criacao_ped) in (1,2,3) THEN id_pedido 
     WHEN MONTH(criacao_ped) in (4,5,6) THEN id_pedido 
     WHEN MONTH(criacao_ped) in (7,8,9) THEN id_pedido
     WHEN MONTH(criacao_ped) in (10,11,12) THEN id_pedido END) as quantidade
from pedido GROUP by trimestre, CASE WHEN MONTH(criacao_ped) in (1,2,3) THEN 1 WHEN MONTH(criacao_ped) in (4,5,6) THEN 2 WHEN MONTH(criacao_ped) in (7,8,9) THEN 3 WHEN MONTH(criacao_ped) in (10,11,12) THEN 4 END order by criacao_ped;");
    $consultaG->execute();
    $stmt = $consultaG;
    while ($obj = $stmt->fetchObject()) {
        $grafico3['dados']['rows'][] = array('c' => array(
            array('v' => $obj->trimestre),
            array('v' => (int)$obj->quantidade)
        ));
    }

    // Enviar dados na forma de JSON
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($grafico3);
    exit(0);

?>