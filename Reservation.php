<?php 

class Reservation {

    private $_idReservation;
    private $_date;

    function setIdReservation($idReservation){
    $this->_idReservation=$idReservation;
    }

    function getIdReservation(){
        return $this->_IdReservation;
    }

    function setDate($date){
    $this->_date=$date;
    }

    function getDate(){
        return $this->_date;
    }

    public function envoiReservation($dsn, $user, $password){


        try{
            $dbh = new PDO($dsn, $user, $password);
           
        }
        catch(PDOException $e){
            $e->getMessage();

        }

        $sth = $dbh->prepare("INSERT INTO reservation(firstname, lastname, email, date) VALUES (:firstname, :lastname, :email, :date);");
        
        $sth->bindParam(":firstname", $this->getFirstName());
        $sth->bindParam(":lastname", $this->getLastName());
        $sth->bindParam(":email", $this->getEmail());
        $sth->bindParam(":date", $this->getDate());
     
        $sth->execute();   

    }
}