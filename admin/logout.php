<?php
// get dir
function get_dirname($path){
   $current_dir = dirname($path);
   
   if($current_dir == "/" || $current_dir == "\\"){
      $current_dir = '';
   }

   return $current_dir;
}


// Initialize the session.
// If you are using session_name("something"), don't forget it now!
//session_name("session_security_Session");
session_start();


// Unset all of the session variables.
//$_SESSION = array();


// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
/*
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name('session_security_Session'), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
    );
}
*/


// Finally, destroy the session.
session_destroy();
session_regenerate_id(true);

header("Location: http://".$_SERVER['HTTP_HOST'].get_dirname($_SERVER['PHP_SELF']));
?>