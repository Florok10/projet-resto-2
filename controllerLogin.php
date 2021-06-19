<?php
session_start();
require_once "User.php";
require_once "DAO.php";

if(isset($_POST['submit'])){
    
    $email = $_POST['email'];
    $mdp = $_POST['password'];
    echo "c'est bon";
 
    $user1 = new User();
    echo "c'est bon";

    $user1->setEmail($email);
    echo "c'est bon";
    $user1->setPassword($mdp);
    echo "c'est bon";
    $user1->setRole($role);
    echo "c'est bon";
    
    $logs = [$user1->getEmail(), $user1->getPassword(), $user1->getRole()];
    echo "c'est bon";

    $user1->login($dsn, $user, $password, $logs);
    echo "c'est bon";
}