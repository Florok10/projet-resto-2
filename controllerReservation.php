<?php 
session_start();
require_once "Reservation.php";
require_once "DAO.php";
$_SESSION['obj_user'];
$_SESSION['idResto'];


if(isset($_POST['submit'])){
    
    $resDate = date('Y-m-d', strtotime($_POST['res_date']));
    $resHour = $_POST['res_heure'];
    
    $idClient = intval($_SESSION['obj_user']['id']);
    $idRestaurant = intval($_SESSION['idResto']);

    // $book1 = new Booking();

    $book1->setDateBooking($resDate);
    $book1->setHourBooking($resHour);
    $book1->setClient($idClient);
    $book1->setRestaurant($idRestaurant);

    $book1->addBooking($dsn, $user, $pw);
    

} else {
    echo 'Remplissez bien les champs.';
}