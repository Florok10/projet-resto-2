<?php 
session_start();
$_SESSION['obj_user'];

class Booking{

    private $_idBooking;
    private $_dateBooking;
    private $_hourBooking;
    private $_user;
    private $_restaurant;


    public function getIdBooking(){
        return $this->_idBooking;
    }

    public function setIdBooking($idBooking){
        $this->_idBooking = $idBooking;
    }

    public function getDateBooking(){
        return $this->_dateBooking;
    }

    public function setDateBooking($dateBooking){
        $this->_dateBooking = $dateBooking;
    }

    public function getHourBooking(){
        return $this->_hourBooking;
    }
    
    public function setHourBooking($hourBooking){
        $this->_hourBooking = $hourBooking;
    }

    public function getUser(){
        return $this->_user;
    }

    public function setUser($user){
        $this->_client = $user;
    }

    public function getRestaurant(){
        return $this->_restaurant;
    }

    public function setRestaurant($restaurant){
        $this->_restaurant = $restaurant;
    }

    

    //reserver un resto
    public function addBooking($dsn, $user, $pw){

        // se connecte
        try{
            $dbh = new PDO($dsn, $user, $pw);
           
        }
        catch(PDOException $e){
            $e->getMessage();
        }

        //la requete 
        $requete = "INSERT INTO Reservation (dateBooking, id_user, id_restaurant, hourBooking) VALUES (:dateBooking, :id_user, :id_restaurant, :hourBooking);";
        //on prepare la requete 
        $maRequet = $dbh->prepare($requete);
        //relie les variable avec les element en attente pour la requete
        $maRequet->bindParam(':dateBooking', $this->getdateBooking());
        $maRequet->bindParam(':id_user', $this->getUser());
        $maRequet->bindParam(':id_restaurant', $this->getRestaurant());
        $maRequet->bindParam(':hourBooking', $this->gethourBooking());

        //excute la requete
        $maRequet->execute();
       
        header("Location: profil.php");

    }

    public function recupBooking($dsn,$user,$password){

        try{
            $dbh= new PDO($dsn,$user,$password);

            $idCli = intval($_SESSION['obj_user']['id']);
        
            $sth = $dbh->prepare("SELECT user.firstname, Resto.name, Reservation.dateBooking, Reservation.hourBooking  FROM (user INNER JOIN Reservation ON (user.id = Reservation.id_client)) INNER JOIN Resto ON (Reservation.id_resto = Resto.id) WHERE user.id = $idCli ORDER BY dateBooking ASC, hourBooking ASC;");
        
            $sth->execute();
            $count = $sth->rowCount();
         
            $result = $sth->fetchAll();
    
        // echo var_dump($result);
        }catch(PDOException $e){
            $e->getMessage();
        }
    
        if($count > 0   && !empty($result)){
            
            return $result;
            
    
        }else{
            // echo "compteur = 0 ";
        }

    }
}