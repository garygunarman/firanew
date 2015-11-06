<?php
/*
* ----------------------------------------------------------------------
* EMAIL - WAITING FOR PAYMENT CUSTOMER: CONTROL
* ----------------------------------------------------------------------
*/


$_email_get    = new V_EMAIL_CUST_GET();
$_email_update = new V_EMAIL_CUST_UPDATE();


$order_number = filter_var($order_number, FILTER_SANITIZE_STRING);


$count_order = $_email_get->count_order($order_number);
$get_order   = $_email_get->get_order($order_number);
$get_item    = $_email_get->get_order_item($get_order->order_id);
//$get_bank    = $_email_get->get_bank($get_order->order_payment_method);
$get_bank    = $_email_get->get_banks(1, 1, $get_order->currency);


/* --- CURRENCY SYMBOL --- */
if($get_order->currency == 1){
   $curr_symbol = $_sym_curr_idr;
   
}else{
   $curr_symbol = $_sym_curr_usd;
   
}


$headers	= '';
$file		= BASE_URL.'admin/static/thimthumb.php?src='.$_global_notification->email_logo.'&h=50&q=100';
$headers	= @get_headers($file);

if(is_array($headers) && strpos($headers[0], '404 Not Found')){
   $exists		= false;
   $prefix_img	= 'static/thimthumb.php?src=';
   
}else{
   $exists = true;
   $prefix_img	= 'admin/static/thimthumb.php?src=';

}

$mail_body = '';
$mail_body	.= '
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
					  <img class="brand" src="'.BASE_URL.$prefix_img.$_global_notification->email_logo.'&h=50&q=100" border="0" alt="" style="width: 90px; height: auto; padding: 20px 10px;" />
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
	<table width="100%" bgcolor="#fafafa" border="0" cellpadding="0" cellspacing="0"><tr><td class="bg_red" style="background-color: #D0021B;" bgcolor="#D0021B">
	  
	  <!--[if (gte mso 9)|(IE)]>
	  <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
	    <tr>
		  <td>
	  <![endif]-->
	  
	        <table class="content" width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="width: 600px !important; max-width: 600px;">
			  <tr>
			    <td class="status" style="color: #fff; padding: 20px 30px;">
                  <h1 class="h1" style="font-size: 24px; font-weight: normal; margin: 0;">Waiting for Payment</h1>
				  <em>Expired in 1 x 24 hour</em>
				</td>
			  </tr>
			</table>
			
	  <!--[if (gte mso 9)|(IE)]>
          </td>
        </tr>
	  </table>
	  <![endif]-->
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
							  Dear '.$get_order->order_billing_first_name.',
							  <br /><br />
                              Thank you for placing your order at '.$_global_general->website_title.'. 
							  Your order number is <strong>'.$order_number.'</strong>. 
							  To complete the order process, please pay the total amount of <strong>'.$curr_symbol.price(CURRENCY, $get_order->order_total_amount).'</strong> to:
							  <br /><br />
							</p>
                          </td>
                        </tr>
					  </table>';
					  
					  foreach($get_bank as $get_bank){

$mail_body		.= '
					  <!--[if (gte mso 9)|(IE)]>
                      <table width="257" align="left" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                          <td>
                      <![endif]-->
					  
					  <table align="left" class="col257 account" border="0" cellspacing="0" cellpadding="0" style="width: 257px !important; max-width: 257px; border-left-width: 2px; border-left-color: #eee; border-left-style: solid; margin: 0 0 15px; padding: 0 0 0 15px;">
					  
					    <tr>
						  <td>
						    <p style="line-height: 20px; margin: 0;">
							  <strong>'.$get_bank->bank_name.'</strong>
							  <br />
							  <span class="cl-lig-grey" style="color: #a1a6b0;">Acc. No.</span> '.$get_bank->account_number.'
							  <br />
							  <span class="cl-lig-grey" style="color: #a1a6b0;">Acc. Name</span> '.$get_bank->account_name.'
							</p>
                          </td>
                        </tr>
						
					  </table>
					
				<!--[if (gte mso 9)|(IE)]>
                    </td>
				  </tr>
				</table>
				<![endif]-->';
				
					  }
					  
$mail_body		.= '
		  
		        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top: 20px;">
				  <tr>
				    <td style="width: 100%;">
					  <p style="line-height: 20px; margin: 0;">And confirm your payment by clicking the button below:</p>
					  <tr>
						<td style="padding: 10px 0 15px;">
						  <table align="left" class="buttonwrapper" bgcolor="#333" border="0" cellspacing="0" cellpadding="0" style="background-color: transparent !important;">
							<tr>
							  <td class="button" height="40" style="text-align: center; text-transform: uppercase; letter-spacing: 0.5px; padding: 0;" align="center">
								<a href="'.BASE_URL.'confirm" style="color: #ffffff; text-decoration: none; display: block !important; background-color: #333; padding: 10px 15px;">Confirm Payment</a>
						      </td>
							</tr>
					      </table>
						</td>
					  </tr>
					  <tr>
					    <td class="border-top" style="border-top-width: 1px; border-top-color: #d3d7e1; border-top-style: dashed; margin: 20px 0 0; padding: 10px 0 0;">
						  or go to <a href="'.BASE_URL.'confirm" style="color: #2469A5; text-decoration: none;">antikode.com/confirm</a>
						</td>
					  </tr>
					</td>
				  </tr>
			    </table>
			  </td>
			</tr>
		  </table>
		  
	<!--[if (gte mso 9)|(IE)]>
		</td>
      </tr>
	</table>
	<![endif]-->
	
	<table class="content" width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="margin-top: 10px; width: 600px !important; max-width: 600px;"
	  <tr>
	    <td class="content-main" style="color: #333; background-color: #fff; padding: 20px 30px 30px;" bgcolor="#fff">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td>
			    <table width="100%" class="table" border="0" cellspacing="0" cellpadding="0" style="padding: 0 0 15px;">
				  <thead>
				    <tr>
					  <th style="border-bottom-width: 1px; border-bottom-color: #eee; border-bottom-style: solid; border-top-style: none; color: #a1a6b0; font-size: 11px; letter-spacing: 1px; text-transform: uppercase; font-weight: normal; text-align: left; padding: 10px 0;" align="left">
					    Order Summary
					  </th>
					</tr>
				  </thead>
				</table>
				
				<!--[if (gte mso 9)|(IE)]>
				<table width="257" align="left" cellpadding="0" cellspacing="0" border="0">
				  <tr>
				    <td>
				<![endif]-->
				      
					  <table align="left" class="col257 info" border="0" cellspacing="0" cellpadding="0" style="width: 257px !important; max-width: 257px; margin: 0 20px 10px 0;">
					    <tr>
						  <td>
						    <p style="line-height: 20px; margin: 0;">
							  <strong>Ship to</strong>
							  <br />
                              '.$get_order->order_shipping_first_name.' '.$get_order->order_shipping_last_name.'<br />
                              '.$get_order->order_shipping_phone.'<br />
                              '.preg_replace("/\n/","\n<br>",$get_order->order_shipping_address).'<br />
                              '.$get_order->order_shipping_city.', '.$get_order->order_shipping_province.'<br />
                              '.$get_order->order_shipping_province.' '.$get_order->order_shipping_postal_code.'
							</p>
                          </td>
                        </tr>
				      </table>
			    
				<!--[if (gte mso 9)|(IE)]>
                    </td>
				  </tr>
				</table>
				<![endif]-->
				
				<!--[if (gte mso 9)|(IE)]>
				<table width="257" align="left" cellpadding="0" cellspacing="0" border="0">
				  <tr>
				    <td>
			    <![endif]-->
				      
					  <table align="left" class="col257 info" border="0" cellspacing="0" cellpadding="0" style="width: 257px !important; max-width: 257px; margin: 0 0 15px;">
					    <tr>
						  <td>
						    <p style="line-height: 20px; margin: 0;">
							  <strong>Order No.</strong> '.$order_number.'<br />
							  <strong>Order Date.</strong> '.format_date($get_order->order_date).'<br />
							  <strong>Payment by</strong> '.$_global_payment_method[$get_order->order_payment_type].'
							  <br />
							  <strong>Ship with</strong> '.$get_order->shipping_method.'
							  <br />
							</p>
                          </td>
                        </tr>
					  </table>
					  
			    <!--[if (gte mso 9)|(IE)]>
                    </td>
			      </tr>
				</table>
				<![endif]-->
				
				<table class="table" width="100%" border="0" cellspacing="0" cellpadding="0" style="padding: 15px 0 0;">
				  <thead>
				    <tr>
					  <th colspan="2" style="border-top-style: none; color: #a1a6b0; font-size: 11px; letter-spacing: 1px; text-transform: uppercase; font-weight: normal; text-align: left; padding: 10px 0;" align="left">
					    Items
					  </th>
					</tr>
				  </thead>
				  <tbody>';
				  
				  $sub_total       = 0;
				  $discount_amount = 0;
				  $item_amount     = 0;
				  foreach ($get_item as $item){
				     $sub_total			= ($item->item_price - $item->item_discount_price) * $item->item_quantity;
					 $item->item_price	= $item->item_price - 0;
				  
$mail_body	.='			  
				  
				    <tr>
					  <td style="border-top-width: 1px; border-top-color: #eee; border-top-style: solid; padding: 10px 0;">
					    <p style="line-height: 20px; margin: 0;">
						  <strong>'.$item->product_name.'</strong>
						  <br />
						  '.$item->type_name.' / '.$item->stock_name.' / '.$item->item_quantity.' pc(s).
						</p>
					  </td>
					  <td class="text-right" style="text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; padding: 10px 0;" align="right">
					    <p style="line-height: 20px; margin: 0;">'.$curr_symbol.price($get_order->currency, ($item->item_price - $item->item_discount_price)).'</p>
					  </td>
					</tr>
				  </tbody>';
				  
				  }
$mail_body	.='			  
				  <tfoot>
				    <tr>
					  <td style="border-top-width: 1px; border-top-color: #eee; border-top-style: solid; padding: 10px 0;">
					    <p style="line-height: 20px; margin: 0;">Discount</p>
				      </td>
					  <td class="text-right" style="text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; padding: 10px 0;" align="right">
					    <p style="line-height: 20px; margin: 0;">-'.$curr_symbol.price($get_order->currency, ($item->item_discount_price)).'</p>
					   </td>
					 </tr>
					 <tr>
					   <td style="border-top-style: none; border-top-width: 1px; border-top-color: #eee; padding: 0 0 10px;">
					     <p style="line-height: 20px; margin: 0;">Shipping fee</p>
					   </td>
					   <td class="text-right" style="border-top-style: none; text-align: right; border-top-width: 1px; border-top-color: #eee; padding: 0 0 10px;" align="right">
					     <p style="line-height: 20px; margin: 0;">'.$curr_symbol.price($get_order->currency, $get_order->order_shipping_amount).'</p>
					   </td>
					 </tr>
					 <tr>
					   <td style="border-top-width: 1px; border-top-color: #eee; border-top-style: solid; padding: 10px 0;">
					     <p style="line-height: 28px; margin: 0;"><strong>Total</strong></p>
					   </td>
					   <td class="text-right" style="font-size: 18px; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; padding: 10px 0;" align="right">
					     <p style="line-height: 20px; margin: 0;"><strong>'.$curr_symbol.price(CURRENCY, $get_order->order_total_amount).'</strong></p>
					   </td>
					 </tr>
				  </tfoot>
				</table>
			  </td>
			</tr>
		  </table>
		</td>
	  </tr>
	  <tr>
	    <td class="footer" style="font-size: 11px; color: #9197a4; padding: 20px 30px 15px;">
		  &copy; '.date('Y').' '.$_global_general->website_title.'. Powered by <a class="footerlink" href="" style="color: #a1a6b0; text-decoration: underline; font-size: 11px;">Antikode</a>.
		  <br />
		  <br />
		  For further assistance or more information about '.$_global_general->website_title.'., please contact our customer support at <a class="footerlink" href="mailto:'.$_global_info->email.'" style="color: #a1a6b0; text-decoration: underline; font-size: 11px;">'.$_global_info->email.'</a>.
		</td>
	  </tr>
	</table>
	
	<!--[if (gte mso 9)|(IE)]>
  </td>
</tr>
</table>
          <![endif]--></td>
      </tr></table></body>
</html>
';

/*
$mail_body .= '<body style="font-family: Helvetica, Arial, sans-serif; color:#333333" topmargin="0" leftmargin="0">
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
							    <span style="font-weight: 100">Order no.</span> <i style="font-size: 14px; color: #333">'.$order_number.'</i>
						      </td>
							  <td style="font-size: 12px; color: #fff; padding: 10px 15px; text-align: right">
							    <span style="line-height: 18px; color: #999"><b style="color: #cc0000">WAITING FOR PAYMENT</b> </span>
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
						Thank you for placing your order at '.$_global_general->website_title.'. Your order number is <b>'.$order_number.'</b>. To complete the order process, please pay the total amount of <b style="color: #000">'.$curr_symbol.price($get_order->currency, $get_order->order_total_amount).'</b> to:<br>
						<br>
						<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="#f6f6f6" style="font-size: 14px">';
						  
						  foreach($get_bank as $get_bank){
$mail_body.=		         '<tr>
							    <td>'.$get_bank->bank_name.' '.$get_bank->account_number." A/N: ".$get_bank->account_name.'</td>
							 </tr>';
						  }
			  
$mail_body .='
                        </table>
						<br>
						And confirm your payment at <a style="color: #0383ae" href="'.BASE_URL."confirm".'">'.BASE_URL.'confirm</a><br>
						<br>
						<i style="color: #cc0000">*Please note that your order will be set as expired if no confirmation is made within 2x24 hours.</i>
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
							  Order Receipt 
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
						  <b>Order Date</b> '.format_date($get_order->order_date).' '.substr($get_order->order_date, -9).'<br>
						  <b>Order No.</b> '.$order_number.'<br>
						  <b>Payment Method</b> '.$_global_payment_method[$get_order->order_payment_type].'<br>
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
						     $sub_total			= ($item->item_price - $item->item_discount_price) * $item->item_quantity;
							 $item->item_price	= $item->item_price - 0;
					
$mail_body.= '            <tr>
  						    <td style="border-bottom: 1px solid #ccc; padding: 5px">
							  <table border="0" cellspacing="0" cellpadding="0">
							    <tr><td><b>'.$item->product_name.'</b></td></tr>
								<tr><td>Color: <b>'.$item->type_name.'</b></td></tr>
								<tr><td>Size: <b>'.$item->stock_name.'</b></td></tr>
								<tr><td>Weight: <b>'.$item->type_weight.'Kg</b></td></tr>
							  </table>
							</td>
							<td style="border-bottom: 1px solid #ccc;">'.$curr_symbol.price($get_order->currency, ($item->item_price - $item->item_discount_price)).'</td>
							<td style="border-bottom: 1px solid #ccc; text-align: center">'.$item->item_quantity.'</td>
							<td style="border-bottom: 1px solid #ccc; text-align: right; padding-right: 5px">'.$curr_symbol.price($get_order->currency, $sub_total).'</td>
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
							<td style="padding-bottom: 5px; padding-right: 5px; text-align: right">'.$curr_symbol.price($get_order->currency, $get_order->order_discount_amount).'</td>
						  </tr>
						  <tr>
						    <td style="padding-left: 280px; padding-bottom: 5px">SHIPPING FEE</td>
							<td style="padding-bottom: 5px; padding-right: 5px; text-align: right">'.$curr_symbol.price($get_order->currency, $get_order->order_shipping_amount).'</td>
					      </tr>
						  <tr>
						    <td style="border-top: 1px solid #ccc; padding: 7px 0 5px 280px">TOTAL</td>
							<td style="border-top: 1px solid #ccc; padding-right: 5px; font-size: 14px; text-align: right">
							  <b>'.$curr_symbol.price(CURRENCY, $get_order->order_total_amount).'</b>
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
*/
//echo $mail_body;
?>