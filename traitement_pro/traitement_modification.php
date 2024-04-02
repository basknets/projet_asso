<?php

require_once '../login_asso.php';


    if (isset($_POST['id_animal']) && isset($_POST['nom']) && isset($_POST['espece']) && isset($_POST['race']) && isset($_POST['date_naissance']) && isset($_POST['sexe']) && isset($_POST['lieu']) && isset($_POST['description'])) {
        $id_animal = $_POST['id_animal'];
        $nom = $_POST['nom'];
        $espece = $_POST['espece'];
        $race = $_POST['race'];
        $date_naissance = $_POST['date_naissance'];
        $sexe = $_POST['sexe'];
        $lieu = $_POST['lieu'];
        $description = $_POST['description'];


        $update_query = "UPDATE animaux SET nom='$nom', espece='$espece', race='$race', date_naissance='$date_naissance', sexe='$sexe', lieu='$lieu', description='$description' WHERE id_animaux=$id_animal";

        if ($connexion->query($update_query) === TRUE) {
            header('location:tous_les_animaux.php');
        } else {
            echo "Erreur lors de la mise à jour des informations de l'animal : " . $connexion->error;
        }

        // Ferme la connexion à la base de données
        $connexion->close();
    } else {
        echo "Toutes les données requises n'ont pas été fournies.";
    }

?>
