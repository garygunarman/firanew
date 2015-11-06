<?php
/*
* ----------------------------------------------------------------------
* EMAIL - NOTIFICATION VERIFIED CUSTOMER: CONTROL
* ----------------------------------------------------------------------
*/


$_email_get    	= new V_EMAIL_USER_GET();
$_email_update 	= new V_EMAIL_USER_UPDATE();
$order_number	= filter_var($order_number, FILTER_SANITIZE_STRING);
$detail			= $_email_get->detail_order($order_number);
$headers		= '';
$file			= BASE_URL.'admin/static/thimthumb.php?src='.$_global_notification->email_logo.'&h=50&q=100';
$headers		= @get_headers($file);

if(is_array($headers) && strpos($headers[0], '404 Not Found')){
   $exists		= false;
   $prefix_img	= 'static/thimthumb.php?src=';
   
}else{
   $exists = true;
   $prefix_img	= 'admin/static/thimthumb.php?src=';

}

$mail_body	= '';
$mail_body	= '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta content="telephone=no" name="format-detection" />
  </head>
  <body yahoo="" bgcolor="#fafafa" style="font-family: sans-serif; min-width: 100 % !important; font-size: 13px; margin: 0; padding: 0;">
    <table class="header" width="100%" bgcolor="#222" border="0" cellpadding="0" cellspacing="0">
	  <tr>
	    <td>
		  
		  <!--[if (gte mso 9)|(IE)]>
          <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
		    <tr>
			  <td>
          <![endif]-->
		        <table class="content" width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="width: 600px !important; max-width: 600px;">
				  <tr>
				    <td align="center">
					  <img class="brand" src="'.BASE_URL.$prefix_img.$_global_notification->email_logo.'&h=50&q=100" width="100%" border="0" alt="" style="width: 90px; height: auto; padding: 20px 10px;" />
					</td>
				  </tr>
				</table>
		  
		  <!--[if (gte mso 9)|(IE)]>
		      </td>
			</tr>
          </table>
		  <![endif]-->
		
		</td>
	  </tr>
	</table>
	<table width="100%" bgcolor="#fafafa" border="0" cellpadding="0" cellspacing="0"><tr><td class="bg_green" style="background-color: #7CBE42;" bgcolor="#7CBE42">
	  
	  <!--[if (gte mso 9)|(IE)]>
	  <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
	    <tr>
		  <td>
	  <![endif]-->
	  
	        <table class="content" width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="width: 600px !important; max-width: 600px;">
			  <tr>
			    <td class="status" style="color: #fff; padding: 20px 30px;">
				  <h1 class="h1" style="font-size: 24px; font-weight: normal; margin: 0;">Payment Verified</h1>
				</td>
		      </tr>
			</table>
			
	  <!--[if (gte mso 9)|(IE)]>
	      </td>
        </tr>
	  </table>
	  <![endif]-->
	  
	    </td>
	  </tr>
	</table>
	<table width="100%" bgcolor="#fafafa" border="0" cellpadding="0" cellspacing="0">
	  <tr>
	    <td>
		  
		  <!--[if (gte mso 9)|(IE)]>
          <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
            <tr>
			  <td>
          <![endif]-->
          
		        <table class="content" width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="width: 600px !important; max-width: 600px;">
				  <tr>
				    <td class="content-main" style="color: #333; background-color: #fff; padding: 20px 30px 30px;" bgcolor="#fff">
					  <table width="100%" border="0" cellspacing="0" cellpadding="0">
					    <tr>
						  <td>
						    <table border="0" cellspacing="0" cellpadding="0">
							  <tr>
							    <td>
								  <p style="line-height: 20px; margin: 0;">
								    Dear '.$detail->user_fullname.',
									<br /><br />
									We have verified your payment for order number <strong>'.$order_number.'</strong>. 
									We are currently processing your order and will be shipped using 
									<strong>'.$detail->shipping_method.'</strong> to
									<br /><br />
									<em>
									'.$detail->order_shipping_first_name.' '.$detail->order_shipping_last_name.'<br />
									'.$detail->order_shipping_phone.'<br />
									'.$detail->order_shipping_address.'<br />
									'.$detail->order_shipping_city.', '.$detail->order_shipping_province.'<br />
									'.$detail->order_shipping_country.' '.$detail->order_shippiorder_shipping_postal_codeng_country.'<br /></em>
									<br />
									We will send you another confirmation when the order has been shipped. Thank you.
									<br /><br />
									Regards,<br />
									'.$_global_general->website_title.' team
									</p>
							      </td>
								</tr>
							  </table>
							</td>
						  </tr>
						</table>
					  </td>
					</tr>
					<tr>
					   <td class="footer" style="font-size: 11px; color: #9197a4; padding: 20px 30px 15px;">
					   &copy;'.date('Y').' '.$_global_general->website_title.'. Powered by <a class="footerlink" href="" style="color: #a1a6b0; text-decoration: underline; font-size: 11px;">Antikode</a>.
					   <br /><br />
					   For further assistance or more information about '.$_global_general->website_title.', 
					   please contact our customer support at 
					   <a class="footerlink" href="'.$_global_info->email.'" style="color: #a1a6b0; text-decoration: underline; font-size: 11px;">'.$_global_info->email.'</a>.
					 </td>
				   </tr>
				 </table>
			   
		 <!--[if (gte mso 9)|(IE)]>
			 </td>
		   </tr>
		 </table>
		 <![endif]-->
	   
	   </td>
	 </tr>
   </table>
 </body>
</html>
';
/*
$mail_body = '<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="overflow: hidden; background: #fff">
	            <tbody>
				  <tr>
				    <td>
					  <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="overflow: hidden; background: #000">
					    <tr>
						  <td style="padding-left: 15px; padding-top: 10px; padding-bottom: 10px">
						    <img src="'.BASE_URL.'static/thimthumb.php?src='.$_global_notification->email_logo.'&h=50&w=50&q=100" height="50">
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
							  <span style="font-weight: 100">Order no.</span> <i style="font-size: 14px; color: #333">'.$order_number.'</i>
							</td>
						  <td style="font-size: 12px; color: #fff; padding: 10px 15px; text-align: right">
						<span style="line-height: 18px; color: #999"><b style="color: #39b54a">PAYMENT VERIFIED</b> </span>
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
			    Dear '.$detail->user_fullname.',<br>
			  <br>
			  We have verified your payment for order number <b>'.$order_number.'</b>. We are currently processing your order and will be delivered using <b>'.$detail->shipping_method.'</b> to
			  <br>
			  <br>
			  <b>'.$detail->order_shipping_first_name.' '.$detail->order_shipping_last_name.'</b><br>
			  '.$detail->order_shipping_phone.'<br>
			  '.$detail->order_shipping_address.'<br>
			  '.$detail->order_shipping_province.'<br>
			  '.$detail->order_shipping_postal_code.'<br>
			  '.$detail->order_shipping_country.'<br>
			  <br>
			  Once the order has been delivered, we will send another email notifying you about the delivery details.<br>
			  <br>
			  If you believe there is an error regarding the information stored. Please contact us through email at <a style="color:#0383ae" href="'.$_global_info->email.'">'.$_global_info->email.'</a>. Thank you!
			</td>
		  </tr>
		</tbody>
	  </table>
	  <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="font-size:11px; color: #999; margin-top:15px">
	    <tbody>
		  <tr>
		    <td style="padding-left:20px; padding-right:20px">
			  © '.date('Y').' '.$_global_general->website_title.'. Powered by <a style="color: #666; text-decoration: none" href="http://www.antikode.com">Antikode</a>. <br><br>
			</td>
		  </tr>
		</tbody>
	  </table>';

//echo $mail_body;
*/
?>