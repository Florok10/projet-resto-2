<?php

class Resto{

    private $_nameResto;
    private $_addressResto;
    private $_pictureResto;
    private $_typeResto;
    private $_descriptionResto;

    
    public function __construct(){

    }

    public function setNameResto($nameResto){
        $this->_nameResto = $nameResto;
    }

    public function getNameResto(){
        return $this->_nameResto;
    }

    public function setAddressResto($addressResto){
        $this->_addressResto = $addressResto;
    }

    public function getAddressResto(){
        return $this->_addressResto;
    }
    public function setPictureResto($pictureResto){
        $this->_pictureResto = $pictureResto;
    }

    public function getPictureResto(){
        return $this->_pictureResto;
    }
    public function setTypeResto($typeResto){
        $this->_typeResto = $typeResto;
    }

    public function getTypeResto(){
        return $this->_typeResto;
    }
    
    public function setDescriptionResto($descriptionResto){
        $this->_descriptionResto = $descriptionResto;
    }

    public function getDescriptionResto(){
        return $this->_descriptionResto;
    }

    

    public function envoisDonnees($dsn,$user,$password){

        try{
            $dbh = new PDO($dsn,$user,$password);
        }catch(PDOException $e){
            echo 'cheh';
        }
        $sth= $dbh->prepare("INSERT INTO `restaurant_template`(`nameResto`, `addressResto`, `typeResto`, `pictureResto`, `descriptionResto`) 
        VALUES(:nameResto, :addressResto, :typeResto, :pictureResto, :descriptionResto);");

        $sth->bindParam(':nameResto', $this->getNameResto());
        $sth->bindParam(':addressResto', $this->getAddressResto());
        $sth->bindParam(':typeResto', $this->getTypeResto());
        $sth->bindParam(':pictureResto', $this->getPictureResto());
        $sth->bindParam(':descriptionResto', $this->getDescriptionResto());

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