<?php 

require_once "Resto.php";
require_once "DAO.php";

if(isset($_POST['submit'])){
    
    $name = $_POST['nameResto'];
    $address = $_POST['addressResto'];
    $pictureResto = $_POST['pictureResto'];
    $type = $_POST['typeResto'];
    $description = $_POST['descriptionResto'];

    $resto = new Resto();

    $resto->setName($name);
    $resto->setAddress($address);
    $resto->setType($type);
    $resto->setPictureResto($pictureResto);
    $resto->setDescription($description);

    $resto->envoisDonnees($dsn,$user,$password);

    /*header("Location: listResto.php");*/

    echo "Le restaurant" . " " . $name . " " . "a bien été ajouté à la liste des Restaurants";



}