<?php
/*
* ----------------------------------------------------------------------
* EMAIL - ORDER PLACED ADMIN: CONTROL
* ----------------------------------------------------------------------
*/


$_email_get    = new V_EMAIL_GET();
$_email_update = new V_EMAIL_UPDATE();



$order_number = filter_var($_REQUEST['order_number'], FILTER_SANITIZE_STRING);


$count_order = $_email_get->count_order($order_number);
$get_order   = $_email_get->get_order($order_number);
$get_item    = $_email_get->get_order_item($get_order->order_id);
$get_bank    = $_email_get->get_bank($get_order->order_payment_method);


if($get_order->order_payment_method == 'cc'){
   $get_order->order_payment_method = 'Credit Card Via Veritrans';
}else{
   $get_order->order_payment_method = $get_order->order_payment_method;
}


$_SESSION['order_number'] = $order_number;


$mail_body = '<body style="font-family: Helvetica, Arial, sans-serif; color:#333333" topmargin="0" leftmargin="0">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="overflow: hidden;">
				  <tbody>
				    <tr>
					  <td>
					    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="overflow: hidden;">
						  <tr>
						    <td style="padding-left: 15px; padding-top: 10px; padding-bottom: 10px; color: #333; font-size: 20px;">'.$_global_general->website_title.'</td>
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
							    <span style="line-height: 18px; color: #999"><b style="color: #333">ORDER CANCELLED</b> </span>
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
					    <a style="color: #0383ae" href="'.BASE_URL.'admin/customer/'.$_global_user->user_alias.'">'.$_global_user->user_fullname.'</a> has placed an order 
						<a style="color: #0383ae" href="'.BASE_URL.'/admin/order-detailing/'.$order_number.'">'.$order_number.'</a> on '.$get_order->order_date.'.<br>
						<br>
						The total amount of <b>'.$get_order->currency.' '.price(CURRENCY, $get_order->order_total_amount).'.
						</b> However the payment is denied by Veritrans. For more info please check at <a href="http://my.veritrans.co.id" style="color:#0383ae; font-weight:bold;">Veritrans</a> dashboard panel.
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
								  <td width="540" style="padding-top: 13px; padding-bottom: 13px; border-bottom: 1px solid #e0e0e0; font-weight: 100">Sales Order</td>
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
								  '.$get_order->order_shipping_first_name." ".$get_order->order_shipping_last_name.'<br>
								  '.$get_order->order_shipping_phone.' <br>
								  '.preg_replace("/\n/","\n<br>",$get_order->order_shipping_address).' <br>
								  '.$get_order->order_shipping_country.'<br>
								  '.$get_order->order_shipping_province.'<br>
								  '.$get_order->order_shipping_city.'<br>
								</td>
								<td width="300" valign="top">
								  <b>Order Date</b> '.$get_order->order_date.'<br>
								  <b>Order No.</b> '.$order_number.'<br>
								  <b>Payment Method</b> '.$get_order->order_payment_method.'<br>
								  <b>Shipping Method</b> '.$get_order->shipping_method.'<br>
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
							    
								$sub_total       = 0;
								$sub_discount    = 0;
								$item_amount     = 0;
								
								foreach ($get_item as $item){
								   $sub_total    = $item->item_price * $item->item_quantity;
								   $sub_discount = $item->item_discount_price;
								 
$mail_body.='
					            <tr>
							      <td style="border-bottom: 1px solid #ccc; padding: 5px">
								    <table border="0" cellspacing="0" cellpadding="0">
								      <tr><td><b>'.$item->product_name.'</b></td></tr>
									  <tr><td>Color : <b>'.$item->type_name.'</b></td></tr>
									  <tr><td>Size : '.$item->stock_name.'</td></tr>
							        </table>
								  </td>
								  <td style="border-bottom: 1px solid #ccc;">'.$get_order->currency.' '.price(CURRENCY, ($item->type_price - $item->item_discount_price)).'</td>
								  <td style="border-bottom: 1px solid #ccc; text-align: center">'.$item->item_quantity.'</td>
								  <td style="border-bottom: 1px solid #ccc; text-align: right; padding-right: 5px">'.$get_order->currency.' '.price(CURRENCY, $sub_total).'</td>
								</tr>';
					
								}
$mail_body .='      
		  
		                      <tbody>
		                    </table>
						  </td>
						</tr>
						<tr>
						  <td>
						    <table width="540" border="0" cellspacing="0" cellpadding="0" align="center" style="font-size: 11px; line-height: 16px; padding-top: 7px">
							  <tbody>
							    <tr>
								  <td style="padding-left: 280px; padding-bottom: 5px">DISCOUNT</td>
								  <td style="padding-bottom: 5px; padding-right: 5px; text-align: right">'.$get_order->currency.' '.price(CURRENCY, $get_order->order_discount_amount).'</td>
								</tr>
								
								<tr>
								  <td style="padding-left: 280px; padding-bottom: 5px">SHIPPING FEE</td>
								  <td style="padding-bottom: 5px; padding-right: 5px; text-align: right">'.$get_order->currency.' '.price(CURRENCY, $get_order->order_shipping_amount).'</td>
								</tr>
								
								<tr>
								  <td style="border-top: 1px solid #ccc; padding: 7px 0 5px 280px">TOTAL</td>
								  <td style="border-top: 1px solid #ccc; padding-right: 5px; font-size: 14px; text-align: right"><b>'.$get_order->currency.' '.price(CURRENCY, $get_order->order_total_amount).'</b></td>
								</tr>
							  <tbody>
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
					  &copy; '.date('Y').' '.$_global_general->website_title.'. Powered by <a style="color: #666; text-decoration: none" href="http://www.antikode.com">Antikode</a>. <br><br>
					</td>
				  </tr>
				</tbody>
			  </table>';

//echo $mail_body;
?>