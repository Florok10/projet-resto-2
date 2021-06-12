<?php
session_start();
require_once 'controllerLogin.php';
require_once 'header.inc.php';


session_destroy();

header('Location: index.php');