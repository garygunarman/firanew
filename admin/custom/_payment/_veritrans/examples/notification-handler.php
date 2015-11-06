<?php

require_once(dirname(__FILE__) . '/../Veritrans.php');

/* --- SANDBOX --- */
Veritrans_Config::$serverKey = '71c4c006-f73b-4312-b602-18425c79e5d0';


/* --- PRODUCTION --- */
//Veritrans_Config::$serverKey = '88dd5ab2-218e-4b2f-8f0d-09e2e5275068';

$notif = new Veritrans_Notification();
if ($notif->isVerified()) {
  $transaction = $notif->transaction_status;
  $fraud = $notif->fraud_status;

  error_log("Order ID $notif->order_id: " .
      "transaction status = $transaction, fraud staus = $fraud");

  if ($transaction == 'capture') {
    if ($fraud == 'challenge') {
      // TODO Set payment status in merchant's database to 'challenge'
    }
    else if ($fraud == 'accept') {
      // TODO Set payment status in merchant's database to 'success'
    }
  }
  else if ($transaction == 'cancel') {
    if ($fraud == 'challenge') {
      // TODO Set payment status in merchant's database to 'failure'
    }
    else if ($fraud == 'accept') {
      // TODO Set payment status in merchant's database to 'failure'
    }
  }
  else if ($transaction == 'deny') {
      // TODO Set payment status in merchant's database to 'failure'
  }
}