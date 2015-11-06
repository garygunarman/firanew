<?php
/*
* ----------------------------------------------------------------------
* HEADER
* ----------------------------------------------------------------------
*/

include('include/_config.php');
include('include/_database.php');
include('include/_database_fetch.php');
include('include/_session.php');
include('include/_general.php');
include('include/_global.php');
//include('include/_shop.php');
include('include/_title.php');
include('include/_meta.php');
//include('include/_cron.php');
//include('include/_library.php');
//include('include/_checker.php');


if(substr(BASE_URL, -6) === 'admin/'){
   include('include/_authorizer.php');
   
}

include('include/_languageLibrary.php');