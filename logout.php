<?php
  require_once(__dir__ . '/controller.php'); //requiert le dossier du fichier et controller.php une seule fois chacun

  class Logout extends Controller { //on crée la classe Logout qui s'étend dans la classe Controller

    public function __construct() // on crée le constructeur de notre classe
    {
      session_destroy(); //on utilise la fonction php pour terminet une session
      header('Refresh: 1;url=index.php'); //on est ensuite redirigé sur index.php
    }
  }
?>