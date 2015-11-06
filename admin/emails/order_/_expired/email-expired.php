<?php
echo 'ASD: '.$header_get_expired->order_id;
			$headers 	= '';
            $name       = $_global_general->website_title; 
			$email      = $_global_notification->email_order; 
			$recipient  = $header_expired_user->user_email; 
			$mail_body  = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
						    <html xmlns="http://www.w3.org/1999/xhtml">
							  <head>
							    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
								   <title>['.$_global_general->website_title.' '.$header_get_expired->order_number.' Expired</title>
								</head>
								<body style="font-family: Helvetica, Arial, sans-serif; color:#333333" topmargin="0" leftmargin="0">
								  <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="overflow: hidden; background: #fff">
								<tbody>
								  <tr>
								    <td>
									  <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="overflow: hidden; background: #fff">
									    <tr>
										  <td style="padding-left: 15px; padding-top: 10px; padding-bottom: 10px">
										    <img src="'.BASE_URL.'admin/static/thimthumb.php?src='.$_global_notification->email_logo.'&h=50&w=50&q=100" height="50">
										  </td>
										</tr>
									  </table>
									</td>
								  </tr>
								</tbody>
							  </table>
							  <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="overflow: hidden; background: #f0f0f0; border-bottom: 1px solid #e0e0e0">
							    <tbody>
								  <tr>
								    <td>
									  <table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
									    <tr>
										  <td>
										    <td style="font-size: 12px; color: #999; padding-left: 15px; text-align: left;">
											  <span style="font-weight: 100">Order no.</span> <i style="font-size: 14px; color: #333">'.$header_get_expired->order_number.'</i>
											</td>
										    <td style="font-size: 12px; color: #fff; padding: 10px 15px; text-align: right">
										      <span style="line-height: 18px; color: #999"><b style="color: #cc0000">ORDER EXPIRED</b> </span>
										    </td>
										  </td>
										</tr>
									  </table>
									</td>
								  </tr>
								</tbody>
							  </table>
							  <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="font-size:12px; overflow: hidden; background: #fff; line-height: 20px">
							    <tbody>
								  <tr>
								    <td width="600" bgcolor="#fff" style="padding: 25px">
									  '.$header_get_expired->order_number.',<br>
									  <br>
									  We\'re sorry to let you know that your order <b>'.$header_get_expired->order_number.'</b> has been set to expired since we haven\'t received any payment confirmation within 2x24 hours.<br>
									  <br> 
									  If you believe this is an error or you have actually paid but haven\'t got time to confirm the payment, please contact us through email at <a style="color:#0383ae" href="mailto:'.$_global_notification->email_order.'">'.$_global_notification->email_order.'</a> to resolve the problem. Thank you!
									</td>
								  </tr>
								</tbody>
							  </table>
							  <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="font-size:11px; color: #999; margin-top:15px">
							    <tbody>
								  <tr>
								    <td style="padding-left:20px; padding-right:20px">
									  &copy; '.date('Y').' '.$_global_general->website_title.'. Powered by <a style="color: #666; text-decoration: none" href="http://www.antikode.com">Antikode</a>. <br><br>
									</td>
								  </tr>
								</tbody>
							  </table>
							</body>
						  </html>';

            $subject   = '['.$_global_general->website_title.'] '.$header_get_expired->order_number.' Expired Order';
            $headers   = "Content-Type: text/html; charset=ISO-8859-1\r\n".
            $headers  .= "From: ".$_global_general->website_title." <" .$_global_notification->email_order. ">\r\n"; //optional headerfields
			//mail($recipient, $subject, $mail_body, $headers);


/* --- MAILGUN --- */
require dirname(__FILE__).'/../../_mailgun/vendor/autoload.php';
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
?>