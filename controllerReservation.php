<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "Reservation.php";
require_once "DAO.php";
$_SESSION['obj_user'];


if(isset($_POST['submit'])){
    
    $resDate = date('Y-m-d', strtotime($_POST['dateBooking']));
    $resHour = $_POST['hourBooking'];
    
    $idUser = intval($_SESSION['obj_user']['id_user']);
    $idResto = intval($_GET['id_resto']);
    var_dump($id_resto);

     $book1 = new Booking();

    $book1->setDateBooking($resDate);
    $book1->setHourBooking($resHour);
    $book1->setUser($idUser);
    $book1->setResto($idResto);

    $book1->addBooking($dsn, $user, $password);
    

} else {
    echo 'Remplissez bien les champs.';
}