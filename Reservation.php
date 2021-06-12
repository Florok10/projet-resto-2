<?php 

class Reservation {

    private $_idReservation;
    private $_date;
    private $_choixResto;

    public function setIdReservation($idReservation){
    $this->_idReservation=$idReservation;
    }

    public function getIdReservation(){
        return $this->_idReservation;
    }

    public function setChoixResto($choixResto){
        $this->_choixResto=$choixResto;
    }

    public function getChoixResto(){
        return$this->_choixResto;
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

        $sth = $dbh->prepare("INSERT INTO `reservation`(date, choixResto) 
        VALUES (:date, :choixResto;");
        
        $sth->bindParam(":date", $this->getDate();
        $sth->bindParam(":choixResto", $this->getChoixResto());
     
        $sth->execute();   

    }
}