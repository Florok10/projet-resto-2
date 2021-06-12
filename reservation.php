<?php 

class Reservation {

    private $_idReservation;
    private $_date;

    function setDate($idReservation){
    $this->_idReservation=$idReservation;
    }


    function setDate($date){
    $this->_date=$date;
    }
}