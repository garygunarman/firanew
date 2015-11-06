<?php
/*
* ----------------------------------------------------------------------
* EMAIL - WAITING FOR PAYMENT CUSTOMER: VIEW
* ----------------------------------------------------------------------
*/

include('get.php');
include('update.php');
include('control.php');

$headers   = '';
$name      = $_global_general->website_title; 
$email     = $_global_notification->email_order; 
$recipient = $_global_user->user_email; 

$subject   = '['.$_global_general->website_title.'] '.$order_number.' Waiting for Payment';
$headers  .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers  .= "From: ".$_global_general->website_title." <" .$_global_info->email. ">\r\n";

mail($recipient, $subject, $mail_body, $headers);


/* --- EMAIL: ADMIN --- */
safe_redirect('email-veritrans-admin-success/'.$order_number);
?>