<?php



/* --- URL BACK FOR LOGIN / REGISTER PAGE --- */
if(isset($_SESSION['page']['visit'])){
	
   if(ACT != 'account_/login/login' && ACT != 'account_/register_/register'){
      $_SESSION['page']['visit'] = CURR_URL;
	  
   }
   
}else{
	
   if(ACT != 'account_/login/login' && ACT != 'account_/register_/register'){
      $_SESSION['page']['visit'] = CURR_URL;
	  
   }
   
}
?>