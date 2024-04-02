<?php
require_once '../login_asso.php';

if(isset($_GET['num_animal'])) {
    $id_animal = $_GET['num_animal'];

    $delete = "DELETE from asso.animaux WHERE id_animaux = $id_animal";

    if ($connexion->query($delete) === TRUE) {
        echo "Animal supprimé avec succès!";
        header('location:tous_les_animaux.php');
    } else {
        echo "Erreur lors de l'adoption de l'animal: " . $connexion->error;
    }
} else {
    echo "ID d'animal non spécifié!";
}

$connexion->close();
?>
