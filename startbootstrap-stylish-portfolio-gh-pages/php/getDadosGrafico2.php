<?php

    include('conexao.php');
    $conexao = $pdo;

    // Estrutura basica do grafico
    $grafico2 = array(
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
    $consultaG = $conexao->prepare("SELECT DATE_FORMAT(`criacao_cli`, '%m/%y') as data, COUNT(*) as quantidade FROM `cliente` GROUP BY data;");
    $consultaG->execute();
    $stmt = $consultaG;
    while ($obj = $stmt->fetchObject()) {
        $grafico2['dados']['rows'][] = array('c' => array(
            array('v' => $obj->data),
            array('v' => (int)$obj->quantidade)
        ));
    }

    // Enviar dados na forma de JSON
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($grafico2);
    exit(0);

?>