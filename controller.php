<?php 

session_start();//Démarre une nouvelle session ou en reprend une existante
class Controller {  } //crée une classe controller vide pour le moment


require_once "Resto.php";
require_once "DAO.php";

if(isset($_POST['submit'])){
    
    $name = $_POST['nameResto'];
    $address = $_POST['addressResto'];
    $pictureResto = $_POST['pictureResto'];
    $type = $_POST['typeResto'];
    $description = $_POST['descriptionResto'];

    if (isset($_FILES['pictureResto']) && $_FILES['pictureResto']['error'] == 0) {
        echo "c'est bon";
    }
    
    $target_dir = './uploads/';
    
   
    $informationsImage = pathinfo($_FILES['pictureResto']['name']);
   
    $extensionImage = strtolower($informationsImage['extension']);
    
    $target_file = $target_dir .  $name . "." .$extensionImage;
    echo $target_file;

    if (move_uploaded_file($_FILES['pictureResto']['tmp_name'], $target_file)) {
        echo "The file ". basename( $_FILES["pictureResto"]["name"]). " has been uploaded.";
    } else {

        echo "Sorry, there was an error uploading your file.";
    }


    $resto = new Resto();

    $resto->setName($name);
    $resto->setAddress($address);
    $resto->setType($type);
    $resto->setPictureResto($target_file);
    $resto->setDescription($description);

    $resto->envoisDonnees($dsn,$user,$password);

    

    echo "Le restaurant" . " " . $name . " " . "a bien été ajouté à la liste des Restaurants";

    header("Locate: listResto.php");



}