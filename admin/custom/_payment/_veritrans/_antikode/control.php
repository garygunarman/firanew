<?php
/*
# ----------------------------------------------------------------------
# VERITRANS - SUBMIT: CONTROL
# ----------------------------------------------------------------------
*/

include("get.php");
include("update.php");


$_get    = new PAYMENT_GET();
$_update = new PAYMENT_UPDATE();


$order_number = filter_var($_REQUEST['order_number'], FILTER_SANITIZE_STRING);
$count_order  = $_get->count_order($order_number);
$data_order   = $_get->get_order($order_number, 1);


if($count_order->rows > 0){
   
   if(!isset($_SESSION['veritrans'])){
      $_SESSION['veritrans']['order_number'] = $data_order->order_number;
      $_SESSION['veritrans']['order_total']  = $data_order->order_total_amount;
   }else{
      unset($_SESSION['veritrans']);
      $_SESSION['veritrans']['order_number'] = $data_order->order_number;
      $_SESSION['veritrans']['order_total']  = $data_order->order_total_amount;
   }
   
   $page = 'order_/_payment/_veritrans/examples/vt-web/checkout-process.php?order_number='.$_SESSION['veritrans']['order_number'].'&total='.$_SESSION['veritrans']['order_total'];
   
}else{
   $page = 'home';
   $type = 'danger';
   $msg  = 'Transaction Error please contact '.$_global_notification->email_order;
   
   set_alert($type, $msg);
}

safe_redirect($page);
?>