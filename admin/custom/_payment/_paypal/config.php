<?php
$currency = '$'; //Currency sumbol or code

//db settings
$db_username = 'root';
$db_password = '';
$db_name = 'demo';
$db_host = 'localhost';
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);

//paypal settings
$PayPalMode 			= 'sandbox'; // sandbox or live
$PayPalApiUsername 		= 'dimas_api1.antikode.com'; //PayPal API Username
$PayPalApiPassword 		= 'VT8MTYQQ98DBVW37'; //Paypal API password
$PayPalApiSignature 	= 'AHsVa7MMfSmGaFjFYiiBpRfyxjjIAmOOaht321Hiqv26uU6SJfd1ucrl'; //Paypal API Signature
$PayPalCurrencyCode 	= 'USD'; //Paypal Currency Code
$PayPalReturnURL 		= BASE_URL.'control-paypal'; //Point to process.php page
$PayPalCancelURL 		= BASE_URL.'bag-paypal'; //Cancel URL if user clicks cancel
?>