<?php

class Resto{

    private $_id;
    private $_name;
    private $_address;
    private $_pictureResto;
    private $_type;
    private $_description;

    
    public function __construct(){

    }

    public function setName($name){
        $this->_name = $name;
    }

    public function getName(){
        return $this->_name;
    }

    public function setAddress($address){
        $this->_address = $address;
    }

    public function getAddress(){
        return $this->_address;
    }
    public function setPictureResto($pictureResto){
        $this->_pictureResto = $pictureResto;
    }

    public function getPictureResto(){
        return $this->_pictureResto;
    }
    public function setType($type){
        $this->_type = $type;
    }

    public function getType(){
        return $this->_type;
    }
    
    public function setDescription($description){
        $this->_description = $description;
    }

    public function getDescription(){
        return $this->_description;
    }

    

    public function envoisDonnees($dsn,$user,$password){

        try{
            $dbh = new PDO($dsn,$user,$password);
        }catch(PDOException $e){
            echo 'cheh';
        }
        $sth= $dbh->prepare("INSERT INTO `restaurant_template`(`nameResto`, `addressResto`, `typeResto`, `pictureResto`, `descriptionResto`) 
        VALUES(:nameResto, :addressResto, :typeResto, :pictureResto, :descriptionResto);");

        $sth->bindParam(':nameResto', $this->getName());
        $sth->bindParam(':addressResto', $this->getAddress());
        $sth->bindParam(':typeResto', $this->getType());
        $sth->bindParam(':pictureResto', $this->getPictureResto());
        $sth->bindParam(':descriptionResto', $this->getDescription());

        $sth->execute();
    }

    public function recupDonnees($dsn,$user,$password){

        try{
            $dbh= new PDO($dsn,$user,$password);
    
        $sth = $dbh->prepare("SELECT * FROM `restaurant_template`");
        
        $sth->execute();
        $count = $sth->rowCount();
         
        $result = $sth->fetchAll();
    
        echo var_dump($result);
        }catch(PDOException $e){
            $e->getMessage();
        }
    
        if($count > 0   && !empty($result)){
    
            return $result;
            
    
        }else{
            header("Location: profil.php");
        }

    }
}