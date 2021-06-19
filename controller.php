<?php 


require_once "Resto.php";
require_once "DAO.php";

if(isset($_POST['submit'])){
    
    $nameResto = $_POST['nameResto'];
    $addressResto = $_POST['addressResto'];
    $pictureResto = $_POST['pictureResto'];
    $typeResto = $_POST['typeResto'];
    $descriptionResto = $_POST['descriptionResto'];

    if (isset($_FILES['pictureResto']) && $_FILES['pictureResto']['error'] == 0) {
        echo "c'est bon";
    }
    
    $target_dir = './uploads/';

    $namePictureResto= preg_replace('/\s+/', '', $nameResto); 
    
   
    $informationsImage = pathinfo($_FILES['pictureResto']['name']);
    var_dump($extensionImage);
    $extensionImage = strtolower($informationsImage['extension']);
    
    $target_file_resto = $target_dir .  $namePictureResto . "." .$extensionImage;
    echo $target_file_resto;

    if (move_uploaded_file($_FILES['pictureResto']['tmp_name'], $target_file_resto)) {
        echo "The file ". basename( $_FILES["pictureResto"]["name"]). " has been uploaded.";
    } else {

        echo "Sorry, there was an error uploading your file.";
    }


    $resto = new Resto();

    $resto->setNameResto($nameResto);
    $resto->setAddressResto($addressResto);
    $resto->setTypeResto($typeResto);
    $resto->setPictureResto($target_file_resto);
    $resto->setDescriptionResto($descriptionResto);

    $resto->envoisDonnees($dsn,$user,$password);

    

    echo "Le restaurant" . " " . $nameResto . " " . "a bien été ajouté à la liste des Restaurants";

    header("Location: listResto.php");



}