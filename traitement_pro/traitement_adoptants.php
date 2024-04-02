<?php

require_once '../login_asso.php';

if (isset($_POST['nom_adoptants'])  && isset($_POST['prenom_adoptants']) && isset($_POST['adresse_adoptants']) && isset($_POST['mail_adoptants'])&& isset($_POST['telephone_adoptants']))
{
    $insert = $connexion->prepare("INSERT INTO adoptants (nom, prenom, adresse,mail, telephone) VALUES (?, ?, ?, ?,?)");

    
    $nom = $_POST['nom_adoptants'];
    $prenom = $_POST['prenom_adoptants'];
    $adresse = $_POST['adresse_adoptants'];
    $mail = $_POST['mail_adoptants'];
    $telephone = $_POST['telephone_adoptants'];

    $insert->bind_param("sssss", $nom, $prenom, $adresse, $mail, $telephone);



    if (strlen($nom)<70){
        if(strlen($prenom<70)){
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
                if ($insert->execute()) {

                    if (isset($_GET['num_animal'])) {
                        $animal_id = $_GET['num_animal'];
                        $update_animal_sql = "UPDATE animaux SET present = 1 WHERE id_animaux = '$animal_id'";
                        $connexion->query($update_animal_sql);
                        
                        header('location: tous_les_animaux.php');
                        exit();
                        
                            } else {
                                echo "L'ID de l'animal n'est pas spécifié.";
                            }
                        } else {
                            echo "erreur dans l'enregistrement";
                        }
                    }else{echo"l'emil n'est pas valide";}
                }else {echo"le prenom est trop long";}

            }else {echo"le nom est trop long ";}

        $connexion->close();
}else {
    echo " une données n'a pas était rentrée";
}
