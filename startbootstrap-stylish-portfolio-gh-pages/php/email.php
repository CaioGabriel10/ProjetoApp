<?php

	$to = $_POST['Eemail'];
	$assunto = $_POST['Eassunto'];
	$conteudo = $_POST['Econteudo'];
  	$nomeCliente = $_POST['rnome'];
	$DispositivoPedido = $_POST['rdispositivo'];
	$codigoPedido = $_POST['codigoPedido'];
	$servicoPedido = $_POST['rservico'];
    

	
    $resultado =  array();
	

//layout e-mail
$arquivo ="
<!DOCTYPE html>
<html>
<head>
<meta name='viewport' content='width=device-width' />
<link rel='stylesheet' type='text/css' href='../css/email.css' />
</head>
 
<body bgcolor='#FFFFFF'>
	<table class='head-wrap' bgcolor='#337ab7'>
	<tr>
		<td></td>
		<td class='header container'>			
				<div class='content'>
					<table bgcolor='#337ab7'>
					<tr>
						<td align='right'><h1 class='collapse'>CJR - Manutenção</h1></td>
					</tr>
				</table>
				</div>				
		</td>
		<td></td>
	</tr>
</table>
<table class='body-wrap'>
	<tr>
		<td></td>
		<td class='container' bgcolor='#FFFFFF'>

			<div class='content'>
			<table>
				<tr>
					<td>						
						<h3>Tudo Bem, $nomeCliente</h3>
						<p class='lead'>Uma nova atualizaÃ§Ã£o em seu pedido $codigoPedido - $DispositivoPedido.</p>
						<br>
						<h3>Mensagem</h3>
						<p>$conteudo</p>
						<br/>
						<br/>							
					</td>
				</tr>
			</table>
			</div>									
		</td>
		<td></td>
	</tr>
</table>
</body>
</html>


";


//enviar
	
	// emails para quem serÃ¡ enviado o formulÃ¡rio
	

	// Ã‰ necessÃ¡rio indicar que o formato do e-mail Ã© html
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= "From: $de "."\r\n";
    $headers .= 'Content-type: text/html; charset= utf8' . "\r\n";
   
	
	
	$enviaremail = mail($to, $assunto, $arquivo, $headers);
        $enviaremail2 = mail($to2, $assunto, $arquivo, $headers);
	if($enviaremail && $enviaremail2){
	    $resultado['status'] = 1;
	} else {
        $resultado['status'] = 2;	
	}
        
    header('Content-type: application/json');

    echo json_encode($resultado);
	?>