<?php
session_start();

var_dump(session_status());

$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}


session_destroy();



// var_dump(session_start());

// session_unset();

// var_dump(session_unset());

// session_destroy();

// var_dump(session_destroy());

 header('Refresh: 100;url=index.php');?>