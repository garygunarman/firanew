<?php
/*
# ----------------------------------------------------------------------
# HEADER: CONFIGURATION
# ----------------------------------------------------------------------
*/


/* --- DATABASE --- */
$db_name = 'fira_db';
$db_user = 'root';
$db_pass = '';
$db_host = 'localhost';


/* --- ENVIRONMENT --- */
$environment = '2'; // Change this value into 2 for disabled error reporting (Warning, Notice, Fatal error)


/* --- ERROR LOG --- */
ini_set('error_log', dirname(__FILE__).'/../_log/error-log.txt');


/* --- DEFAULT ADMIN PAGE --- */
$temp_page = 'news';


/* --- TIMEZONE --- */
date_default_timezone_set('Asia/Jakarta');


/* --- CURRENCY --- */
$_sym_curr_idr 			= 'Rp.';
$_sym_curr_usd 			= 'USD$';

$_config_dual_currency 	= 1;


/* --- SESSION: USE--- */
$_define_session_engine = 3;


/* --- GOOGLE ANALYTICS --- */
$_define_analytics		= 0;
?>