<?php
session_start();
require_once "User.php";
require_once "DAO.php";
require_once "Resto.php";
require_once "Reservation.php";

if(isset($_POST['submit'])){
    
    $email = $_POST['email'];
    $mdp = $_POST['password'];
 
    $user1 = new User();

    $user1->setEmail($email);
    $user1->setPassword($mdp);
    $user1->setRole($role);
    
    $logs = [$user1->getEmail(), $user1->getPassword()];

    $user1->login($dsn, $user, $password, $logs);
}