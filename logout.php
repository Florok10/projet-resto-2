<?php
session_start();

session_destroy();

echo "Vous êtes déconnecté";

header('Location: connexion.php');