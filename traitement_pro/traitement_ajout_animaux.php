<?php

require_once '../login_asso.php';

if (isset($_POST['nom'])  && isset($_POST['espece']) && isset($_POST['race']) && isset($_POST['sexe']) && isset($_POST['lieu']) && isset($_POST['description']))
{
    $insert = $connexion->prepare("INSERT INTO animaux (nom, date_naissance, espece, race, sexe, lieu, description, present) VALUES (?, ?, ?, ?, ?, ?, ?, '0')");

    
    $nom = $_POST['nom'];
    $date_naissance = $_POST['date_naissance'];
    $espece = $_POST['espece'];
    $race = $_POST['race'];
    $sexe = $_POST['sexe'];
    $lieu = $_POST['lieu'];
    $description = $_POST['description'];
    $insert->bind_param("sssssss", $nom, $date_naissance, $espece, $race, $sexe, $lieu, $description);



    if (strlen($nom)<60){
        if ($insert->execute()) {

        header('location: ajout_animaux.php?a='.$nom.'');
        

         } else {
                 echo "erreur dans l'enregistrement";
                 }
        
     }else {echo"le nom est trop long ";}

    $connexion->close();
}else {
    echo " une données n'a pas était rentrée";
}
