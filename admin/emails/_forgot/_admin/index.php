<?php
/*
* ----------------------------------------------------------------------
* EMAIL - FORGOT ADMIN: VIEW
* ----------------------------------------------------------------------
*/
      $headers   = '';
	  $name      = $_global_general->website_title; 
	  $email     = $_global_info->email; 
      $recipient = $get_forgot->email; 
	  $mail_body = '<body style="font-family: Helvetica, Arial, sans-serif; color:#fff" topmargin="0" leftmargin="0">
	                  <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="overflow: hidden; padding-top: 15px">
					    <tbody>
						  <tr>
						    <td>
							  <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="border-bottom: 1px solid #e0e0e0">
							    <tr>
								  <td>
								    <td style="padding-left: 15px; text-align: left;">
									  <span style="color: #333; font-size: 20px;">'.$_global_general->website_title.'</span>
									</td>
									
									<td style="font-size: 12px; color: #fff; padding: 10px 15px; text-align: right">
									  <span style="line-height: 18px; color: #999"><b style="color: #333">RESET PASSWORD</b> </span>
									</td>
								  </td>
								</tr>
						      </table>
							</td>
					      </tr>
						</tbody>
				      </table>
					  
					  <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="font-size:12px; overflow: hidden; line-height: 20px; color: #333">
					    <tbody>
						  <tr>
						    <td width="600" style="padding: 25px">
							  You have requested to reset your password for username <b>'.$get_forgot->username.'</b> <br>
							  <br>
							  <a href="'.BASE_URL.'recover-password/'.$code.'" style="color: #ffffff;
											    background-color: #5cb85c;
											    border-color: #4cae4c;display: inline-block;
											    padding: 6px 12px;
											    margin-bottom: 0;
											    font-size: 14px;
											    font-weight: normal;
											    line-height: 1.428571429;
											    text-align: center;
											    white-space: nowrap;
											    vertical-align: middle;
											    cursor: pointer;
											    border: 1px solid transparent;
											    border-radius: 4px;
											    padding: 5px 10px;
											    font-size: 12px;
											    line-height: 1.5;
											    border-radius: 3px;
											    text-decoration: none;">Reset Password</a><br>
							 <br>
							 If you did not request to reset your password, please ignore this email.
							 <br>
							 <i style="color: #cc0000">*Please note this link is valid only for 4 hours.</i>
						   </td>
						 </tr>
					   </tbody>
					 </table>
					 
					 <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="font-size:11px; color: #999; margin-top:15px">
					   <tbody>
					     <tr>
						   <td style="padding-left:20px; padding-right:20px; padding-bottom: 20px">
						     &copy; '.date('Y').' '.$_global_general->website_title.'. Powered by <a style="color: #666; text-decoration: none" href="http://www.antikode.com">Antikode</a>. <br><br>
						   </td>
						 </tr>
					   </tbody>
					 </table>
				   </body>';
				   
	  $subject   = '['.$_global_general->website_title.'] Admin Forgot Password';
	  $headers   = "Content-Type: text/html; charset=ISO-8859-1\r\n".
	  $headers  .= "From: ".$_global_general->website_title." <" .$_global_info->email. ">\r\n";
	  
	  //mail($recipient, $subject, $mail_body, $headers);


/* --- MAILGUN --- */
require dirname(__FILE__).'/../../_mailgun/vendor/autoload.php';
use Mailgun\Mailgun;

$_mailgun_api_key = MAILGUN_KEY;
$_mailgun_domain  = MAILGUN_DOMAIN;

$_mailgun_from    = '['.$_global_general->website_title.'] <'.$_global_notification->email_security.'>';
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