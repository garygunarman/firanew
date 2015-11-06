<?php
/*
# ----------------------------------------------------------------------
# HEADER: CRON
# ----------------------------------------------------------------------
*/

/*
* ----------------------------------------------------------------------
* EXPIRED ORDER
* ----------------------------------------------------------------------
*/
 
 
if(!isset($_SESSION['global_day']) || $_SESSION['global_day'] == ''){
   $_SESSION['global_day'] = date('d');
}else if($_SESSION['global_day'] != date('d') ){
   $_SESSION['global_day'] = date('d');
}


class CRON_EXPIRED_ORDER extends HeaderDatabase{
   
   protected $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function check_on_hold($post_end_time){
      $sql    	= "SELECT TIMESTAMPDIFF(second, '$post_end_time', NOW()) AS `second`";
	  $result	= $this->fetchData('single', $sql);
	  
      return $result;
   }
   
   
   function header_count_order($order_status, $payment_status){
      $sql    	= "SELECT COUNT(`order_id`) AS rows FROM `tbl_order` 
			       WHERE `order_status` = '$order_status' AND 
				   `payment_status` = '$payment_status' AND 
				   `order_date` < DATE_ADD(CURDATE(), INTERVAL -3 DAY)
				  ";
      $result	= $this->fetchData('single', $sql);
			
      return $result;
   }
   
   
   function header_get_order($order_status, $payment_status){
      //$sql    = "SELECT * FROM tbl_order WHERE DATE(`order_open_date`) = DATE_SUB(DATE(NOW()), INTERVAL 3 DAY) AND `payment_status` = '$payment_status'";
	  $sql    	= "SELECT * FROM `tbl_order` 
	  			   WHERE `order_status` = '$order_status' AND 
				   `payment_status` = '$payment_status' AND 
				   `order_date` < DATE_ADD(CURDATE(), INTERVAL -3 DAY)
				  ";
      $result	= $this->fetchData('multiple', $sql);
   
      return $result;
   }
		 
		 
   function header_get_billing($order_id){
      $sql    	= "SELECT `user_email` FROM tbl_user AS user_ INNER JOIN tbl_user_purchase AS pur_ ON user_.user_id = pur_.user_id WHERE `order_id` = '$order_id'";
      $result	= $this->fetchData('single', $sql);
			
      return $result;
   }
   
   
   function order_get_size_type($order_id){
      $sql    = "SELECT type_id, `stock_name`, item_quantity FROM tbl_order_item WHERE `order_id` = '$order_id'";
      $query  = $this->conn->query($sql);
      $row    = array();
			
      while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }
   
   
   function get_product_stock($type_id, $stock_name){
      $sql    = "SELECT stock_quantity, stock_id FROM tbl_product_stock WHERE `stock_name` = '$stock_name' AND `type_id` = '$type_id'";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
			
      return $result;
   }
   
   
   function header_update_expired_order($order_id){
      $sql    = "UPDATE tbl_order SET `order_expired_date` = NOW() WHERE `order_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
			
      if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("s", $order_id);
	     $stmt->execute(); 
	  }
	  
      $stmt->close();
   }
   
   
   function update_status_expired($status, $date, $payment, $fulfillment_status, $order_id){
      $sql   = "UPDATE tbl_order SET `order_status` = ?,
                `order_expired_date` = ?,
				`payment_status` = ?,
				`fulfillment_status` = ?
				WHERE `order_id` = ?         
			   ";
      $stmt   = $this->conn->prepare($sql);
	  
      if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssss", $status, $date, $payment, $fulfillment_status, $order_id);
		 $stmt->execute(); 
	  }
	  
      $stmt->close();
   }
   
   
   function order_update_stock($stock_quantity, $stock_id){
      $sql    = "UPDATE tbl_product_stock SET `stock_quantity` = ? WHERE `stock_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
      if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $stock_quantity, $stock_id);
	     $stmt->execute(); 
	  }
	  
      $stmt->close();
   }
	  
}
	  
	  
$_cron = new CRON_EXPIRED_ORDER();
$_cron_email = 1;


$header_check_expired = $_cron->header_count_order('Open', 'Unpaid');
	  
if($header_check_expired->rows > 0){
   $header_get_expired   = $_cron->header_get_order('Open', 'Unpaid');
	     
   foreach($header_get_expired as $key=>$header_get_expired){
			
      $status      = 'Expired';
	  $date        = date('Y-m-d H:i:s');
	  $payment     = $header_get_expired->payment_status;
	  $fulfillment = $header_get_expired->fulfillment_status;
	  $order_id    = $header_get_expired->order_id;
			
      $order_item  = $_cron->order_get_size_type($order_id);
	  
	  foreach($order_item as $order_item){
	     $temp_stock = $_cron->get_product_stock($order_item->type_id, $order_item->stock_name);
		 $stock      = $temp_stock->stock_quantity + $order_item->item_quantity;
			   
	     $_cron->order_update_stock($stock, $temp_stock->stock_id);
	  }
	  
	  $_cron->update_status_expired($status, $date, $payment, $fulfillment, $order_id);
	  
	  /* --- ORDER LOG --- */
	  $description	= 14;
	  $created_date = date('Y-m-d H:i:s');
	  $note			= '';
	  $_global->update_log($order_id, $description, $note, $created_date);
	  
	  
	  if($_cron_email == 1){
	     /* --- EMAIL --- */
		 $header_expired_user = $_cron->header_get_billing($header_get_expired->order_id);
			require dirname(__FILE__).'/../../emails/order_/_expired/email-expired.php';
		 
		 /* --- ORDER LOG --- */
		 $description	= 15;
		 $created_date 	= date('Y-m-d H:i:s');
		 $note			= '';
		 $_global->update_log($order_id, $description, $note, $created_date);
			
	  }//mail($recipient, $subject, $mail_body, $headers);

   }// foreach($header_get_expired as $key=>$header_get_expired)
   
}// END if($header_check_expired['rows'] > 0)

/*
*---------------------------------------------------------------
* END EXPIRED ORDER
*---------------------------------------------------------------
*/
?>