<?php
require_once "User.php";
require_once "DAO.php";

if(isset($_POST['submit'])){
    echo 'test1';
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $mdp = $_POST['password'];
    
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
        echo "c'est bon";
    }
    
    $target_dir = './uploads/';
    
   
    $informationsImage = pathinfo($_FILES['picture']['name']);
   
    $extensionImage = strtolower($informationsImage['extension']);
    
    $target_file = $target_dir .  $lastname . "." .$extensionImage;
    echo $target_file;
    

    if (move_uploaded_file($_FILES['picture']['tmp_name'], $target_file)) {
        echo "The file ". basename( $_FILES["picture"]["name"]). " has been uploaded.";
    } else {

        echo "Sorry, there was an error uploading your file.";
    }

    $user1 = new User();

    $user1->setFirstName($firstname);
    $user1->setLastName($lastname);
    $user1->setEmail($email);
    $user1->setPassword($mdp);
    $user1->setPicture($target_file );

    echo $user1->getFirstName();

    $user1->envoisDonnees($dsn, $user, $password);



}
?>