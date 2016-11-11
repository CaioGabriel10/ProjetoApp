<?php
/*
*
*último registro de cada tabela trocar no final da linha , por ;
*
*depois de gerar a base de dados necessária, mudar o tipo da coluna cliente.criacao_cli é pedido.criacao_ped para timestamp
*
*mudar valor do  AUTO_INCREMENT no final do arquivo bd.sql para o proximo valor do id 
*
*/
$a = array("cancelado","enviado","em-analise");
$b = array("computador","notebook","smartphone","tablet");
$c = array("formatacao","limpeza","assitencia-tecnica","troca-de-peca");

for($i = 1; $i<= 201; $i++){
	//		id pedido / aparelho 		/	serviço 		/descrição	/ valor 			/ status 		   / data criacao 		    	/ ultima att 		    / id cliente
	echo "(".$i.", '".$b[rand(0,3)]."', '".$c[rand(0,3)]."', 'teste teste teste[...]', '".rand(50,1000)."', '".$a[rand(0,2)]."','2016-".rand(1,12)."-".rand(1,30)."','2016-11-09 21:23:12', ".rand(2,100).")," ."<br>" ;
}         

echo "<br><br><br><br><br><br>";



for($i = 1; $i<=101;$i++){
	echo "(".$i.", 'teste".$i."', 'teste".$i."@gmail.com', '".rand(1000,9999)."', '2016-".rand(1,12)."-".rand(1,30)."', '2016-10-14 17:04:07'),<br>" ;
}
?>