<?php 

require_once 'Reservation.php';
require_once 'Resto.php';

if(isset($_POST['submit_reservation']) && !empty($_POST['date']) && !empty($_POST['choixResto'])){
    $date = $_POST['date'];
    $choixResto = $_POST['choixResto'];

    $nvReservation = new Reservation();

    $nvReservation->setDate();
    $nvReservation->setChoix();

    $user1->envoisReservation($dsn, $user, $password);

    header('Location: profil.php');

}