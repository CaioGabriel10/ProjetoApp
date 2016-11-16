<?php
	$to ="teste@sistemavan.16mb.com";//email do site

	$de = $_POST['Eemail']; //email cliente
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
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
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
						<td><img src='../img/logo.png' /></td>
						<td align='right'><h1 class='collapse'>CJR</h1></td>
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
						<p class='lead'>Uma nova atualização em seu pedido $codigoPedido - $DispositivoPedido.</p>
						<br>
						<h3>Menssagem</h3>
						<p$conteudo</p>
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
	
	// emails para quem será enviado o formulário
	$assunto = "pedido atualizado: $servicoPedido - $DispositivoPedido";

	// É necessário indicar que o formato do e-mail é html
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= "From: $de "."\r\n";
    $headers .= 'Content-type: text/html; charset= utf8' . "\r\n";
   
	
	
	$enviaremail = mail($to, $assunto, $arquivo, $headers);
	if($enviaremail){
	    $resultado['status'] = 1;
	} else {
        $resultado['status'] = 2;	
	}
    header('Content-type: application/json');

    echo json_encode($resultado);
	?>