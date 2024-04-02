<?php

$serveur = "localhost";
$user = "root";
$MDP = "Sio123";
$BDD = "asso";

$connexion = new mysqli($serveur, $user, $MDP, $BDD);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué  " . $connexion->connect_error);
} 
?>    