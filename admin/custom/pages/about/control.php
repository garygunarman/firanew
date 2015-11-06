<?php
/* --- LANGUAGE --- */
if(isset($_REQUEST['lang'])){
   $lang	= filter_var($_REQUEST['lang'], FILTER_SANITIZE_STRING);
   
}else{
   $lang	= 'ID';
   
}


/* --- HIDDEN FIELD --- */
$_hidden_field_active	= '';
$_hidden_field_category	= '';

if($lang === 'EN'){
   $_hidden_field_active	= 'hidden';
   $_hidden_field_category	= 'hidden';
}


/* --- CONFIGURATION --- */
$_config_language	= 1;

if($_config_language === 1){
   require dirname(__FILE__).'/../../language/pages/about/control.php';
}
?>