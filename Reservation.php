<?php 

class Reservation extends Restaurant {

    private $_idReservation;
    private $_date;

    public function setIdReservation($idReservation){
    $this->_idReservation=$idReservation;
    }

    public function getIdReservation(){
        return $this->_idReservation;
    }

    public function setDate($date){
    $this->_date=$date;
    }

    public function getDate(){
        return $this->_date;
    }

    public function envoiReservation($dsn, $user, $password){


        try{
            $dbh = new PDO($dsn, $user, $password);
           
        }
        catch(PDOException $e){
            $e->getMessage();

        }

        $sth = $dbh->prepare("INSERT INTO `reservation`(date) 
        VALUES (:date;");
        
        $sth->bindParam(":firstname", $this->getFirstName());
        $sth->bindParam(":lastname", $this->getLastName());
        $sth->bindParam(":email", $this->getEmail());
        $sth->bindParam(":password", $this->getPassword());
        $sth->bindParam(":picture", $this->getPicture());
     
        $sth->execute();   

    }
}