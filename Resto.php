<?php

class Resto{

    private $_id;
    private $_name;
    private $_address;
    private $_picture;
    private $_type;
    private $_description;

    
    public function __construct(){

    }

    public function setName($name){
        $this->_name= $name;
    }

    public function getName(){
        return $this->_name;
    }

    public function setAddress($address){
        $this->_address= $address;
    }

    public function getAdress(){
        return $this->_address;
    }
    public function setPicture($picture){
        $this->_picture= $picture;
    }

    public function getPicture(){
        return $this->_picture;
    }
    public function setType($type){
        $this->_type= $type;
    }

    public function getType(){
        return $this->_type;
    }
    
    public function setDescription($description){
        $this->_description= $description;
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
        $sth= $dbh->prepare("INSERT INTO `Resto`(`name`, `address`, `type`, `picture`, `description`) 
        VALUES(:name, :address, :type, :picture, :description);");

        $sth->bindParam(':name', $this->getName());
        $sth->bindParam(':address', $this->getAdress());
        $sth->bindParam(':type', $this->getType());
        $sth->bindParam(':picture', $this->getPicture());
        $sth->bindParam(':description', $this->getDescription());

        $sth->execute();
    }

    public function recupDonnees($dsn,$user,$password){

        try{
            $dbh= new PDO($dsn,$user,$password);
    
        $sth = $dbh->prepare("SELECT * FROM `Resto`");
        
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
            header("Location: connexion.php");
        }

    }
}