<?php 
    session_start();
require_once 'Reservation.php';
require_once 'Resto.php';

if(isset($_POST['submitReservation']) && !empty($_POST['date']) && !empty($_POST['choixResto'])){
    $date = $_POST['date'];
    $choixResto = $_POST['choixResto'];

    $nvReservation = new Reservation();

    $nvReservation->setDate();
    $nvReservation->setChoix();

    $nvReservation->envoiReservation($dsn, $user, $password);

    header('Location: profil.php');

} else {
    echo 'Remplissez bien les champs.';
}