<?php

    include('conexao.php');
    $conexao = $pdo;

    // Estrutura basica do grafico
    $grafico = array(
        'dados' => array(
            'cols' => array(
                array('type' => 'string', 'label' => 'Status'),
                array('type' => 'number', 'label' => 'Quantidade')
            ),  
            'rows' => array()
        ),
        'config' => array(
            'width' => '100%',
            'height' => '100%',
            'legend' => 'none',
            'pieSliceText' => 'value',
            'fontSize' => '16'
        )
    );

    // Consultar dados no BD
    $consultaG = $conexao->prepare("SELECT `status`, COUNT(*) as quantidade FROM `pedido` GROUP BY `status`");
    $consultaG->execute();
    $stmt = $consultaG;
    while ($obj = $stmt->fetchObject()) {
        $grafico['dados']['rows'][] = array('c' => array(
            array('v' => $obj->status),
            array('v' => (int)$obj->quantidade)
        ));
    }

    // Enviar dados na forma de JSON
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($grafico);
    exit(0);

?>