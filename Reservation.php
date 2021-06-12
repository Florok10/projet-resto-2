<?php 

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Resto.php';

class Reservation {

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
        
        $sth->bindParam(":date", $this->getDate();
     
        $sth->execute();   

    }
}