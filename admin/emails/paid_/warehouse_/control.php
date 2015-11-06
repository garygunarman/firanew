<?php
/*
* ----------------------------------------------------------------------
* EMAIL - NOTIFICATION VERIFIED WAREHOUSE: CONTROL
* ----------------------------------------------------------------------
*/


$_email_get    = new V_EMAIL_GET();
$_email_update = new V_EMAIL_UPDATE();



//$order_number = filter_var($_REQUEST['order_number'], FILTER_SANITIZE_STRING);
$order_number = filter_var($order_number, FILTER_SANITIZE_STRING);

$cart   = $_email_get->get_cart($order_number);
$person = $_email_get->get_person($order_number);
$item   = $_email_get->get_items($order_number);


if($cart->order_confirm_bank == ''){
   $cart->order_confirm_bank == $cart->order_payment_method;
}else{
   $cart->order_confirm_bank = $cart->order_confirm_bank;
}


/* --- CURRENCY SYMBOL --- */
if($cart->currency == 1){
   $curr_symbol = $_sym_curr_idr;
}else{
   $curr_symbol = $_sym_curr_usd;
}


$headers     = '';


$mail_body = '<body style="font-family: Helvetica, Arial, sans-serif; color:#fff" topmargin="0" leftmargin="0">
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="overflow: hidden;">
				  <tbody>
				    <tr>
					  <td>
					    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="overflow: hidden;">
						  <tr>
						    <td style="padding-left: 15px; padding-top: 10px; padding-bottom: 10px; color: #333; font-size: 20px;">
							  '.$_global_general->website_title.' Admin
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
							    <span style="font-weight: 100">Order no.</span> <i style="font-size: 14px; color: #333">'.$cart->order_number.'</i>
						      </td>
							  <td style="font-size: 12px; color: #fff; padding: 10px 15px; text-align: right">
							    <span style="line-height: 18px; color: #999"><b style="color: #333">DELIVERY ORDER</b> </span>
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
					    Please process the following order immediately.
					  </td>
					</tr>
				    <tr>
					  <td>
					    <table border="0" cellspacing="0" cellpadding="0" style="margin-left: 15px; margin-right: 15px; padding-bottom: 15px; border: 1px solid #e0e0e0">
						  <tr>
						    <td>
							  <table border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 10px; font-size: 14px; text-align: center">
							    <tr>
								  <td width="15"></td>
								  <td width="540" style="padding-top: 13px; padding-bottom: 13px; border-bottom: 1px solid #e0e0e0; font-weight: 100">
								    Delivery Order
								  </td>
								  <td width="15"></td>
								</tr>
							  </table>
							</td>
						  </tr>
						  <tr>
						    <td>
							  <table border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 20px; margin-top: 10px; font-size: 11px">
							    <td width="310" style="padding-left: 20px;">
								  <b>Shipping Address</b><br>
								  '.$cart->order_shipping_first_name.'<br>
								  '.$cart->order_shipping_last_name.'<br>
								  '.$cart->order_shipping_phone.'<br>
								  '.preg_replace("/\n/","\n<br>",$cart->order_shipping_address).'<br>
								  '.$cart->order_shipping_city.'<br>
								  '.$cart->order_shipping_province.'<br>
								  '.$cart->order_shipping_country.'<br>
								  '.$cart->order_shipping_postal_code.'<br>
								</td>
								<td width="300" valign="top">
								  <b>Order Date</b> '.format_date($cart->order_date).substr($cart->order_date, -9).'<br>
								  <b>Order No.</b> '.$cart->order_number.'<br>
								  <b>Payment Method</b> '.$_global_payment_method[$cart->order_payment_type].'<br>
								  <b>Shipping Method</b> '.$cart->shipping_method.'<br>
								</td>
							  </table>
							</td>
					      </tr>
						  <tr>
						    <td>
							  <table width="540" border="0" cellspacing="0" cellpadding="0" align="center" style="font-size: 11px; border:">
							    <thead>
								  <tr style="text-align: left;">
								    <th style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; padding-left: 5px" width="345">Items</th>
									<th style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;" width="120">Price</th>
									<th style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; text-align: center" width="60">Qty.</th>
									<th style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; padding-right: 5px; text-align: right" width="115">Total</th>
								  </tr>
								</thead>
								<tbody style="line-height: 18px">';
								
								foreach($item as $item){
				     
								   $price    = $item->item_price - $item->item_discount_price;
								   $sub_item = $price * $item->item_quantity;
				  
$mail_body .= '                 <tr>
								  <td style="border-bottom: 1px solid #ccc; padding: 5px">
								    <table border="0" cellspacing="0" cellpadding="0">
									  <tr><td><b>'.$item->product_name.'</b></td></tr>
									  <tr><td>'.$item->type_name.'</td></tr>
									  <tr><td>'.$item->stock_name.'</td></tr>
								    </table>
								  </td>
								  <td style="border-bottom: 1px solid #ccc;">'.$curr_symbol.price($item->currency, $price).'</td>
								  <td style="border-bottom: 1px solid #ccc; text-align: center">'.$item->item_quantity.'</td>
								  <td style="border-bottom: 1px solid #ccc; text-align: right; padding-right: 5px">'.$curr_symbol.price($item->currency, $sub_item).'</td>
								</tr>';
								
								}
					
$mail_body .= ' 			  <tbody>
							</table>
						  </td>
						</tr>
						<tr>
						  <td>
						    <table width="540" border="0" cellspacing="0" cellpadding="0" align="center" style="font-size: 11px; line-height: 16px; padding-top: 7px">
							  <tbody>
							    <tr>
								  <td style="padding-left: 280px; padding-bottom: 5px">SHIPPING FEE</td>
								  <td style="padding-bottom: 5px; padding-right: 5px; text-align: right">'.$curr_symbol.price($cart->currency, $cart->order_shipping_amount).'</td>
								</tr>
								<tr>
								  <td style="border-top: 1px solid #ccc; padding: 7px 0 5px 280px">TOTAL</td>
								  <td style="border-top: 1px solid #ccc; padding-right: 5px; font-size: 14px; text-align: right">
								    <b>'.$curr_symbol.price($cart->currency, $cart->order_total_amount).'</b>
								  </td>
								</tr>
							  </tbody>
							</table>
						  </td>
						</tr>
					  </table>
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