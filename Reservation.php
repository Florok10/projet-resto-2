<?php 
session_start();
$_SESSION['obj_user'];

class Booking{

    private $_idBooking;
    private $_dateBooking;
    private $_hourBooking;
    private $_user;
    private $_restaurant;


    public function setIdBooking($idBooking){
        $this->_idBooking = $idBooking;
    }

    public function getIdBooking(){
        return $this->_idBooking;
    }

    public function setDateBooking($dateBooking){
        $this->_dateBooking = $dateBooking;
    }

    public function getDateBooking(){
        return $this->_dateBooking;
    }
    
    public function setHourBooking($hourBooking){
        $this->_hourBooking = $hourBooking;
    }

    public function getHourBooking(){
        return $this->_hourBooking;
    }

    public function setUser($user){
        $this->_client = $user;
    }

    public function getUser(){
        return $this->_user;
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
            $dbh = new PDO($dsn, $user, $password);
           
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
        $maRequet->bindParam(':id_user', $this->$this->user->id_user);
        $maRequet->bindParam(':id_restaurant', $this->getRestaurant());
        $maRequet->bindParam(':hourBooking', $this->gethourBooking());

        //excute la requete
        $maRequet->execute();
       
        header("Location: profil.php");

    }

    // retourne le nombre de reservation par client
    public function countBooking($client){
        require_once 'DAO.php';

        $db = DAO::connect();
        $req = $bdd->query("SELECT  COUNT($client) as Nbrbook FROM Booking" );
        $donnees = $req->fetch();
        $req->closeCursor();
        $total= $donnees['Nbrbook'];

        return $total;
    }

    public function recupBooking($dsn,$user,$password){

        try{
            $dbh= new PDO($dsn,$user,$password);

            $idCli = intval($_SESSION['obj_user']['id_user']);
        
            $sth = $dbh->prepare("SELECT user.firstname, restaurant_template.nameResto, reservation.dateBooking, reservation.hourBooking  FROM (user INNER JOIN reservation ON (user.id_user = reservation.id_user)) INNER JOIN restaurant_template ON (Reservation.id_resto = restaurant.id_restaurant) WHERE user.id_user = $idUser ORDER BY dateBooking ASC, hourBooking ASC;");
        
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