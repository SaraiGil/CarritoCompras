<?php 
	print_r($_GET);

	$clientID="ATil7wrKu1m894I85d8M7euPud8zeeSHuhZIr6-eBeawz_Z83jhOi6iAm8vDBjDY4qggJTcvGev-7nAA";
	$secret="EF804w5iQTk1xspNfPZGbVPYdsGNYKCsHWCmK5rf-Hx-8rplVY3U1SAT0rLyc8XBfLnPrXycsq0WcKvu";

	$Login = curl_init("https://api.sandbox.paypal.com/v1/oauth2/token");
	curl_setopt($Login, CURLOPT_RETURNTRANSFER, TRUE);

	//INTRODUCIR ID VLIENTE Y SECRET CONCATENADO CON :
	curl_setopt($Login, CURLOPT_USERPWD,$clientID.":".$secret);

	//Solicitar credenciales
	curl_setopt($Login, CURLOPT_POSTFIELDS,"grant_type=client_credentials");

	//Ejecutar instrucciones anteriores
	$Respuesta=curl_exec($Login);
	

	$objResp=json_decode($Respuesta);

	//Asignar el token
	$AccessToken=$objResp->access_token;

	print_r($AccessToken);


	//RECIBIR INFORMACIÓN DE LA TRANSACCIÓN PARA DESPUÉS COMPARARLA CON LA BD
	$compra=curl_init("https://api.sandbox.paypal.com/v2/payments/authorizations/".$_GET['paymentID']);



 ?>