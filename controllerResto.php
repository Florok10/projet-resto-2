<?php
session_start();
require_once 'Resto.php';
require_once 'DAO.php';
$_SESSION['AllResto'];
if(isset($_GET["liste"])){
   
$rest = new Resto();

$_SESSION['AllResto'] = $rest->recupDonnees($dsn,$user,$password);
header("Location: listResto.php");
}



?>