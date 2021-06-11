<?php
session_start();
require_once 'Resto.php';
require_once 'DAO.php';
$_SESSION['AllResto'];
if(isset($_GET["liste"])){
   
$resto = new Resto();

$_SESSION['AllResto'] = $resto->recupDonnees($dsn,$user,$password);
header("Location: listResto.php");
}



?>