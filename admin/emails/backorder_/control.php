<?php
/*
* ----------------------------------------------------------------------
* EMAIL - NOTIFICATION BACK ORDER: CONTROL
* ----------------------------------------------------------------------
*/



$_get    = new EMAIL_GET();
$_update = new EMAIL_UPDATE();

$back_id = filter_var($_REQUEST['back_id'], FILTER_SANITIZE_NUMBER_INT);


$count_order = $_get->count_backorder($back_id);
$get_order   = $_get->get_backorder($back_id);
$get_item    = $_get->count_stock($get_order->type_id, $get_order->stock_name);

if($get_order->user_fullname == ''){
   $get_order->user_fullname = $get_order->email;
}else{
   $get_order->user_fullname = $get_order->user_fullname;
}


if($get_order->promo_item_id != ''){
   
   if($get_order->promo_id == 1){
      $price = ($get_order->promo_value / 100) * $get_order->type_price;
   }else if($get_order->promo_id == 2){
      $price = $get_order->type_price - $get_order->promo_value;
   }
   
   $get_order->type_price = $price;
   
}else{
   $get_order->type_price = $get_order->type_price;
}


$day    = date('d');
$month  = date('m');
$year   = date('Y');
$hour   = date('H');
$minute = date('i');
$second = date('s');

$_update->update_order(0, $back_id);


$mail_body = '';

$mail_body .= '<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="overflow: hidden; background: #000">
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
						     <td style="font-size: 12px; color: #fff; padding: 10px 15px; text-align: right">
							   <span style="line-height: 18px; color: #999"><b style="color: #39b54a">NOTIFICATION</b> </span>
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
					   Dear '.$get_order->user_fullname.',<br>
					   At '.format_date($get_order->time).' '.substr($get_order->time,11, -3).' WIB you reqeust to be notified for the following item when available.<br>
					 </td>
				   </tr>
				   <tr>
				     <td>
					   <table border="0" cellspacing="0" cellpadding="0" style="margin-left: 15px; margin-right: 15px; padding-bottom: 15px; border: 1px solid #e0e0e0">
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
							 <tbody style="line-height: 18px">
							   <tr>
							     <td style="border-bottom: 1px solid #ccc; padding: 5px;" width="200px">
							       <table border="0" cellspacing="0" cellpadding="0">
								     <tr>
									   <td>
									     <a href="'.BASE_URL.'../item/'.$get_order->category_alias.'/'.$get_order->product_alias.'/'.$get_order->type_alias.'">
									       <b><img src="'.BASE_URL.'static/thimthumb.php?src=../'.$get_order->img_src.'&h=100&q=100"></b>
										 </a>
									   </td>
									 </tr>
								     <tr>
									   <td>
									     <a href="'.BASE_URL.'../item/'.$get_order->category_alias.'/'.$get_order->product_alias.'/'.$get_order->type_alias.'">
									       <b>'.$get_order->product_name.'</b>
										 </a>
									   </td>
									 </tr>
								     <tr><td>'.$get_order->type_name.'</td></tr>
								     <tr><td>'.$get_order->stock_name.'</td></tr>
								   </table>
							     </td>
							     <td style="border-bottom: 1px solid #ccc;">'.$currency.' '.price(CURRENCY, $get_order->type_price).'</td>
							     <td style="border-bottom: 1px solid #ccc; text-align: center">'.$get_order->qty.'</td>
							     <td style="border-bottom: 1px solid #ccc; text-align: right; padding-right: 5px">'.$currency.' '.price(CURRENCY, $get_order->type_price * $get_order->qty).'</td>
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
						     © '.date("Y").' '.$_global_general->website_title.'. Powered by <a style="color: #666; text-decoration: none" href="http://www.antikode.com">Antikode</a>. <br><br>
						   </td>
						 </tr>
					   </tbody>
					 </table>';

//echo $mail_body;
?>