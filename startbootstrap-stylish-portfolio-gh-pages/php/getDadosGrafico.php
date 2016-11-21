<?php

    include('conexao.php');
    

    switch ($_POST['func']):
    case 'graficoUm':
    $output = GraficoUm();
    break;
    case 'graficoDois':
    $output = GraficoDois();
    break;
    case 'graficoTres':
    $output = GraficoTres();
    break;
    case 'graficoQuatro':
    $output = GraficoQuatro();
    break;
    case 'graficoCinco':
    $output = GraficoCinco();
    break;
endswitch;



    // funcao do grafico Relação dos status dos pedidos:
function GraficoUm(){ 
    $conexao = Conexao();

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
            'backgroundColor' => 'transparent',
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

    
    return $grafico;
}

// funcao do grafico Clientes cadastrados por mês:
function GraficoDois(){

    $conexao = Conexao();

    $grafico = array(
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
        $grafico['dados']['rows'][] = array('c' => array(
            array('v' => $obj->data),
            array('v' => (int)$obj->quantidade)
        ));
    }

        return $grafico;
}

// funcao do grafico Pedidos realizados por trimestre em 2016:
function GraficoTres(){
    $conexao = Conexao();

    $grafico = array(
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
        $grafico['dados']['rows'][] = array('c' => array(
            array('v' => $obj->trimestre),
            array('v' => (int)$obj->quantidade)
        ));
    }

    return $grafico;
    
}

// funcao do grafico Relação dos dispositivos dos pedidos:
function GraficoQuatro(){
    $conexao = Conexao();

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
            'backgroundColor' => 'transparent',
            'fontSize' => '16'
        )
    );

    // Consultar dados no BD
    $consultaG = $conexao->prepare("SELECT `dispositivo`, COUNT(*) as quantidade FROM `pedido` GROUP BY `dispositivo`");
    $consultaG->execute();
    $stmt = $consultaG;
    while ($obj = $stmt->fetchObject()) {
        $grafico['dados']['rows'][] = array('c' => array(
            array('v' => $obj->dispositivo),
            array('v' => (int)$obj->quantidade)
        ));
    }

    return $grafico;
}


// funcao do grafico Relação dos serviços dos pedidos:
function GraficoCinco(){
    $conexao = Conexao();

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
            'backgroundColor' => 'transparent',
            'fontSize' => '16'
        )
    );

    // Consultar dados no BD
    $consultaG = $conexao->prepare("SELECT `servico`, COUNT(*) as quantidade FROM `pedido` GROUP BY `servico`");
    $consultaG->execute();
    $stmt = $consultaG;
    while ($obj = $stmt->fetchObject()) {
        $grafico['dados']['rows'][] = array('c' => array(
            array('v' => $obj->servico),
            array('v' => (int)$obj->quantidade)
        ));
    }

    return $grafico;
}


    // Enviar dados na forma de JSON
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($output);
    exit(0);
?>