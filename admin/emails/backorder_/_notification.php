<?php
/*
* ----------------------------------------------------------------------
* EMAIL: NOTIFICATION BACK ORDER
* ----------------------------------------------------------------------
*/

include('get.php');
include('update.php');
include('control.php');

$headers   = '';
$name      = $_global_general->website_title; 
$email     = $_global_info->email; 
$recipient = $get_order->user_email;  

$subject   = "[".$_global_general->website_title."] ".$get_order->product_name." ".$get_order->type_name." Notification"; 
$headers  .= "Content-Type: text/html; charset=ISO-8859-1\r\n".
$headers  .= "From: ".$_global_general->website_title." <" .$_global_info->email. ">\r\n";
  
//mail($recipient, $subject, $mail_body, $headers);

/* --- MAILGUN --- */
require dirname(__FILE__).'/../_mailgun/vendor/autoload.php';
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
$mg->sendMessage($domain, array('from'    => $_mailgun_from, 
                                'to'      => $_mailgun_to, 
                                'subject' => $_mailgun_subject, 
                                'html'    => $mail_body));
								
								
$_global->counter_mailgun();


$page = 'back-order-detail/'.$back_id;
$type = 'success';
$msg  = 'Successfully sent email notification to: '.$get_order->email;

set_alert($type, $msg);
safe_redirect($page);
?>