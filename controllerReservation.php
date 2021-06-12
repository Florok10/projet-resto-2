<?php 
session_start();
require_once 'Reservation.php';
require_once "DAO.php";

if(isset($_POST['submitReservation'])){
    $date = $_POST['date'];
    $choixResto = $_POST['choixResto'];
    if(!empty($_POST['date']) && !empty($_POST['choixResto'])){

    $nvReservation = new Reservation();

    $nvReservation->setDate($date);
    $nvReservation->setChoixResto($choixResto);

    $nvReservation->envoiReservation($dsn, $user, $password);

    header('Location: profil.php');
    }

} else {
    echo 'Remplissez bien les champs.';
}