<?php
session_start();
require_once 'controllerLogin.php';
require_once 'header.inc.php';

if(isset(session_status()) {


session_destroy();

echo "Vous êtes déconnecté";

header('Location: index.php');
}
endif;