<?php
$order_id    = filter_var($_REQUEST['order_number'], FILTER_SANITIZE_STRING);
$order_total = filter_var($_REQUEST['total'], FILTER_SANITIZE_NUMBER_INT);


require_once(dirname(__FILE__) . '/../../Veritrans.php');


/* --- SANDBOX --- */
Veritrans_Config::$serverKey = '2d7b85ab-f67a-43fd-9a85-95ffc9ef7f22';


/* --- PRODUCTION --- */
//Veritrans_Config::$serverKey = '88dd5ab2-218e-4b2f-8f0d-09e2e5275068';

// Uncomment for production environment
Veritrans_Config::$isProduction = false;

// Uncomment to enable sanitization
// Veritrans_Config::$isSanitized = true;

// Uncomment to enable 3D-Secure
//Veritrans_Config::$is3ds = true;

$params = array(
          'transaction_details' => array(
                                   'order_id' => $order_id,
								   'gross_amount' => $order_total,
                                   )
          );

try {
  // Redirect to Veritrans VTWeb page
  header('Location: ' . Veritrans_Vtweb::getRedirectionUrl($params));
}
catch (Exception $e) {
  echo $e->getMessage();
}