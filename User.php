<?php

class User {
    private $_id;
    private $_firstname;
    private $_lastname;
    private $_email;
    private $_password; 
    private $_picture;



    public function setId($id){
        $this->_id = $id;
    }

    public function getId(){
        return $this->_id;
    }


    public function setFirstName($firstname){
        $this->_firstname = $firstname;
    }

    public function getFirstName(){
        return $this->_firstname;
    }

    public function setLastName($lastname){
        $this->_lastname = $lastname;
    }

    public function getLastName(){
        return $this->_lastname;
    }

    public function setEmail($email){
        $this->_email = $email;
    }

    public function getEmail(){
        return $this->_email;
    }

    public function setPassword($password){
        $this->_password = $password;
    }

    public function getPassword(){
        return $this->_password;
    }

    public function setPicture($picture){
        $this->_picture = $picture;
    }

    public function getPicture(){
        return $this->_picture;
    }

    public function envoisDonnees($dsn, $user, $cheh){


        try{
            $dbh = new PDO($dsn, $user, $cheh);
           
        }
        catch(PDOException $e){
            $e->getMessage();

        }

        $sth = $dbh->prepare("INSERT INTO user(firstname, lastname, email, password, picture) VALUES (:firstname, :lastname, :email, :mdp, :picture);");
        
        $sth->bindParam(":firstname", $this->getFirstName());
        $sth->bindParam(":lastname", $this->getLastName());
        $sth->bindParam(":email", $this->getEmail());
        $sth->bindParam(":mdp", $this->getPassword());
        $sth->bindParam(":picture", $this->getPicture());
     
        $sth->execute();   

    }
    function login($dsn, $user, $password, $logs){

        try{
            $dbh= new PDO($dsn,$user,$password);
    
        $sth = $dbh->prepare("SELECT * FROM `user` WHERE `email`=:email AND `password`=:password LIMIT 1");
        $sth->bindParam(':email', $logs[0],PDO::PARAM_STR);
        $sth->bindParam(':password', $logs[1],PDO::PARAM_STR);
        $sth->execute();
        $count = $sth->rowCount();
        $sth->setFetchMode(PDO::FETCH_CLASS, new User());   
         
        $result = $sth->fetch();
    
        echo var_dump($result);
        }catch(PDOException $e){
            $e->getMessage();
        }
    
        if($count == 1 && !empty($result)){
    
            $_SESSION['obj_user'] = $result;
            header("Location: profil.php");
    
        }else{
            header("Location: connexion.php");
        }
            
    }

}



  
?>
