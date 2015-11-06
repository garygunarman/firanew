<?php
/*
* ----------------------------------------------------------------------
* EMAIL - NOTIFICATION CONFIRM PAYMENT ADMIN: CONTROL
* ----------------------------------------------------------------------
*/



$_get    = new EMAIL_GET();
$_update = new EMAIL_UPDATE();

//$order_number = filter_var($_REQUEST['order_number'], FILTER_SANITIZE_STRING);

$data         = $_get->get_user_confirm($order_number);
$bank_confirm = $_get->get_bank_confirm($data->order_confirm_bank);


/* --- CURRENCY SYMBOL --- */
if($data->currency == 1){
   $curr_symbol = $_sym_curr_idr;
}else{
   $curr_symbol = $_sym_curr_usd;
}


$mail_body = '';

$mail_body = '<body style="font-family: Helvetica, Arial, sans-serif; color:#fff" topmargin="0" leftmargin="0">
  			    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="overflow: hidden;">
				  <tbody>
				    <tr>
					  <td>
					    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="overflow: hidden;">
						  <tr>
						    <td style="padding-left: 15px; padding-top: 10px; padding-bottom: 10px; color: #333; font-size: 20px;">
							  '.$_global_general->website_title.'
							</td>
					      </tr>
						</table>
				      </td>
					</tr>
				  </tbody>
				</table>
				<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="overflow: hidden;">
				  <tbody>
				    <tr>
					  <td>
					    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="border-bottom: 1px solid #e0e0e0">
						  <tr>
						    <td>
							  <td style="font-size: 12px; color: #999; padding-left: 15px; text-align: left;">
							    <span style="font-weight: 100">Order no.</span> <i style="font-size: 14px; color: #333">'.$order_number.'</i>
						      </td>
							  <td style="font-size: 12px; color: #fff; padding: 10px 15px; text-align: right">
							    <span style="line-height: 18px; color: #999"><b style="color: #333">CONFIRMATION RECEIVED</b> </span>
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
					    <a style="color: #0383ae" href="'.BASE_URL."customer/".$data->user_alias.'">'.$data->user_fullname.'</a> has confirmed the payment for order <a style="color: #0383ae" href="'.BASE_URL."admin/order-detailing/".$order_number.'">'.$order_number.'</a> on '.date('D, j M Y').' at '.date('G:i A').' with the following details:<br>
						<br>
						<b>Paid to:</b> '.$bank_confirm->bank_name.' '.$bank_confirm->account_number.' A/N '.$bank_confirm->account_name.'<br>
						<b>Amount:</b> '.$curr_symbol.price($data->currency, $data->order_confirm_amount).'<br>
						<br>
						Once the payment has been verified, go to your admin panel and mark the order as paid.
					  </td>
					</tr>
				  </tbody>
				</table>
				<table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="font-size:11px; color: #999; margin-top:15px">
				  <tbody>
				    <tr>
					  <td style="padding-left:20px; padding-right:20px">
					    &copy; '.date("Y").' '.$_global_general->website_title.'. Powered by <a style="color: #666; text-decoration: none" href="http://www.antikode.com">Antikode</a>. <br><br>
					  </td>
					</tr>
				  </tbody>
				</table>';

//echo $mail_body;
?>