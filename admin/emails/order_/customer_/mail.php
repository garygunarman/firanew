<?php
/*
* ----------------------------------------------------------------------
* EMAIL: CUSTOMER - ORDER PLACED
* ----------------------------------------------------------------------
*/

require '../../_mailer/PHPMailerAutoload.php';

include('get.php');
include('update.php');
include('control.php');


/* --- DEFINED VARIBALE --- */
$mail_subject         = '['.$_global_general->website_title.'] '.$order_number.' Waiting for Payment';
$mail_from['address'] = $_global_notification->email_order;
$mail_from['name']    = $_global_general->website_title;
$mail_to['address']   = $_global_user->user_email;
$mail_to['name']      = $_global_user->user_first_name.' '.$_global_user->user_last_name;
$mail_alt_body        = '';
$mail_file            = '';


/* --- MAIL --- */
$mail = new PHPMailer;
$mail->setFrom($mail_from['address'], $mail_from['name']);
$mail->addReplyTo($mail_from['address'], $mail_from['name']);
$mail->addAddress($mail_to['address'], $mail_to['name']);
$mail->Subject = $mail_subject;
$mail->msgHTML($mail_body);
$mail->AltBody = $mail_alt_body;
$mail->addAttachment($mail_file);


if(!$mail->send()){
   //echo "Mailer Error: " . $mail->ErrorInfo;
   safe_redirect('email-order-admin/'.$order_number);
}else{
   safe_redirect('email-order-admin/'.$order_number);
}
