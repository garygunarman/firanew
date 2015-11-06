<?php
/*
* ----------------------------------------------------------------------
* EMAIL - NOTIFICATION VERIFIED WAREHOUSE: CONTROL
* ----------------------------------------------------------------------
*/

include('get.php');
include('update.php');
include('control.php');

$headers   = '';
$name      = $_global_general->website_title; 
$email     = $_global_notification->email_order; 
$recipient = $_global_notification->email_warehouse; 

$subject   = '['.$_global_general->website_title.'] '.$order_number.' Delivery Order';
$headers  .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers  .= "From: ".$_global_general->website_title." <" .$_global_info->email. ">\r\n";

mail($recipient, $subject, $mail_body, $headers);


/* --- FINISH --- */
$_SESSION['veritrans']['order_number'] = $order_number;
$_SESSION['veritrans']['code']         = 200;
$_SESSION['veritrans']['email']        = 'done';

safe_redirect('finish-veritrans');
?>