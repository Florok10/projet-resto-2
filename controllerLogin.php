<?php
session_start();
require_once "User.php";
require_once "DAO.php";

if(isset($_POST['submit'])){
    
    $email = $_POST['email'];
    $mdp = $_POST['password'];
    echo "c'est bon";
 
    var_dump($user1 = new User());
    echo "<br> c'est bon user crée";

    var_dump($user1->setEmail($email));
    echo "<br> c'est bon mail associé";
    var_dump($user1->setPassword($mdp));
    echo "<br> c'est bon mdp associé";
    
    var_dump($logs = [$user1->getEmail(), $user1->getPassword(), $user1->getRole()]);
    echo "<br> c'est bon logs crée";

    $user1->login($dsn, $user, $password, $logs);
    echo "<br> c'est tout bon";

    header("Location: profil.php");
}