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

//mail($recipient, $subject, $mail_body, $headers);


/* --- MAILGUN --- */
require 'admin/emails/_mailgun/vendor/autoload.php';
use Mailgun\Mailgun;

$_mailgun_api_key = MAILGUN_KEY;
$_mailgun_domain  = MAILGUN_DOMAIN;

$_mailgun_from    = '['.$_global_general->website_title.'] <'.$_global_notification->email_order.'>';
$_mailgun_to      = $recipient;
$_mailgun_subject = $subject;
$_mailgun_text    = $mail_body;

$mg     = new Mailgun($_mailgun_api_key);
$domain = $_mailgun_domain;

# Now, compose and send your message.
$mg->sendMessage($domain, array('from'    	=> $_mailgun_from, 
                                'to'      	=> $_mailgun_to, 
                                'subject'	=> $_mailgun_subject, 
                                'html'    	=> $mail_body));
								
								
$_global->counter_mailgun();

/* --- ORDER LOG --- */
$description	= 2;
$created_date 	= date('Y-m-d H:i:s');
$note			= 'to '.$_mailgun_to;
$_global->update_log($get_order->order_id, $description, $note, $created_date);


/* --- EMAIL: ADMIN --- */
//safe_redirect('email-order-admin/'.$order_number);
?>