<?php

class User{
    private $_firstname;
    private $_lastname;
    private $_email;
    private $_password; 
    private $_picture;
    private $_role;


    // function __construct(){
        
    // }


    public function setId($id){
        $this->_id = $id;
    }

    public function getId(){
        return $this->_id;
    }

    public function setRole($role){
        $this->_role=$role;
    }

    public function getRole(){
        return $this->_role;
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

    // public function recupRole($dsn, $user, $password){
    //     try{
    //         $dbh = new PDO($dsn, $user, $password);
           
    //     }
    //     catch(PDOException $e){
    //         $e->getMessage();

    //     }
    //     $sth = $dbh->prepare("SELECT * FROM `user` WHERE `roleUser`=:roleUSer");
    //     $sth->bindParam(":roleUser", $this->getRole());
    //     $sth->execute();

    //     $count = $sth->rowCount();
    //     $result = $sth->fetchAll();

    // }

    public function envoisDonnees($dsn, $user, $password){


        try{
            $dbh = new PDO($dsn, $user, $password);
           
        }
        catch(PDOException $e){
            $e->getMessage();

        }

        $sth = $dbh->prepare("INSERT INTO user(firstname, lastname, email, password, picture) VALUES (:firstname, :lastname, :email, :password, :picture);");
        
        $sth->bindParam(":firstname", $this->getFirstName());
        $sth->bindParam(":lastname", $this->getLastName());
        $sth->bindParam(":email", $this->getEmail());
        $sth->bindParam(":password", $this->getPassword());
        $sth->bindParam(":picture", $this->getPicture());
     
        $sth->execute();   

    }
    function login($dsn, $user, $password, $logs){

        try{
            $dbh= new PDO($dsn,$user,$password);
    
        $sth = $dbh->prepare("SELECT * FROM `user` WHERE `email`=:email AND `password`=:password AND `roleUser`=:roleUser LIMIT 1");
        $sth->bindParam(':email', $logs[0],PDO::PARAM_STR);
        $sth->bindParam(':password', $logs[1],PDO::PARAM_STR);
        $sth->bindValue(':roleUser', $logs[2],PDO::PARAM_INT);
        $sth->execute();
        $count = $sth->rowCount();
        $sth->setFetchMode(PDO::FETCH_CLASS, new User());   
         
        $result = $sth->fetch();
    
        var_dump($result);
        }catch(PDOException $e){
            $e->getMessage();
        }
    
        if($count == 1 && !empty($result)){
    
            $_SESSION['obj_user'] = $result;
            header("Location: profil.php");
    
        } else {
            header("Location: index.php");
            echo 'La connexion a échoué';
        }
            
    }

}



  
?>
