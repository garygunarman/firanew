<?php
/*
* ----------------------------------------------------------------------
* EMAIL - NOTIFICATION BACK ORDER: CONTROL
* ----------------------------------------------------------------------
*/



$_get    = new EMAIL_GET();
$_update = new EMAIL_UPDATE();

//$order_number = filter_var($_REQUEST['order_number'], FILTER_SANITIZE_STRING);
$order_number = $order_number;


$get_order    = $_get->detail_order($order_number);
$get_item     = $_get->detail_order_item($get_order->order_id);


if($get_order->order_voucher_value == 0 && $get_order->order_shipping_amount == 0){
   $get_order->currency   = '';
   $order_shipping_amount = 'Free Shipping';
}else{
			     
   if($get_order->order_voucher_value != 0 && $get_order->order_shipping_amount == 0){
      $get_order->currency   = '';
      $order_shipping_amount = 'Free Shipping';
   }else{
      $get_order->currency   = $get_order->currency;
      $order_shipping_amount = price(CURRENCY, $get_order->order_shipping_amount);
   }
				 
}


$day    = date('d');
$month  = date('m');
$year   = date('Y');
$hour   = date('H');
$minute = date('i');
$second = date('s');

$current_time = date('Y-m-d');


$mail_body  = '';

$mail_body = '<body style="font-family: Helvetica, Arial, sans-serif; color:#333333" topmargin="0" leftmargin="0">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="overflow: hidden; background: #fff">
				  <tbody>
				    <tr>
					  <td>
					    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="overflow: hidden; background: #fff">
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
							    <span style="line-height: 18px; color: #999"><b style="color: #cc0000">ORDER CANCELLED</b> </span>
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
					    Dear '.$get_order->order_billing_first_name." ".$get_order->order_billing_last_name.',<br>
						<br>
						Your order at '.$_global_general->website_title.' <b>'.$order_number.'</b> has been cancelled. With the following reason:<br>
						<br>
						<b>'.$get_order->order_billing_note.'</b>
						<br>
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
							  Order Details 
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
						  '.$get_order->order_shipping_first_name." ".$get_order->order_shipping_last_name.'<br>
					      '.$get_order->order_shipping_phone.' <br>
						  '.preg_replace("/\n/","\n<br>",$get_order->order_shipping_address).' <br>
						  '.$get_order->order_shipping_country.'<br>
						  '.$get_order->order_shipping_province.'<br>
						  '.$get_order->order_shipping_city.'<br>
						</td>
						<td width="300" valign="top">
						  <b>Order Date</b> '.$get_order->order_cancelled_date.'<br>
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
						  $discount_amount = 0;
						  $item_amount     = 0;
						  foreach ($get_item as $item){
						     //$product_item     = $_get->detail_order_item_product($item->type_id, $item->order_id);
							 $product_item     = $_get->detail_order_item_product($item->type_id, $item->stock_name, $item->order_id);
							 $sub_total        = ($product_item->item_price - $product_item->item_discount_price) * $item->item_quantity;
					
$mail_body.= '            <tr>
  						    <td style="border-bottom: 1px solid #ccc; padding: 5px">
							  <table border="0" cellspacing="0" cellpadding="0">
							    <tr><td><b>'.$product_item->product_name.'</b></td></tr>
								<tr><td>Color : <b>'.$product_item->type_name.'</b></td></tr>
								<tr><td>Size : <b>'.$product_item->stock_name.'</b></td></tr>
							  </table>
							</td>
							<td style="border-bottom: 1px solid #ccc;">'.$currency.price(CURRENCY, ($product_item->item_price - $product_item->item_discount_price)).'</td>
							<td style="border-bottom: 1px solid #ccc; text-align: center">'.$item->item_quantity.'</td>
							<td style="border-bottom: 1px solid #ccc; text-align: right; padding-right: 5px">'.$currency.price(CURRENCY, $sub_total).'</td>
					      </tr>';
						  
							 $item_amount += $sub_total;
						  }
					
$mail_body .= '
                        </tbody>
					  </table>
					</td>
				  </tr>
				  <tr>
				    <td>
					  <table width="540" border="0" cellspacing="0" cellpadding="0" align="center" style="font-size: 11px; line-height: 16px; padding-top: 7px">
					    <tbody>
						  <tr>
						    <td style="padding-left: 280px; padding-bottom: 5px">DISCOUNT</td>
							<td style="padding-bottom: 5px; padding-right: 5px; text-align: right">'.$currency.price(CURRENCY, $get_order->order_discount_amount).'</td>
						  </tr>';
						  
						  if($get_order->order_voucher_value > 0){
						  
$mail_body .= '						  
						  <tr>
						    <td style="padding-left: 280px; padding-bottom: 5px">VOUCHER</td>
							<td style="padding-bottom: 5px; padding-right: 5px; text-align: right">'.$currency.price(CURRENCY, $get_order->order_voucher_value).'</td>
					      </tr>';
						  
						  }
$mail_body .= '						  
						  <tr>
						    <td style="padding-left: 280px; padding-bottom: 5px">SHIPPING FEE</td>
							<td style="padding-bottom: 5px; padding-right: 5px; text-align: right">'.$currency.$order_shipping_amount.'</td>
					      </tr>
						  <tr>
						    <td style="border-top: 1px solid #ccc; padding: 7px 0 5px 280px">TOTAL</td>
							<td style="border-top: 1px solid #ccc; padding-right: 5px; font-size: 14px; text-align: right">
							  <b>'.$currency.price(CURRENCY, $get_order->order_total_amount).'</b>
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
			    © '.date('Y').' '.$_global_general->website_title.'. Powered by <a style="color: #666; text-decoration: none" href="http://www.antikode.com">Antikode</a>. <br><br>
			  </td>
			</tr>
		  </tbody>
		</table>';

//echo $mail_body;
?>